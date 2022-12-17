<?php get_header(); ?>

<p>single-gallery.php</p>

     <!-- Gallery ------>
	 <?php while ( have_posts() ) : the_post(); ?>
        <article class="gallery-opened">

            <!-- Slider -->
			
                <?php $gallery_slider = get_post_meta(get_the_ID(), 'ale_gallery_id', true);?>
			 
				 <?php if($gallery_slider){ ?>
				 
					<div id="gallery-slider">
						<ul class="slides">
						 <?php foreach($gallery_slider as $slide){ ?>
							<li>
							   <?php echo wp_get_attachment_image($slide, 'full'); ?>
							</li>
						 <?php } ?>	
						</ul>
					</div>
				 <?php } ?>
          
          

            <!-- Comments -->
            <h2 class="title"><?php the_title(); ?></h2>

               <?php the_content(); ?>
           
            <div class="dotted-line"></div>

            <!-- -->
            <div class="info cf">
                <h4 class="categ">Date: <?php echo get_the_date(); ?> / Category: <?php $gallerycats = get_the_terms(get_the_ID(), 'gallery_category'); foreach($gallerycats as $categ){echo $categ->name;} ?></h4>
            <div class="share">
                    <h4>Share:  </h4>
                    <ul>
                        <li class="facebook"><a onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false" href="<?php echo ale_get_share('fb',get_the_permalink(),get_the_title()); ?>"></a></li>
						<li class="pinterest"><a onclick="window.open(this.href, 'Share on Pinteres', 'width=600,height=300'); return false" href="<?php echo ale_get_share('pin',get_the_permalink(),get_the_title()); ?>"></a></li>
						<li class="twitter"><a onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false" href="<?php echo ale_get_share('twi',get_the_permalink(),get_the_title()); ?>"></a></li>
					</ul>
                </div>
            </div>

        </article>
	<?php endwhile;	
 get_footer();