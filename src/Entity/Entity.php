<?php
namespace Pacificnm\CategoryAttributeOption\Entity;

use Pacificnm\CategoryAttribute\Entity\Entity as AttributeEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $categoryAttributeOptionId;

    /**
     *
     * @var number
     */
    protected $categoryAttributeId;

    /**
     *
     * @var string
     */
    protected $categoryAttributeOptionDisplay;

    /**
     *
     * @var string
     */
    protected $categoryAttributeOptionValue;

    /**
     *
     * @var boolean
     */
    protected $categoryAttributeOptionActive;

    /**
     *
     * @var AttributeEntity
     */
    protected $categoryAttributeEntity;

    /**
     *
     * @return the $categoryAttributeOptionId
     */
    public function getCategoryAttributeOptionId()
    {
        return $this->categoryAttributeOptionId;
    }

    /**
     *
     * @return the $categoryAttributeId
     */
    public function getCategoryAttributeId()
    {
        return $this->categoryAttributeId;
    }

    /**
     *
     * @return the $categoryAttributeOptionDisplay
     */
    public function getCategoryAttributeOptionDisplay()
    {
        return $this->categoryAttributeOptionDisplay;
    }

    /**
     *
     * @return the $categoryAttributeOptionValue
     */
    public function getCategoryAttributeOptionValue()
    {
        return $this->categoryAttributeOptionValue;
    }

    /**
     *
     * @return the $categoryAttributeOptionActive
     */
    public function getCategoryAttributeOptionActive()
    {
        return $this->categoryAttributeOptionActive;
    }

    /**
     *
     * @return the $categoryAttributeEntity
     */
    public function getCategoryAttributeEntity()
    {
        return $this->categoryAttributeEntity;
    }

    /**
     *
     * @param number $categoryAttributeOptionId            
     */
    public function setCategoryAttributeOptionId($categoryAttributeOptionId)
    {
        $this->categoryAttributeOptionId = $categoryAttributeOptionId;
    }

    /**
     *
     * @param number $categoryAttributeId            
     */
    public function setCategoryAttributeId($categoryAttributeId)
    {
        $this->categoryAttributeId = $categoryAttributeId;
    }

    /**
     *
     * @param string $categoryAttributeOptionDisplay            
     */
    public function setCategoryAttributeOptionDisplay($categoryAttributeOptionDisplay)
    {
        $this->categoryAttributeOptionDisplay = $categoryAttributeOptionDisplay;
    }

    /**
     *
     * @param string $categoryAttributeOptionValue            
     */
    public function setCategoryAttributeOptionValue($categoryAttributeOptionValue)
    {
        $this->categoryAttributeOptionValue = $categoryAttributeOptionValue;
    }

    /**
     *
     * @param boolean $categoryAttributeOptionActive            
     */
    public function setCategoryAttributeOptionActive($categoryAttributeOptionActive)
    {
        $this->categoryAttributeOptionActive = $categoryAttributeOptionActive;
    }

    /**
     *
     * @param \Pacificnm\CategoryAttribute\Entity\Entity $categoryAttributeEntity            
     */
    public function setCategoryAttributeEntity($categoryAttributeEntity)
    {
        $this->categoryAttributeEntity = $categoryAttributeEntity;
    }
}

