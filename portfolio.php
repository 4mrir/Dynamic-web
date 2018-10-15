
        <?php
        require_once 'functions/function.php';
        get_header();

         ?>
                    <div class="banner-full-image">
                        <div class="banner-title">
                            <h1><?php echo get_data('setting','type_name' , 'site_name', 'type_value'); ?></h1>
                            <a class="btn btn-primary" href="contact.php">read more</a>
                        </div>
                    </div>

                    <section id="gallery-block" class="section-padding">
                        <div class="container">
                            <div class="text-head">
                                <h2>Gallery</h2>
                            </div>
                            <div class="row">
                               <?php 
                                $gallery="SELECT * FROM galary ORDER BY id DESC";
                                $Q=mysqli_query($con,$gallery);
                                while ($data=mysqli_fetch_assoc($Q)) {
                                ?>
                                <!-- Start From Here -->
                                <div class="col-md-4 col-sm-4 col-xs-12 gallery-list">
                                    <div class="port-image">
                                        <img src="uploads/<?php echo $data['images']; ?>" alt="<?php echo $data['name']; ?>" class="img-responsive">
                                        <div class="overlay">
                                            <div class="text"><a href="uploads/<?php echo $data['images']; ?>" class="image-popup"><img src="assets/images/pin.png"></a></div>
                                        </div>
                                    </div>
                                    <h1 class="port-title"><?php echo $data['name']; ?></h1>
                                </div>
                                <?php } ?>
                                <!-- End from Here -->
                            </div>
                        </div>
                    </section>

                    
                  <?php get_footer(); ?>
