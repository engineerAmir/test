<?php
/** Theme setup and reusable helpers. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'HQOOL_VERSION', '1.0.0' );

function hqool_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
    register_nav_menus( array( 'primary' => 'القائمة الرئيسية', 'footer' => 'قائمة التذييل' ) );
}
add_action( 'after_setup_theme', 'hqool_setup' );

function hqool_assets() {
    wp_enqueue_style( 'hqool-style', get_stylesheet_uri(), array(), HQOOL_VERSION );
    wp_enqueue_style( 'hqool-layout', get_template_directory_uri() . '/assets/css/style.css', array( 'hqool-style' ), HQOOL_VERSION );
    wp_enqueue_script( 'hqool-main', get_template_directory_uri() . '/assets/js/main.js', array(), HQOOL_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'hqool_assets' );

function hqool_register_projects() {
    register_post_type( 'projects', array(
        'labels' => array( 'name' => 'المشاريع', 'singular_name' => 'مشروع', 'add_new_item' => 'إضافة مشروع جديد', 'edit_item' => 'تعديل المشروع' ),
        'public' => true, 'menu_icon' => 'dashicons-images-alt2', 'has_archive' => true,
        'rewrite' => array( 'slug' => 'projects' ), 'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'project_category', 'projects', array( 'label' => 'تصنيفات المشاريع', 'public' => true, 'hierarchical' => true, 'show_in_rest' => true ) );
}
add_action( 'init', 'hqool_register_projects' );

function hqool_customize( $wp_customize ) {
    $wp_customize->add_section( 'hqool_contact', array( 'title' => 'إعدادات حقول السلام', 'priority' => 30 ) );
    $wp_customize->add_setting( 'hqool_hero_title', array( 'default' => 'أفضل قيمة مقابل السعر في توريد الشتلات بالمملكة', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hqool_hero_title', array( 'label' => 'عنوان الواجهة', 'section' => 'hqool_contact', 'type' => 'text' ) );
    $wp_customize->add_setting( 'hqool_hero_description', array( 'default' => 'نوفر مجموعة متنوعة من الشتلات والنباتات والخدمات الزراعية بأسعار تنافسية، مع حلول تناسب الفلل والحدائق والمزارع والمشاريع السكنية والتجارية.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'hqool_hero_description', array( 'label' => 'وصف الواجهة', 'section' => 'hqool_contact', 'type' => 'textarea' ) );
    $fields = array(
        'hqool_whatsapp' => array( 'واتساب', '966553383596' ),
        'hqool_whatsapp_message' => array( 'رسالة واتساب الافتراضية', 'السلام عليكم، أرغب في الاستفسار عن خدمات ومنتجات حقول السلام وطلب عرض سعر.' ),
        'hqool_phone_display' => array( 'رقم الهاتف المعروض', '+966 55 338 3596' ),
        'hqool_map_url' => array( 'رابط الموقع على الخريطة', 'https://maps.app.goo.gl/QAJ4nZD6hWkoBAJq5' ),
    );
    foreach ( $fields as $id => $field ) {
        $wp_customize->add_setting( $id, array( 'default' => $field[1], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $id, array( 'label' => $field[0], 'section' => 'hqool_contact', 'type' => 'text' ) );
    }
    $wp_customize->add_setting( 'hqool_hero_image', array( 'default' => '', 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hqool_hero_image', array( 'label' => 'صورة خلفية الواجهة', 'section' => 'hqool_contact', 'mime_type' => 'image' ) ) );
}
add_action( 'customize_register', 'hqool_customize' );

function hqool_whatsapp_url( $message = '' ) {
    $number = preg_replace( '/[^0-9]/', '', get_theme_mod( 'hqool_whatsapp', '966553383596' ) );
    $message = $message ? $message : get_theme_mod( 'hqool_whatsapp_message', 'السلام عليكم، أرغب في الاستفسار عن خدمات ومنتجات حقول السلام وطلب عرض سعر.' );
    return 'https://wa.me/' . $number . '?text=' . rawurlencode( $message );
}
function hqool_cta_url() { return esc_url( hqool_whatsapp_url() ); }
