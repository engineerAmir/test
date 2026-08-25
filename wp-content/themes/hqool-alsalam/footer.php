</main>
<footer class="site-footer" id="contact">
    <div class="container footer-grid">
        <div><a class="brand brand-light" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="brand-logo footer-logo" src="<?php echo esc_url( hqool_logo_url() ); ?>" alt="شعار شركة حقول السلام"></a><p class="footer-intro">حقول السلام — حلول متكاملة للشتلات والحدائق والمشاريع الزراعية.</p></div>
        <div><h3>روابط سريعة</h3><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => 'hqool_fallback_menu' ) ); ?></div>
        <div><h3>تواصل معنا</h3><a href="<?php echo hqool_cta_url(); ?>" target="_blank" rel="noopener">واتساب: <?php echo esc_html( get_theme_mod( 'hqool_phone_display', '+966 55 338 3596' ) ); ?></a><a href="<?php echo esc_url( get_theme_mod( 'hqool_map_url', 'https://maps.app.goo.gl/QAJ4nZD6hWkoBAJq5' ) ); ?>" target="_blank" rel="noopener">موقعنا على الخريطة ↗</a></div>
    </div>
    <div class="container footer-bottom"><span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> حقول السلام. جميع الحقوق محفوظة.</span><span>نزرع الثقة، ونصنع الفرق.</span></div>
</footer>
<a class="floating-whatsapp" href="<?php echo hqool_cta_url(); ?>" target="_blank" rel="noopener" aria-label="اطلب عرض السعر عبر واتساب"><span>واتساب</span><strong>◔</strong></a>
<?php wp_footer(); ?>
</body>
</html>
