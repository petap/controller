<?php

namespace Petap\Controller;

/**
 * Class EmptyValidator
 * @package Petap\Controller
 */
class EmptyValidator implements ValidatorInterface
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @param mixed $data
     * @return bool
     */
    public function isValid($data) : bool
    {
        $this->data = $data;

        return true;
    }

    /**
     * @return array
     */
    public function getErrors() : array
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->data;
    }
}
