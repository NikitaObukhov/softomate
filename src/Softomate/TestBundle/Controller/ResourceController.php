<?php

namespace Softomate\TestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

abstract class ResourceController extends FOSRestController
{

    abstract protected function getResourceClass();

    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository($this->getResourceClass());
    }

    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}