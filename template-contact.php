<?php
/**
* Template name:Contact Page
*/
 get_header();?>
 <p>template-contact</p>
       <?php while ( have_posts() ) : the_post(); ?>
          <!-- Contacts -->
        <article class="contacts">

            <div class="info-line cf">
                <div class="map">
                   	<?php

					$address = get_post_meta(get_the_ID(),'bebe_address',true);
					$api_key_googlemap = get_post_meta(get_the_ID(),'bebe_googleapi',true);

					//echo do_shortcode('[pw_map address="'.esc_attr($address).'" width="490px" height="340px" key="'.esc_attr($api_key_googlemap).'"]');
				    echo do_shortcode('[pw_map address="New York City" width="490px" height="340px" key="YOUR API KEY"]');
					?>
				
				
				</div>                 

               <?php the_content(); ?>

                <div class="contactos">
                    <?php if(get_post_meta(get_the_id(), 'bebe_address', true)){ ?>
					<div class="adress">
                        <div class="icon"></div>
                        <h3><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_address_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_address', true));?> </p>
                    </div>
					<?php }
					 if(get_post_meta(get_the_id(), 'bebe_phone', true)){ ?>
                    <div class="phone">
                        <div class="icon"></div>
                        <h3><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_phone_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_phone', true));?> </p>
                    </div>
					<?php }
					 if(get_post_meta(get_the_id(), 'bebe_email', true)){ ?>
                    <div class="email">
                        <div class="icon"></div>
                         <h3><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_email_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_id(), 'bebe_email', true));?> </p>
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- -->

            <div class="respond">
                <div class="top"> <h2>Get in touch with us</h2> </div>

                <form class="cf" method="post" id="respond-form">
                    <!--<?php echo do_shortcode('[contact-form-7 id="106" title="Contact Page"]'); ?>-->
                    <?php echo do_shortcode(get_post_meta(get_the_id(), 'bebe_contactformshortcode', true)); ?>
                   
                </form>

            </div>

        </article>
	<?php endwhile; ?>
<?php get_footer();?>