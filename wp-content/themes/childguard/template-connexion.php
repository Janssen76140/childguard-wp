<?php /* Template Name: connexion */
session_start();
global $wpdb;
$errors = array();
$success = false;
$valid = new Validation();

if (!empty($_POST['submitted'])) {
    // faille xss
    $email = trim(strip_tags($_POST['email_pro']));
    $psw = trim(strip_tags($_POST['password_pro']));

    $errors['email_pro']   = $valid->VerifMail($email);

    if ($valid->IsValid($errors)) {
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}pro_login WHERE email_pro = '%s'", $email));
        if (!empty($user)) {
            if (password_verify($psw, $user->password_pro)) {
                $valid->nouvelleSession($user, '/childguard-wp/');
            } else {
                return $error = 'L\'email ou le mot de passe ne sont pas valide';
            }
        } else {
            return $error = "L\'email ou le mot de passe ne sont pas valide";
        }
    }
}


$form = new Form($errors);
get_header(); ?>

<div class="wrap">
    <h2>Connexion</h2>
    <form action="" method="post" class="formulaireConnexion">
        <?= $form->label('email_pro', 'Email'); ?>
        <?= $form->input('email_pro', 'email', 'johndoe@johndoe.fr'); ?>
        <?= $form->error('email_pro'); ?>

        <?= $form->label('password_pro', 'Mot de passe'); ?>
        <?= $form->input('password_pro', 'password', ''); ?>
        <?= $form->error('password_pro'); ?>

        <?= $form->submit('submitted', 'Envoyer'); ?>
    </form>
</div>

<?php get_footer();
