<?php

namespace Petap\Controller;

/**
 * Interface ResponseInterface
 * @package Petap\Controller
 */
interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function getCriteriaErrors();

    /**
     * @param mixed $errors
     */
    public function setCriteriaErrors($errors);

    /**
     * @return mixed
     */
    public function getChangesErrors();

    /**
     * @param mixed $errors
     */
    public function setChangesErrors($errors);

    /**
     * @return mixed
     */
    public function getChanges();

    /**
     * @param mixed $changes
     */
    public function setChanges($changes);

    /**
     * @return mixed
     */
    public function getValidChanges();

    /**
     * @param mixed $validChanges
     */
    public function setValidChanges($validChanges);

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
    public function getValidCriteria();

    /**
     * @param mixed $validCriteria
     */
    public function setValidCriteria($validCriteria);

    /**
     * @return mixed
     */
    public function getResult();

    /**
     * @param mixed $result
     */
    public function setResult($result);

    /**
     *  @return mixed
     */
    public function getRedirectTo();

    /**
     * @param mixed $redirectTo
     */
    public function setRedirectTo($redirectTo);

    /**
     * @return array
     */
    public function toArray();
}
