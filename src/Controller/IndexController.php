<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;

class IndexController extends AbstractApplicationController
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

        $this->getEventManager()->trigger('category-attribute-option-index', $this, array(
        	'authId' => $this->identity()->getAuthId(),
        	'requestUrl' => $this->getRequest()->getUri()
        ));

        $filter = array(
        	'page' => $this->page,
        	'count-per-page' => $this->countPerPage
        );

        $paginator = $this->service->getAll($filter);

        $paginator->setCurrentPageNumber($filter['page']);

        $paginator->setItemCountPerPage($filter['count-per-page']);

        return new ViewModel(array(
        	'paginator' => $paginator,
        	'page' => $filter['page'],
        	'count-per-page' => $filter['count-per-page'],
        	'itemCount' => $paginator->getTotalItemCount(),
        	'pageCount' => $paginator->count(),
        	'queryParams' => $this->params()->fromQuery(),
        	'routeParams' => $this->params()->fromRoute()
        ));
    }


}

