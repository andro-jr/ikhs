<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shopstar
 */

get_header(); ?>
 <div class="container-fluid plr-36">
           <div class="row">

      <h1 class="search-title"> <?php echo $wp_query->found_posts; ?>
        <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>

        <?php if ( have_posts() ) { ?>

          
           
            <?php while ( have_posts() ) { the_post(); ?>

              <div class="col-md-3">
              <div class="">
                 <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail('medium') ?></a>
				 <h3><a href="<?php echo get_permalink(); ?>">
                   <?php the_title();  ?>
                 </a></h3>
                 <?php echo substr(get_the_excerpt(), 0,200); ?>
                 <div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
               </div>
               </div>

            <?php } ?>

            

           <?php echo paginate_links(); ?>

        <?php } ?>
</div>
            </div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
