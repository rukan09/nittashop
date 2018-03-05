<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quickshop</title>

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
    function reg_validation() {
      //alert("Called");

      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var firstName = document.getElementById("firstName").value;
      var lastName = document.getElementById("lastName").value;
      var country = document.getElementById("country").value;


      if(email=="" || password=="" || firstName=="" || lastName=="" || country=="")
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



        if(firstName=="")
        {
          document.getElementById("error_firstName").style.display = "block";
        }
        else
        {
          document.getElementById("error_firstName").style.display = "none";  
        }


        if(lastName=="")
        {
          document.getElementById("error_lastName").style.display = "block";
        }
        else
        {
          document.getElementById("error_lastName").style.display = "none";  
        }


         if(country=="")
        {
          document.getElementById("error_country").style.display = "block";
        }
        else
        {
          document.getElementById("error_country").style.display = "none";  
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
                       <form action="registration_action.php" onsubmit="return reg_validation()" method="post">
                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" onkeyup="blankme(this.id)">
                              <small id="error_email" class="form-text error_msg">Email is required</small>
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password"  onkeyup="blankme(this.id)">
                              <small id="error_password" class="form-text error_msg">Password is required</small>
                            </div>

                            <div class="form-group">
                              <label for="firstName">First name</label>
                              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name"  onkeyup="blankme(this.id)">
                              <small id="error_firstName" class="form-text error_msg">First name is required</small>
                            </div>

                            <div class="form-group">
                              <label for="lastName">Last name</label>
                              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name"  onkeyup="blankme(this.id)">
                              <small id="error_lastName" class="form-text error_msg">Last name is required</small>
                            </div>

                            <div class="form-group">
                              <label for="country">Country</label>
                              <select class="form-control" id="country" name="country" onchange="blankme(this.id)" >

                                <option value="">Select country</option>
                                <option value="880">Bangladesh</option>
                                <option value="96">India</option>
                                <option value="44">United Kingdom</option>
                              </select>
                              <small id="error_country" class="form-text error_msg">Country is required</small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
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
