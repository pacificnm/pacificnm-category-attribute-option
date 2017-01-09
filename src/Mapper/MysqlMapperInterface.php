<?php

namespace Pacificnm\CategoryAttributeOption\Mapper;

use Zend\Paginator\Paginator;
use Pacificnm\CategoryAttributeOption\Entity\Entity;

interface MysqlMapperInterface
{

    /**
     * @param array $filter
     * @return Paginator
     */
    public function getAll(array $filter);
    /**
     * @param number $id
     * @return Entity
     */
    public function get($id);
    /**
     * @param Entity $entity
     * @return Entity
     */
    public function save(Entity $entity);
    /**
     * @param Entity $entity
     * @return Boolean
     */
    public function delete(Entity $entity);

}

