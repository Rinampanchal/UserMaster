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

        <title>View User</title>

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
                        <a class="nav-link js-scroll-trigger" href="Search Data">Search Data</a>
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
        <?php
        include './connection.php';
        $sql = "select * from tbl_usermaster";
        $result1 = mysqli_query($conn, $sql);
        $result = $conn->query($sql);
        ?>
        <?php
            if(isset($_POST['btnsubmit']))
            {
                $search=$_POST['txtsearch'];
                $sql = "select * from tbl_usermaster where First_Name like '%$search%'";
                $result = $conn->query($sql);
            }
        ?>
        <div class="row">
            <div class="col-md-4 order-md-1">
                <form method="post" action="#">
                    <div class="row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" name="txtsearch" class="form-control" id="txtsearch" placeholder="Search " value="" required>
                            <div class="invalid-feedback">
                              Valid first name is required.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnsubmit">Search<i class="fas fa-user-plus"></i></button>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
        <?php
        echo "<center>";
        echo "<table class='table table-striped' border='1'>";
        if ($result->num_rows > 0) {
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Email</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Middle Name</th>";
            echo "<th>Gender</th>";
            echo "<th>Country</th>";
            echo "<th>State</th>";
            echo "<th>City</th>";
            echo "<th>Pincode</th>";
            echo "<th>Datecof birth</th>";
            echo "<th>Address</th>";
            echo "<th>Profile Photo</th>";
            echo "<th>Adharcard number</th>";
            echo "<th>Pancard number</th>";
            echo "<th>DELETE</th>";
            echo "<th>UPDATE</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                $sql_country = "SELECT * FROM `tbl_country` WHERE countryid=".$row["countryid"].";";
                $result_country  = $conn->query($sql_country);
                while ($rows = $result_country->fetch_assoc()) {
                    $cont_id=$rows['countryid'];
                    $cont_name=$rows['cname'];
                }
                $sql_country = "SELECT * FROM `tbl_state` WHERE sid=".$row["sid"].";";
                $result_country  = $conn->query($sql_country);
                while ($rows = $result_country->fetch_assoc()) {
                    $State_id=$rows['sid'];
                    $State_name=$rows['sname'];
                }
                $sql_country = "SELECT * FROM `tbl_city` WHERE cid=".$row["cid"].";";
                $result_country  = $conn->query($sql_country);
                while ($rows = $result_country->fetch_assoc()) {
                    $City_id=$rows['cid'];
                    $City_name=$rows['sname'];
                }
                echo "<tr>";
                //echo "<td>" . $row["Id"] . "</td><td>" . $row["Email_Id"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Middle_Name"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["countryid"] . "</td><td>" . $row["sid"] . "</td><td>" . $row["cid"] . "</td><td>" . $row["Pin_code"] . "</td><td>" . $row["Date_of_birth"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Profile_Photo"] . "</td><td>" . $row["Adharcard_number"] . "</td><td>" . $row["Pancard_number"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["Insertted_on"] . "</td>";
                echo "<td>" . $row["Id"] . "</td><td>" . $row["Email_Id"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Middle_Name"] . "</td><td>" . $row["Gender"] . "</td><td>" . $cont_name . "</td><td>" . $State_name . "</td><td>" . $City_name. "</td><td>" . $row["Pin_code"] . "</td><td>" . $row["Date_of_birth"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Profile_Photo"] . "</td><td>" . $row["Adharcard_number"] . "</td><td>" . $row["Pancard_number"] . "</td>"; 
            ?>
    <td><a href="Delete.php?Id=<?php echo $row['Id'] ?>"><i class="fas fa-user-minus"></i></a></td>
    <td><a href="Update.php?Id=<?php echo $row['Id'] ?>"><i class="fas fa-user-edit"></i></a></td>
     <?PHP  echo "</tr>";
            }
        }
        echo '</table>';
        ?>
    </body>
</html>