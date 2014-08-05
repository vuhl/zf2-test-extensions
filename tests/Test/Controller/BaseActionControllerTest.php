<?php

namespace Vu\Zf2TestExtensions\Test\Controller;

use PHPUnit_Framework_TestCase;
use Zend\Http\Response;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\ServiceManager\ServiceManager;
use Zend\Http\Request;
use Zend\Stdlib\Parameters;
use Phake;

abstract class BaseActionControllerTest extends PHPUnit_Framework_TestCase{
    /**
     * @var ServiceManager
     */
    protected $service_locator;

    protected $controller;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    protected $flash;

    /**
     * <h2>This method requires you to return a string of the fully qualified path for the controller under test.</h2>
     *
     * <code>return "\Common\Controller\AccountController";</code>
     */
    abstract function getControllerName();

    public function setUp(){
        $this->service_locator = new ServiceManager();
        $controller = $this->getControllerName();
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new $controller($this->service_locator);
        $this->controller->setRequest($this->request);
        $this->controller->setResponse($this->response);
        $this->flash = new FlashMessenger();
        $this->controller->getPluginManager()->setService('flashMessenger', $this->flash);
    }

    /**
     * <h2>This method will mock the request as a post.</h2>
     *
     * @param array $data array of key value pairs for the request
     */
    public function mockPost($data){
        $data = new Parameters($data);
        $this->request->setPost($data);
        $this->request->setMethod(Request::METHOD_POST);
    }

    /**
     * <h2>This method will mock the request as a get.</h2>
     *
     * @param array $data array of key value pairs for the request
     */
    public function mockGet($data){
        $data = new Parameters($data);
        $this->request->setQuery($data);
        $this->request->setMethod(Request::METHOD_GET);
    }

    /**
     * <h2>This method will mock the request as a files upload.</h2>
     *
     * @param array $files array of key value pairs for the request
     */
    public function mockFiles($files){
        $data = new Parameters($files);
        $this->request->setFiles($data);
    }
}