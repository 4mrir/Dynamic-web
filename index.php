<?php
if (file_exists('functions/function.php')) {
  require_once 'functions/function.php';
}
get_header();
 ?>

            <div class="banner-full-image">
                <div class="banner-title">
                    <h1><?php echo get_data('setting','type_name' , 'site_name', 'type_value'); ?></h1>
                    <a class="btn btn-primary" href="about.php">read more</a>
                </div>
            </div>

    <<?php

    get_footer();
     ?>
