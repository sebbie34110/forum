<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 10/04/2018
 * Time: 09:13
 */

class UserManager
{
    public function __construct()
    {

    }

    public function registerUser(){

    }

    public function deleteUser($u_id){

    }

    public static function doesUserExists(string $login) : bool {
        // check if login exists in database
        // if login exist : session start
        // affichage de la section pour ajouter un message

        $pdo = DBManager::getInstance();


        $data = $pdo->makeSelect('SELECT * FROM `user` WHERE `u_login` = :login', ['login' => $login]);

        if($data){
            return true;
        }

        return false;

    }

}