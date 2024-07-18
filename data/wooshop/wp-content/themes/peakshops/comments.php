<?php
/*
-----------------------------------------------------------------------------------*/
/*
	Begin processing our comments
/*
-----------------------------------------------------------------------------------*/
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>
<!-- Start #comments -->
<div id="comments">
	<h4><?php comments_number( esc_html__( '0 Comments for', 'peakshops' ), esc_html__( '1 Comment', 'peakshops' ), esc_html__( '% Comments', 'peakshops' ) ); ?> “<?php the_title(); ?>”</h4>
	<div class="comments-container">
		<?php if ( have_comments() ) : ?>
			<ul class="commentlist cf">
				<?php
				wp_list_comments(
					array(
						'type'        => 'comment',
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => 56,
					)
				);
				?>
			</ul>

			<?php the_comments_navigation(); ?>

			<?php
			else :
				if ( ! comments_open() ) :
					?>
					<p class="nocomments"><?php esc_html_e( 'Comments are closed', 'peakshops' ); ?></p>
					<?php
				endif;
			endif; // end have_comments()
			?>
		<?php
			// Comment Form
			$commenter = wp_get_current_commenter();
			$req       = get_option( 'require_name_email' );
			$aria_req  = ( $req ? ' aria-required="true" data-required="true"' : '' );

			$defaults = array(
				'fields'               => apply_filters(
					'comment_form_default_fields',
					array(
						'author' => '<div class="thb-comment-form-field"><label>' . esc_html__( 'Name', 'peakshops' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="full"/></div>',
						'email'  => '<div class="thb-comment-form-field"><label>' . esc_html__( 'E-mail', 'peakshops' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="full" /></div>',
						'url'    => '<div class="thb-comment-form-field"><label>' . esc_html__( 'Website', 'peakshops' ) . '</label><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" class="full" /></div>',
					)
				),
				'comment_field'        => '<label>' . esc_html__( 'Comment', 'peakshops' ) . '</label><textarea name="comment" id="comment"' . $aria_req . ' rows="3" cols="58" class="full"></textarea>',
				'must_log_in'          => '<p class="must-log-in">' . sprintf(
					wp_kses(
						/* translators: %s: Login link */
						__( 'You must be <a href="%s">logged in</a> to post a comment.', 'peakshops' ),
						array(
							'a' => array(
								'href'  => array(),
								'title' => array(),
							),
						)
					),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',
				'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
					wp_kses(
						__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'peakshops' ),
						array(
							'a' => array(
								'href'  => array(),
								'title' => array(),
							),
						)
					),
					admin_url( 'profile.php' ),
					$user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',
				'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'peakshops' ) . '</p>',
				'comment_notes_after'  => '',
				'id_form'              => 'form-comment',
				'id_submit'            => 'submit',
				'title_reply'          => esc_html__( 'Leave a Reply', 'peakshops' ),
				/* translators: %s: Author name */
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'peakshops' ),
				'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
				'title_reply_after'    => '</h4>',
				'cancel_reply_link'    => esc_attr__( 'Cancel reply', 'peakshops' ),
				'class_submit'         => 'submit btn',
				'label_submit'         => esc_attr__( 'Submit Comment', 'peakshops' ),
			);
			comment_form( $defaults );
			?>
	</div> <!-- .comments-container -->
</div>
<!-- End #comments -->
