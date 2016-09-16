<?php
namespace Application;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Created by PhpStorm.
 * User: visa
 * Date: 13/09/16
 * Time: 18.20
 */
class TestController extends AbstractActionController
{

    public function testAction()
    {
        $request = $this->getRequest();
        $path = $verbose = $request->getParam('path', null);

        if (!is_dir($path)) {
            var_dump('sono una directory');
            // TODO eccezione
        }
        var_dump($path);
    }
}