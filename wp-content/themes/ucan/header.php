<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#"> 
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php
            /* Print the <title> tag based on what is being viewed. */
            global $page, $paged;
            wp_title('|', true, 'right');

            // Add the blog name.
            bloginfo('name');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";

            // Add a page number if necessary:
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page));
            ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link href="//ucan.vn/img/global/favicon.png" rel="shortcut icon" type="image/x-icon">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php
        //  wp_head(); is required.
        wp_head();
        ?>
        <script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/jquery.js"></script>
        <script type="text/javascript"
        src="<?php bloginfo("template_url"); ?>/js/site.js"></script>
    </head>
    <body>
        <div id="fb-root"></div>
        <script src="http://connect.facebook.net/en_US/all.js"></script>
        <script>
            FB.init({
                appId: '261121160673907',
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true // parse XFBML
            });
        </script> 
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div id="front-bluebar">
            <div id="front-bluebar-placeholder">
                <a href="/">
                    <img alt="ucan-logo" id="ucan-logo" src="//ucan.vn/shark/public/img/global/logo.png"></a>
                <div id="ucan-version">alpha</div>
                <div id="front-bluebar-content">
                    <div id="front-bluebar-links">
                        <a href="/thu-vien">Blog</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="/gioi-thieu">Giới thiệu</a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                        <a href="/gop-y">Liên hệ</a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                        <a href="#">Giúp đỡ</a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                        <a href="#">Theo chúng tôi trên</a> 
                    </div>
                    <div id="front-bluebar-social-icons">
                        <a href="https://www.facebook.com/englishlachuyennho"><img alt="facebook-logo" class="front-bluebar-social-icon" src="//ucan.vn/shark/public/img/global/facebook.png"></a>
                        <img alt="twitter-logo" class="front-bluebar-social-icon" src="//ucan.vn/shark/public/img/global/twitter.png">
                    </div>
                </div>
            </div>
        </div>
        <div id="front-menu">
            <div id="front-menu-placeholder">
                <ul id="front-menu-list">
                    <li class="front-menu-item home-menu-item"><a href="/index"><img src="/shark/public/img/global/home.png" width="16" /></a></li>
                    <li class="front-menu-item"><a href="/khoa-hoc">Khóa học</a></li>
                    <li class="front-menu-item"><a href="/bai-hoc">Bài học</a></li>
                    <li class="front-menu-item"><a href="/thu-vien">Thư viện</a></li>
                    <li class="front-menu-item"><a href="/bi-quyet">Bí quyết</a></li>
                    <li class="front-menu-item has-sub-menu">
                                                                        <a href="/xep-hang-theo-uc">Xếp hạng</a>
                                                                            <div class="submenu-bg">
                                <ul class="submenu1">
                                                                                                                                                                        <li class="separate">
                                                    <a href="/xep-hang-theo-uc">Xếp hạng theo Uc</a>
                                                                                                                                                                                                                                                                </li><li class="separate">
                                                    <a href="/xep-hang-theo-huy-chuong">Xếp hạng huy chương</a>
                                                                                                                                                            </li></ul>
                            </div>
                                                            </li>
                </ul>
                <ul id="front-menu-login-register">
                    <li id="front-menu-login"><a href="/dang-nhap">Đăng nhập</a></li>
                    <li id="front-menu-register"><a href="/dang-ky">Đăng ký</a></li>
                </ul>
            </div>
        </div>