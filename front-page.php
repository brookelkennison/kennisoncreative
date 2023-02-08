<?php get_header(); ?>
<section class="main">
    <h1 style="background-image: url(<?php echo get_theme_mod('main_section_image'); ?>);"><?php echo get_bloginfo('description'); ?></h1>
    <div class="callToAction" style="height: <?php if (get_theme_mod('main_call_to_action_header') === '' && get_theme_mod('main_call_to_action_text') === '') {
                                                    echo '460px';
                                                } ?>">
        <h2><?php echo get_theme_mod('main_call_to_action_header'); ?></h2>
        <p><?php echo get_theme_mod('main_call_to_action_text'); ?></p>
    </div>
    <div class="pastClients">
        <h6>Clients I have served:</h6>
    </div>
</section>

<?php get_footer(); ?>