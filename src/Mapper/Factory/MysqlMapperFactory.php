<?php

namespace Pacificnm\CategoryAttributeOption\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Pacificnm\CategoryAttributeOption\Hydrator\Hydrator;
use Pacificnm\CategoryAttributeOption\Entity\Entity;
use Pacificnm\CategoryAttributeOption\Mapper\MysqlMapper;

class MysqlMapperFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
                    
        $hydrator->add(new Hydrator());  
                    
        $prototype = new Entity();
                    
        $writeAdapter = $serviceLocator->get('db1');
                    
        $readAdapter = $serviceLocator->get('db2');
                    
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }


}

