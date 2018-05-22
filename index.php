<?php declare(strict_types=1);

namespace forum;

require 'config.php';

session_start();

$params = [];

if(!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "conv";
}

if(!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = "Conversation";
}

if (!empty($_GET)) {

    if (!empty($_GET['controller']) && !empty($_GET['action'])) {

        switch ($_GET['controller']) {
            case 'Conversation':
                $controller = 'Conversation';
                $params = [];
                break;

            case 'Message':
                $controller = 'Message';
                $params = (int)$_GET['m_id'];
                break;
        }
    }
}

$nomController = 'forum\controller\\'.strtolower($controller).'\\'.$controller.'Controller';
$action = $action.'Action';

try {
    if (class_exists($nomController) && method_exists($nomController, $action)) {
        $c = new $nomController();
        require('view/header.php');
        $c->$action($params);
        require('view/footer.php');
    } else {
        throw new \Exception('Class ou méthode non trouvé : '.$nomController. ' -> '.$action. '()' );
    }
} catch (\Exception $e) {
    $error = new controller\error\ErrorController();
    echo $error->errorMessage($e->getMessage());
}


















