<?php

namespace Vu\Zf2TestExtensions\Test\Service;

use Zend\ServiceManager\ServiceManager;
use Phake;

abstract class AbstractServiceLocatorAwareServiceTest extends \PHPUnit_Framework_TestCase {

    protected $service;

    /**
     * @var ServiceManager
     */
    protected $service_locator;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entity_manager;

    abstract function getClassName();

    public function setUp(){
        $service = $this->getClassName();
        $this->service = new $service();

        $this->service_locator = new ServiceManager();
        $this->service->setServiceLocator($this->service_locator);
    }

    public function mockEntityManager(){
        $this->entity_manager = Phake::mock('Doctrine\ORM\EntityManager');
        $this->service_locator->setService('doctrine.entitymanager.orm_default', $this->entity_manager);
    }

    /**
     * @param  $repository
     * @return \Doctrine\ORM\EntityRepository
     */
    public function mockRepository($repository){
        if(!$this->entity_manager){
            $this->mockEntityManager();
        }
        $my_repository = Phake::mock('Doctrine\ORM\EntityRepository');
        Phake::when($this->entity_manager)->getRepository($repository)->thenReturn($my_repository);
        return $my_repository;
    }

    public function testServiceIsAnAbstractServiceLocatorAwareService(){
        $this->assertInstanceOf('Vu\Zf2TestExtensions\Service\AbstractServiceLocatorAwareService', $this->service);
    }

}
