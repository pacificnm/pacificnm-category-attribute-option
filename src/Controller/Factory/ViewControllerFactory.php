<?php

namespace Pacificnm\CategoryAttributeOption\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Controller\ViewController;

class ViewControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');

        return new ViewController($service);
    }


}

