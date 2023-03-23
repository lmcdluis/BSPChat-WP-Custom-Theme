<?php

/**
 * Template Name: Page Home - Full width
 * Description: Page template full width for Home.
 * @package bs-chat
 */

 /**
 * @var array $args
 */
?>

<?php 
get_header();
?>
<div class="loader-wrapper">
    <span class="loader"></span>
    <img class="logo-preload" src="<?php bloginfo('template_directory') ?>/img/favicon/apple-icon-152x152.png" width="60px" height="auto" />
    <div class="mt-5"><span class="animate__animated animate__flash  animate__slower animate__infinite">Cargando contenido del sitio...</span></div>
</div>
<div class="container-fluid">
   <div class="row">
    <div class="col slider-wrapper">
    <?php get_template_part( '/template-parts/main-carousel' );?>
    </div>
   </div>
</div>
<section class="bg-dark">
   <?php get_template_part('/template-parts/about-us-section')?>
</section>
<section>
   <?php get_template_part('/template-parts/info-section', '', array('revert_class' => false, 'id_post' => 32, 'label' => 'Ver video demostrativo'));?>
   <?php get_template_part('/template-parts/info-section', '', array('revert_class' => true, 'id_post' => 36, 'label' => 'Agendar demo'));?>
   <?php get_template_part('/template-parts/features-integration')?>
   <?php get_template_part('/template-parts/info-section', '', array('revert_class' => true, 'id_post' => 77, 'label' => 'Agendar demo'));?>
   <?php get_template_part('/template-parts/call-action', '', array('id_post' => 81, 'label' => 'Agendar demo'));?>
</section>
<?php get_footer();