<?php

namespace Pacificnm\CategoryAttributeOption\Hydrator;

use Zend\Hydrator\ClassMethods;
use Pacificnm\CategoryAttributeOption\Entity\Entity;

class Hydrator extends ClassMethods
{

    /**
     * @param string $underscoreSeparatedKeys
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::hydrate()
     */
    public function hydrate(array $data, $object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
                
        parent::hydrate($data, $object);
                
        $categoryAttributeEntity = parent::hydrate($data, new \Pacificnm\CategoryAttribute\Entity\Entity()); 
        
        $object->setCategoryAttributeEntity($categoryAttributeEntity);
        return $object;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::extract()
     */
    public function extract($object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
                    
        $data = parent::extract($object);
                    
        unset($data['category_attribute_entity']);
        
        return $data;
    }


}

