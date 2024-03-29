<?php

/*
 *
 * The template for displaying footer
 * @link https://codex.wordpress.org/Stepping_Into_Templates
 *
 * @package LaRestaurante
 */

?>
<footer id="footer">

    <div class="container-fluid">
        <!-- scroll page angle -->
        <div class="row justify-content-end">
            <?php if (is_front_page()): ?>
                <div class="col-md-12 arrow-up">
                    <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-up fa-3x anim"></i></a>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div style="margin-bottom:1em;" class="col-sm-12 col-md-4">
                <h2>Opening hours</h2>
                <ul class="list-group list-unstyled" style="font-size:12pt;">
                    <li><?php echo cs_get_customize_option('monday'); ?></li>
                    <li><?php echo cs_get_customize_option('tuesday'); ?></li>
                    <li><?php echo cs_get_customize_option('wednesday'); ?></li>
                    <li><?php echo cs_get_customize_option('thursday'); ?></li>
                    <li><?php echo cs_get_customize_option('friday'); ?></li>
                    <li><?php echo cs_get_customize_option('saturday'); ?></li>
                    <li><?php echo cs_get_customize_option('sunday'); ?></li>
                </ul>
            </div>

            <div style="margin-bottom:1em;" class="col-sm-12 col-md-4">
                <h2>Social media</h2>
                <ul class="social-buttons list-unstyled">
                    <?php //first get option value  social group , next single values opt field
                    $cs_social_get_option_group = cs_get_option('group_social');
                    if (is_array($cs_social_get_option_group)
                        || is_object($cs_social_get_option_group)):

                        foreach ($cs_social_get_option_group as $single) {
                            if (!empty($single['social_twturl'])) {
                                $twt_url_opt_cs = $single['social_twturl'];
                            } else {
                                $twt_url_opt_cs = null;
                            }
                        }

                        if ($twt_url_opt_cs):
                            ?>
                            <li>
                                <a class="btn btn-block btn-social btn-twitter"
                                   href="<?php echo esc_url($twt_url_opt_cs); ?>" target="_blanket">
                                    <i class="fa fa-twitter"></i><?php _e('Sign in with Twitter', 'larestaurante'); ?>
                                </a>
                            </li>
                        <?php endif;//if($twt_url_opt_cs)

                        foreach ($cs_social_get_option_group as $single) {
                            if (!empty($single['social_fburl'])) {
                                $fb_url_opt_cs = $single['social_fburl'];
                            } else {
                                $fb_url_opt_cs = null;
                            }
                        }
                        if ($fb_url_opt_cs): ?>
                            <li>
                                <a class="btn btn-block btn-social btn-facebook"
                                   href="<?php echo esc_url($fb_url_opt_cs); ?>" target="_blanket">
                                    <i class="fa fa-facebook"></i>
                                    <?php _e('Sign in with Facebook', 'larestaurante'); ?>
                                </a>
                            </li>
                        <?php endif;

                        foreach ($cs_social_get_option_group as $single) {
                            if (!empty($single['social_googleplus_url'])) {
                                $google_url_opt_cs = $single['social_googleplus_url'];
                            } else {
                                $google_url_opt_cs = null;
                            }
                        }
                        if ($google_url_opt_cs): ?>
                            <li>
                                <a class="btn btn-block btn-social btn-google"
                                   href="<?php echo esc_url($google_url_opt_cs); ?>"
                                   target="_blanket">
                                    <i class="fa fa-google"></i><?php _e('Sign in with Google', 'larestaurante'); ?>
                                </a>
                            </li>
                        <?php endif;

                        foreach ($cs_social_get_option_group as $single) {
                            if (!empty($single['social_yturl'])) {
                                $yt_url_opt_cs = $single['social_yturl'];
                            } else {
                                $yt_url_opt_cs = null;
                            }
                        }
                        if ($yt_url_opt_cs):?>
                            <li>
                                <a class="btn btn-block btn-social btn-google"
                                   href="<?php echo esc_url($yt_url_opt_cs); ?>" target="_blanket">
                                    <i class="fa fa-youtube"></i><?php _e('Sign in with Youtube', 'larestaurante'); ?>
                                </a>
                            </li>
                        <?php endif;
                    endif; //is_array or is_object ?>
                </ul><!-- .social-buttons .list-unstyled -->
            </div><!--.col-md-4-->

            <div style="margin-bottom:1em;" class="col-sm-12 col-md-4">
                <?php if (function_exists('wp_tag_cloud')) :
                    $args = array('public' => true, '_builtin' => false);
                    $taxonomies = get_taxonomies($args);
                    if (isset ($taxonomies)) {
                        $taxonomies = array_values($taxonomies);
                    }
                    $first_tax = !empty($taxonomies[0]) ? $taxonomies[0] : 'category';
                    $second_tax = !empty($taxonomies[1]) ? $taxonomies[1] : 'post_tag'; ?>

                    <h2><?php _e('Popular tags and categories', 'larestaurante'); ?></h2>
                    <ul class="list-group list-unstyled tagcloud">
                        <li class="list-group-item">
                            <?php //display Wordpress Tag Cloud
                            wp_tag_cloud(array(
                                'smallest' => 13,
                                'largest' => 26,
                                'unit' => 'pt',
                                'number' => 45,
                                'format' => 'flat',
                                'separator' => "\n",
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'exclude' => '',
                                'include' => '',
                                'link' => 'view',
                                'taxonomy' => $first_tax,
                            )); ?>
                        </li>
                    </ul>
                    <ul class="list-group list-unstyled tagcloud">
                        <li class="list-group-item">
                            <?php wp_tag_cloud(array(
                                'smallest' => 13,
                                'largest' => 20,
                                'unit' => 'pt',
                                'number' => 45,
                                'format' => 'flat',
                                'separator' => "\n",
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'exclude' => '',
                                'include' => '',
                                'link' => 'view',
                                'taxonomy' => $second_tax,
                            ));
                            ?>
                        </li>
                    </ul>
                <?php endif; ?>
            </div><!-- .col-md-4 -->

        </div><!-- .row -->

        <!--widget zone-->
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
        </div>
        <!-- login, search - row -->
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <?php get_search_form(); ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php if (((!is_user_logged_in()) && (is_front_page())) || ((!is_user_logged_in())
                        && (is_single()))): ?>
                    <h5><a href="<?php echo wp_login_url(home_url()); ?>" title="Login">
                            <?php _e('Log in', 'larestaurante'); ?></a></h5>
                    <p style="color:red">user: luki@op.pl</p>
                    <p style="color:red">password: luki@op.pl</p>
                    <p style="color:red">role: subscrinent</p>

                <?php else: ?>
                    <ul class="list-inline">
                        <li>
                            <h5>
                                <a href="<?php echo wp_logout_url(); ?>"><?php _e('Log out', 'larestaurante'); ?></a>
                            </h5>
                        </li>

                        <li>
                            <h5><a target="_blank" href="<?php echo admin_url(); ?>" title="Admin">
                                    <?php _e('Go to admin panel here', 'larestaurante'); ?></a>
                            </h5>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <h5 style="color:beige;"><?php echo esc_html__('telephone number: ', 'larestaurante');
                    echo cs_get_customize_option('phone_number'); ?></h5>
            </div>

        </div><!-- .row (login)-->

        <div class="row justify-content-end">
            <div class="col-sm-12 col-md-12">
                <?php if (cs_get_customize_option('copyright') == '') : ?>
                    <?php esc_attr_e('&copy;', 'larestaurante'); ?>
                    <?php _e(date('Y')); ?>
                <?php elseif (cs_get_customize_option('copyright') != ''): ?>
                    <h5>
                        <a href="<?php echo home_url('/') ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            <?php echo cs_get_customize_option('copyright'); ?>
                        </a>
                    </h5>
                <?php endif; ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </div><!--.container-fluid-->
</footer>
</body>
</html>									
