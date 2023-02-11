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
    <div class="blog">
        <h2>on the blog</h2>
        <div class="featured-posts">
            <?php
            $args = array(
                'category' => get_cat_ID('featured')
            );
            $latest_posts = get_posts($args);
            // var_dump($latest_posts);
            foreach ($latest_posts as $post) {
            ?>
                <div class="post">
                    <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                    <h3><?php echo apply_filters('the_title', $post->post_title, $post->ID); ?></h3>
                    <p><a href="<?php echo $post->guid ?>">Learn More -><a></p>
                </div>

            <?php
            }
            ?>

        </div> <?php ?>
    </div>
</section>

<?php get_footer(); ?>