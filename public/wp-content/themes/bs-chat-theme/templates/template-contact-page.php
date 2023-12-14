<?php
/**
 * Template Name: Contact Page
 * Template Post Type: Page
 * @package bs_chat
 */
?>
<?php
get_header();
?>
<?php 
if(have_posts()){
    while(have_posts()){
        the_post();?>
        <section class="contact-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-none"><h1><?php the_title() ;?></h1></div>
                    <div class="col-lg-7 col-xs-12 form-section-left">
                       <h2 class="title-contact"><?php the_field('title-a-mostrar', get_the_ID())?></h2>
                       <div class="text-center py-4"><span class="h4"><?php the_field('subtitulo_contacto', get_the_ID())?></span></div>
                       <div class="row">
                        <div class="col-12">
                        <div class="text-center"><?php the_post_thumbnail('full', array(
                        'title' => get_the_title(),
                        'loading' => 'lazy',
                        'alt' => get_the_title(),
                        'class' => 'img-fluid'
                       ))?></div>
                        </div>
                       </div>
                    </div>
                    <div class="col-lg-5 col-xs-12 form-section">
                    <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php get_template_part('/template-parts/brands-section', "", array('message' => 'Más de 400 marcas utilizan nuestra solución para escalar más y más rápido'));?>
    <?php }
}
?>
<?php
get_footer();
?>