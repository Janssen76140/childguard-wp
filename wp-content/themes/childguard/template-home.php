<?php /* Template Name: Home */

get_header(); ?>

<div class="wrap">
    <section id="rejoignezNous">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
        <?php endwhile;
        endif; ?>
    </section>

    <section id="commentNousRejoindre">
        <h2>Comment nous rejoindre ?</h2>
        <div class="ex1 inscrivezVous">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/img/login.svg" alt="logo simplicité">
            <h3>Inscrivez-vous</h3>
        </div>
        <div class="ex1 mesInfos">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/img/write.svg"  alt="logo simplicité">
            <h3>Remplissez la page<br/> "Mes infos"</h3>
        </div>
        <div class="ex1 validationInscription">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/img/validate.svg"  alt="logo simplicité">
            <h3>Nous validons votre<br/> inscription</h3>
        </div>
        <div class="ex1 enfantArrivent">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/img/child.svg"  alt="logo simplicité">
            <h3>Les enfants arrivent</h3>
        </div>
        <div class="bouttonInscrivezVous">
        <a href="<?php echo esc_url(home_url($web['pages']['Inscription']['slug'])); ?>">Inscrivez-vous</a>
        </div>
    </section>
</div>

<?php get_footer(); ?>