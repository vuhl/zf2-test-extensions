<?php

namespace Vu\Zf2TestExtensions\Controller;

use Zend\Mvc\Controller\AbstractActionController as ActionController;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;


/**
 * Class AbstractActionController
 *
 * @package Vu\Zf2TestExtensions\Controller
 *
 * <h2>This class is used to simplify autoloading the service locator for controllers as well as opening up the request and response for cleaner testing.</h2>
 */
class AbstractActionController extends ActionController implements ServiceLocatorAwareInterface {

    /**
     * @var ServiceManager
     */
    protected $service_locator;

    /**
     * @param ServiceManager $service_locator
     */
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

    /**
     * @param string $service
     * @return array|object
     */
    public function get($service){
		return $this->service_locator->get($service);
	}

    /**
     * @return mixed
     */
    protected function getPatchContent() {
        $content = $this->getRequest()->getContent();
        parse_str($content, $parsedParams);

        return $parsedParams;
    }



}