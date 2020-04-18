<?php /* Template Name: contact */
$errors = array();
$success = false;
$form = new Form($errors);

if (!empty($_POST['submitted'])) {

    // faille xss
    $prenom                     = trim(strip_tags($_POST['prenom_pro']));
    $email                      = trim(strip_tags($_POST['email_pro']));
    $psw                        = trim(strip_tags($_POST['password_pro']));


    // validation
    $valid = new Validation();
    $errors['prenom_pro']       = $valid->textValid($prenom, 'votre prénom', 1, 50);
    $errors['email_pro']        = $valid->emailValid($email);


    wp_create_user($prenom, $psw, $email);

    $success = true;
}

get_header(); ?>

<form action="/childguard-wp/contact" method="post">
    <?= $form->label('prenom_pro', 'Prénom'); ?>
    <?= $form->input('prenom_pro', 'text', 'John'); ?>
    <?= $form->error('prenom_pro'); ?>

    <?= $form->label('email_pro', 'Email'); ?>
    <?= $form->input('email_pro', 'email', 'johndoe@johndoe.fr'); ?>
    <?= $form->error('email_pro'); ?>

    <?= $form->label('password_pro', 'Mot de passe'); ?>
    <?= $form->input('password_pro', 'password', ''); ?>
    <?= $form->error('password_pro'); ?>

    <?= $form->submit('submitted', 'Envoyer'); ?>
</form>

<?php get_footer();
