<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:06
 */
namespace forum\model\entities;

class Conversation
{
    protected $id;
    protected $date;
    protected $heure;
    protected $status;
    protected $nbMessage;

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
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $nbMessage
     */
    public function setNbMessage($nbMessage)
    {
        if ($nbMessage>0){
            $this->nbMessage = $nbMessage;
        } else {
            $this->nbMessage = "Cette conversation est vide pour le moment.";
        }
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getNbMessage()
    {
        return $this->nbMessage;
    }






    // Hydratation
    public function hydrate(array $data){
        foreach ($data as $key => $val){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method))
            {
                if (is_numeric($val))
                {
                    $val = (int)$val;
                }

              $this->$method($val);
            }
        }
    }

}

