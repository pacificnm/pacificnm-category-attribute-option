<?php

namespace Pacificnm\CategoryAttributeOption\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');

        return new RestController($service);
    }


}

