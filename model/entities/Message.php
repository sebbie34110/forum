<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:06
 */
namespace forum\model\entities;

class Message
{
    protected $id;
    protected $date;
    protected $heure;
    protected $Nom;
    protected $message;

    public function __construct( array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * @param array $data
     */
    public function hydrate(array $data){
        foreach ($data as $key => $val){
//
//            if (strpos($key, 'u_'))
//            {
//                $key = str_replace('u_', '', $key);
//            }
//            elseif (strpos($key, 'r_'))
//            {
//                $key = str_replace('r_', '', $key);
//            }

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)){

                if (is_numeric($val))
                {
                    $val = (int)$val;
                }

                $this->$method($val);
            }
        }
    }
} // End of class