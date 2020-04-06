<?php
/*
Template Name: deconnexion
*/

session_start();

$_SESSION = array();

session_destroy();

header('Location: /childguard-wp/');