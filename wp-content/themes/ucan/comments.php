<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
    return;
?>

<div id="comment-tabs">
    <a data-id="uc" href="#">Bình luận trên ucan</a>
    <a data-id="fb" href="#">Bình luận trên facebook</a>
</div>
<div id="fb-comment-tab">
   <?php  //echo do_shortcode('[fbcomments]'); ?>
</div>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <ol class="commentlist">
            <?php wp_list_comments(array('callback' => 'twentytwelve_comment', 'style' => 'ol')); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through   ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
                <h1 class="assistive-text section-heading"><?php _e('Comment navigation', 'twentytwelve'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentytwelve')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentytwelve')); ?></div>
            </nav>
        <?php endif; // check for comment navigation   ?>

        <?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
        if (!comments_open() && get_comments_number()) :
            ?>
            <p class="nocomments"><?php _e('Comments are closed.', 'twentytwelve'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments()  ?>
    <?php comment_form(); ?>
</div>