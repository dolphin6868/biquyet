<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (is_sticky() && is_home() && !is_paged()) : ?>
        <div class="featured-post">
            <?php _e('Featured post', 'twentytwelve'); ?>
        </div>
    <?php endif; ?>
    <header class="entry-header">
        <?php if (is_single()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'twentytwelve'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
        <?php endif; // is_single() ?>
        <div class="entry-meta">
            <?php twentytwelve_entry_meta(); ?>
            <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
            <?php if (is_singular() && get_the_author_meta('description') && is_multi_author()) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
                <div class="author-info">
                    <div class="author-avatar">
                        <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('twentytwelve_author_bio_avatar_size', 68)); ?>
                    </div><!-- .author-avatar -->
                    <div class="author-description">
                        <h2><?php printf(__('About %s', 'twentytwelve'), get_the_author()); ?></h2>
                        <p><?php the_author_meta('description'); ?></p>
                        <div class="author-link">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">get_the_author()</a>
                        </div><!-- .author-link	-->
                    </div><!-- .author-description -->
                </div><!-- .author-info -->
            <?php endif; ?>
        </div><!-- .entry-meta -->

        <?php if (comments_open()) : ?>
            <div class="creation-info">
                <span class="on">Đăng vào lúc <?php the_modified_time('G:i'); ?> ngày <?php the_modified_date('j/n/Y'); ?></span> | &nbsp;<a class="comments-link" href="<?php the_permalink(); ?>#comments"><?php echo get_comments_number(get_the_ID()); ?> bình luận</a>
            </div>
        <?php endif; // comments_open() ?>
        <?php the_post_thumbnail(); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if (is_page()) {
            the_content();
        } elseif (is_single()) {
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve'));
        } else {
            the_excerpt();
        }
        ?>
        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
    </div><!-- .entry-content -->

    <?php if (is_single()): ?>
        <!--<div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet"></a><a class="addthis_button_google_plusone" g:plusone:size="medium"></a></div>-->
    <?php endif; ?>
</article><!-- #post -->
