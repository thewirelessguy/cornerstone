<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to cornerstone_comment() which is
 * located in the functions.php file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
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

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                printf( // WPCS: XSS OK.
                    esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'cornerstone' ) ),
                    number_format_i18n( get_comments_number() ),
                    '<span>' . get_the_title() . '</span>'
                );
            ?>
        </h2><?php // .comments-title ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <nav id="comment-nav-above" class="navigation comment-navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cornerstone' ); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cornerstone' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cornerstone' ) ); ?></div>

            </div><?php // .nav-links ?>
        </nav><?php // #comment-nav-above ?>
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
            ?>
        </ol><?php // .comment-list ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <nav id="comment-nav-below" class="navigation comment-navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cornerstone' ); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cornerstone' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cornerstone' ) ); ?></div>

            </div><?php // .nav-links ?>
        </nav><?php // #comment-nav-below ?>
        <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cornerstone' ); ?></p>
    <?php
    endif;

    comment_form(array('class_submit'=>'button')); ?>

</div><?php // #comments ?>