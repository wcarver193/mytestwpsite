<?php get_header(); ?>
<p>archive-rooms.php</p>

     <!-- Rooms -->
        <article class="rooms">
		
        <?php 
		  $posts_per_page ='6';// задаем по умолчанию 6!!! в видео "персон.пагинация" эта перем. задается как цифра а не строка
		    if(isset($bebe_options['roomscount'])){
		  $posts_per_page = $bebe_options['roomscount']; //$bebe_options - наша глобальн.перем.
		  }
		  $paged = (get_query_var('paged'))? get_query_var('paged') : 1; //на какой стр.нахолдимся. если на 1-й то знач.нет и мы задаем 1
		  $rooms = new WP_Query(array('post_type' => 'rooms', 'posts_per_page' => $posts_per_page, 'paged' => $paged));
		  $i ='0';
		?>
            <!-------------------------------------------------------- -->
            <div class="line cf">
			  <?php if ( $rooms->have_posts() ) : while ( $rooms->have_posts() ) : $rooms->the_post(); $i++; ?>
                <div class="col-6">
                    <div class="col-6 text">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                           <?php echo the_excerpt(); ?>
                        <a class="more" href="<?php the_permalink(); ?>">More ></a>
                    </div>
                    <div class="col-6 img">
                       <?php echo get_the_post_thumbnail(get_the_ID(),'room_photo'); ?>
                    </div>
                </div>
				<?php $count = $rooms->found_posts;
				   		if($i<$count and ($i%2) === 0){
					    echo '</div><div class="line cf">';
					}?>
              <?php endwhile; endif; ?>
                
            </div>
        </article>

        <!-- Pagination -->
		<article class="pagination">
			<?php $big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $rooms->max_num_pages,
					'prev_next' => false,
					'next_text' => false
				) ); 
?>
	    </article>
	

<?php
get_footer();