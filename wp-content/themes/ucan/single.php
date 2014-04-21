
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