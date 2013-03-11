<!-- Begin Comments -->
<div>
	<?php /* Run some checks for bots and password protected posts */ ?>
	<?php
    $req = get_option('require_name_email'); // Checks if fields are required.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
	?>
                
    <div class="alert-box warning nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'Foundation') ?></div>
            
</div>

<?php
        return;
    endif;
endif;
?>
<!-- End Comments -->

<?php if ( have_comments() ) : ?>
 
<?php
	$ping_count = $comment_count = 0;
	foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
 
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
 <!-- Begin Comments List -->
<div id="comments-list" class="comments">
	<h4 class="subheader"><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'Foundation') : __('<span>One</span> Comment', 'Foundation'), $comment_count) ?></h4>
 
	<!-- Begin Navigation (Above) -->
	<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
		<div id="comments-nav-above" class="comments-navigation">
			<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	    </div>
	<?php endif; ?>       
	<!-- End Navigation -->            
	 
	<ol>
		<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
	</ol>
	 
	<!-- Begin Navigation (Below) -->
	<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
		<div id="comments-nav-below" class="comments-navigation">
	    	<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	    </div>
	<?php endif; ?>
	<!-- End Navigation (Below) -->
                
</div>
<!-- End Comments List -->


<?php endif; /* if ( $comment_count ) */ ?>
 
<?php /* If there are trackbacks(pings), show the trackbacks  */ ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
 
	<div id="trackbacks-list" class="comments">
                    <h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'Foundation') : __('<span>One</span> Trackback', 'Foundation'), $ping_count) ?></h3>
 
<?php /* An ordered list of our custom trackbacks callback, custom_pings(), in functions.php   */ ?>
                    <ol>
<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
                    </ol>             
 
                </div><!-- #trackbacks-list .comments -->           
 
<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
 
<?php /* If comments are open, build the respond form */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
                <div>
                <fieldset>
                <legend>
                <h4 class="subheader">
                	<?php comment_form_title( __('Post a Comment', 'Foundation'), __('Post a Reply to %s', 'Foundation') ); ?>
                </h4>
                </legend>
                 
 
                    <div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    <p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'Foundation'),
                    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
 
<?php else : ?>

                    <div class="formcontainer">   
 

                        <form class="nice" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
 
<?php if ( $user_ID ) : ?>
                            <p id="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'Foundation'),
                                get_option('siteurl') . '/wp-admin/profile.php',
                                wp_specialchars($user_identity, true),
                                wp_logout_url(get_permalink()) ) ?></p>
 
<?php else : ?>
 
                            <p id="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'Foundation') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'Foundation') ?></p>
 
              <div id="form-section-author" class="form-section">
                                <div class="form-label"><label for="author"><?php _e('Name', 'Foundation') ?><?php if ($req) _e('<span class="required">*</span>', 'Foundation') ?></label></div>
                                <div class="form-input"><input class="nice" id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
              </div><!-- #form-section-author .form-section -->
 
              <div id="form-section-email" class="form-section">
                                <div class="form-label"><label for="email"><?php _e('Email', 'Foundation') ?><?php if ($req) _e('<span class="required">*</span>', 'Foundation') ?></label></div>
                                <div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
              </div><!-- #form-section-email .form-section -->
 
              <div id="form-section-url" class="form-section">
                                <div class="form-label"><label for="url"><?php _e('Website', 'Foundation') ?></label></div>
                                <div class="form-input"><input class="nice" id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
              </div><!-- #form-section-url .form-section -->
 
<?php endif /* if ( $user_ID ) */ ?>
 
              <div id="form-section-comment" class="form-section">
                                <div class="form-label"><label for="comment"><?php _e('Comment', 'Foundation') ?></label></div>
                                <div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
              </div><!-- #form-section-comment .form-section -->
 
              <div id="form-allowed-tags" class="form-section">
                  <p><span><?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'Foundation') ?></span> <code><?php echo allowed_tags(); ?></code></p>
              </div>
 
<?php do_action('comment_form', $post->ID); ?>
 
                            <div class="form-submit"><button class="nice button" name="submit" tabindex="7"><?php _e('Post Comment', 'Foundation') ?></button><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
 
<?php comment_id_fields(); ?>  
 
<?php /* Just … end everything. We're done here. Close it up. */ ?>  
 
                        </form><!-- #commentform -->
                   
                    </div><!-- .formcontainer -->
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
                </div><!-- #respond -->
                </fieldset>
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
            </div><!-- #comments -->