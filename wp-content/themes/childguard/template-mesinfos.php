<?php /* Template Name: mes infos */
session_start();
global $wpdb;
$errors = array(); 
$success = false;
















$form = new Form($errors);
get_header(); ?>

<div class="wrap">
    <h4>Mes infos</h4>
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

    <div class="container2">
    <div class="horraire" id="div_1">
    <?= $form->label('horraire_pro_', 'Horaire d\'ouverture'); ?>
    <?= $form->input('horraire_pro_', 'text', 'Lundi au vendredi 8h 19h'); ?>&nbsp;<span class='add2'>Ajouter</span>
    <?= $form->error('horraire_pro_'); ?>
    </div>
    </div>

    <div class="container">
    <div class="lesPlus" id="div_1">
    <?= $form->label('lesPlus_pro_', 'Les +'); ?>
    <?= $form->input('lesPlus_pro_', 'text', 'Couches fournis')?>&nbsp;<span class='add'>Ajouter</span>
    <?= $form->error('lesPlus_pro_'); ?>
    </div>
    </div>

    <?= $form->label('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil'); ?>
    <?= $form->textarea('enQuelquesMots_pro'); ?>
    <?= $form->error('enQuelquesMots_pro'); ?>

    <?= $form->submit('submitted', 'Envoyer'); ?>
</form>
</div>


<?php get_footer(); ?>