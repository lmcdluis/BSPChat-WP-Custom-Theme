<?php
/* 
This is template for carousel
@package bs-chat
*/
?>

<?php
$data = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'slider-carousel',
    'order_by' => 'id',
    'order' => 'ASC'
));
?>

<div class="owl-carousel owl-theme main-carousel">
    <?php
    if ($data->have_posts()) :
        while ($data->have_posts()) : $data->the_post();
    ?>
            <div class="item item-carousel-wrapper" style="background-image: url(<?php the_field('patter-background', $data->ID);?>);">
                <div class="row">
                    <div class="col-md-8 col-xs-12 py-5 px-4">
                        <div class="title-main-carousel">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="content-main-carousel">
                            <?php the_content(); ?>
                        </div>
                        <div class="row buttons-container">
                            <div class="col-lg-6 col-xs-12">
                                <div class="buttons-slier-wrapper text-center">
                                <?php get_template_part('/template-parts/button-action', '', array('label' => 'Ver video demostrativo', 'url' => '#demo-modal', 'classButton' => 'video-button'))?>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-4 col-xs-12">
                        <?php the_post_thumbnail('full', array(
                            'class' => 'img-fluid, img-carousel',
                            'alt' => get_the_title(),
                            'loading' => 'lazy'
                        )); ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</div>