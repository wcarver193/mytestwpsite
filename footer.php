<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bebe
 */

?>
 <?php global $bebe_options; ?> <!--вызыв.нашу глоб.перем-->
</section>
 <!-- Footer Section -->
    <footer>
        <section>
            <div class="center-align cf">

                <!-- Some Info  -->
                <div class="col-6 float-left">
                    <div class="col-5 information">
                        <h3><?php esc_html_e('Information', 'bebe');?></h3>
                        <!--<a href="">About BEBE</a>
                        <a href="">Privacy Policy</a>
                        <a href="">Delivery</a>
                        <a href="">Terms & Conditions</a>-->
						 <?php
							wp_nav_menu( array(
								'theme_location' => 'menu-footer',
								'menu_id'        => 'footer-menu',
								'menu_class'     => 'cf',
							) );
							?>
                    </div>
                    <div class="col-7 contacts">
                        <h3><?php esc_html_e('Contacts', 'bebe');?></h3>
						<?php if($bebe_options['bebephone']){ ?><span class="tel"><strong><?php echo esc_attr($bebe_options['bebephone']); ?></strong></span><?php } ?>
						<?php if($bebe_options['bebeemail']){?><span><a href="mailto:<?php echo esc_attr($bebe_options['bebeemail']); ?>"><?php echo esc_attr($bebe_options['bebeemail']); ?></a></span><?php } ?>
						<?php if($bebe_options['bebeaddress']){?><span><?php echo esc_attr($bebe_options['bebeaddress']); ?></span><?php } ?>                       
                      
					  <ul>
						<?php if($bebe_options['fb']){ ?><li class="facebook"><a href="<?php echo esc_url($bebe_options['fb']); ?>"></a></li><?php } ?>
						<?php if($bebe_options['insta']){ ?><li class="instagram"><a href="<?php echo esc_url($bebe_options['insta']); ?>"></a></li><?php } ?>
						<?php if($bebe_options['pin']){ ?><li class="pinterest"><a href="<?php echo esc_url($bebe_options['pin']); ?>"></a></li><?php } ?>
						<?php if($bebe_options['twi']){ ?><li class="twitter"><a href="<?php echo esc_url($bebe_options['twi']); ?>"></a></li><?php } ?>
						<?php if($bebe_options['yt']){ ?><li class="youtube"><a href="<?php echo esc_url($bebe_options['yt']); ?>"></a></li><?php } ?>
					  </ul>
                    </div>
                </div>

                <!-- Form -->
                <div class="form float-right">
					<?php 
					   if(get_the_title() !== 'Contact Us'){
                             if($bebe_options['bebeformshortcode']){ echo do_shortcode($bebe_options['bebeformshortcode']); }
					   }
					   ?>
				
				  
                
				</div>

            </div>

            <!-- Bottom Line -->
            <div class="bottom-line">
                <a class="top" href="#top"><?php esc_html_e('TOP', 'bebe');?></a>

                <div class="center-align cf">
                    <div class="left">&copy;<?php echo $bebe_options['copyrights']; ?></div>
                    <div class="right">
						<?php if($bebe_options['bebefooterlogo']['url']){ ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url($bebe_options['bebefooterlogo']['url']); ?>" class="footer_logo" alt />
							
							</a>
						<?php } ?>
				    </div>
                </div>
            </div>

        </section>


        <!-- Background Awesomeness -->
        <div id="footer-white"></div>
        <div id="footer-yellow"></div>

        <!-- Clouds -->
        <div id="footer-cloud1"></div>
        <div id="footer-cloud2"></div>

        <!-- Birds -->
        <div id="footer-bird1"></div>
        <div id="footer-bird2"></div>
        <div id="footer-bird3"></div>

        <!-- Waves -->
        <div class="waves">
            <div id="footer-wave1"></div>
            <div id="bui"></div>
            <div id="footer-wave2"></div>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
