<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 10/04/2018
 * Time: 09:13
 */

class user
{
    private $id;
    private $login;
    private $prenom;
    private $nom;


    public function __construct($login, $nom, $prenom)
    {
        $this->setLogin($login);
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }
}