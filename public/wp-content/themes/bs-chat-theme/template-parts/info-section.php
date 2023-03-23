<?php

/**
 *  Template for information section with image
 * @package bs-chat
 */
?>

<?php
$id_post = $args['id_post'];
$class = $args['revert_class'];
$label = $args['label'];
$data = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => get_the_category($args['id_post'])[0]->name,
    'p' => $id_post
));
?>

<div class="container">
    <div class="row">
        <div class="col p-5">
            <?php
            if ($data->have_posts()) :
                while ($data->have_posts()) : $data->the_post();
            ?>
                    <?php if ($class == 1) { ?>
                        <article class="row">
                        <div class="col-lg-6 col-xs-12 text-center">
                            <h2 class="info-section-title"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <div><?php get_template_part('/template-parts/button-action', '', array('label' => $label, 'url' => get_field('url_video', $data->ID)))?></div>
                        </div>
                        <div class="col-lg-6 col-xs-12 p-3">
                            <?php the_post_thumbnail('full', array(
                                'class' => 'img-fluid',
                                'alt' => get_the_title(),
                                'loading' => 'lazy'
                            )); ?>
                        </div>
                    </article>
                    <?php } else {?>
                        <article class="row">
                        <div class="col-lg-6 col-xs-12">
                            <?php the_post_thumbnail('full', array(
                                'class' => 'img-fluid',
                                'alt' => get_the_title(),
                                'loading' => 'lazy'
                            )); ?>
                        </div>
                        <div class="col-lg-6 col-xs-12 text-center">
                            <h2 class="info-section-title"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <div>
                                <?php get_template_part('/template-parts/button-action', '', array('label' => $label, 'url' => get_field('url_video', $data->ID)))?>
                            </div>
                        </div>
                    </article>
                        <?php }?>
                    <?php ?>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>