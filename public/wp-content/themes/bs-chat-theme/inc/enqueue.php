<?php 
/* 
@package bs-chat
============================
Fron-tend Enqueue functions
============================
*/
function bs_chat_load_scripts (){
    /* Styles Enqueue*/ 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.2', 'all' );
    wp_enqueue_style( 'bs-chat-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'owl-carousel-theme-style', get_template_directory_uri() . '/css/owl.theme.default.css', array(), '2.3.4', 'all' );
    wp_enqueue_style('Montserrat-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap' );
    wp_enqueue_style('Animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all' );
    wp_enqueue_style('jquery-simple-mobile', get_template_directory_uri() . '/css/jquery-simple-mobilemenu.css', array(), '2019-09-06', 'all');
    wp_enqueue_style('FontAwesome', 'https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css', array(), '6.0.0', 'all');
    /* Scripts Enqueue*/ 
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.2.3', false);
    wp_enqueue_script('bs-chat-script', get_template_directory_uri() . '/js/bs-chat-scripts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('jquery-simple-mobile-script', get_template_directory_uri() . '/js/jquery-simple-mobilemenu.min.js', array('jquery'), '2019-09-06', false);
}
add_action('wp_enqueue_scripts', 'bs_chat_load_scripts');
?>