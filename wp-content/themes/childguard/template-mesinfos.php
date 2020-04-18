<?php /* Template Name: mes infos */
session_start();

$errors = array();
$success = false;
$valid = new Validation();
$id = get_current_user_id();

if (!empty($_POST['submitted'])) {


    // faille xss

    $nom                            = trim(strip_tags($_POST['nom_pro']));
    $prenom                         = trim(strip_tags($_POST['prenom_pro']));
    $nomSociete                     = trim(strip_tags($_POST['nomSociete_pro']));
    $raisonSocial                   = trim(strip_tags($_POST['raisonSociale_pro']));
    $siret                          = trim(strip_tags($_POST['siret_pro']));
    $nomStructure                   = trim(strip_tags($_POST['nomStructure_pro']));
    $adresse                        = trim(strip_tags($_POST['adresse_pro']));
    $codePostal                     = trim(strip_tags($_POST['codePostal_pro']));
    $ville                          = trim(strip_tags($_POST['ville_pro']));
    $telephone                      = trim(strip_tags($_POST['telephone_pro']));
    $dateOuverture                  = trim(strip_tags($_POST['dateOuverture_pro']));
    $capaciteEnfant                 = trim(strip_tags($_POST['capaciteEnfant_pro']));
    $surface                        = trim(strip_tags($_POST['surface_pro']));
    $ageEnfantAccueil               = trim(strip_tags($_POST['ageEnfant_pro']));
    $horairePro                     = trim(strip_tags($_POST['horaire_pro']));
    $lesPlus                        = trim(strip_tags($_POST['lesPlus_pro']));
    $enQuelquesMots                 = trim(strip_tags($_POST['enQuelquesMots_pro']));

    // validation
    $errors['nom_pro']              = $valid->textValid($nom, 'votre nom', 1, 50);
    $errors['prenom_pro']           = $valid->textValid($prenom, 'votre prénom', 1, 50);
    $errors['nomSociete_pro']       = $valid->textValid($nomSociete, 'le nom de votre société', 3, 50);
    $errors['raisonSociale_pro']    = $valid->textValid($raisonSocial, 'la raison sociale de votre société', 1, 30);
    $errors['siret_pro']            = $valid->validSiret($siret);
    $errors['nomStructure_pro']     = $valid->textValid($nomStructure, 'votre nom de structure', 1, 50);
    $errors['adresse_pro']          = $valid->textValid($adresse, 'votre adresse', 3, 150);
    $errors['codePostal_pro']       = $valid->codePostalValid($codePostal);
    $errors['ville_pro']            = $valid->textValid($ville, 'votre ville', 1, 50);
    $errors['telephone_pro']        = $valid->telephoneValid($telephone);
    $errors['dateOuverture_pro']    = $valid->textValid($dateOuverture, 'votre date d\'ouverture', 1, 50);
    $errors['capaciteEnfant_pro']   = $valid->textValid($capaciteEnfant, 'La capacité', 1, 3);
    $errors['surface_pro']          = $valid->textValid($surface, 'La surface', 1, 5);
    $errors['ageEnfant_pro']        = $valid->textValid($ageEnfantAccueil, 'La tranche d\'âge', 1, 50);
    $errors['horaire_pro']          = $valid->textValid($horairePro, 'Les horaires', 1, 250);
    $errors['lesPlus_pro']          = $valid->textValid($lesPlus, 'Les plus', 1, 250);
    $errors['enQuelquesMots_pro']   = $valid->textValid($enQuelquesMots, 'En quelques mots', 20, 2000);



    if ($valid->IsValid($errors)) {
        update_user_meta($id, '_user_meta_nomsociete', $_POST['nomSociete_pro']);
        update_user_meta($id, '_user_meta_raisonsociale', $_POST['raisonSociale_pro']);
        update_user_meta($id, '_user_meta_siret', $_POST['siret_pro']);
        update_user_meta($id, '_user_meta_nomstructure', $_POST['nomStructure_pro']);
        update_user_meta($id, '_user_meta_adresse', $_POST['adresse_pro']);
        update_user_meta($id, '_user_meta_codepostal', $_POST['codePostal_pro']);
        update_user_meta($id, '_user_meta_ville', $_POST['ville_pro']);
        update_user_meta($id, '_user_meta_telephone', $_POST['telephone_pro']);
        update_user_meta($id, '_user_meta_dateouverture', $_POST['dateOuverture_pro']);
        update_user_meta($id, '_user_meta_capaciteenfant', $_POST['capaciteEnfant_pro']);
        update_user_meta($id, '_user_meta_surface', $_POST['surface_pro']);
        update_user_meta($id, '_user_meta_ageenfant', $_POST['ageEnfant_pro']);
        update_user_meta($id, 'horaire', $_POST['horaire_pro']);
        update_user_meta($id, 'lesPlus', $_POST['lesPlus_pro']);
        update_user_meta($id, 'enQuelquesMots', $_POST['enQuelquesMots_pro']);
        $success = true;
    }
}



