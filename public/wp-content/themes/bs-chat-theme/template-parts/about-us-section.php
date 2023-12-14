<?php
/* 
This is template for about us section
@package bs-chat
*/
?>

<?php
$data = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'bschat-info',
    'order_by' => 'id',
    'order' => 'ASC'
));
?>

<div class="container-fluid">

    <?php
    if ($data->have_posts()) :
        while ($data->have_posts()) : $data->the_post();
    ?>
            <div class="row pt-4">
                <div class="col-lg-6 col-xs-12 mx-auto text-center text-white">
                    <div class="bs-info-title-wrapper"><img class="ms-3" src="<?php the_field('patter-background', $data->ID);?>" width="120px" height="auto" title="<?php the_title(); ?> <?php bloginfo('title')?>"/></div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-lg-8 col-xs-12 mx-auto text-white text-center">
                    <p><?php the_content(); ?></p>
                </div>
            </div>

    <?php endwhile;
        wp_reset_postdata();
    endif; ?>


</div>