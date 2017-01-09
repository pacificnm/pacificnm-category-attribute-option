<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;
use Pacificnm\CategoryAttribute\Service\ServiceInterface as AttributeServiceInterface;
use Pacificnm\CategoryAttributeOption\Form\Form;

class CreateController extends AbstractApplicationController
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     * 
     * @var AttributeServiceInterface
     */
    protected $attributeService;
    
    /**
     * 
     * @var Form
     */
    protected $form;

    /**
     * 
     * @param ServiceInterface $service
     * @param AttributeServiceInterface $attributeService
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, AttributeServiceInterface $attributeService, Form $form)
    {
        $this->service = $service;

        $this->attributeService = $attributeService;
        
        $this->form = $form;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $request = $this->getRequest();

        $id = $this->params()->fromRoute('categoryAttributeId');
        
        $attributeEntity = $this->attributeService->get($id);
        
        if(! $attributeEntity) {
            $this->flashMessenger()->addErrorMessage("Attribute not found");
            
            return $this->redirect()->toRoute('category-attribute-index');
        }
        
        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$categoryAttributeOptionEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('category-attribute-option-create', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'categoryAttributeOptionEntity' => $entity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('category-attribute-option-view', array(
        			'id' => $categoryAttributeOptionEntity->getCategoryAttributeOptionId()
        		));
        	}
        }
        
        $this->form->get('categoryAttributeId')->setValue($id);

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

