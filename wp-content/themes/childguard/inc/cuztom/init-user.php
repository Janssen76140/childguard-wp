<?php
// init-user.php

$user_fields = array(
    array(
        'name'  => 'nomSociete',
        'label' => __('Nom de votre société', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'raisonSociale',
        'label' => __('Raison sociale de la société', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'siret',
        'label' => __('N°SIRET', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'nomStructure',
        'label' => __('Nom de la structure d\'accueil', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'adresse',
        'label' => __('Adresse de la structure', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'codePostal',
        'label' => __('Code postal', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'ville',
        'label' => __('Téléphone', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'telephone',
        'label' => __('Téléphone', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'dateOuverture',
        'label' => __('Date d\'ouverture', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'capaciteEnfant',
        'label' => __('Capacité d\'accueil', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'surface',
        'label' => __('Surface en m2', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'  => 'ageEnfant',
        'label' => __('Tranche d\'age des enfants acceptés', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'id'                    => 'horaire',
        'type'                    => 'textarea',
        'label'                    => __('Horaire d\'ouverture', 'childguard_samajame'),
    ),

    array(
        'id'                    => 'lesPlus',
        'type'                    => 'textarea',
        'label'                    => __('Les +', 'childguard_samajame'),
    ),

    array(
        'id'                    => 'enQuelquesMots',
        'type'                    => 'textarea',
        'label'                    => __('Décrivez votre structure d\'accueil', 'childguard_samajame'),
    ),








);

$user_metas = new Cuztom_User_Meta('user_meta',  __('Informations complémentaires', 'childguard_samajame'), array(), $user_fields);
