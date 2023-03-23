<footer>
    <div class="container p-4">
        <div class="row">
            <?php
            if (is_active_sidebar('footer_sidebar_1')) : ?>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_1'); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_2'); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col">
                    <?php dynamic_sidebar('footer_sidebar_3'); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 widget-col text-center">
                     <?php  dynamic_sidebar('footer_sidebar_4'); ?> 
                   
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
    <div class="post-footer">
        <div class="col-lg-8 col-xs-12 mx-auto text-center">
            <small>Todos los dererechos reservados <?php echo date('Y'); ?> ™ | <a href="<?php echo esc_url(bloginfo('url')) ?>"><?php echo bloginfo('name') ?></a></small>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>