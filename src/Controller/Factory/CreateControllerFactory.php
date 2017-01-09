<?php

namespace Pacificnm\CategoryAttributeOption\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Controller\CreateController;

class CreateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');

        $attributeService = $realServiceLocator->get('Pacificnm\CategoryAttribute\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Form\Form');

        return new CreateController($service, $attributeService, $form);
    }


}

