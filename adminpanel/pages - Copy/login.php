<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quick shop login</title>

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


    <style type="text/css">
        
        .bg_1{
            background-color: green;

        }

        .bg_2{
            background-color: gray;
            
        }


    .error_msg{

      color: #f00;
      display: none;
    }
    </style>

  <script>
    function login_validation() {
      //alert("Called");

      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;



      if(email=="" || password=="")
      {


        if(email=="")
        {
          document.getElementById("error_email").style.display = "block";
        }
        else
        {
          document.getElementById("error_email").style.display = "none";  
        }


        if(password=="")
        {
          document.getElementById("error_password").style.display = "block";
        }
        else
        {
          document.getElementById("error_password").style.display = "none";  
        }



        return false;

      }
      else
      {
        return true;
      }

     

      


      //return true;
    }


    function blankme(id) {
      
       var val = document.getElementById(id).value;

       var error_id = "error_"+id;

       if(val==""){

        document.getElementById(error_id).style.display = "block";
       }
       else
       {
        document.getElementById(error_id).style.display = "none";
       }
    }
  </script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login_action.php" onsubmit="return login_validation()" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" onkeyup="blankme(this.id)" autofocus>
                                    <small id="error_email" class="error_msg">Email is required</small>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" onkeyup="blankme(this.id)" value="">
                                    <small id="error_password" class="error_msg">Password is required</small>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-success" type="submit">Login</button>
                               <br/><br/>
                                <a href="registration.php" class="btn btn-primary btn-block">Create account</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
