<?php /* Template Name: inscription */
$errors = array();
$success = false;

if(!empty($_POST['submitted'])) {

    // faille xss
    $nom   = trim(strip_tags($_POST['nomInscription']));
    $prenom   = trim(strip_tags($_POST['prenomInscription']));
    $email = trim(strip_tags($_POST['emailInscription']));
    $psw = trim(strip_tags($_POST['passwordInscription']));
    $confpsw = trim(strip_tags($_POST['password2Inscription']));
    $nomSociete   = trim(strip_tags($_POST['nomSocieteInscription']));
    $raisonSocial   = trim(strip_tags($_POST['raisonSocialInscription']));
    $siret = trim(strip_tags($_POST['siretInscription']));
    $adresse = trim(strip_tags($_POST['adresseInscription']));
    $codePostal = trim(strip_tags($_POST['cpInscription']));
    $ville   = trim(strip_tags($_POST['villeInscription']));
    $complementAdresse   = trim(strip_tags($_POST['completmentAdresseInscription']));
    $telephone = trim(strip_tags($_POST['telephoneInscription']));
    
    // validation
    $valid = new Validation();
    $errors['nomInscription']   = $valid->textValid($nom,'votre nom',1,50);
    $errors['prenomInscription']   = $valid->textValid($prenom,'votre prénom',1,50);
    $errors['emailInscription']   = $valid->emailValid($email);
    $errors['passwordInscription']   = $valid->validMdp($psw, $confpsw);
    $errors['nomSocieteInscription']   = $valid->textValid($nomSociete,'le nom de votre société',3,50);
    $errors['raisonSocialInscription']   = $valid->textValid($raisonSocial,'la raison sociale de votre société',1,30);
    $errors['siretInscription']   = $valid->validSiret($siret);
    $errors['adresseInscription']   = $valid->textValid($adresse,'votre adresse',3,150);
    $errors['cpInscription']   = $valid->codePostalValid($codePostal);
    $errors['villeInscription']   = $valid->textValid($ville,'votre ville',1,50);
    $errors['completmentAdresseInscription']   = $valid->textValid($prenom,'complèment d\'adresse',3,150);
    $errors['telephoneInscription']   = $valid->telephoneValid($telephone);

    

    // if($valid->IsValid($errors)) {

    //     $wpdb->insert(
    //         $wpdb->prefix .'contact',
    //         array(
    //             'sujet'      => $sujet,
    //             'email'      => $email,
    //             'message'    => $message,
    //             'created_at' => current_time('mysql')
    //         ),
    //         array(
    //             '%s','%s','%s'
    //         )
    //     );
    //     $success = true;

    // }
}
$form = new Form($errors);

get_header(); ?>

<h2>Inscription</h2>
<?php if ($success) { ?>
    <h2 class="success">Merci. Nous revenons vers vous dans les plus brefs délais.</h2>
<?php } else { ?>

    <div class="wrap">
        <form action="" method="post" class="formulaireInscription">
            <?= $form->label('nomInscription', 'Nom'); ?>
            <?= $form->input('nomInscription', 'text', 'Doe'); ?>
            <?= $form->error('nomInscription'); ?>

            <?= $form->label('prenomInscription', 'Prénom'); ?>
            <?= $form->input('prenomInscription', 'text', 'John'); ?>
            <?= $form->error('prenomInscription'); ?>

            <?= $form->label('emailInscription', 'Email'); ?>
            <?= $form->input('emailInscription', 'email', 'johndoe@johndoe.fr'); ?>
            <?= $form->error('emailInscription'); ?>

            <?= $form->label('passwordInscription', 'Mot de passe'); ?>
            <?= $form->input('passwordInscription', 'password', ''); ?>
            <?= $form->error('passwordInscription'); ?>

            <?= $form->label('password2Inscription', 'Confirmez votre mot de passe'); ?>
            <?= $form->input('password2Inscription', 'password', ''); ?>
            <?= $form->error('password2Inscription'); ?>

            <?= $form->label('nomSocieteInscription', 'Nom de votre société'); ?>
            <?= $form->input('nomSocieteInscription', 'text', 'Samajame WEB'); ?>
            <?= $form->error('nomSocieteInscription'); ?>

            <?= $form->label('raisonSocialInscription', 'Raison sociale de la société'); ?>
            <?= $form->input('raisonSocialInscription', 'text', 'SARL'); ?>
            <?= $form->error('raisonSocialInscription'); ?>

            <?= $form->label('siretInscription', 'N°SIRET'); ?>
            <?= $form->input('siretInscription', 'number', '48310409700017'); ?>
            <?= $form->error('siretInscription'); ?>

            <?= $form->label('adresseInscription', 'Adresse'); ?>
            <?= $form->input('adresseInscription', 'text', '24 Place Saint Marc'); ?>
            <?= $form->error('adresseInscription'); ?>

            <?= $form->label('cpInscription', 'Code postale'); ?>
            <?= $form->input('cpInscription', 'number', '76000'); ?>
            <?= $form->error('cpInscription'); ?>

            <?= $form->label('villeInscription', 'Ville'); ?>
            <?= $form->input('villeInscription', 'text', 'Rouen'); ?>
            <?= $form->error('villeInscription'); ?>

            <?= $form->label('completmentAdresseInscription', 'Complément d\'adresse'); ?>
            <?= $form->input('completmentAdresseInscription', 'text', 'Appt 111'); ?>
            <?= $form->error('completmentAdresseInscription'); ?>

            <?= $form->label('telephoneInscription', 'Téléphone'); ?>
            <?= $form->input('telephoneInscription', 'number', '0232526272'); ?>
            <?= $form->error('telephoneInscription'); ?>

            <?= $form->submit('submitted', 'Envoyer'); ?>
            
        </form>
    </div>

<?php } ?>

<?php get_footer();
