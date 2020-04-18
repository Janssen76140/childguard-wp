<?php
// init-user.php

$user_fields = array(
    array(
        'name'  => 'tel',
        'label' => __('Téléphone', 'childguard_samajame'),
        'type'  => 'text'
    ),

    array(
        'name'					=> 'adrr',
        'label'					=> __('Adresse', 'childguard_samajame'),
        'type'					=> 'text',
    ),

    array(
        'name'      => 'fruits',
        'type'    => 'select',
        'label'   => __('Fruits', 'childguard_samajame'),
        'options' => array(
            'fraise' => 'Fraise',
            'melon' => 'Melon',
            'tomate' => 'Tomate'
        ),
    ),

    array(
        'name'    => 'avatar',
        'type'  => 'image',
        'label' => __('Avatar', 'childguard_samajame'),
    ),

    array(
        'name'    => 'cv',
        'type'  => 'file',
        'label' => __('Mon cv', 'childguard_samajame'),
    ),

    array(
        'name'    => 'wysiwyg',
        'type'  => 'wysiwyg',
        'label' => __('Mon wysiwyg', 'childguard_samajame'),
    ),


);

$user_metas = new Cuztom_User_Meta('user_meta',  __('Informations complémentaires', 'childguard_samajame'), array(), $user_fields);