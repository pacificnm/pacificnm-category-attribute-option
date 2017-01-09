<?php
namespace Pacificnm\CategoryAttributeOption\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Pacificnm\Mapper\AbstractMysqlMapper;
use Pacificnm\CategoryAttributeOption\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('category_attribute_option');
        
        $this->joinAttribute();
        
        $this->filter($filter);
        
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('category_attribute_option');
        
        $this->joinAttribute();
        
        $this->select->where(array(
            'category_attribute_option.category_attribute_option_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        if ($entity->getCategoryAttributeOptionId()) {
            $this->update = new Update('category_attribute_option');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'category_attribute_option.category_attribute_option_id = ?' => $entity->getCategoryAttributeOptionId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('category_attribute_option');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setCategoryAttributeOptionId($id);
        }
        
        return $this->get($entity->getCategoryAttributeOptionId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('category_attribute_option');
        
        $this->delete->where(array(
            'category_attribute_option.category_attribute_option_id = ?' => $entity->getCategoryAttributeOptionId()
        ));
        
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter            
     * @return \CategoryAttributeOption\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        // categoryAttributeId
        if (array_key_exists('categoryAttributeId', $filter) && $filter['categoryAttributeId'] > 0) {
            $this->select->where(array(
                'category_attribute_option.category_attribute_id = ?' => $filter['categoryAttributeId']
            ));
        }
        
        return $this;
    }

    /**
     * 
     * @return \Pacificnm\CategoryAttributeOption\Mapper\MysqlMapper
     */
    protected function joinAttribute()
    {
        $this->select->join('category_attribute', 'category_attribute.category_attribute_id = category_attribute_option.category_attribute_id', array(
            'category_attribute_type',
            'category_attribute_name',
            'category_attribute_active'
        ), 'inner');
        
        return $this;
    }
}

