<?php
declare(strict_types=1);


class Conversation
{
    private $_id;
    private $_date;
    private $_heure;
    private $_status;
    private $_nbMessage;

    public function __construct( array $data)
    {
        $this->hydrate($data);
    }

    // getters
    public function getId(){
        return $this->_id;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getHeure(){
        return $this->_heure;
    }

    public function getStatus(){
        return $this->_status;
    }

    public function getNbMessage(){
        return $this->_nbMessage;
    }


    // setters
    public function setId(int $_id) : void {
        $this->_id = $_id;

    }

    public function setDate(string $_date) : void {
        $this->_date = $_date;
    }

    public function setHeure(string $_heure) : void {
        $this->_heure = $_heure;
    }

    public function setStatus(int $_status) : void {
        $this->_status = $_status;
    }

    public function setNbMessage(int $_nbMessage) : void {
        if ($_nbMessage>0){
            $this->_nbMessage = $_nbMessage;
        } else {
            $this->_nbMessage = "Cette conversation est vide pour le moment.";
        }
    }


    // Hydratation
    public function hydrate(array $data){
        foreach ($data as $key => $val){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)){
                if (is_numeric($val))
                {
                    $this->$method((int)$val);
                } else
                    {
                        $this->$method((string)$val);
                    }
            }
        }
    }

}

