<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;
use Pacificnm\CategoryAttributeOption\Form\Form;

class UpdateController extends AbstractApplicationController
{

    protected $service = null;

    protected $form = null;

    /**
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;

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

        $id = $this->params()->fromRoute('id');

        $entity = $this->service->get($id);

        if(! $entity) {
        	$this->flashMessenger()->addErrorMessage('Object was not found');
        	return $this->redirect()->toRoute('category-attribute-option-index');
        }

        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$categoryAttributeOptionEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('category-attribute-option-update', $this, array(
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

        $this->form->bind($entity);

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

