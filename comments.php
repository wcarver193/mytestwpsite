<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bebe
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!---------------------- Comments---------------------------------->
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		 
		  <h2 class="title"><?php esc_html_e('Comments', 'bebe');?></h2>
		 
		<?php the_comments_navigation(); ?>
         <div class="comments">
		   <?php
			   wp_list_comments('callback=bebe_comment&end-callback=bebe_comment_close');// вызыв.callback функцию bebe_comment из function.php
			?>
		</div><!-- .comment-list -->

<?php
//https://gnatkovsky.com.ua/kak-izmenit-nadpis-dobavit-kommentarij-v-wordpress.html
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bebe' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().?>
	
<?php
  // фильтр для перемещ. textarea выше inputов https://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/
    function bebe_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
		}
 
    add_filter( 'comment_form_fields', 'bebe_move_comment_field_to_bottom' );
  	

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
       
		'author' => '<div class="col-4"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="Type your name" /></div>',

		'email' => '<div class="col-4"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="Type your email" /></div>',

		'url' => '<div class="col-4"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="Type your website" /></div>',

		);

	$args = array(
		'label_submit'      => ' ', // надпись на кнопке submit
		'fields' => apply_filters( 'comment_form_default_fields', $fields),
		'title_reply' => ' ',
        'comment_notes_before' => '<p>&nbsp</p>',
		'comment_field' =>  '<textarea id="comment" name="comment" aria-required="true" placeholder="Type your comment">' . '</textarea>',
        'title_reply_before' => '<div class="respond"><div class="top"> <h2>Respond</h2> </div>', //добавл. перед формой эти дивы, а к ним привяз.оранжев. оформл. формы
	 );

	comment_form($args);
	?>
            </div>
</div><!-- #comments -->
