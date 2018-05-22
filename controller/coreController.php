<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:15
 */
namespace forum\controller;

class coreController
{
    protected $className;

    public function showView($name, $variablesShowview)
    {
        extract($variablesShowview);

        require $this->className.'/view/'.$name.'View.php';
    }

}