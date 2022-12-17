<?php
/**
* Template name:Homepage Template
*/
 get_header();?>

<p>template-home</p>
        <!-- About Us -->
        <article class="about-us-home cf">
            <aside class="about cf">
                <div class="img">
				         <img class="" src=" <?php echo get_template_directory_uri()?>/layouts/images/home/about.jpg'" alt="logo"><!--мое врем.подкл.-->
                   <?php if(get_post_meta(get_the_ID(), 'bebe_about_photo', true)){ ?>
				         <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_photo', true)); ?>" alt=""/>
                    <?php } ?>
                </div>
                <div class="text">
                     <?php if(get_post_meta(get_the_ID(), 'bebe_about_title', true)){ ?>
                        <h2><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_about_title', true)); ?></h2>
                    <?php } ?>
					
                    <p>
                        <?php echo get_post_meta(get_the_ID(), 'bebe_about_desc', true); ?>
                    </p>
					
                     <?php if(get_post_meta(get_the_ID(), 'bebe_about_link', true)) {?>
					   <a class="more" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_link', true)); ?>">More ></a>
					   
                     <?php } ?>
				</div>
            </aside>
            <aside class="list">
                <ul>
                    <li class="cf">
                        <div class="icon i1"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_1', true)); ?></a>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_description_1', true)); ?></p>
                    </li>
                    <li class="cf">
                        <div class="icon i2"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_2', true)); ?></a>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_description_2', true)); ?></p>
                    </li>
                    <li class="cf">
                        <div class="icon i3"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_3', true)); ?></a>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_description_3', true)); ?></p>
                    </li>
                </ul>
            </aside>
            </article>

        <!------------------------- Recent From Blog ------------------------>
        <article class="recent-blog-home">
            <h2 class="title"><?php esc_html_e('Recent from blog','bebe'); ?></h2>

            <div class="items cf">
               <?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '4'
				);

				$home_posts = new WP_Query($args); //https://developer.wordpress.org/reference/classes/wp_query/
				
				 while ( $home_posts->have_posts() ) : $home_posts->the_post(); ?>
				   <div class="col-3">
						<a href="<?php the_permalink(); ?>">
							<?php echo the_post_thumbnail(get_the_ID(),'post-front'); ?>
							<!--<?php the_post_thumbnail(get_the_ID(),'post-front'); ?>--можно и так-->
						</a>
						<div class="info cf">
							<div class="time"><?php echo get_the_date(); ?></div>
							<a href="<?php the_permalink(); ?>" class="comments"><?php echo comments_number(); ?></a>
						</div>
						<div class="text">
							<a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
							<p>
								<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
				
				
				<?php endwhile;

				wp_reset_postdata(); ?>
		    </div>
        </article>
		
    </section>
     
    <!------------------------- Photo Gallery --------------------------------------------->
    <div class="center-align photo-gallery">
        <div class="top">
            <h2>Photo Gallery</h2>
        </div>

        <div id="photo-gallery">
		
		  <?php
			$args = array(
				'post_type' => 'gallery',
				'posts_per_page' => '10'
			);

			$home_galleries = new WP_Query($args); ?>
		
            <ul class="slides">
                <!--------я сделал не через if else а через  switch ------->
                <li>
                    <div class="items1">
					<?php 
					   $i=0;
					   while ( $home_galleries->have_posts() ) : $home_galleries->the_post();$i++;
					      switch ($i) {
								case 1 :case 6 :?>
									<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'gallery_one'); ?></a><?php
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
										</li>

										<li>
								    <div class="items2">
									
								<?php	break;
							}                         
						endwhile;

				wp_reset_postdata(); ?>
                    </div>
            </ul>
        </div>

        <div class="back"></div>
        <div class="bottom"></div>
        <div class="anchor"></div>
    </div>  

<?php get_footer();