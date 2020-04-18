<?php global $web; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChildGuard</title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Bellota+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellota&display=swap" rel="stylesheet">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>




    <header class="page-header">
        <div class="wrap">
            <nav class="nav">
                <a href="<?php echo home_url('/'); ?>">
                    <img class="logo-header" src="<?php echo get_template_directory_uri(); ?>/asset/img/logo.svg" alt="Logo">
                </a>
                <ul>
                    <?php if (is_user_logged_in()) { ?>
                        <li class="active"><a href="<?php echo esc_url(home_url('/')) ?>" title="">Accueil</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['mes infos']['slug'])); ?>" title="">Mes infos</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['facture']['slug'])); ?>" title="">Facture</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['contact']['slug'])); ?>" title="">Contact</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['deconnexion']['slug'])); ?>" title="">Deconnexion</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['connexion']['slug'])); ?>" title="">Connexion</a></li>
                        <li><a class="lien-inscription" href="<?php echo esc_url(home_url($web['pages']['inscription']['slug'])); ?>" title="">S'inscrire</a></li>
                    <?php } ?>

                </ul>
            </nav>
            <div class="clear"></div>
        </div>
        <div class="background-img-bgpro">
            <h2>Espace Pro</h2>
        </div>
    </header><!-- /header -->