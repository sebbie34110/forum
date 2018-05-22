<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 05/04/2018
 * Time: 13:43
 */

class Message
{
    private $id;
    private $date;
    private $heure;
    private $Nom;
    private $message;

    public function __construct( array $data)
    {
        $this->hydrate($data);
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function getMessage()
    {
        return $this->message;
    }


    // Setters
    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function setDate(string $Date)
    {
        $this->date = $Date;
    }

    public function setHeure(string $heure)
    {
        $this->heure = $heure;
    }

    public function setNom(string $Nom)
    {
        $this->Nom = $Nom;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }


    // Hydratation
    public function hydrate(array $data){
        foreach ($data as $key => $val){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($val);
            }
        }
    }


}