<?php /* Template Name: contact */
$errors = array();
$success = false;
$form = new Form($errors);
get_header();?>

<form action="/childguard-wp/contact/" method="post" id="formaulaireContact">

    <?= $form->label('email_pro1', 'Email'); ?>
    <?= $form->input('email_pro1', 'email', 'johndoe@johndoe.fr'); ?>
    <?= $form->error('email_pro1'); ?>

    <?= $form->label('email_pro2', 'Email'); ?>
    <?= $form->input('email_pro2', 'email', 'johndoe@johndoe.fr'); ?>
    <?= $form->error('email_pro2'); ?>

    <?= $form->submit('submittedContact', 'Envoyer'); ?>

</form>

<p id="email"> df</p>

<?php get_footer();