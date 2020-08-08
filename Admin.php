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
<?php
    ob_flush();
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Self Creation</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

   <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <p class="card-category">Total users</p>
                   <?PHP
                            include './connection.php';
                            $sql="select count(Id) from tbl_usermaster";
                            $result=$conn->query($sql);
                            
                            while($row= mysqli_fetch_row($result))
                            {
                                echo "$row[0]";
                            }
                        ?>        
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-male"></i>
                  </div>
                  <p class="card-category">Total Number Of Male User</p>
                 <?PHP
                            $sql="select count(Id) from tbl_usermaster where Gender='M'";
                            $result=$conn->query($sql);
                            
                            while ($row= mysqli_fetch_row($result))
                            {
                                echo "$row[0]";
                            }
                        ?>
                </div>
                
                  
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-male"></i>
                    <i class="fas fa-female"></i>
                  </div>
                  <p class="card-category">Total Number of Female User</p>
                  <?PHP
                             $sql="select count(Id) from tbl_usermaster where Gender='F'";
                            $result=$conn->query($sql);
                            
                            while ($row= mysqli_fetch_row($result))
                            {
                                echo "$row[0]";
                            }   
                        ?>
                </div>
               
                  
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <p class="card-category">How many User are Register on Today</p>
                 <?PHP
                            $today=date('y-m-d ');
                            $today1=date('y-m-d /t h-i-s');
                            
                            $sql="select count(Id) from tbl_usermaster where Insertted_on<='$today1' or  Insertted_on>='$today'";
                            $result=$conn->query($sql);
                            
                            while ($row= mysqli_fetch_row($result))
                            {
                                echo "$row[0]";
                            }
                        ?>
                </div>
               
              </div>
            </div>
          </div>
        
        </div>
      </div>
    
           

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
<?php
ob_end_flush();
?>