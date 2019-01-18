<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php wp_title('&raquo;', true, 'right'); ?></title>
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEME_URL; ?>/app/public/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL; ?>/app/public/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL; ?>/app/public/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo THEME_URL; ?>/app/public/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo THEME_URL; ?>/app/public/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:image" content="<?php echo the_field('image_social', 'option'); ?>">
    <meta property="og:image:height" content="472">
    <meta property="og:image:width" content="901">
    <meta property="og:description" content="<?php echo the_field('description_social', 'option'); ?>">
    <meta property="og:title" content="<?php echo the_field('title_social', 'option'); ?>">
    <meta property="og:url" content="<?php echo the_field('url_social', 'option'); ?>">
    <link href="<?php echo the_field('font_url', 'option'); ?>" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- header -->
<header class="header-main">
  <div class="header-main__wrapper">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-3 col-lg-2">
          <!-- header logo -->
          <div class="header-logo d-inline-block">
            <a href="/" title="fantasy">
              <h1 class="sr-only">OEXPO</h1>
              <img src="/wp-content/themes/oexpo/app/public/img/logo.svg" alt="logo">
            </a>
          </div>
          <!-- end header logo -->
        </div>
        <div class="col-xl-9 col-lg-10 p-0 header-menu_wrapper">
          <!-- header menu -->
          <div class="header-menu">
            <nav class="navbar navbar-expand-lg">
              <div class="collapse navbar-collapse" id="mainav">
                <!-- main nav -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">sản phẩm</a>

                    <span>
                      <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                      </svg>
                    </span>

                    <ul class="navbar-nav__child">
                      <li>
                        <a class="nav-link__child" href="/oexpo-xix">
                          OEXPO XIX
                        </a>
                      </li>
                      <li>
                        <a class="nav-link__child" href="/cody">
                          OEXPO CODY
                        </a>
                      </li>
                      <li>
                        <a class="nav-link__child" href="/zoco">
                          OEXPO ZOCO
                        </a>
                      </li>
                    </ul>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/ve-chung-toi">về chúng tôi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">sắc màu</a>

                    <span>
                      <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                      </svg>
                    </span>

                    <ul class="navbar-nav__child">
                      <li>
                        <a class="nav-link__child" href="/thu-vien-mau-sac">
                          Cảm hứng
                        </a>
                      </li>
                      <li>
                        <a class="nav-link__child" href="/the-gioi-mau-sac">
                          Bảng màu
                        </a>
                      </li>
                      <li>
                        <a class="nav-link__child" href="/phong-thuy">
                          Phong Thủy
                        </a>
                      </li>
                    </ul>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/category/tin-tuc">tin tức</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">liên hệ</a>

                    <span>
                      <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                      </svg>
                    </span>

                    <ul class="navbar-nav__child">
                      <li>
                        <a class="nav-link__child" href="/dai-ly-gan-nhat">
                          Đại lý gần nhất
                        </a>
                      </li>
                      <li>
                        <a class="nav-link__child" href="/dich-vu-phoi-mau">
                          Dịch vụ phối màu
                        </a>
                      </li>

                    </ul>

                  </li>
                </ul>
                <!-- end main nav -->

                <div class="header__hotline">
                  <a href="tel:18006600">
                    <img src="/wp-content/themes/oexpo/app/public/img/oexpo_header_phone.png" alt="oexpo_header_phone"> 1800 6600
                  </a>
                </div>

                <!-- header search form -->
                <div class="header-search_block">
                  <form action="/" class="header-search_form">
                    <input type="text" required placeholder="Nhập tên để tìm sản phẩm" name="s" autocomplete="off" class="header-search_input form-control">
                  </form>
                </div>
                <!-- end header search form -->
              </div>
            </nav>
            <!-- header search form trigger -->
            <button class="header-search_trigger">
              <span class="open">
                <img src="/wp-content/themes/oexpo/app/public/img/oexpo_search_icon.svg" alt="oexpo_search_icon">
              </span>
              <span class="closed">
                <svg aria-hidden="true" height="16" width="16" title="icon-close-menu">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-close-menu"></use>
                </svg>
              </span>
            </button>
            <!-- end header seach form trigger -->
          </div>
          <!-- end header menu -->
        </div>
      </div>
    </div>
    <div class="header__hotline header__hotline--mobile d-sm-none">
      <a href="tel:18006600">
        <img src="/wp-content/themes/oexpo/app/public/img/oexpo_header_phone.png" alt="oexpo_header_phone"> 1800 6600
      </a>
    </div>
    <!-- menu toogle -->
    <button class="navbar-toggler icon-toggle d-lg-none collapsed" type="button">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </button>
    <!-- end menu toogle -->
    <!-- header__mobile -->
    <div class="header__mobile">
      <div class="container">

        <div class="header__hotline--sm-mobile header__hotline">
          <a href="tel:18006600">
            <img src="/wp-content/themes/oexpo/app/public/img/oexpo_header_phone.png" alt="oexpo_header_phone"> 1800 6600
          </a>
        </div>
        <div class="header__mobile-search">
          <svg aria-hidden="true" height="16" width="16" title="icon-search-form-mobile">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search-form-mobile"></use>
          </svg>
          <form action="/" class="header-search_form">
            <input type="text" required placeholder="Nhập tên để tìm sản phẩm" name="s" autocomplete="off" class="header__mobile-search__input form-control">
          </form>
        </div>

        <div class="header__mobile-menu">
          <!-- main nav -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link navbar-nav__toggle" href="javascript:void(0)">
                sản phẩm
              </a>
              <span class="navbar-nav__toggle">
                <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                </svg>
              </span>

              <ul class="navbar-nav__child">
                <li>
                  <a class="nav-link__child" href="/oexpo-xix">
                  OEXPO XIX
                  </a>
                </li>
                <li>
                  <a class="nav-link__child" href="/cody">
                  OEXPO CODY
                  </a>
                </li>
                <li>
                  <a class="nav-link__child" href="/zoco">
                  OEXPO ZOCO
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ve-chung-toi">về chúng tôi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-nav__toggle" href="javascript:void(0)">
                sắc màu
              </a>

              <span class="navbar-nav__toggle">
                <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                </svg>
              </span>
              <ul class="navbar-nav__child">
                <li>
                  <a class="nav-link__child" href="/thu-vien-mau-sac">
                    Cảm hứng
                  </a>
                </li>
                <li>
                  <a class="nav-link__child" href="/the-gioi-mau-sac">
                    Bảng màu
                  </a>
                </li>
                <li>
                  <a class="nav-link__child" href="/phong-thuy">
                    Phong thủy
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/category/tin-tuc">
                tin tức
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-nav__toggle" href="javascript:void(0)">liên hệ</a>
              <span class="navbar-nav__toggle">
                <svg aria-hidden="true" height="9" width="10" title="expo_menu_cavet">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-menu-cavet"></use>
                </svg>
              </span>

              <ul class="navbar-nav__child">
                <li>
                  <a class="nav-link__child" href="/dai-ly-gan-nhat">
                    Đại lý gần nhất
                  </a>
                </li>
                <li>
                  <a class="nav-link__child" href="/dich-vu-phoi-mau">
                    Dịch vụ phối màu
                  </a>
                </li>
              </ul>

            </li>
          </ul>
          <!-- end main nav -->
        </div>

      </div>
    </div>
    <!-- end header__mobile -->
  </div>
</header>
<!-- end header -->
