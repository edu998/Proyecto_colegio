<?php 

ob_start();

if(!isset($_SESSION)){
    session_start();
}
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';

function showError(){
    $err = new ErrorController();
    $nf = $err->index();

    return $nf;
}

if(isset($_GET['controller'])){
    $controller_name = $_GET['controller'] . 'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['method'])){
    $controller_name = controller_default;
}else {
    showError();
    exit();
}

if(class_exists($controller_name)){
    $controller = new $controller_name();
    if(isset($_GET['method']) && method_exists($controller, $_GET['method'])){
        $method = $_GET['method'];
        $controller->$method();
    }elseif(!isset($_GET['controller']) && !isset($_GET['method'])){
        $method_defualt = methods_default;
        $controller->$method_defualt(); 
    }else {
        showError();
    }
}else {
    showError();
}

require_once 'views/layouts/footer.php';
