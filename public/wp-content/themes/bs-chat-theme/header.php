<?php
/* 
This is Template for the header
@package bs-chat
*/
?>

<!DOCTYPE html>
<html <?php language_attributes()?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php bloginfo('name');?> | <?php wp_title();?></title>
        <meta name="description" content="<?php if(is_single()){
            single_post_title('', true);
        } else {
            bloginfo('name'); echo " - ";
            bloginfo('description');
        }?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php if(is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url');?>"/>
        <?php endif; ?>
        <?php wp_head();?>
    </head>
    <body <?php body_class(); ?>>
        <nav class="navbar navbar-expand-lg main-nav sticky-top main-navbar-bschat shadow" id="main-navbar">
            <div class="container d-flex">
                <?php $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'main-logo-img');
                if(has_custom_logo()){?>
                <a href="<?php echo esc_url('/');?>" class="logo-main navbar-brand">
                <?php echo '<img width="120" height="auto" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') .  '"/>'; ?>
                </a>
                <?php 
                } else { ?>
                <a href="<?php echo esc_url('/')?>">
                    <?php echo '<h1>' . get_bloginfo('name') . '</h1>'?>
                </a>
                <?php }?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'main_menu',
                        'depth' => 2,
                        'container_id' => 'mainNav',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class' => 'nav navbar-nav ms-auto mb-2 mb-lg-0 menu_mobile',
                        'add_li_class' => 'nav-item',
                        //'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        //'walker' => new WP_Bootstrap_Navwalker(),
                    )
                )
                ?>
                <div class="mx-5" id="button-demo-header">
                <?php get_template_part('/template-parts/button-action', '', array('label' => 'Agendar Demo', 'url' => '#contact-modal', 'classButton' => 'form-button')) ?>
                </div>
            </div>
        </nav>