<?php
    ob_flush();
?>
<!DOCTYPE html>
<?php
session_start();
include './connection.php';
if(isset($_POST['login']))
{
    $uname=$_POST['username'];
    $pass=$_POST['password'];
        
    $sql="select Aid from tbl_adminstration where username='$uname' and password='$pass';";
    $result=$conn->query($sql);

    if($data=$result->num_rows)
    {
        $_SESSION['uname']=$uname;
        header("Location:Admin.php");
    }
    else 
    {
        echo "Invalid Username and Password";   
    }
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Self Creation</title>
  <script src="jquery-3.2.1.min.js"></script>
  <script src="newjavascript.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <form action="#" method="post">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">User Management System</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/IMG_2356.JPG"  alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
       <!-- <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Add User">Add User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="View User">View User</a>
        </li>
        <li class="nav-item">-->
       <a class="nav-link js-scroll-trigger" href="index.php">Login</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Logout">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Search Data">Search Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#awards">Update User</a>
        </li>-->
      </ul>
    </div>
  </nav>

 
    <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="card shadow">
        <article class="card-body">
            <a href="Register.php" class="float-right btn btn-outline-primary">Sign up</a>
                <h4 class="card-title mb-4 mt-1">Sign in</h4>
                <p>
                        <a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                        <a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
                </p>
                <hr>
               
                <form action="" method="post">
                    <div class="form-group"> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>            
                            <input name="username" class="form-control" placeholder="Email or login" type="email">
                        </div>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                 </div>
                            <input name="password" class="form-control" placeholder="******" type="password">
                        </div>
                    </div> <!-- form-group// -->                                      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" name="login" value="Login" class="btn btn-primary btn-block"> Login  </button>
                            </div> <!-- form-group// -->
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="small" href="Forgot.php">Forgot password?</a>
                        </div>                                            
                    </div> <!-- .row// --> 
                    
                </form>
               
        </article>
        </div> <!-- card.// -->

        </div> <!-- row.// -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

    
  </form>
    

</body>

</html>
<?php
ob_end_flush();
?>