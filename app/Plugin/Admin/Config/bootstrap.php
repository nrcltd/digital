<?php
// App::uses('ConnectionManager', 'Model');
App::uses('Inflector', 'Utility');
App::uses('ClassRegistry', 'Utility');
App::uses('CakeRequest', 'Network');

$adminIsAuthorized = (function_exists('adminIsAuthorized')) ? adminIsAuthorized() : true;
if ($adminIsAuthorized === false) {
    throw new MethodNotAllowedException();
} 

$Request = new CakeRequest();
if (isset($Request->url)) {
    $parts = explode('/', $Request->url);

    $createCont = true;
    if(isset($parts[0])){
        if(strtolower($parts[0]) == 'admin'){
            $createCont = true;
        } else {
            $createCont = false;
        }
    }
    if(isset($parts[1])){
        if(strtolower($parts[1]) == 'users' || strtolower($parts[1]) == 'admin'){
            $createCont = false;
        } else {
            $createCont = true;
        }
    }
    if(isset($parts[2])){
        if (strtolower($parts[2]) == 'login' || strtolower($parts[2]) == 'login_form' || strtolower($parts[2]) == 'logout') {
            $createCont = false;
        } else {
            $createCont = true;
        }
    }

    /*
    if (!$model->useTable) {
            // Model is not tied to a database table.
            return;
        }
    */

    if($createCont){
        if ((isset($parts[0])) && ($parts[0] == 'admin')) {
            if (isset($parts[1])) {
//                $modelClassName = Inflector::camelize(Inflector::singularize($parts[1]));
//                debug($modelClassName);
//                $Model = ClassRegistry::init($modelClassName);
//                $DataSource = $Model->getDataSource();
//                $controllerClassName = Inflector::camelize($parts[1]) . 'Controller';
//                $controllerClass = 'App::uses(\'AdminAppController\',\'Admin.Controller\');class ' . $controllerClassName . ' extends AdminAppController{public $uses = \'' . $modelClassName . '\';}';
//                debug($controllerClass);
//                eval($controllerClass);
            }
        }
    }

}
