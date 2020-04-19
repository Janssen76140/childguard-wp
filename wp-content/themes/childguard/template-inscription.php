<?php /* Template Name: inscription */
$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    // faille xss

    $prenom                     = trim(strip_tags($_POST['idConnexion_pro']));
    $email                      = trim(strip_tags($_POST['email_pro']));
    $psw                        = trim(strip_tags($_POST['password_pro']));

    // validation
    $valid = new Validation();

    $errors['idConnexion_pro']       = $valid->textValid($prenom, 'votre identification de connexion', 1, 50);
    $errors['email_pro']             = $valid->emailValid($email);
    $errors['password_pro']          = $valid->validMdp($psw);

    if ($valid->IsValid($errors)) {
        wp_create_user($prenom, $psw, $email);
        $success = true;
    }
}
$form = new Form($errors);

get_header(); ?>

<h2>Inscription</h2>
<?php if ($success) { ?>
    <h2 class="success">Merci. Vous pouvez vous connecter.</h2>
<?php } else { ?>

    <div class="wrap">
        <form action="/childguard-wp/inscription" method="post" class="formulaireInscription">

            <?= $form->label('idConnexion_pro', 'Identifiant de connexion'); ?>
            <?= $form->input('idConnexion_pro', 'text', 'John76140'); ?>
            <?= $form->error('idConnexion_pro'); ?>

            <?= $form->label('email_pro', 'Email'); ?>
            <?= $form->input('email_pro', 'email', 'johndoe@johndoe.fr'); ?>
            <?= $form->error('email_pro'); ?>

            <?= $form->label('password_pro', 'Mot de passe'); ?>
            <?= $form->input('password_pro', 'password', ''); ?>
            <?= $form->error('password_pro'); ?>

            <?= $form->submit('submitted', 'Envoyer'); ?>

        </form>
    </div>

<?php } ?>

<?php get_footer();
