<?php
include('check_admin.php');

require('connection.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       <?php include 'navigation.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="product_action.php" method="post" enctype="multipart/form-data">


                                    <input type="hidden" name="product_id" value="0">

                                        <div class="form-group">
                                            <label>Product category</label>



                                            <select class="form-control" id="product_category" name="product_category" required>
                                                <option value=""></option>
                                                <?php

                                                $sql = "SELECT * FROM categories ORDER BY category_name";

                                                $res =  mysqli_query($con, $sql);

                                                while ($row = mysqli_fetch_assoc($res)) 
                                                {
                                                ?>
                                                 <option value="<?php echo $row['catid']; ?>"><?php echo $row['category_name']; ?></option>
                                                <?php  
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Product price</label>
                                            <input type="text" class="form-control" id="product_price" name="product_price">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Product image</label>
                                            <input type="file" class="form-control" id="product_image" name="product_image">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Product details</label>
                                            <input class="form-control" id="product_details" name="product_details">
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product stock</label>
                                            <input class="form-control" id="product_stock_in" name="product_stock_in">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Product status</label>
                                             <select class="form-control" id="product_status" name="product_status" required>
                                                <option value="0">Pending</option>
                                                <option value="1">Active</option>
                                                
                                            </select>
                                            
                                        </div>

                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
