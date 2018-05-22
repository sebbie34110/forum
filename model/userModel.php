<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:06
 */
namespace forum\model;

use forum\model\entities\User;

class userModel extends coreModel
{
    public function registerUser()
    {

    }

    public function deleteUser($u_id)
    {

    }

    /**
     * @param string $login
     * @return bool
     */
    public function doesUserExists(string $login) : bool
    {
        $pdo = coreModel::getInstance();

        $data = $pdo->makeSelect('SELECT * FROM `user` WHERE `u_login` = :login', ['login' => $login]);

        if($data){ return true; }

        return false;
    }

    /**
     * @param int $id
     * @return User
     */
    public function getUserById(int $id) : User
    {
        $sql = 'select `user`.*, `r_libelle` from `user` inner join `rang` on `u_rang_fk` = `r_id` where `u_id` = :id';

        $data = coreModel::getInstance()->makeSelect($sql, ['id' => $id]);

        return new User($data);
    }

    /**
     * @param string $login
     * @return User
     */
    public function getUserByLogin(string $login) : User
    {
        $sql = 'select `user`.*, `r_libelle` from `user` inner join `rang` on `u_rang_fk` = `r_id` where `u_login` = :login';

        $data = coreModel::getInstance()->makeSelect($sql, ['login' => $login]);

        return new User($data);
    }
} // End of class