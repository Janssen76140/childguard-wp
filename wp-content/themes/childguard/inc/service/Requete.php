<?php

class Requete
{

    public function findByEmail($login)
    {
        global $wpdb;
        $nom_table = $wpdb->prefix . 'pro_login';
        $requete = "SELECT * FROM $nom_table WHERE email_pro = :login";
        $wpdb->get_results($requete);
    }
}
