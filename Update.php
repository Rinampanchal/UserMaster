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
include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Update User</title>

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


        <div class="container">
            <div class="py-3 text-center">
            </div>
            <div class="row">
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3">Register</h4>
                    <form  action="#" method="POST" class="needs-validation" novalidate>

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
                                            $sql = "select Email_Id from tbl_usermaster;";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_row($result)) {
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
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_signup">Update User<i class="fas fa-user-plus"></i></button>
                            </div>    
                            </tr>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['btn_signup'])) {
            
            $Email = $_POST['Email_Id'];
            $sql = "SELECT * FROM tbl_usermaster WHERE Email_Id='$Email';";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_row($result)) {
                ?>
                <form action="#" method="post">
                    <center>
                        <table>
                            <tr>
                                <td>User Id:</td>
                                <td>
                                    <input type="text" name="Id" value="<?PHP echo "$row[0]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>
                                    <input type="text" name="First_Name" value="<?PHP echo "$row[2]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Middle Name:</td>
                                <td>
                                    <input type="text" name="Middle_Name" value="<?PHP echo "$row[4]"; ?>"> 
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>
                                    <input type="text" name="Last_Name" value="<?PHP echo "$row[3]"; ?>"> 
                                </td>
                            </tr>
                            <tr>
                                <td>Email id:</td>
                                <td>
                                    <input type="email" name="Email_Id" value="<?PHP echo "$row[1]"; ?>" > 
                                </td>
                            </tr>
                            <tr>
                                <td>Zip code:</td>
                                <td>
                                    <input type="text" name="Pin_code" value="<?PHP echo "$row[9]"; ?>"> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                
                                    <label for="gender">Gender</label>
                                </td>
                                <td>
                                  <?php
                                    if($row[5]=="M")
                                    {
                                        echo "<input name='Gender' type='radio' value='M' checked>Male"
                                        . "<input name='Gender' type='radio' value='F' >Female ";
                                    }
                                    elseif($row[5]=="F") 
                                    {
                                        echo "<input name='Gender' type='radio' value='M' >Male"
                                        . "<input name='Gender' type='radio' value='F' checked>Female ";                                  
                                    }   

                                  ?>
               
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Address:</td>
                                <td>
                                    <input type="text" name="Address" value="<?PHP echo "$row[11]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Country ID:</td>
                                <td>
                                    <input type="text" name="countryid" value="<?PHP echo "$row[6]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>State ID:</td>
                                <td>
                                    <input type="text" name="sid" value="<?PHP echo "$row[7]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>City ID:</td>
                                <td>
                                    <input type="text" name="cid" value="<?PHP echo "$row[8]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Birth Date:</td>
                                <td>
                                    <input type="date" name="Date_of_birth" value="<?PHP echo "$row[10]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Aadharcard Number:</td>
                                <td>
                                    <input type="number" name="Adharcard_number" value="<?PHP echo "$row[13]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Pancard Number:</td>
                                <td>
                                    <input type="number" name="Pancard_number" value="<?PHP echo "$row[14]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td>
                                    <input type="password" name="Password" value="<?PHP echo "$row[15]"; ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Select Image:</td>
                                <td>
                                    <input type="file" name="Profile_Photo" value="<?PHP echo "$row[17]"; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="btn_update" value="Update"></td>
                            </tr>
                        </table>
                    </center>
                </form>
                <?PHP
                }
            }
        
                if (isset($_POST["btn_update"])) {

                    $Email = $_POST['Email_Id'];
                    $fname = $_POST['First_Name'];
                    $lname = $_POST['Last_Name'];
                    $mname = $_POST['Middle_Name'];
                    $gender = $_POST['Gender'];
//                    if($gender=="M")
//                    {
//                        $gender="Male";
//                    }
//                    elseif ($gender=="F") 
//                    {   
//                        $gender="Female";
//                    }
                    $conid = $_POST['countryid'];
                    $stid = $_POST['sid'];
                    $ctid = $_POST['cid'];
                    $pcode = $_POST['Pin_code'];
                    $dob = $_POST['Date_of_birth'];
                    $addr = $_POST['Address'];
                    $filename = $_POST['Profile_Photo'];
                    $adhar = $_POST['Adharcard_number'];
                    $pnum = $_POST['Pancard_number'];
                    $pass = $_POST['Password'];
 
                    $query="UPDATE tbl_usermaster SET First_Name='$fname',Last_Name='$lname',Middle_Name='$mname',Gender='$gender',countryid='$conid',sid='$stid',cid='$ctid',Pin_code='$pcode',Date_of_birth='$dob',Address='$addr',Profile_Photo='$filename',Adharcard_number='$adhar',Pancard_number='$pnum',Password='$pass' WHERE Email_Id= '$Email';";
                    $sql_insert = mysqli_query($conn, $query);
                    //$result=$conn->query($sql);
                    //$sql_insert = mysqli_query($conn, $query);
                    if ($sql_insert)
                    {
                        echo "<br> &block;&blk34;&blk12;&blk14; Data Inserted &check;";
                        //$Id=$conn->insert_id;
                        header("location:view.php");
                        echo "data Updated.....&check;";
                    }
                    else
                    {
                die("<br> failed Update &gla;".  mysqli_error($conn));
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