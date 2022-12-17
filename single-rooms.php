<?php get_header();?>

<!--Название должно совпадать с типом поста rooms. single-rooms а не single-room!!!!!!!!!!!!-->

<p> single-rooms</p>

    <!-- Rooms Opened -->
<?php	while ( have_posts() ) : the_post(); ?>   
    <article class="rooms-opened cf">
		 <?php $room_slider = get_post_meta(get_the_ID(), 'ale_gallery_id', true);?>
		    <?php if($room_slider){ ?>
				<div id="room-slider">
					<ul class="slides">
						<?php foreach($room_slider as $slide){ ?>
							<li>
							   <?php echo wp_get_attachment_image($slide, 'full'); ?> <!--здесь задан полн.размер фото, но можно задать и свой через add_image_size в function.php-->
							</li>
						 <?php } ?>	
					</ul>
				</div>
            <?php } ?>
                <?php the_content(); ?>

    </article>
          <?php endwhile; ?>
		  
        <!-- Other Rooms -->
    <article class="rooms opened">
		
	  <?php $args = array(
	          'post_type'      => 'rooms',
	          'posts_per_page' => 2,
			  'orderby'        => 'rand',// будет выв. случ.посты. иначе 2 последних!!!
	        );
            $similar_rooms = new WP_Query($args);?>
            <h2 class="title">Other Rooms</h2>

            <div class="line cf">
				<?php if($similar_rooms->have_posts()){while ($similar_rooms->have_posts() ) : $similar_rooms->the_post(); ?>
					<div class="col-6">
						<div class="col-6 text">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						        <?php the_excerpt(); ?>
							<a class="more" href="<?php the_permalink(); ?>">More ></a>
						</div>
						<div class="col-6 img">
							<?php echo get_the_post_thumbnail(get_the_ID(),'room_photo'); ?>
						</div>
					</div>

				 <?php endwhile;} ?>
            </div>

    </article>

 
 <?php get_footer();