<?php
/** Interactive location map. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$map_url = get_theme_mod( 'hqool_map_url', 'https://maps.app.goo.gl/QAJ4nZD6hWkoBAJq5' );
?>
<section class="section location-section" id="location" aria-labelledby="location-title">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="eyebrow">موقعنا</p>
                <h2 id="location-title">زورونا في <em>حقول السلام</em></h2>
            </div>
            <p>تصفح موقعنا على الخريطة، واستخدم أزرار التكبير والتصغير للوصول إلينا بسهولة.</p>
        </div>
        <div class="location-map">
            <iframe
                src="https://www.google.com/maps?q=24.6158125,46.7099375&amp;z=16&amp;output=embed"
                title="موقع شركة حقول السلام على الخريطة"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen></iframe>
        </div>
        <div class="location-actions">
            <a class="button button-outline" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener">فتح الموقع في خرائط Google <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
