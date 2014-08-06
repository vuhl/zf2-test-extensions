<?php
/**
 * User: Michael.Crawford
 * Date: 11/25/13
 * Time: 10:06 AM
 */

namespace Vu\Zf2TestExtensions\Test\Controller;

abstract class AbstractRestfulControllerTest extends BaseActionControllerTest {

    public function testIsARestfulController(){
        $this->assertInstanceOf('Vu\Zf2TestExtensions\Controller\AbstractRestfulController',$this->controller);
    }

} 