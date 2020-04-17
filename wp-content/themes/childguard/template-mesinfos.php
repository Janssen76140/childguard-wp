<?php /* Template Name: mes infos */
session_start();

global $wpdb;

$errors = array();
$success = false;

$valid = new Validation();

$id = ($_SESSION['login']['id']);

if (!empty($_POST['submitted'])) {


    // faille xss
    $nom                            = trim(strip_tags($_POST['nom_pro']));
    $prenom                         = trim(strip_tags($_POST['prenom_pro']));
    $telephone                      = trim(strip_tags($_POST['telephone_pro']));
    $nomStructure                   = trim(strip_tags($_POST['nomStructure_pro']));
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
    $errors['telephone_pro']        = $valid->telephoneValid($telephone);
    $errors['nomStructure_pro']     = $valid->textValid($nomStructure, 'votre nom de structure', 1, 50);
    $errors['dateOuverture_pro']    = $valid->textValid($dateOuverture, 'votre date d\'ouverture', 1, 50);
    $errors['capaciteEnfant_pro']   = $valid->textValid($capaciteEnfant, 'La capacité', 1, 3);
    $errors['surface_pro']          = $valid->textValid($surface, 'La surface', 1, 5);
    $errors['ageEnfant_pro']        = $valid->textValid($ageEnfantAccueil, 'La tranche d\'âge', 1, 50);
    $errors['horaire_pro']          = $valid->textValid($horairePro, 'Les horaires', 1, 250);
    $errors['lesPlus_pro']          = $valid->textValid($lesPlus, 'Les plus', 1, 250);
    $errors['enQuelquesMots_pro']   = $valid->textValid($enQuelquesMots, 'En quelques mots', 20, 2000);



    if ($valid->IsValid($errors)) {
        $wpdb->update(
            'chi_pro_login',
            array(
                'nom_pro'                 => $nom,
                'prenom_pro'              => $prenom,
                'telephone_pro'           => $telephone,
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
                '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
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
    <form action="/childguard-wp/mes-infos/" method="post" class="formulaireMesInfos" id="formulaireMesInfos">
        <?= $form->label('nom_pro', 'Nom'); ?>
        <?= $form->input2('nom_pro', 'text', 'Doe'); ?>
        <?= $form->error('nom_pro'); ?>

        <?= $form->label('prenom_pro', 'Prénom'); ?>
        <?= $form->input2('prenom_pro', 'text', 'John'); ?>
        <?= $form->error('prenom_pro'); ?>

        <?= $form->label('telephone_pro', 'Téléphone'); ?>
        <?= $form->input2('telephone_pro', 'number', '0232526272'); ?>
        <?= $form->error('telephone_pro'); ?>

        <?= $form->label('nomStructure_pro', 'Nom de la structure d\'accueil'); ?>
        <?= $form->input2('nomStructure_pro', 'text', 'Les petites canailles'); ?>
        <?= $form->error('nomStructure_pro'); ?>

        <?= $form->label('dateOuverture_pro', 'Date d\'ouverture'); ?>
        <?= $form->input2('dateOuverture_pro', 'text', 'Avril 2010'); ?>
        <?= $form->error('dateOuverture_pro'); ?>

        <?= $form->label('capaciteEnfant_pro', 'Capacité d\'accueil'); ?>
        <?= $form->input2('capaciteEnfant_pro', 'text', '20'); ?>
        <?= $form->error('capaciteEnfant_pro'); ?>

        <?= $form->label('surface_pro', 'Surface en m2'); ?>
        <?= $form->input2('surface_pro', 'text', '180'); ?>
        <?= $form->error('surface_pro'); ?>

        <?= $form->label('ageEnfant_pro', 'Tranche d\'age des enfants acceptés'); ?>
        <?= $form->input2('ageEnfant_pro', 'text', '1 à 6 ans'); ?>
        <?= $form->error('ageEnfant_pro'); ?>

        <?= $form->label('horaire_pro', 'Horaire d\'ouverture'); ?>
        <?= $form->textarea2('horaire_pro', '> Lundi au vendredi : 8:00 à 18:00&#10> Samedi : Fermé&#10> Dimanche: Fermé'); ?>
        <?= $form->error('horaire_pro'); ?>

        <?= $form->label('lesPlus_pro', 'Les +'); ?>
        <?= $form->textarea2('lesPlus_pro', '> Couches fournies&#10> Local Poussette&#10> Repas (bio)'); ?>
        <?= $form->error('lesPlus_pro'); ?>

        <?= $form->label('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil'); ?>
        <?= $form->textarea2('enQuelquesMots_pro', 'Décrivez votre structure d\'accueil ainsi que tous les éléments qui vous semble importants pour les familles'); ?>
        <?= $form->error('enQuelquesMots_pro'); ?>

        <?= $form->submit('submitted', 'Envoyer'); ?>
        <div class="clear"></div>
        <a class="lienPageDetail" href="<?php echo esc_url(home_url($web['pages']['detail']['slug'])); ?>" title="">Prévisualiser votre page détail qui sera vu par les particuliers</a>
    </form>
</div>

<?php get_footer(); ?>