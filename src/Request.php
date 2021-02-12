<?php

namespace Petap\Controller;

/**
 * Class Request
 * @package Petap\Controller
 */
class Request implements RequestInterface
{
    /**
     * @var mixed
     */
    private $method;

    /**
     * @var mixed
     */
    private $criteria;

    /**
     * @var mixed
     */
    private $changes;

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @param mixed $criteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return mixed
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * @param mixed $changes
     */
    public function setChanges($changes)
    {
        $this->changes = $changes;
    }
}
