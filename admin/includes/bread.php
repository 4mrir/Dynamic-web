
<?php
    $link=explode('/',$_SERVER['PHP_SELF']);
    $b = explode('.', end($link));
    
    
    ?>




<div class="col-md-10 admin-part pd0">
            	<ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#">
                      <?php
                      if($b[0]=='index'){
                          echo 'Dashboard';
                      }else{
                        echo ucfirst($b[0]);
                      }
                      
                      
                      ?>
                      
                      
                      
                  </a></li>
                </ol>
                