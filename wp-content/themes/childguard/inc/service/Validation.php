<?php

class Validation
{
    protected $errors = array();

    public function IsValid($errors)
    {
        foreach ($errors as $key => $value) {
            if (!empty($value)) {
                return false;
            }
        }
        return true;
    }

    public function emailValid($email)
    {
        $error = '';
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $error = 'Adresse mail invalide.';
        } elseif (email_exists($email)) {
            $error = 'L\'adresse mail existe déjà';
        }
        return $error;
    }


    public function textValid($text, $title, $min = 3,  $max = 50)
    {
        $error = '';
        if (!empty($text)) {
            $strtext = strlen($text);
            if ($strtext > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif ($strtext < $min) {
                $error = 'Votre ' . $title . ' est trop court.';
            }
        } else {
            $error = 'Veuillez renseigner ' . $title . '.';
        }
        return $error;
    }

    public function validMdp($password1, $password2)
    {
        $error = '';
        if (!empty($password1)) {
            if ($password1 != $password2) {
                $error = 'Vos mots de passe doivent être identiques';
            } elseif (mb_strlen($password1) <= 5) {
                $error = 'Le mot de passe doit contenir minimum 6 caractères';
            }
        } else {
            $error = 'Veuillez renseigner un mot de passe';
        }
        return $error;
    }

    public function validSiret($siret)
    {
        $error = '';
        if (!empty($siret)) {
            if (strlen($siret) != 14) {
                $error = 'le SIRET doit contenir 14 caractères';
            }
            if (!is_numeric($siret)) {
                $error = 'le SIRET ne doit contenir que des chiffres';
            }
        } else {
            $error = 'Veuillez renseigner un numéro de SIRET';
        }
        return $error;
    }

    public function codePostalValid($codepostal)
    {
        $error = '';
        if (!empty($codepostal)) {
            if ((!is_numeric($codepostal)) or (strlen($codepostal) != 5)) {
                $error = 'le code postal n\'est pas correct';
            }
        } else {
            $error = 'Veuillez renseigner un code postal';
        }
        return $error;
    }

    public function telephoneValid($telephone)
    {
        $error = '';
        if (!empty($telephone)) {
            if ((!is_numeric($telephone)) or (strlen($telephone) != 10)) {
                $error = 'le numéro de téléphone n\'est pas correct';
            }
        } else {
            $error = 'Veuillez renseigner un numéro de téléphone';
        }
        return $error;
    }

    public function validLogin($username, $password)
    {
        $error = '';
        if (empty($username) || empty($password)) {
            $error = 'Veuillez renseignez un email et/ou un mot de passe';
        } else {
            $requete = new Requete();
            $user = $requete->findByEmail($username);
            if (!empty($user)) {
                if (email_exists($user)) {
                } else {
                    $error = 'Pseudo ou email inconnu ou mot de passe oublié';
                }
            } else {
                $error = 'Pseudo ou email inconnu';
            }
        }
        return $error;
    }

    public function nouvelleSession($user, $header)
    {
        $_SESSION['login'] = array(
            'id' => $user->id_pro,
            'prenom' => $user->prenom_pro,
            'nom' => $user->nom_pro,
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        $_SESSION['mesInfos'] = array(
            'nomStructure_pro' => $user->nomStructure_pro,
        );

        header('Location: ' . $header);
    }

    public function VerifMail($mail)
    {
        $error = '';

        if (!empty($mail)) {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email, où mot de passe non valide';
            }
        } else {
            $error = "Veuillez renseigner ces champs";
        }
        return $error;
    }
}
