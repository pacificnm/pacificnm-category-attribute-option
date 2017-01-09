<?php

namespace Pacificnm\CategoryAttributeOption\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeOption\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pacificnm\CategoryAttributeOption\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

