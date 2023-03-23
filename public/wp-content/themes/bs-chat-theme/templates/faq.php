<?php

/**
 * Template Name: FAQ Page
 * Template Post Type: Page
 * @package bs_chat
 */
?>
<?php
get_header();
?>
<main>
    <?php
    $search_data = "";
    if ((isset($_GET['search']) && $_GET['search'] != "")) {
        $search_data = $_GET['search'];
    }
    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <section class="header-faq">
                <div iv class="container">
                    <div class="row">
                        <div class="col-12 title-page">
                            <?php the_content(); ?>
                        </div>
                        <div class="col-lg-6 col-xs-12 mx-auto">
                            <form>
                                <div class="d-flex search-wrapper">
                                    <input type="text" class="form-control bs-input" placeholder="Escriba su pregunta..." name="search" value="<?php echo $search_data ?>" />
                                    <button class="btn bs-input-button" type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-8 col-xs-12 mx-auto text-center">
                            <small class="text-secondary">* También puedes hacer búsqueda de alguna pregunta atraves de este formulario</small>
                        </div>
                    </div>
                </div>
            </section>
            <section class="faq-content">
                <?php if ($search_data != "") : ?>
                    <nav class="navbar container back-nav">
                        <form>
                            <input type="hidden" name="search" value="" />
                            <button class="btn btn-link" type="submit"><i class="fa-sharp fa-regular fa-chevrons-left"></i>&nbsp;Regresar a la lista de preguntas</button>
                        </form>
                    </nav>
                <?php endif; ?>
                <?php get_template_part('/template-parts/faq-content') ?>
            </section>
    <?php }
    }
    ?>
</main>
<?php
get_footer();
?>