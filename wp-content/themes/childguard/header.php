<?php global $web; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChildGuard</title>
    <meta name="description" content="">


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
                    <li><a href="<?php echo esc_url(home_url($web['pages']['Inscription']['slug'])); ?>" title="">Connexion</a></li>
                    <li><a class="lien-inscription" href="<?php echo esc_url(home_url($web['pages']['Connexion']['slug'])); ?>" title="">S'inscrire</a></li>

                    <!-- <?php if (is_user_logged_in()) { ?>
                        <li class="active"><a href="<?php echo esc_url(home_url('/')) ?>" title="">Accueil</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['Tableau de bord']['slug'])); ?>" title="">Tableau de bord</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['Facture']['slug'])); ?>" title="">Facture</a></li>
                        <li><a href="<?php echo esc_url(home_url($web['pages']['Contact']['slug'])); ?>" title="">Contact</a></li>
                    <?php } ?> -->

                </ul>
            </nav>
            <div class="clear"></div>
        </div>
        <div class="background-img-bgpro">
            <h2>Espace Pro</h2>
        </div>
    </header><!-- /header -->