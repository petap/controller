<?php

namespace Petap\Controller;

/**
 * Interface ValidatorInterface
 * @package Petap\Controller
 */
interface ValidatorInterface
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function isValid($data);

    /**
     * @return mixed
     */
    public function getErrors();

    /**
     * @return mixed
     */
    public function getValid();
}
