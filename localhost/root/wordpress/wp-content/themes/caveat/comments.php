<?php // Check if password protected
if ( post_password_required() ) {
	return;
} ?>
<?php $comments_by_type = separate_comments( $comments ); ?>


<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>

<!--Comments Section-->
<div class="entry-comments" id="comments">
	<h3 id="comment-title"><?php comments_number( __( '0 Comments', 'caveat' ), __( '1 Comment', 'caveat' ), __( '% Comments', 'caveat' ) ); ?></h3>      
	<?php if ( ! comments_open() && get_comments_number() != '0' ) : ?>
	<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'caveat' ) ?></p>

	<?php else : ?>
	    <ol class="comment-list">
	        <?php wp_list_comments( 'type=comment&callback=caveat_comment' ); ?>
	    </ol>
	    <?php paginate_comments_links() ?>
	<?php endif; ?>     
</div>

<?php elseif ( ! comments_open() && get_comments_number() != '0' && post_type_supports( get_post_type(), 'comments' ) ) : ?>

<p><?php esc_html_e( 'Comments are closed.', 'caveat' ) ?></p>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<!--Leave Response-->
<?php
$fields = array(
	'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'caveat' ), wp_login_url( apply_filters( 'the_permalink', esc_url( get_permalink() ) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>', 'caveat' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url( get_permalink() ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'title_reply'          => __( 'Leave a Comment', 'caveat' ),
	'title_reply_to'       => __( 'Leave a Comment to %s', 'caveat' ),
	'cancel_reply_link'    => __( 'Cancel Comment', 'caveat' ),
	'label_submit'         => __( 'Submit Comment', 'caveat' ),
	);
?>           
<?php comment_form( $fields ); ?>
<?php endif;
