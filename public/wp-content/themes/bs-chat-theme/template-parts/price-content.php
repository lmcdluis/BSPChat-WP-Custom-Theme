<?php
/**
 * This template is for content of prices
 * @package bs_chat
 */
?>

<?php
$price_args = array(
    'post_type' => 'post',
    'category_name' => 'prices',
    'orderby' => 'id',
    'post_status' => 'publish',
    'order' => 'ASC'
);
$get_prices_data = new WP_Query($price_args); ?>
<div class="container my-4 remodal-bg">
    <div class="row">
        <?php if ($get_prices_data->have_posts()) : ?>

            <?php while ($get_prices_data->have_posts()) : $get_prices_data->the_post(); 
            ?>
                <div class="col-lg-4 mx-auto">
                    <div class="card card-price">
                    <?php if(get_field('recomendado', $get_prices_data->ID)) { 
                       echo '<span class="popular-tag">Popular</span>';
                    } ?>
                        <div class="card-header bg-dark-secondary">
                        <h4 class="title-price-card"><?php the_title(); ?></h4>
                        </div>
                        <div class="card-body body-card-price">
                            <div class="d-flex">
                                <span class="display-4">$</span>&nbsp;
                                <div class="d-grid">
                                    <span class="display-4 fw-bold price-number"><?php the_field('price', $get_prices_data->ID) ?></span>
                                    <span class="text-secondary h4">Por mes +</span>
                                </div>
                            </div>
                            <?php if(!empty(get_the_content())){ ?>
                                <div class="description-content-card-price">
                                <p><?php the_content(); ?></p>
                            </div>
                           <?php }?>
                            <div class="p-3">
                                <h5 class="text-center fw-bold">Características del Plan</h5>
                            </div>
                            <div>
                                <?php the_field('characteristics-plan', $get_prices_data->ID) ?>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="d-grid d-md-block text-center my-4">
                                <a href="<?php echo esc_url('#contact-modal')?>" class="btn btn-black">Contratar plan</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
    <div data-remodal-id="contact-modal" class="remodal" data-remodal-options="closeOnOutsideClick: false, closeOnEscape: false">
   <button data-remodal-action="close" class="remodal-close" id="close-modal-contact"></button>
   <?php echo do_shortcode('[wpforms id="217"]')?>
</div>
</div>