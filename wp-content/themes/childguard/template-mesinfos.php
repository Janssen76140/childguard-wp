<?php /* Template Name: mes infos */
session_start();
global $wpdb;
$errors = array();
$success = false;

var_dump($_SESSION['login']['id']);

if (!empty($_POST['submitted'])) {

    // faille xss
    $nomStructure   = trim(strip_tags($_POST['nomStructure_pro']));
    $dateOuverture   = trim(strip_tags($_POST['dateOuverture_pro']));
    $capaciteEnfant = trim(strip_tags($_POST['capaciteEnfant_pro']));
    $surface = trim(strip_tags($_POST['surface_pro']));
    $ageEnfantAccueil = trim(strip_tags($_POST['ageEnfant_pro']));
    $horairePro = trim(strip_tags($_POST['horaire_pro']));
    $lesPlus = trim(strip_tags($_POST['lesPlus_pro']));
    $enQuelquesMots = trim(strip_tags($_POST['enQuelquesMots_pro']));

    // validation
    $valid = new Validation();
    $errors['nomStructure_pro']   = $valid->textValid($nomStructure, 'votre nom de structure', 1, 50);
    $errors['dateOuverture_pro']   = $valid->textValid($dateOuverture, 'votre date d\'ouverture', 1, 50);
    $errors['capaciteEnfant_pro']   = $valid->textValid($capaciteEnfant, 'La capacité', 1, 3);
    $errors['surface_pro']   = $valid->textValid($surface, 'La surface', 1, 5);
    $errors['ageEnfant_pro']   = $valid->textValid($ageEnfantAccueil, 'La tranche d\'âge', 1, 15);
    $errors['horaire_pro']   = $valid->textValid($horairePro, 'Les horaires', 1, 250);
    $errors['lesPlus_pro']   = $valid->textValid($lesPlus, 'Les plus', 1, 250);
    $errors['enQuelquesMots_pro']   = $valid->textValid($enQuelquesMots, 'En quelques mots', 20, 2000);

    if ($valid->IsValid($errors)) {
        $id = ($_SESSION['login']['id']);
        $wpdb->update(
            'chi_pro_login',
            array(
                'nomStructure_pro'        => $nomStructure,
                'dateOuverture_pro'       => $dateOuverture,
                'capaciteEnfant_pro'      => $capaciteEnfant,
                'surface_pro'             => $surface,
                'ageEnfant_pro'           => $ageEnfantAccueil,
                'horaire_pro'             => $horairePro,
                'lesPlus_pro'             => $lesPlus,
                'enQuelquesMots_pro'      => $enQuelquesMots,
            ),

            array(
                'id_pro' => $id,
            ),

            array(
                '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
            ),

            array(
                '%d'
            )
        );
    
        $success = true;
    }
}

$form = new Form($errors);
get_header(); ?>

<div class="wrap">
    <h2>Mes infos</h2>
    <form action="" method="post" class="formulaireMesInfos">
        <?= $form->label('nomStructure_pro', 'Nom de la structure d\'accueil'); ?>
        <?= $form->input('nomStructure_pro', 'text', 'Les petites canailles'); ?>
        <?= $form->error('nomStructure_pro'); ?>

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
        <?= $form->textarea('horaire_pro', 'Lundi au vendredi 8h 19h ; samedi 9h à 13h ; dimanche fermé &#10SEPARER CHAQUES HORAIRES PAR UN ; COMME SUR L\'EXEMPLE'); ?>
        <?= $form->error('horaire_pro'); ?>

        <?= $form->label('lesPlus_pro', 'Les +'); ?>
        <?= $form->textarea('lesPlus_pro', 'Couches fournis ; Local à poussette ; Parking &#10SEPARER CHAQUES PLUS PAR UN ; COMME SUR L\'EXEMPLE '); ?>
        <?= $form->error('lesPlus_pro'); ?>

        <?= $form->label('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil'); ?>
        <?= $form->textarea('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil ainsi que tous les éléments qui vous semble importants pour les familles'); ?>
        <?= $form->error('enQuelquesMots_pro'); ?>

        <p><?= $form->submit('submitted', 'Envoyer'); ?></p>
    </form>
</div>


<?php get_footer(); ?>