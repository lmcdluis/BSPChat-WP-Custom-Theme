<?php
/**
 * Template Name: Login Page
 */
?>

<?php
get_header();
?>

<section class="login-content" <?php post_class() ?>>
<div class="gradient"></div>
<div class="form-login">
    <?php $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'main-logo-img');
    if (has_custom_logo()) { ?>
        <a href="<?php echo esc_url('/'); ?>" class="text-center">
            <?php echo '<img width="120" height="auto" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') .  '"/>'; ?>
        </a>
    <?php
    } else { ?>
        <a href="<?php echo esc_url('/') ?>">
            <?php echo '<h1>' . get_bloginfo('name') . '</h1>' ?>
        </a>
    <?php } ?>
    <div class="card shadow-lg">
        <div class="card-body">
            <h1>Inicio de sesión</h1>
            <?php
            if (!is_user_logged_in()) {
                $args = array(
                    'redirect' => admin_url(), // redirect to admin dashboard.
                    'form_id' => 'custom_loginform',
                    'label_username' => __('Usuario:'),
                    'label_password' => __('Contraseña:'),
                    'label_remember' => __('Recordarme'),
                    'label_log_in' => __('Iniciar Sesión'),
                    'remember' => true
                );
                wp_login_form($args);
            }

            $err_codes = isset($_SESSION["err_codes"]) ? $_SESSION["err_codes"] : 0;
            if ($err_codes !== 0) {
                echo display_error_message($err_codes);
            }
            function display_error_message($err_code)
            {
                // Invalid username.
                if (in_array('invalid_username', $err_code)) {
                    $error = '<strong>ERROR</strong>: Usuario inválido.';
                }
                // Incorrect password.
                if (in_array('incorrect_password', $err_code)) {
                    $error = '<strong>ERROR</strong>: El password introducido no es incorrecto.';
                }
                // Empty username.
                if (in_array('empty_username', $err_code)) {
                    $error = '<strong>ERROR</strong>: El campo usuario está vacío.';
                }
                // Empty password.
                if (in_array('empty_password', $err_code)) {
                    $error = '<strong>ERROR</strong>: El campo contraseña está vacío.';
                }
                // Empty username and empty password.
                if (in_array('empty_username', $err_code)  &&  in_array('empty_password', $err_code)) {
                    $error = '<strong>ERROR</strong>: Los campos usuario y contraseña estan vacíos.';
                }
                return $error;
            } ?>
        </div>
    </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 text-center my-2">
                <a href="<?php wp_lostpassword_url(); ?>" class="btn btn-link">¿Has perdido tu contraseña?</a>
            </div>
            <div class="col-12 text-center my-2">
                <a class="btn btn-link" href="<?php bloginfo('url'); ?>"><i class="fa-duotone fa-house"></i>&nbsp;Ir al Inicio de <?php bloginfo('tittle') ?></a>
            </div>
        </div>
    </div>

</section>

<?php
get_footer();
?>