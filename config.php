<?php

declare(strict_types=1);

define('HOST_DB', 'localhost');
define('NAME_DB', 'forum');
define('USER_DB', 'root');
define('PWD_DB', '');


/**
 * --------------------------------------------------
 * AUTOLOADER
 * --------------------------------------------------
 **/


spl_autoload_register(function ($class) {
    if(strpos($class, 'forum\\') === 0) {
        $cheminClass = substr($class, 6);
    } else {
        $cheminClass = $class;
    }

    if(file_exists($cheminClass.'.php')) {
        require_once ($cheminClass.'.php');
    } else {
        throw new \Exception('Class non trouvé : '.$class.'.php');
    }
});
