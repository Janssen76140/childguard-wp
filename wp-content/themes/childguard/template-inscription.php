<?php /* Template Name: inscription */
$errors = array();
$success = false;

if(!empty($_POST['submitted'])) {

    // faille xss
    $nom   = trim(strip_tags($_POST['nom_pro']));
    $prenom   = trim(strip_tags($_POST['prenom_pro']));
    $email = trim(strip_tags($_POST['email_pro']));
    $psw = trim(strip_tags($_POST['password_pro']));
    $confpsw = trim(strip_tags($_POST['password2_pro']));
    $nomSociete   = trim(strip_tags($_POST['nomSociete_pro']));
    $raisonSocial   = trim(strip_tags($_POST['raisonSociale_pro']));
    $siret = trim(strip_tags($_POST['siret_pro']));
    $adresse = trim(strip_tags($_POST['adresse_pro']));
    $codePostal = trim(strip_tags($_POST['codePostal_pro']));
    $ville   = trim(strip_tags($_POST['ville_pro']));
    $complementAdresse   = trim(strip_tags($_POST['complementAdresse_pro']));
    $telephone = trim(strip_tags($_POST['telephone_pro']));
    
    // validation
    $valid = new Validation();
    $errors['nom_pro']   = $valid->textValid($nom,'votre nom',1,50);
    $errors['prenom_pro']   = $valid->textValid($prenom,'votre prénom',1,50);
    $errors['email_pro']   = $valid->emailValid($email);
    $errors['password_pro']   = $valid->validMdp($psw, $confpsw);
    $errors['nomSociete_pro']   = $valid->textValid($nomSociete,'le nom de votre société',3,50);
    $errors['raisonSociale_pro']   = $valid->textValid($raisonSocial,'la raison sociale de votre société',1,30);
    $errors['siret_pro']   = $valid->validSiret($siret);
    $errors['adresse_pro']   = $valid->textValid($adresse,'votre adresse',3,150);
    $errors['codePostal_pro']   = $valid->codePostalValid($codePostal);
    $errors['ville_pro']   = $valid->textValid($ville,'votre ville',1,50);
    $errors['complementAdresse_pro']   = $valid->textValid($complementAdresse,'complèment d\'adresse',3,150);
    $errors['telephone_pro']   = $valid->telephoneValid($telephone);

    

    if($valid->IsValid($errors)) {
        $hash = wp_hash_password($psw);
        $wpdb->insert(
            $wpdb->prefix .'pro_login',
            array(
                'nom_pro'      => $nom,
                'prenom_pro'      => $prenom,
                'email_pro'    => $email,
                'password_pro'      => $hash,
                'nomSociete_pro'      => $nomSociete,
                'raisonSociale_pro'    => $raisonSocial,
                'siret_pro'      => $siret,
                'adresse_pro'      => $adresse,
                'codePostal_pro'    => $codePostal,
                'ville_pro'      => $ville,
                'complementAdresse_pro'      => $complementAdresse,
                'telephone_pro'    => $telephone,
                'created_at' => current_time('mysql')
            ),
            array(
                '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
            )
        );
        $success = true;

    }
}
$form = new Form($errors);

get_header(); ?>

<h2>Inscription</h2>
<?php if ($success) { ?>
    <h2 class="success">Merci. Nous revenons vers vous dans les plus brefs délais.</h2>
<?php } else { ?>

    <div class="wrap">
        <form action="" method="post" class="formulaireInscription">
            <?= $form->label('nom_pro', 'Nom'); ?>
            <?= $form->input('nom_pro', 'text', 'Doe'); ?>
            <?= $form->error('nom_pro'); ?>

            <?= $form->label('prenom_pro', 'Prénom'); ?>
            <?= $form->input('prenom_pro', 'text', 'John'); ?>
            <?= $form->error('prenom_pro'); ?>

            <?= $form->label('email_pro', 'Email'); ?>
            <?= $form->input('email_pro', 'email', 'johndoe@johndoe.fr'); ?>
            <?= $form->error('email_pro'); ?>

            <?= $form->label('password_pro', 'Mot de passe'); ?>
            <?= $form->input('password_pro', 'password', ''); ?>
            <?= $form->error('password_pro'); ?>

            <?= $form->label('password2_pro', 'Confirmez votre mot de passe'); ?>
            <?= $form->input('password2_pro', 'password', ''); ?>
            <?= $form->error('password2_pro'); ?>

            <?= $form->label('nomSociete_pro', 'Nom de votre société'); ?>
            <?= $form->input('nomSociete_pro', 'text', 'Samajame WEB'); ?>
            <?= $form->error('nomSociete_pro'); ?>

            <?= $form->label('raisonSociale_pro', 'Raison sociale de la société'); ?>
            <?= $form->input('raisonSociale_pro', 'text', 'SARL'); ?>
            <?= $form->error('raisonSociale_pro'); ?>

            <?= $form->label('siret_pro', 'N°SIRET'); ?>
            <?= $form->input('siret_pro', 'number', '48310409700017'); ?>
            <?= $form->error('siret_pro'); ?>

            <?= $form->label('adresse_pro', 'Adresse'); ?>
            <?= $form->input('adresse_pro', 'text', '24 Place Saint Marc'); ?>
            <?= $form->error('adresse_pro'); ?>

            <?= $form->label('codePostal_pro', 'Code postale'); ?>
            <?= $form->input('codePostal_pro', 'number', '76000'); ?>
            <?= $form->error('codePostal_pro'); ?>

            <?= $form->label('ville_pro', 'Ville'); ?>
            <?= $form->input('ville_pro', 'text', 'Rouen'); ?>
            <?= $form->error('ville_pro'); ?>

            <?= $form->label('complementAdresse_pro', 'Complément d\'adresse'); ?>
            <?= $form->input('complementAdresse_pro', 'text', 'Appt 111'); ?>
            <?= $form->error('complementAdresse_pro'); ?>

            <?= $form->label('telephone_pro', 'Téléphone'); ?>
            <?= $form->input('telephone_pro', 'number', '0232526272'); ?>
            <?= $form->error('telephone_pro'); ?>

            <?= $form->submit('submitted', 'Envoyer'); ?>
            
        </form>
    </div>

<?php } ?>

<?php get_footer();
