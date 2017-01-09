<?php

namespace Pacificnm\CategoryAttributeOption\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface;

class RestController extends AbstractRestfulController
{

    protected $service = null;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function create($data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function delete($id)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function get($id)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function getList($params)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function head($id)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function options()
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function patchList($data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
        return new JsonModel(array("content" => "Method Not Allowed"));
    }


}

