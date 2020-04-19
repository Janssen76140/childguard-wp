<?php /* Template Name: detail */
session_start();


$id = get_current_user_id();
$meta_user = get_user_meta($id);

get_header(); ?>

<section id="pageDetail">
    <div class="wrap">

        <div class="enteteDetail">
            <h4><?= stripslashes($meta_user['_user_meta_nomstructure'][0]); ?></h4>
            <span><img class="iconeDetail" src="<?php echo get_template_directory_uri(); ?>/asset/img/adresse.png" alt="icone adresse"></span>
            <p><?= stripslashes($meta_user['_user_meta_adresse'][0]); ?>,</p>
            <p><?= stripslashes($meta_user['_user_meta_codepostal'][0]); ?>,</p>
            <p><?= stripslashes($meta_user['_user_meta_ville'][0]);  ?></p>
        </div>
        <div class="contactDetail">
            <div class="phoneDetail">
                <span><img class="iconeDetail" src="<?php echo get_template_directory_uri(); ?>/asset/img/phoneDetail.svg" alt=""></span>
                <p><?= stripslashes($meta_user['_user_meta_telephone'][0]);  ?></p><br />
            </div>
        </div>

        <div class="carreDetail">
            <div class="ex2 ouvertureDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/ouvertureDetail.svg" alt="">
                <p class="enteteCarreDetail">Date d'ouverture</p>
                <p class="valueCarreDetail"><?= stripslashes($meta_user['_user_meta_dateouverture'][0]);  ?></p>
            </div>

            <div class="ex2 surfaceDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/surfaceDetail.svg" alt="">
                <p class="enteteCarreDetail">Surface en m2</p>
                <p class="valueCarreDetail"><?= stripslashes($meta_user['_user_meta_surface'][0]);  ?></p>
            </div>

            <div class="ex2 ageDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/ageDetail.svg" alt="">
                <p class="enteteCarreDetail">Age d'accueil</p>
                <p class="valueCarreDetail"><?= stripslashes($meta_user['_user_meta_ageenfant'][0]);  ?></p>
            </div>

            <div class="ex2 capaciteDetail">
                <img src="<?php echo get_template_directory_uri(); ?>/asset/img/capaciteDetail.svg" alt="">
                <p class="enteteCarreDetail">Capacité d'accueil</p>
                <p class="valueCarreDetail"><?= stripslashes($meta_user['_user_meta_capaciteenfant'][0]);  ?></p>
            </div>
        </div>

        <div class="horairesPlusDetail">
            <div class="ex3 horairesDetail">
                <h5>Horaires d'ouverture</h5>
                <p><?= stripslashes(nl2br($meta_user['horaire'][0]));  ?></p>
            </div>

            <div class="ex3 plusDetail">
                <h5>Les petits +</h5>
                <p><?= stripslashes(nl2br($meta_user['lesPlus'][0]));  ?></p>
            </div>
        </div>

        <div class="clear"></div>

        <div class="enQuelquesMots">
            <h4>Chez nous, en quelques mots</h4>
            <p><?= stripslashes(nl2br($meta_user['enQuelquesMots'][0]));  ?></p>
        </div>

    </div>
</section>

<?php get_footer();
