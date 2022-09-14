<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package shopstar
 */

get_header(); ?>

		<section class="not_fornd_sec">
		<div class="container-fluid">
		  <div class="content_404">
            <p class="red_ptxt">Oeps! Hier komt de aap uit de mouw! </p>
            <div class="img_404">
                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404.png" class="img-responsive" /></span>
                <div class="gif_404">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404-monkey.webp" class="img-responsive" />
                </div>
                <span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404.png" class="img-responsive" /></span>
            </div>
            <h4>Wij hebben even over het hoofd gezien dat deze pagina weg is.</h4>
            <p class="treetxt"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404-tree.png" class="img-responsive" /> Ik gok omdat wij zo druk zijn met de wereld groener te krijgen!  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404-tree.png" class="img-responsive" /></p>

            <div class="excuse_box"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/excuse.png" class="img-responsive" /><span>Excusez moi!</span></div>
            <p class="treetxt">Geef deze teleurstelling een plekje en zet het om in iets positiefs.<br> Neem een koude douche, ga lekker wandelen in de natuur, lach naar een onbekende, <br>geniet van de kleine dingen en dan is alles weer vegan koek en eco ei <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/404-smile.png" class="img-responsive" /></p>

            <p class="treetxt">En heb je nog een klein gaatje in jouw agenda en wil je nog iets goeds doen vandaag? </p>

            <p class="red_ptxt">Geef ons dan even een seintje dat deze pagina niet meer werkt, daar help je ons echt mee!</p>
    
        <div class="back_to_home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Terug naar homepage</a></div>

          </div>
		</div>
	</section>

<?php get_footer(); ?>