$form = new Form($errors);
get_header(); ?>

<div class="wrap">
    <h2>Mes infos</h2>
    <form action="/childguard-wp/mes-infos/" method="post" class="formulaireMesInfos" id="formulaireMesInfos">

        <?= $form->label('nom_pro', 'Nom'); ?>
        <?= $form->input('nom_pro', 'text', 'Doe'); ?>
        <?= $form->error('nom_pro'); ?>

        <?= $form->label('prenom_pro', 'Prénom'); ?>
        <?= $form->input('prenom_pro', 'text', 'John'); ?>
        <?= $form->error('prenom_pro'); ?>

        <?= $form->label('nomSociete_pro', 'Nom de votre société'); ?>
        <?= $form->input('nomSociete_pro', 'text', 'Samajame WEB'); ?>
        <?= $form->error('nomSociete_pro'); ?>

        <?= $form->label('raisonSociale_pro', 'Raison sociale de la société'); ?>
        <?= $form->input('raisonSociale_pro', 'text', 'SARL'); ?>
        <?= $form->error('raisonSociale_pro'); ?>

        <?= $form->label('siret_pro', 'N°SIRET'); ?>
        <?= $form->input('siret_pro', 'number', '48310409700017'); ?>
        <?= $form->error('siret_pro'); ?>

        <?= $form->label('nomStructure_pro', 'Nom de la structure d\'accueil'); ?>
        <?= $form->input('nomStructure_pro', 'text', 'Les petites canailles'); ?>
        <?= $form->error('nomStructure_pro'); ?>

        <?= $form->label('adresse_pro', 'Adresse de la structure'); ?>
        <?= $form->input('adresse_pro', 'text', '24 Place Saint Marc'); ?>
        <?= $form->error('adresse_pro'); ?>

        <?= $form->label('codePostal_pro', 'Code postale'); ?>
        <?= $form->input('codePostal_pro', 'number', '76000'); ?>
        <?= $form->error('codePostal_pro'); ?>

        <?= $form->label('ville_pro', 'Ville'); ?>
        <?= $form->input('ville_pro', 'text', 'Rouen'); ?>
        <?= $form->error('ville_pro'); ?>

        <?= $form->label('telephone_pro', 'Téléphone'); ?>
        <?= $form->input('telephone_pro', 'number', '0232526272'); ?>
        <?= $form->error('telephone_pro'); ?>

        <?= $form->label('dateOuverture_pro', 'Date d\'ouverture'); ?>
        <?= $form->input('dateOuverture_pro', 'text', 'Avril 2010'); ?>
        <?= $form->error('dateOuverture_pro'); ?>

        <?= $form->label('capaciteEnfant_pro', 'Capacité d\'accueil'); ?>
        <?= $form->input('capaciteEnfant_pro', 'text', '20'); ?>
        <?= $form->error('capaciteEnfant_pro'); ?>

        <?= $form->label('surface_pro', 'Surface en m2'); ?>
        <?= $form->input('surface_pro', 'text', '180'); ?>
        <?= $form->error('surface_pro'); ?>

        <?= $form->label('ageEnfant_pro', 'Tranche d\'age des enfants acceptés'); ?>
        <?= $form->input('ageEnfant_pro', 'text', '1 à 6 ans'); ?>
        <?= $form->error('ageEnfant_pro'); ?>

        <?= $form->label('horaire_pro', 'Horaire d\'ouverture'); ?>
        <?= $form->textarea('horaire_pro', '> Lundi au vendredi : 8:00 à 18:00&#10> Samedi : Fermé&#10> Dimanche: Fermé'); ?>
        <?= $form->error('horaire_pro'); ?>

        <?= $form->label('lesPlus_pro', 'Les +'); ?>
        <?= $form->textarea('lesPlus_pro', '> Couches fournies&#10> Local Poussette&#10> Repas (bio)'); ?>
        <?= $form->error('lesPlus_pro'); ?>

        <?= $form->label('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil'); ?>
        <?= $form->textarea('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil ainsi que tous les éléments qui vous semble importants pour les familles'); ?>
        <?= $form->error('enQuelquesMots_pro'); ?>

        <?= $form->submit('submitted', 'Envoyer'); ?>
        <div class="clear"></div>
        <a class="lienPageDetail" href="<?php echo esc_url(home_url($web['pages']['detail']['slug'])); ?>" title="">Prévisualiser votre page détail qui sera vu par les particuliers</a>
    </form>
</div>

<?php get_footer(); ?>