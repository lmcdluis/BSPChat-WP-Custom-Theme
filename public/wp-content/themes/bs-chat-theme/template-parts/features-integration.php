<?php

/**
 *  Template for feature integration
 * @package bs-chat
 */
?>
<?php 
$data = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'features-integration',
    'order_by' => 'id',
    'order' => 'ASC'
))
?>
<div class="bg-dark">
    <div class="container">
        <div class="row p-5">
            <div class="col-12 my-4"><h2 class="title-feature-section">Explora las características de integración</h2></div>
            <?php 
            if($data->have_posts()) :
                while($data->have_posts()) : $data->the_post();
            ?>
            <div class="col-lg-3 col-xs-12 feature-col">
                <?php 
                the_post_thumbnail('feature-icon', array(
                    'class' => 'img-fluid',
                    'alt' => get_the_title(),
                    'loading' => 'lazy'
                ))
                ?>
                <div class="title-feature-item"><h4><?php the_title()?></h4></div>
            </div>
            <?php endwhile;
            wp_reset_postdata();
            endif;?>
        </div>
    </div>
</div>