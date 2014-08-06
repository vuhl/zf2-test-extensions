vu/zf2-test-extensions
=====================

Introduction
------------
vu/zf2-test-extensions enables easier testing of our Zf2 controllers and services. Most code contained within this
project is specifically for use with VeteransUnited Zf2 projects, however is open for anyone to use.

Installation Using Composer
---------------------------
Add "vu/zf2-test-extensions" to the require section of your composer.json file and run a respective install or update.
For more information on Composer, please visit [their website](https://getcomposer.org/).

Controllers
-----------
The abstract controllers in vu/zf2-test-extensions help ensure that controllers are fully and easily tested.
This is done by mocking out the ServiceManager, Request, and Response objects upon test creation.

###Action Controllers
The AbstractActionController is what should be used in place of the ActionController from Zf2. This controller
will extend the Zf2 ActionController while adding in the benefits of being easier to test.

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Controller\AbstractActionController;

class NewActionController extends AbstractActionController{
    //typical controller code goes here
}
```

###Restful Controllers
The AbstractRestfulController is what should be used in place of the AbstractRestfulController from Zf2. This controller
will extend the Zf2 AbstractRestfulController while adding in the benefits of being easier to test.

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Controller\AbstractRestfulController;

class NewRestfulController extends AbstractRestfulController{
    //typical restful controller code goes here
}
```

Testing Controllers
-------------------
When testing your controllers, you will want to extend the respective test controller on your test class. This way you can
get full benefit out of the library. The extended class will set up the class you're testing and inject an instance of the
ServiceLocator. Note that all test classes must implement the getControllerName() method.

###Action Controllers
When testing a controller extending the AbstractActionController, you will want your test class to extend AbstractActionControllerTest. Example:

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Test\Controller\AbstractActionControllerTest;

class NewActionControllerTest extends AbstractActionControllerTest{

    public function getControllerName(){
        return "NewNamespace\NewActionController";
    }

    //Other test code goes here
}
```

###Restful Controllers
When testing a controller extending the AbstractRestfulController, you will want your test class to extend AbstractRestfulControllerTest. Example:

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Test\Controller\AbstractRestfulControllerTest;

class NewRestfulControllerTest extends AbstractRestfulControllerTest{

    public function getControllerName(){
        return "NewNamespace\NewRestfulController";
    }

    //Other test code goes here
}
```

Services
--------

###Service Locator
The provided AbstractServiceLocatorAwareService helps by automatically injecting the Zf2 ServiceLocator into your class.
Classes that will be loaded via the ServiceLocator should extend this class.

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Service\AbstractServiceLocatorAwareService;

class NewBusinessLogicClass extends AbstractServiceLocatorAwareService{
    //your code...
}
```

Testing Services
----------------

###Service Locator
The AbstractServiceLocatorAwareServiceTest sets up the service being tested and injects an instance of the ServiceLocator for you.
This should be used to test all classes that extend AbstractServiceLocatorAwareService. Note that all test classes using
AbstractServiceLocatorAwareServiceTest must implement the getClassName() method

```php
namespace NewNamespace;

use Vu\Zf2TestExtensions\Test\Service\AbstractServiceLocatorAwareServiceTest;

class NewBusinessLogicClassTest extends AbstractServiceLocatorAwareServiceTest{

    public function getClassName(){
        return 'NewNamespace\NewBusinessLogicClass';
    }

    //Other test code goes here
}
```
