<?php
/**
 * Template Name: Price Page
 * Template Post Type: Page
 * @package bs_chat
 */
get_header();
?>
<main class="price-page m-lg-5">
    <div class="container">
        <?php

        if (have_posts()) {

            while (have_posts()) {
                the_post(); ?>

                <div class="row">
                    <div class="col-10 mx-auto">
                        <h1 class="title-page"><?php the_title(); ?></h1>
                        <h4 class="subtitle-page"><?php the_content(); ?></h4>
                    </div>
                </div>
                <?php get_template_part('template-parts/price-content'); ?>
        <?php  }
        }

        ?>
        <div class="row">
            <div class="col-12 p-5">
                <div class="card shadow">
                    <div class="card-body">
                        <?php the_field('texto_de_ayuda', get_the_ID()); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>