<?php

  require_once 'functions/function.php';
  get_header();
  $s='';
if ($_POST) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $msg=$_POST['message'];
    $sql="INSERT INTO contact(name,email,subject,msg) VALUES(
        '$name','$email','$subject','$msg')";

    $q=mysqli_query($con,$sql);
    if ($q) {
        $s=true;
    }

}



 ?>
            <div class="banner-full-image">
                <div class="banner-title">
                    <h1><?php echo get_data('setting','type_name' , 'site_name', 'type_value'); ?></h1>
                    <a class="btn btn-primary" href="index.php">read more</a>
                </div>
            </div>

            <!---About-->
            <section id="contact" class="section-padding">
                <div class="container">
                    <div class="text-head">
                        <h2>contact us</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 width-set-60">
                            <h1 class="maintitle"><span><i class="fa fa-envelope"></i> Get in Touch</span></h1>
                            <div class="wrapcontact">
                                <?php if ($s!=null): ?>
                                    
                               
                                <div class="done" style="">
                                    <div class="alert-box alert alert-success ">Your message has been sent. Thank you! <a class="close" href="javascript:void(0)">x</a></div>
                                </div>

                                 <?php endif ?>
                                <form action="" method="post" id="contactform">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject" name="subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email Address" name="email">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" id="message" placeholder="Message" cols="30" class="form-control" rows="10"></textarea>
                                            </div>

                                            <input name="submit" type="submit" class="btn btn-primary" value="submit">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12 width-set-40">
                            <h1 class="maintitle"><span><i class="fa fa-map-marker"></i> Locations</span></h1>
                            <dl>
                                <dt><?php echo get_data('setting','type_name' , 'site_address', 'type_value'); ?></dt>
                                <dd><span>Telephone:</span><?php echo get_data('setting','type_name' , 'site_phone', 'type_value'); ?></dd>
                                <dd><span>E-mail:</span><?php echo get_data('setting','type_name' , 'site_email', 'type_value'); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </section>

          <?php get_footer(); ?>
