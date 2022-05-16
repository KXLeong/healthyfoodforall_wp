<?php

/**
 * This file is called on the staging site in
 * @see /Backend/views/clone/index.php
 */

?>

<span class="wpstg-notice--white wpstg-mt-20px">
    <?php echo __("If you want to transfer this staging site to the production site,", "wp-staging") ?>
    <br/>
    <?php echo sprintf(__("<a href='%s' target='_new'>Open WP STAGING on Live Site</a> and start the push process from there.", 'wp-staging'), (new WPStaging\Framework\Utils\Urls())->getProductionHostname() . '/wp-admin/admin.php?page=wpstg_clone'); ?>
    <br/> <br/>
    <?php _e("If you want to clone this staging site, you can <a href='#' id='wpstg-enable-staging-cloning'>click here</a>!", 'wp-staging'); ?>
    <br/> <br/>
    <?php echo sprintf(__("<a href='%s' target='_new'>Read this article</a> if you would like to know more about cloning a staging site.", 'wp-staging'), 'https://wp-staging.com/docs/cloning-a-staging-site-testing-push-method/'); ?>
</span>
