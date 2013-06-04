
<?php 
    get_header(); 
?>

<div id="front-content-box">
    <div id="front-content">
        <div id="content-wrapper">
            <div id="blog-content">
                <div id="primary" class="site-content">
                    <div id="content" role="main">

                        <?php while (have_posts()) : the_post(); ?>

                            <?php //get_template_part('content', get_post_format()); ?>
                            <?php include 'content.php'; ?>
                            
                            <nav class="nav-single">
                                <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'twentytwelve') . '</span> %title'); ?></span>
                                <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'twentytwelve') . '</span>'); ?></span>
                            </nav><!-- .nav-single -->

                            <?php comments_template('', true); ?>

                        <?php endwhile; // end of the loop. ?>

                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
            <div id="category-list"><?php include 'right.php'; ?></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>