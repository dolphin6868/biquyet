<?php
get_sidebar();

$args = array(
    'orderby' => 'comment_count',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'caller_get_posts' => 1
);
$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
    ?>
    <h3 id="hot-posts-title">Bài viết nổi bật</h3>
    <ul id="hot-posts">
        <?php
        while ($my_query->have_posts()) :
            $my_query->the_post();
            ?>
            <li class="item"><a class="hot-post" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php
        endwhile;
        ?>
    </ul>
    
    <h3 id="english-is-zero">Tiếng Anh là chuyện nhỏ</h3>
    <p class="fanpage-message">Hãy cập nhật các bài học mới nhất qua facebook trên fanpage của chúng tôi.</p>
    <div class="fb-like-box" data-href="http://www.facebook.com/englishlachuyennho" data-width="290" data-show-faces="true" data-border-color="#E8E8E8" data-stream="false" data-header="true"></div>
    
    <?php
}
wp_reset_query();
?>