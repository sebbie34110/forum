<?php declare(strict_types=1);

namespace forum\controller\error;

class errorController
{

    public function errorMessage($e)
    {
        return 'Il y a eu un erreur: '.$e;
    }

}