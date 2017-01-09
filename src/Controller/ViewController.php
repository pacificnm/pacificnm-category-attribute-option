<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;

class ViewController extends AbstractApplicationController
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

        if(! $entity) {
        	$this->flashMessenger()->addErrorMessage('Object was not found');
        	return $this->redirect()->toRoute('category-attribute-option-index');
        }

        $this->getEventManager()->trigger('category-attribute-option-view', $this, array(
        	'authId' => $this->identity()->getAuthId(),
        	'requestUrl' => $this->getRequest()->getUri(),
        	'categoryAttributeOptionEntity' => $entity
        ));

        return new ViewModel(array(
        	'entity' => $entity
        ));
    }


}

