<?php
    session_start();
    if(isset($_SESSION['uname']))
    {
        
    }
    else 
    {
        header('location:index.php?error='."Login First");
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Insertation</title>

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
          <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="Admin.php">Home Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="usermaster.php">Add User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="view.php">View User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="view.php">Search Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Update.php">Update User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Delete.php">Delete user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="MultipleDelete.php">Multiple User Delete</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
    
    
    
     
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Register</h4>
          <form class="needs-validation" novalidate action="#" method="POST">
           
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="mb-3">
                      <label for="email">Email <span class="text-muted">(Optional)</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                          <select type="email" name="Email_Id" class="form-control" id="email">
                               <?PHP
                                    include './connection.php';
                                    $sql="select Email_Id from tbl_usermaster;";
                                    $result= mysqli_query($conn, $sql);
                                    
                                    while ($row=mysqli_fetch_row($result))
                                    {
                                        echo "<option value='$row[0]'>$row[0]</option>";
                                    }
                                ?>
                          </select>
                            
                      </div>
                    </div>
                </div>
              
                     
            <hr class="mb-4">
            <tr>
                <div class="col-md-3 mb-3"></div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_signup">Delete Data<i class="fas fa-user-plus"></i></button>
                </div>    
            </tr>
        </div>
        </form>
      </div>
    </div>
         
         <?php
           include './connection.php';
           if(isset($_POST['btn_signup']))
           {
                $Email=$_POST['Email_Id'];

           $sql="delete from tbl_usermaster where Email_Id='$Email';";
           if($conn->query($sql))
           {
               echo "Data Succesfully Delete";
               //header("Location:view.php");
           }
           else
           {
               echo "Delete Unsuccessfully";
           }
           }
           
         
         ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>