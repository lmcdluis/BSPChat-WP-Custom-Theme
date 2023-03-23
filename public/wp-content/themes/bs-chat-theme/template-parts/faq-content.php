<?php

/**
 * This template is for content of faq
 * @package bs_chat
 */
?>

<?php
$search_data = $_GET['search'];
$faq_args = array(
    'post_type' => 'post',
    'category_name' => 'faq',
    'orderby' => 'id',
    'post_status' => 'publish',
    'order' => 'ASC',
    's' => $search_data
);

$get_faq_data = new WP_Query($faq_args);
?>

<div class="container faq-container">
    <div class="row">
        <?php
        if ($get_faq_data->have_posts()) :
            while ($get_faq_data->have_posts()) : $get_faq_data->the_post();
        ?>
                <div class="col-lg-6 col-xs-12 p-4 faq-wrapper">
                    <h4><i class="fa-light fa-messages-question"></i>&nbsp;<?php the_title(); ?></h4>
                    <?php the_content(); ?>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</div>