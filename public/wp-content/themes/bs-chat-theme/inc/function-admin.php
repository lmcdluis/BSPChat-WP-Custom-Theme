<?php
/* 
@package intranet-2023
============================
ADMIN PAGE
============================
*/
function intranet_2023_add_admin_apge()
{
    // Creacion de Página Administrativa del Tema Intranet 2023
    add_menu_page('Intranet 2023 Theme Options', 'Intranet Opciones', 'manage_options', 'intranet-2023',  'intranet_2023_create_page', 'dashicons-admin-customizer', 110);
    // Creacion de Sub-Páginas de Página Administrativa del Tema Intranet 2023
    add_submenu_page('intranet-2023', 'Configuraciones del Tema', 'Configuraciones', 'manage_options', 'intranet_2023_configuraciones', 'intranet_2023_configuraciones_pagina');
    add_submenu_page('intranet-2023', 'Configuraciones Opciones css', 'Css Personalizado', 'manage_options', 'intranet_2023_configuraciones_css', 'intranet_2023_css_configuraciones_pagina');

    // Activa configuraciones personalizadas
    add_action('admin_init', 'intranet_custom_settings');
}
add_action('admin_menu', 'intranet_2023_add_admin_apge');

function intranet_custom_settings()
{
}

function intranet_2023_create_page()
{
    // generacion  de admin page 
    require_once(get_template_directory() . '/inc/templates/intranet-admin.php');
}

function intranet_2023_configuraciones_pagina()
{
}

function intranet_2023_css_configuraciones_pagina()
{
}

//funcion para agregar manifest json
add_action('wp_head', 'intranet_2023_add_manifest_json');

//creacion tag para manifest json
function intranet_2023_add_manifest_json(){
    echo '<link rel="manifest" href="' . get_template_directory_uri() . '/img/favicon/manifest.json">';
}

function bschat_custom_logo_setup()
{
    $defaults = array(
        'height' => 'auto',
        'width' => 120,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true
    );

    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'bschat_custom_logo_setup');

add_action('after_setup_theme', 'bschat_theme_setup');

function bschat_theme_setup()
{
    // Featured Image
    add_theme_support( 'post-thumbnails' );
    add_image_size('main-logo-img', 140, 'auto', true);
    add_image_size('carusel-img', 1440, 475, true);
    add_image_size('main-menu-icon', 80, 80, true);
    add_image_size('feature-icon', 90, 90, true);
}

function menu_pricipal(){
    register_nav_menu('main_menu', __('Menu Principal'));
}
add_action('init', 'menu_pricipal');

if (!function_exists('post_pagination')) :
    function post_pagination()
    {
        global $wp_query;
        $pager = 999999999; // need an unlikely integer

        echo paginate_links(array(
            'base' => str_replace($pager, '%#%', esc_url(get_pagenum_link($pager))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }
endif;

/*Display custom meta keywords or the post excerpt */
function add_custom_meta_key()
{

    #Homepage Meta Description
    if (is_home() || is_front_page()) {
        $meta_key = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"; #Edit here
        echo '<meta name="viewport" content="' . $meta_key . '" />';
    }

    #Single Page Meta Description
    if (is_single()) {
        $key = get_post_meta(get_the_id(), 'keywords', true);
        if (!empty($key)) {
            $meta_key = esc_html($key);
            echo '<meta name="viewport" content="' . $meta_key . '" />';
        }
    }
}
add_action('wp_head', 'add_custom_meta_key', 4);

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

function bschat_widgets_init()
{
    register_sidebar(array(
        'name' => __('Footer Widget Area 1', 'bschat'),
        'id' => 'footer_sidebar_1',
        'description' => __('Appears in the footer section 1'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</ aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</ h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget Area 2', 'bschat'),
        'id' => 'footer_sidebar_2',
        'description' => __('Appears in the footer section 2'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</ aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</ h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget Area 3', 'bschat'),
        'id' => 'footer_sidebar_3',
        'description' => __('Appears in the footer section 3'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</ aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</ h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget Area 4', 'bschat'),
        'id' => 'footer_sidebar_4',
        'description' => __('Appears in the footer section 4'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</ aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</ h3>'
    ));
}
add_action('widgets_init', 'bschat_widgets_init');

function render_info_block ($attr){
    ob_start();
    $category_name = "";
    $id_post = "";
    $label_button = "";
    $is_post_demo = false;
    
    if(isset($attr['category_name'])){
        $category_name = $attr['category_name'];
    } else if (isset($attr['id_post'])){
        $id_post = $attr['id_post'];
    } else if (isset($attr['label_button'])){
        $label_button = $attr['label_button'];
    } else if (isset($attr['is_post_demo'])){
        $is_post_demo = $attr['is_post_demo'];
    }

    $args_query = [
        'post_type' => 'post',
        'category_name' => $category_name,
        'p' => $id_post
    ];

    $get_data = new WP_Query($args_query);
    if($get_data->have_posts()){?>
        <?php while($get_data->have_posts()) : $get_data->the_post();?>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <?php if($is_post_demo){ ?>
                            <img class="img-fluid" src="<?php bloginfo('template_directory')?>/img/background-demo.svg" alt="<?php the_title();?>" loading="lazy" title="<?php the_title();?>"/>
                        <?php } else {
                            the_post_thumbnail('full', array(
                                'alt' => get_the_title(),
                                'title' => get_the_title(),
                                'loading' => 'lazy',
                                'class' => 'img-fluid p-3'
                            ));
                        }?>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <h3 class="text-center"><?php the_title(); ?></h3>
                        <div class="p-3">
                            <?php the_content(); ?>
                        </div>
                        <div class="my-3">
                        <?php //get_template_part('/template-parts/button-action', '', array('label' => $label_button, 'url' => get_field('url_video', $get_data->ID))); 
                            set_query_var('label', $label_button);
                            
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    <?php } 
    return ob_get_clean();
    ?>
 <?php }
  add_shortcode('bs_chat_info_block', 'render_info_block'); ?>

  <?php 
function redirect_login_page() {
    $login_url  = home_url( '/bsp-login' );
    $url = basename($_SERVER['REQUEST_URI']); // get requested URL
    isset( $_REQUEST['redirect_to'] ) ? ( $url   = "wp-login.php" ): 0; // if users ssend request to wp-admin
    if( $url  == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET')  {
        wp_redirect( $login_url );
        exit;
    }
}
add_action('init','redirect_login_page');

function error_handler() {
    $login_page  = home_url( '/login' );
    global $errors;
    $err_codes = $errors->get_error_codes(); // get WordPress built-in error codes
    $_SESSION["err_codes"] =  $err_codes;
    wp_redirect( $login_page ); // keep users on the same page
    exit;
}
add_filter( 'login_errors', 'error_handler');
  ?>
