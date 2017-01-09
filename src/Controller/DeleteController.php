<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;

class DeleteController extends AbstractApplicationController
{

    protected $service = null;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $id = $this->params()->fromRoute('id');

        $entity = $this->service->get($id);

        if (! $entity) {
        	$this->flashmessenger()->addErrorMessage('Object was not found.');
        	return $this->redirect()->toRoute('category-attribute-option-index');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
        	$del = $request->getPost('delete_confirmation', 'no');
        	if ($del === 'yes') {
        		$this->service->delete($entity);

        		$this->getEventManager()->trigger('category-attribute-option-delete', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'categoryAttributeOptionEntity' => $entity
        		));

        		$this->flashmessenger()->addSuccessMessage('Object was deleted');

        		return $this->redirect()->toRoute('category-attribute-option-index');
        	}

        	return $this->redirect()->toRoute('category-attribute-option-view', array('id' => $id));
        }

        return new ViewModel(array(
        	'entity' => $entity
        ));
    }


}

