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

    /**
     * emailValid
     * @param email $email
     * @return string $error
     */

    public function emailValid($email)
    {
        $error = '';
        if (empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
            $error = 'Adresse mail invalide.';
        } elseif (email_exists($email)) {
            $error = 'L\'adresse mail existe déjà';
        }
        return $error;
    }

    /**
     * textValid
     * @param POST $text string
     * @param title $title string
     * @param min $min int
     * @param max $max int
     * @param empty $empty bool
     * @return string $error
     */

    public function textValid($text, $title, $min = 3,  $max = 50, $empty = true)
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
            if ($empty) {
                $error = 'Veuillez renseigner ' . $title . '.';
            }
        }
        return $error;
    }

    public function validMdp($password1, $password2, $empty = true)
    {
        $error = '';
        if (!empty($password1)) {
            if ($password1 != $password2) {
                $error = 'Vos mots de passe doivent être identiques';
            } elseif (mb_strlen($password1) <= 5) {
                $error = 'Le mot de passe doit contenir minimum 6 caractères';
            }
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un mot de passe';
            }
        }
        return $error;
    }

    public function validSiret($siret, $empty = true)
    {
        if (!empty($siret)) {
            if (strlen($siret) !=14) {
                $error = 'le SIRET doit contenir 14 caractères';
            } if (!is_numeric($siret)) {
                $error = 'le SIRET ne doit contenir que des chiffres';
            } 
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un numéro de SIRET';
            }
        }
        return $error;
    }

    public function codePostalValid ($codepostal, $empty = true)
    {
        if (!empty($codepostal)) {
            if ((!is_numeric($codepostal)) OR (strlen($codepostal)!=5)) {
                $error = 'le code postal n\'est pas correct';
            }
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un code postal';
            }
        }
        return $error;
    }

    public function telephoneValid ($telephone, $empty = true)
    {
        if (!empty($telephone)) {
            if ((!is_numeric($telephone)) OR (strlen($telephone)!=10)) {
                $error = 'le numéro de téléphone n\'est pas correct';
            }
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un numéro de téléphone';
            }
        }
        return $error;
    }
}
