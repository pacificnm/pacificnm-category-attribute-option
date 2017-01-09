<?php

namespace Pacificnm\CategoryAttributeOption\Service;

use Pacificnm\CategoryAttributeOption\Entity\Entity;
use Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface;

class Service implements ServiceInterface
{

    protected $mapper = null;

    /**
     * Service Construct
     *
     * @param MysqlMapperInterface $mapper
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Service\ServiceInterface::getAll()
     */
    public function getAll(array $filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }


}

