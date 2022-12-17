<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bebe
 */

get_header();
?>
<p>search.php</p>
	<main id="primary" class="site-main">
    <article class="blog">
        <div class="items cf">
			<?php if ( have_posts() ){
				while ( have_posts() ) : the_post(); ?>
                <div class="col-3">
                    <a href="<?php the_permalink(); ?>">
                       <?php echo get_the_post_thumbnail(get_the_ID(),'post-front'); ?>
                    </a>
                    <div class="info cf">
                        <div class="time"><?php echo get_the_date(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="comments"><?php echo comments_number(); ?></a>
                    </div>
                    <div class="text">
                        <a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
                            <?php the_excerpt(); ?>
                    </div>
                    <div class="wave"></div>
                </div>
       		<?php	endwhile;
			
			?>
		</div>
    </article>
			 <!-- Pagination -->
			<article class="pagination">
			  <?php
					$settings = array('prev_next' => false );
					echo paginate_links( $settings );
			  ?>
			</article>

			<?php } else{
            
			get_template_part( 'template-parts/content', 'none' );

			}
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
