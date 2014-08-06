<?php
/**
 * Version 1.0
 */

namespace Vu\Zf2TestExtensions\Controller;
use Zend\Mvc\Controller\AbstractRestfulController as ZendAbstractRestfulController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * Class AbstractRestfulController
 *
 * @package Vu\Zf2TestExtensions\Controller
 */
class AbstractRestfulController extends ZendAbstractRestfulController implements ServiceLocatorAwareInterface {

    /**
     * @var ServiceManager
     */
    protected $service_locator;

    public function __construct($service_locator = null){
        $this->service_locator = $service_locator;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->service_locator = $serviceLocator;
    }

    /**
     * @return ServiceManager
     */
    public function getServiceLocator() {
        return $this->service_locator;
    }

    /**
     * @param \Zend\Http\Request $request
     */
    public function setRequest($request){
        $this->request = $request;
    }

    /**
     * @param \Zend\Http\Response $response
     */
    public function setResponse($response){
        $this->response = $response;
    }

}
