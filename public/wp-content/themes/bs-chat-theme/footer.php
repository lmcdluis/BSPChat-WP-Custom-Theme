<footer>
    <div class="container p-4">
        <div class="row footer-row">
            <?php
            if (is_active_sidebar('footer_sidebar_1')) : ?>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_1'); ?>
                </div> <?php endif ?>
            <?php if (is_active_sidebar('footer_sidebar_2')) : ?>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_2'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer_sidebar_3')) : ?>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_3'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer_sidebar_4')) : ?>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col text-center">
                    <?php dynamic_sidebar('footer_sidebar_4'); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="post-footer row">
        <div class="col-lg-10 col-xs-12 text-center mx-auto">
            <small>Todos los dererechos reservados <?php echo date('Y'); ?> © | <a href="<?php echo esc_url(bloginfo('url')) ?>"><?php echo bloginfo('name') ?></a></small>
            <div><small class="text-green">Villa Fontana, Invercasa, 5to. piso 0B9 Módulo 502, Managua 14038, Nicaragua | <a href="mailto:clientes@bspchat.com">clientes@bspchat.com</a></small></div>
			<div><small class="text-green">BUSINESS SOLUTIONS PROVIDERS, S.A.</small></div>
            <div class="developer-text pt-4"><small>Sitio desarrollado por <a href="http://carazoygomezdesign.com" target="_blank">Carazo y Gómez Design</a></small></div>
        </div>
        <!-- <div class="col-12 text-center">
            <small><a href="<?php /* echo esc_url('/bsp-login') */?>">Acceso Web Master</a></small>
        </div> -->
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>