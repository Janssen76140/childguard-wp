<?php
/*
Template Name: deconnexion
*/

session_start();

$url = '/childguard-wp/';

wp_logout();

wp_redirect( $url );
exit;