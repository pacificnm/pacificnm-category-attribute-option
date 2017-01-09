<?php

namespace Pacificnm\CategoryAttributeOption\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\CategoryAttributeOption\Entity\Entity;
use Pacificnm\CategoryAttributeOption\Hydrator\Hydrator;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name = 'categoryattributeoption-form', $options = array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new Hydrator(false));

        $this->setObject(new Entity());

        // categoryAttributeOptionId
        $this->add(array(
            'name' => 'categoryAttributeOptionId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'categoryAttributeOptionId'
            )
        ));
        
        // categoryAttributeId
        $this->add(array(
            'name' => 'categoryAttributeId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'categoryAttributeId'
            )
        ));
        
        // categoryAttributeOptionDisplay
        $this->add(array(
            'name' => 'categoryAttributeOptionDisplay',
            'type' => 'Text',
            'options' => array(
                'label' => 'Display:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'categoryAttributeOptionDisplay'
            )
        ));
        
        
        // categoryAttributeOptionValue
        $this->add(array(
            'name' => 'categoryAttributeOptionValue',
            'type' => 'Text',
            'options' => array(
                'label' => 'Value:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'categoryAttributeOptionValue'
            )
        ));
        
        // categoryAttributeOptionActive
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'categoryAttributeOptionActive',
            'options' => array(
                'label' => 'Active',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'id' => 'categoryAttributeOptionActive'
            )
        ));
        
        $this->add(array(
        	'name' => 'submit',
        	'type' => 'button',
        	'attributes' => array(
        		'value' => 'Submit',
        		'id' => 'submit',
        		'class' => 'btn btn-primary btn-flat'
        	)
        ));
    }

    /**
     * {@inheritdoc}
     *
     * @see
     * \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array(
            // categoryAttributeOptionId
            'categoryAttributeOptionId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ),
            
            // categoryAttributeId
            'categoryAttributeId' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Category Attribute Id is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // categoryAttributeOptionDisplay
            'categoryAttributeOptionDisplay' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Display is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // categoryAttributeOptionValue
            'categoryAttributeOptionValue' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Value is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // categoryAttributeOptionActive
            'categoryAttributeOptionActive' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Active is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
        );
    }


}

