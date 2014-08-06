<?php

namespace Vu\Zf2TestExtensions\Test\Mocks;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class MockableParams extends AbstractPlugin{

    public function fromRoute($param = null, $default = null){}
}