<?php

/**
 * Template Name: Full width Page
 * @package bsp_chat
 */
?>

<?php
get_header();
?>
<main>
<div class="loader-wrapper">
    <span class="loader"></span>
    <img class="logo-preload" src="<?php bloginfo('template_directory') ?>/img/favicon/apple-icon-152x152.png" width="60px" height="auto" />
    <div class="mt-5"><span class="animate__animated animate__flash  animate__slower animate__infinite">Cargando contenido del sitio...</span></div>
</div>
    <?php
    while (have_posts()) : the_post(); ?>
        <section class="bg-blue">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4 text-center d-none"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <?php // get_template_part('/template-parts/breadcrumb-section', '', array('class-style' => 'bg-light'));?>
        <section>
            <div class="container">
                <div class="row my-4">
                        <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php
    endwhile;
    ?>
</main>
<?php
get_footer();
?>