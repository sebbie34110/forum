<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:06
 */
namespace forum\model\entities;

class User
{
    protected $id, $login, $prenom, $nom, $date_naissance, $date_inscritption, $rang_fk, $libelle;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     */
    public function hydrate(array $data){
        foreach ($data as $key => $val){

            if (strpos($key, 'u_'))
            {
                $key = str_replace('u_', '', $key);
            }
            elseif (strpos($key, 'r_'))
            {
                $key = str_replace('r_', '', $key);
            }

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

    /*
     *
     *
     *    SETTERS
     *
     *
     *
     */

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @param mixed $date_inscritption
     */
    public function setDateInscritption($date_inscritption)
    {
        $this->date_inscritption = $date_inscritption;
    }

    /**
     * @param mixed $rang_fk
     */
    public function setRangFk($rang_fk)
    {
        $this->rang_fk = $rang_fk;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }



    /*
     *
     *
     *    GETTERS
     *
     *
     *
     */

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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @return mixed
     */
    public function getDateInscritption()
    {
        return $this->date_inscritption;
    }

    /**
     * @return mixed
     */
    public function getRangFk()
    {
        return $this->rang_fk;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
} // END of Class