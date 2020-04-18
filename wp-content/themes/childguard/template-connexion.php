<?php /* Template Name: connexion */

$error = false;
if(!empty($_POST['submitconnexion'])) {
    $user = wp_signon($_POST);
    if(is_wp_error($user)) {
        $error = $user->get_error_message();
    }else {
        wp_redirect( home_url('/') ); exit;
    }
}

get_header(); ?>
    <div id="primary" class="content-area">
        <div id="main" class="wrap">

            <h1>Connexion</h1>
            <?php if($error): ?>
                <div class="error">
                    <?php echo $error ?>
                </div>
            <?php endif ?>
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <label for="user_login">Votre email*</label>
                <input type="text" name="user_login" id="user_login" value="<?php if(!empty($_POST['user_login'])) {echo $_POST['user_login'];} ?>"/></br>

                <label for="user_password">Votre mot de passe*</label>
                <input type="password" name="user_password" id="user_password" /></br>
                <span class="champs">*Champs obligatoires</span></br>
                <input type="checkbox" name="remember" id="" value="1">
                <label for="remember">Se souvenir de moi</label></br>

                <input type="submit" value="se connecter" name="submitconnexion" >
            </form>
            <p><a href="<?php echo bloginfo('url'); ?>/register">S'inscrire</a></p>
            <p><a href="<?php echo wp_lostpassword_url( get_bloginfo('url') ); ?>" title="Lost Password">Mot de passe perdu</a></p>

        </div><!-- #main -->
        <div class="clear"></div>
    </div><!-- #primary -->
<?php get_footer();
