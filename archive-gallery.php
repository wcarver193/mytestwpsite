<?php get_header(); ?>
<p>archive-gallery.php</p>
  <article class="gallery">
     <div class="items1 cf">
       <?php 
	   global $query_string; //$query_string содерж. post_type=gallery
	   
	   query_posts($query_string . '&posts_per_page=10');// в $query_string мы добавл. posts_per_page=10
	   //что-бы  на стр. вывод.10 постов , а не заданное в админке кол-во в "чтение"
			    $i=0;
				while ( have_posts() ) : the_post(); $i++;
					switch ($i) {
						case 1 :case 6 :?>
							<a href="<?php the_permalink(); ?>">
							   <?php echo get_the_post_thumbnail(get_the_ID(),'gallery_one'); ?></a><?php
							break;
						case 2: case 7: case 10:?>
							<a href="<?php the_permalink(); ?>">
							   <?php echo get_the_post_thumbnail(get_the_ID(),'gallery_two'); ?></a><?php
							break;
						case 3: case 4:  case 8: case 9:?>
							<a href="<?php the_permalink(); ?>">
							   <?php echo get_the_post_thumbnail(get_the_ID(),'gallery_three'); ?></a><?php
							break;
						case 5:?>
							<a href="<?php the_permalink(); ?>">
							   <?php echo get_the_post_thumbnail(get_the_ID(),'gallery_two'); ?></a>
							</div>

                        <div class="items2 cf">
									
			<?php	break;
							}                         
					endwhile;?>
     </div>
  </article>
				<?php wp_reset_postdata(); ?>         
           
           
		 <!-- Pagination -->
        <article class="pagination gall">
		 <?php
				$settings = array('prev_next' => false );
				echo paginate_links( $settings );
    	  ?>
		</article>
<?php get_footer();