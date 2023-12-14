<?php 
/**
 * Template for brands in use for BSP Chat  
 * @package bs-chat
 */
?>

<?php 
$message = $args['message'];
$get_brands = array(
    'post_type' => 'post',
    'category_name' => 'brand',
    'orderby' => 'id',
    'post_status' => 'publish',
    'order' => 'ASC' 
);

$get_brand_data = new WP_Query($get_brands);
?>

<section class="bg-white shadow">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xs-12 mx-auto my-5 text-center">
                <span class="h5"><?php echo $message; ?></span>
            </div>
            <div class="col-12">
                <div class="owl-carousel owl-theme brands-carousel">
                    <?php 
                        if($get_brand_data->have_posts()) :
                            while($get_brand_data->have_posts()) : $get_brand_data->the_post();
                    ?>
                    <div class="item brand-wrapper">
                        <?php 
                            the_post_thumbnail('full', array(
                                'class' => 'img-fluid brand-img',
                                'title' => get_the_title(),
                                'loading' => 'lazy',
                                'alt' => get_the_content()
                            ))
                        ?>
                    </div>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

