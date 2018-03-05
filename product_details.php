<?php

require('adminpanel/pages/connection.php');

$product_id = $_REQUEST['pid'];

$sql_00 = "SELECT * FROM  products  WHERE product_id = '$product_id'";

$res_00 =  mysqli_query($con, $sql_00);

$row_select = mysqli_fetch_assoc($res_00);


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php include('title.php'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <style type="text/css">
      
      .product_img{
        width: 200px;
        max-height: 200px;
        height: auto;

      }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <?php include('navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            
            <?php
            $sql2 = "SELECT c.* FROM products AS p INNER JOIN categories AS c  ON p.product_category=c.catid WHERE p.product_status = '1' GROUP BY c.catid ORDER BY c.category_name";

            $res2 =  mysqli_query($con, $sql2);

            while ( $row_cat = mysqli_fetch_assoc($res2))
            {
              ?>

              <a href="category_product.php?catid=<?php echo $row_cat['catid']; ?>" class="list-group-item"><?php echo $row_cat['category_name']; ?></a>
              <?php
            }
            ?>
            
          </div>
          

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          
          

          <div class="row">

            <?php 

            $sql = "SELECT p.*, c.category_name FROM products AS p INNER JOIN categories AS c  ON p.product_category=c.catid WHERE p.product_status = '1' AND p.product_id ='$product_id' ORDER BY p.product_category DESC";

            $res =  mysqli_query($con, $sql);

            while ( $row = mysqli_fetch_assoc($res)) {
              
              //echo $row['product_name']."<br/>";
              ?>
               <div class="col-lg-6 col-md-6 mb-6">
                <div class="card h-100">
                  <div style="min-height: 100px">
                  <a href="#"><img class="card-img-top product_img" src="<?php echo $row['product_image']; ?>" alt=""></a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#"><?php echo $row['product_name']; ?></a>
                    </h4>

                    <h6 class="card-title">
                      <?php echo $row['category_name']; ?>
                    </h6>
                    <h5>BDT <?php echo $row['product_price']; ?></h5>
                    <p class="card-text"><?php echo $row['product_details']; ?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  </div>
                </div>
              </div>

              <?php

            }
             ?>

           

            

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2063660527428030",
    enable_page_level_ads: true
  });
</script>

  </body>

</html>
