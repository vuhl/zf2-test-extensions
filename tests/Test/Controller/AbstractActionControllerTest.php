<?php

namespace Vu\Zf2TestExtensions\Test\Controller;

/**
 * <h2>This abstract test allows for easier testing of our controllers.</h2>
 */
abstract class AbstractActionControllerTest extends BaseActionControllerTest{

    public function testIsAnAbstractActionController(){
        $this->assertInstanceOf('Zend\Mvc\Controller\AbstractActionController',$this->controller);
    }

    public function testIsAnActionController(){
		$this->assertInstanceOf('Vu\Zf2TestExtensions\Controller\AbstractActionController',$this->controller);
	}

}