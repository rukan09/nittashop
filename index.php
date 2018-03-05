<?php

// require('adminpanel/pages/connection.php');



require_once 'classes/class.Cart.php';

// Initialize cart object
$cart = new Cart([
  // Maximum item can added to cart, 0 = Unlimited
  'cartMaxItem' => 0,

  // Maximum quantity of a item can be added to cart, 0 = Unlimited
  'itemMaxQuantity' => 100,

  // Do not use cookie, cart items will gone after browser closed
  'useCookie' => false,
]);





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


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
      
      .product_img{
        width: 100px;
        max-height: 100px;
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

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">




            <?php 

            $sql = "SELECT p.*, c.category_name FROM products AS p INNER JOIN categories AS c  ON p.product_category=c.catid WHERE p.product_status = '1' ORDER BY p.product_category DESC";

            $res =  mysqli_query($con, $sql);

            while ( $row = mysqli_fetch_assoc($res)) {
              
              //echo $row['product_name']."<br/>";
              ?>
               <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <div style="min-height: 100px">
                  <a href="product_details.php?pid=<?php echo $row['product_id']; ?>"><img class="card-img-top product_img" src="<?php echo $row['product_image']; ?>" alt=""></a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="product_details.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
                    </h4>

                    <h6 class="card-title">
                      <?php echo $row['category_name']; ?>
                    </h6>
                    <h5>BDT <?php echo $row['product_price']; ?></h5>
                    <p class="card-text"><?php echo $row['product_details']; ?></p>


                    <form>
                      <input type="hidden" value="<?php echo $row['product_id']; ?>" class="product-id" />

              

                      <div class="form-group">
                        <label>Quantity:</label>
                        <input type="number" value="1" class="form-control quantity" />
                     
                        <button class="btn btn-danger add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                      </div>
                    </form>


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



<script>
      $(document).ready(function(){
        $('.add-to-cart').on('click', function(e){
          e.preventDefault();

          var $btn = $(this);
          var id = $btn.parent().parent().find('.product-id').val();
          //var color = $btn.parent().parent().find('.color').val() || '';
          var qty = $btn.parent().parent().find('.quantity').val();

          var $form = $('<form action="cart_action.php?a=cart" method="post" />').html('<input type="hidden" name="add" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="qty" value="' + qty + '">');

          $('body').append($form);
          $form.submit();
        });

        $('.btn-update').on('click', function(){
          var $btn = $(this);
          var id = $btn.attr('data-id');
          var qty = $btn.parent().parent().find('.quantity').val();
          //var color = $btn.attr('data-color');

          var $form = $('<form action="cart_action.php?a=cart" method="post" />').html('<input type="hidden" name="update" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="qty" value="'+qty+'">');

          $('body').append($form);
          $form.submit();
        });

        $('.btn-remove').on('click', function(){
          var $btn = $(this);
          var id = $btn.attr('data-id');
          var color = $btn.attr('data-color');

          var $form = $('<form action="cart_action.php?a=cart" method="post" />').html('<input type="hidden" name="remove" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="color" value="'+color+'">');

          $('body').append($form);
          $form.submit();
        });

        $('.btn-empty-cart').on('click', function(){
          var $form = $('<form action="cart_action.php?a=cart" method="post" />').html('<input type="hidden" name="empty" value="">');

          $('body').append($form);
          $form.submit();
        });
      });
    </script>

  </body>

</html>
