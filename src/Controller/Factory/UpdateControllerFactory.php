<?php

namespace Pacificnm\CategoryAttributeOption\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Controller\UpdateController;

class UpdateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');

        $form = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Form\Form');

        return new UpdateController($service, $form);
    }


}

