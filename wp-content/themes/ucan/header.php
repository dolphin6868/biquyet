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
                <a href="/shark/public/">
                    <img alt="ucan-logo" width="116" height="32" id="ucan-logo" src="/shark/public/img/global/logo.png"></a>
                <!--<div id="ucan-version">alpha</div>-->
                <div id="front-bluebar-content">
                    <div id="front-bluebar-links">
                        <!--<a class="" href="">Đăng kí mua</a>-->
                        <div class="buy-card">
                            <a href="" class="buy">Thẻ học <span>▼</span></a>
                            <ul>
                                <li><a href="/shark/public/payment">Mua thẻ học</a></li>
                                <li><a href="/shark/public/payment/index/active-ucan-card">Nạp thẻ</a></li>
                                <li class="contact">Tư vấn và đặt thẻ qua điện thoại: <span class="number">043.759.3225</span> (8h30-18h00)<span class="number"> 0969.126.406</span> (sau 18h)</li>
                            </ul>
                        </div>

                        <span class="spliter">|</span>
                        <a href="/shark/public/user/login">Đăng nhập</a>
                        <span class="spliter">|</span>
                        <a href="/shark/public/user/register">Đăng kí</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="front-menu">
            <div id="front-menu-placeholder">
                <ul id="front-menu-list">
                    <li class="front-menu-item home-menu-item">
                        <a href="/shark/public/"><img src="/shark/public/img/global/home.png" width="16"></a>
                    </li>

                    <li class="front-menu-item has-sub-menu ">
                        <a href="/shark/public/khoa-hoc/">Khóa học</a>
                        <div class="submenu-bg">
                            <ul class="submenu1">
                                                                                    <li><a href="/shark/public/khoa-hoc/tieng-anh-giao-tiep"> Tiếng Anh giao tiếp</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-co-ban-1.html">Tiếng Anh Cơ bản</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-trung-cap-2.html">Tiếng Anh trung cấp</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-nang-cao-3.html">Tiếng Anh nâng cao</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-cao-cap-11.html">Tiếng Anh cao cấp</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/tieng-anh-pho-thong"> Tiếng Anh phổ thông</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-9-29.html">Tiếng Anh phổ thông lớp 9</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-11-7.html">Tiếng Anh phổ thông lớp 11</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-12-8.html">Tiếng Anh phổ thông lớp 12</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-10-9.html">Tiếng Anh phổ thông lớp 10</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-6-23.html">Tiếng Anh phổ thông lớp 6</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-7-26.html">Tiếng Anh phổ thông lớp 7</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-pho-thong-lop-8-27.html">Tiếng Anh phổ thông lớp 8</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/tieng-anh-thuong-mai"> Tiếng Anh thương mại</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tieng-anh-thuong-mai-4.html">Tiếng Anh Thương mại</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/tu-vung-tieng-anh"> Từ vựng tiếng Anh</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-co-ban-level-3-14.html">Từ vựng cơ bản level 3</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-co-ban-level-1-15.html">Từ vựng cơ bản level 1</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-co-ban-level-2-16.html">Từ vựng cơ bản level 2</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-trung-cap-level-1-20.html">Từ vựng trung cấp - Level 1</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-trung-cap-level-2-21.html">Từ vựng trung cấp level 2</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-trung-cap-level-3-22.html">Từ vựng trung cấp Level 3</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-nang-cao-level-1-24.html">Từ vựng nâng cao level 1</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-nang-cao-level-2-25.html">Từ vựng nâng cao level 2</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/tu-vung-nang-cao-level-3-28.html">Từ vựng nâng cao level 3</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/luyen-nghe-tieng-anh"> Luyện nghe tiếng Anh</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/khoa-hoc-luyen-nghe-co-ban-17.html">Khóa học luyện nghe cơ bản</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/khoa-hoc-luyen-nghe-trung-cap-31.html">Khóa học luyện nghe trung cấp</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/khoa-hoc-luyen-nghe-nang-cao-34.html">Khóa học luyện nghe nâng cao</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/ngu-phap-tieng-anh"> Ngữ pháp tiếng Anh</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/ngu-phap-co-ban-level-1-12.html">Ngữ pháp cơ bản level 1</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/ngu-phap-co-ban-level-2-10.html">Ngữ pháp cơ bản level 2</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/ngu-phap-co-ban-38.html">Ngữ pháp cơ bản</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/luyen-doc-tieng-anh"> Luyện đọc tiếng Anh</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/khoa-hoc-luyen-doc-level-1-13.html">Khóa học luyện đọc Level 1</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/khoa-hoc-luyen-doc-level-2-32.html">Khóa học luyện đọc Level 2</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                            <li><a href="/shark/public/khoa-hoc/luyen-thi-toeic"> Luyện thi TOEIC</a>
                                                                            <span class="arrow"></span>
                                            <ul class="submenu2">
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/de-thi-toeic-30.html">Đề thi TOEIC</a>
                                                </li>
                                                                                        <li>
                                                    <a href="/shark/public/khoa-hoc/luyen-thi-toeic-muc-tieu-600-diem-33.html">Luyện thi TOEIC mục tiêu 600 điểm</a>
                                                </li>
                                                                                    </ul>
                                                                    </li>
                                                    </ul>
                        </div>
                    </li>

                    <li class="front-menu-item has-sub-menu ">
                        <a href="/shark/public/bai-hoc/">Bài học</a>
                        <div class="submenu-bg">
                            <ul class="submenu1">
                                                                                     <li><a href="/shark/public/bai-hoc/hoc-tu-tieng-anh"> Từ vựng tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/hoc-tieng-anh-voi-nguoi-noi-tieng"> library_hc_ting_anh_vi_ngi_ni_ting</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/video-cua-nguoi-noi-tieng"> library_video_ca_ngi_ni_ting</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/luyen-nghe-tieng-anh"> Luyện nghe tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/ngu-phap-tieng-anh"> Ngữ pháp tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/luyen-noi-phat-am-tieng-anh"> Luyện nói &amp; Phát âm tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/luyen-doc-tieng-anh"> Luyện đọc tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/luyen-viet-tieng-anh"> Luyện viết tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/truyen-tho-ca-danh-ngon-tieng-anh"> Truyện &amp; thơ tiếng Anh</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/hoc-tieng-anh-qua-cac-bo-phim"> Học tiếng Anh qua các bộ phim</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/hoc-tieng-anh-qua-cac-bai-hat"> Học tiếng Anh qua các bài hát</a>
                                    </li>
                                                            <li><a href="/shark/public/bai-hoc/tro-choi-tieng-anh"> Trò chơi tiếng Anh</a>
                                    </li>
                                                    </ul>
                        </div>
                    </li>

                   <!--  <li class="front-menu-item"> <a href="/shark/public/news/blog"> Bài test</a></li> -->

                    <li class="front-menu-item has-sub-menu"><a href="/shark/public/ugc/flashcard">Từ vựng</a>
                        <div class="submenu-bg">
                            <ul class="submenu1">
                                <li><a href="/shark/public/ugc/flashcard">Mạng học từ vựng Smart Words</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="front-menu-item "><a href="/shark/public/thu-vien/">Thư viện</a></li>

                    <li class="front-menu-item front-menu-active"> <a href="/bi-quyet"> Blog</a></li>

                     <!-- <li class="front-menu-item "> <a href="/shark/public/huong-dan-su-dung"> Hướng dẫn</a>
                    </li> -->

                    <li class="front-menu-item "> <a href="/shark/public/gioi-thieu"> Giới thiệu</a>
                    </li>

                   
                    <li class="front-menu-item has-sub-menu "><a href="/shark/public/xep-hang-theo-uc">Xếp hạng</a>
                        <div class="submenu-bg">
                            <ul class="submenu1">
                                <li><a href="/shark/public/xep-hang-theo-uc">Xếp hạng theo UC</a>
                                </li>
                                <li><a href="/shark/public/xep-hang-theo-huy-chuong">Xếp hạng theo huy chương</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
                
            </div>
        </div>