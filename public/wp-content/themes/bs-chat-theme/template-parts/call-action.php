<?php

/** 
 * This is template for call action section
 * @package bs-chat
 */
?>

<?php
$id_post = $args['id_post'];
$label = $args['label'];
$get_call_action = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => get_the_category($args['id_post'])[0]->name,
    'p' => $id_post
));
?>
<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 p-5">
                <?php
                if ($get_call_action->have_posts()) :
                    while ($get_call_action->have_posts()) : $get_call_action->the_post();
                ?>
                        <h3><?php the_title(); ?></h3>
            </div>
            <div class="col-lg-3 col-xs-12 mx-auto p-5 text-center">
                <?php get_template_part('/template-parts/button-action', '', array('label' => $label, 'url' => get_field('url_video', $get_call_action->ID))) ?>
            </div>
        </div>
<?php endwhile;
                    wp_reset_postdata();
                endif; ?>
    </div>
</div>
</div>