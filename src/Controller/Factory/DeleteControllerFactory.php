<?php

namespace Pacificnm\CategoryAttributeOption\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');

        return new DeleteController($service);
    }


}

