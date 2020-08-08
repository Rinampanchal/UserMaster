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
<?php
    include './connection.php';
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Self Creation</title>
  <style>
        .div1{
              
                color: black;
            }
            
    </style>

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

    
            
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
          <div class="row">
              <DIV class="col-lg-12" style="padding: 90px;margin: 12px">
         <?php
         if (isset($_POST['btnmd'])) {
            if (isset($_POST['cbmd'])) {
            $dcb = $_POST['cbmd']; 
            }
            $a = implode(",", $dcb);
            $md = "delete from tbl_usermaster where Id in($a)";
            if (mysqli_query($conn, $md)) {
                echo "delete successfully";
            } else {
                echo "delete un successful";
            }    
        }
        ?>          
        <form  action="#" method="post">
            <?php
            $search = "select * from tbl_usermaster";
            $result = $conn->query($search);
            echo "<div class='div1'>";
            echo "<table class='table table-striped' border=1>";
            echo "<tr><th></th><th>First Name</th><th>Profile Path</th><th>Email</th><th>Date Of Birth</th</tr>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                ?>
                <td><input type="checkbox" name="cbmd[]" value="<?php echo $row['Id'] ?>"></td>
                <?php
                echo "<td>" . $row['First_Name'] . "</td>";
                echo "<td>" . $row['Profile_Photo'] . "</td>";
                echo "<td>" . $row['Email_Id'] . "</td>";
                echo "<td>" . $row['Date_of_birth'] . "</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            ?>
            <div class="row">
            <div class="col-md-3 mb-3">
            <div class="mb-3">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnmd">Multiple Delete<i class="fas fa-user-minus"></i></button>
            </div>
            </div>
             </div>
        </form>
              </div>
          </div>
    </header>
</body>
</html>