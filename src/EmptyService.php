<?php

namespace Petap\Controller;

use PetapDomainInterface\ServiceInterface;

/**
 * Class EmptyService
 * @package Petap\Controller
 */
class EmptyService implements ServiceInterface
{
    /**
     * @param mixed $criteria
     * @param mixed $changes
     * @return mixed
     */
    public function handle($criteria, $changes) : void
    {
    }
}
