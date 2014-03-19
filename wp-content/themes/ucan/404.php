<?php
//    require_once 'zend_auth.php';
?>

<?php get_header(); ?>

<div id="front-content-box">
    <div id="front-content">
        <div id="content-wrapper">
            <div id="blog-content">
                <div id="primary" class="site-content">
                    <div id="content" role="main">

                        <article id="post-0" class="post error404 no-results not-found">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php _e('Đường link không tồn tại.', 'twentytwelve'); ?></h1>
                            </header>

                            <div class="entry-content">
                                <p><?php _e('Chúng tôi không thể tìm thấy đường link bạn yêu cầu. Chức năng tìm kiếm có thể sẽ giúp bạn.', 'twentytwelve'); ?></p>
                                <?php get_search_form(); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-0 -->

                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
            <div id="category-list"><?php include 'right.php'; ?></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>