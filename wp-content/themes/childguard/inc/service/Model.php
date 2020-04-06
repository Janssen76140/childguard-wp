<?php 

class Model
{
    private $id;
    private $email;
    private $nom;
    private $prenom;
    private $psw;

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getMail()
    {
        return $this->email;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword()
    {
        return $this->psw;
    }

    public function setPassword(string $psw)
    {
        $this->psw = $psw;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    
}
