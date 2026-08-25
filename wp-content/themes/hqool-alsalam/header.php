<!doctype html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header" data-header>
    <div class="container header-inner">
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="حقول السلام - الرئيسية">
            <?php if ( has_custom_logo() ) { the_custom_logo(); } else { ?><span class="brand-mark">ح</span><span class="brand-name">حقول السلام<small>حلول تنمو معك</small></span><?php } ?>
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu"><span></span><span></span><span></span><b class="screen-reader-text">فتح القائمة</b></button>
        <nav class="main-nav" aria-label="القائمة الرئيسية">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, 'fallback_cb' => 'hqool_fallback_menu' ) ); ?>
        </nav>
        <a class="button button-header" href="<?php echo hqool_cta_url(); ?>" target="_blank" rel="noopener">اطلب عرض السعر <span aria-hidden="true">↗</span></a>
    </div>
</header>
<main>
<?php
function hqool_fallback_menu() { echo '<ul id="primary-menu"><li><a href="#top">الرئيسية</a></li><li><a href="#about">من نحن</a></li><li><a href="#services">خدماتنا</a></li><li><a href="#projects">مشاريعنا</a></li><li><a href="#faq">الأسئلة الشائعة</a></li><li><a href="#contact">تواصل معنا</a></li></ul>'; }
