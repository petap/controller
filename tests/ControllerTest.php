<?php

namespace Petap\ControllerTest;

use Petap\Controller\Controller;
use Petap\Controller\ValidatorInterface;
use Petap\Controller\Request;
use Petap\Controller\Response;
use PetapDomainInterface\ServiceInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Class ControllerTest
 * @package Petap\ControllerTest
 */
class ControllerTest extends TestCase
{
    use ProphecyTrait;

    private Controller $controller;

    /**
     * @var ValidatorInterface
     */
    private $criteriaValidator;

    /**
     * @var ValidatorInterface
     */
    private $changesValidator;

    /**
     * @var ServiceInterface
     */
    private $service;

    public function setUp() : void
    {
        $this->criteriaValidator = $this->prophesize(ValidatorInterface::class);
        $this->changesValidator = $this->prophesize(ValidatorInterface::class);
        $this->service = $this->prophesize(ServiceInterface::class);

        $this->controller = new Controller(
            $this->criteriaValidator->reveal(),
            $this->changesValidator->reveal(),
            $this->service->reveal()
        );
    }

    public function testDispatchWithValidAll()
    {
        $request = new Request();
        $response = new Response();
        $criteria = ['some' => 'criteria'];
        $changes = ['key' => 'value'];
        $result = ['success' => 'true'];

        $request->setCriteria($criteria);
        $request->setChanges($changes);

        $this->criteriaValidator->isValid($criteria)->willReturn(true);
        $this->changesValidator->isValid($changes)->willReturn(true);
        $this->criteriaValidator->getValid()->willReturn($criteria);
        $this->changesValidator->getValid()->willReturn($changes);
        $this->service->handle($criteria, $changes)->willReturn($result);

        $response = $this->controller->dispatch($request, $response);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals($result, $response->getResult());
        $this->assertEquals($criteria, $response->getCriteria());
        $this->assertEquals($changes, $response->getChanges());
        $this->assertEquals($criteria, $response->getValidCriteria());
        $this->assertEquals($changes, $response->getValidChanges());
    }

    public function testDispatchWithNotValidChanges()
    {
        $request = new Request();
        $response = new Response();
        $criteria = ['some' => 'criteria'];
        $changes = ['key' => 'value'];
        $error = ['some' => 'error'];

        $request->setCriteria($criteria);
        $request->setChanges($changes);

        $this->criteriaValidator->isValid($criteria)->willReturn(true);
        $this->changesValidator->isValid($changes)->willReturn(false);
        $this->changesValidator->getErrors()->willReturn($error);
        $this->changesValidator->getValid()->willReturn([]);
        $this->criteriaValidator->getValid()->willReturn([]);

        $response = $this->controller->dispatch($request, $response);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNull($response->getResult());
        $this->assertEquals($criteria, $response->getCriteria());
        $this->assertEquals($changes, $response->getChanges());
        $this->assertEquals($error, $response->getChangesErrors());
    }

    public function testDispatchWithNotValidCriteria()
    {
        $request = new Request();
        $response = new Response();
        $criteria = ['some' => 'criteria'];
        $changes = ['key' => 'value'];
        $errors = ['some' => 'error'];

        $request->setCriteria($criteria);
        $request->setChanges($changes);

        $this->criteriaValidator->isValid($criteria)->willReturn(false);
        $this->criteriaValidator->getErrors()->willReturn($errors);
        $this->criteriaValidator->getValid()->willReturn([]);

        $response = $this->controller->dispatch($request, $response);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNull($response->getResult());
        $this->assertEquals($criteria, $response->getCriteria());
        $this->assertEquals($changes, $response->getChanges());
        $this->assertEquals($errors, $response->getCriteriaErrors());
    }
}
