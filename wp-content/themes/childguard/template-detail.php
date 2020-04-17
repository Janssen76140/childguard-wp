<?php /* Template Name: detail */
session_start();
global $wpdb;
$errors = array();


$id = ($_SESSION['login']['id']);

$detail = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}pro_login WHERE id_pro = %d", $id)
);



get_header(); ?>

<!--Nom creche h4
    adresse p
    4 cases -> date ouverture,surface, age accépté, capacité enfant
    horraire d'ouverture
    les plus de la creche
    -->
<section id="pageDetail">
    <div class="wrap">
        <div class="enteteDetail">
            <h4><?= stripslashes($detail[0]->nomStructure_pro); ?></h4>
            <span><img class="iconeDetail" src="<?php echo get_template_directory_uri(); ?>/asset/img/adresse.png" alt="icone adresse"></span>
            <p><?= stripslashes($detail[0]->adresse_pro); ?>,</p>
            <p><?= stripslashes($detail[0]->codePostal_pro); ?>,</p>
            <p><?= stripslashes($detail[0]->ville_pro);  ?></p>
        </div>
        <div class="contactDetail">
            <div class="phoneDetail">
                <span><img class="iconeDetail" src="<?php echo get_template_directory_uri(); ?>/asset/img/phoneDetail.svg" alt=""></span>
                <p><?= stripslashes($detail[0]->telephone_pro);  ?></p><br />
            </div>
            <div class="mailDetail">
                <span><img class="iconeDetail" src="<?php echo get_template_directory_uri(); ?>/asset/img/mailDetail.svg" alt=""></span>
                <p><?= stripslashes($detail[0]->email_pro);  ?></p>
            </div>

        </div>

        <div class="carreDetail">
            <div class="ex2 ouvertureDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/ouvertureDetail.svg" alt="">
                <p class="enteteCarreDetail">Date d'ouverture</p>
                <p class="valueCarreDetail"><?= stripslashes($detail[0]->dateOuverture_pro);  ?></p>
            </div>

            <div class="ex2 surfaceDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/surfaceDetail.svg" alt="">
                <p class="enteteCarreDetail">Surface en m2</p>
                <p class="valueCarreDetail"><?= stripslashes($detail[0]->surface_pro);  ?></p>
            </div>

            <div class="ex2 ageDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/ageDetail.svg" alt="">
                <p class="enteteCarreDetail">Age d'accueil</p>
                <p class="valueCarreDetail"><?= stripslashes($detail[0]->ageEnfant_pro);  ?></p>
            </div>

            <div class="ex2 capaciteDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/capaciteDetail.svg" alt="">
                <p class="enteteCarreDetail">Capacité d'accueil</p>
                <p class="valueCarreDetail"><?= stripslashes($detail[0]->capaciteEnfant_pro);  ?></p>
            </div>
        </div>

        <div class="horairesPlusDetail">
            <div class="ex3 horairesDetail">
                <h5>Horaires d'ouverture</h5>
                <p><?= stripslashes(nl2br($detail[0]->horaire_pro));  ?></p>
            </div>

            <div class="ex3 plusDetail">
                <h5>Les petits +</h5>
                <p><?= stripslashes(nl2br($detail[0]->lesPlus_pro));  ?></p>
            </div>
        </div>

        <div class="clear"></div>

        <div class="enQuelquesMots">
            <h4>Chez nous, en quelques mots</h4>
            <p><?= stripslashes(nl2br($detail[0]->enQuelquesMots_pro));  ?></p>
        </div>






    </div>
</section>

<?php get_footer();
