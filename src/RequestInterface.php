<?php

namespace Petap\Controller;

/**
 * Interface RequestInterface
 * @package Petap\Controller
 */
interface RequestInterface
{
    /**
     * @return mixed
     */
    public function getMethod();

    /**
     * @param mixed $method
     */
    public function setMethod($method);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param mixed $criteria
     */
    public function setCriteria($criteria);

    /**
     * @return mixed
     */
    public function getChanges();

    /**
     * @param mixed $changes
     */
    public function setChanges($changes);
}
