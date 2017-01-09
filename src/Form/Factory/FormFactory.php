<?php

namespace Pacificnm\CategoryAttributeOption\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \CategoryAttributeOption\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }


}

