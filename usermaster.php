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
    
    <?php
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if (isset($_POST["btn_signup"]))
                {
                    $Email=$_POST['Email_Id'];
                    $fname=$_POST['First_Name'];
                    $lname=$_POST['Last_Name'];
                    $mname=$_POST['Middle_Name'];
                    $gender=$_POST['Gender'];
                    if($gender=="M")
                    {
                        $gender="M";
                    }
                    elseif ($gender=="F") 
                    {   
                        $gender="F";
                    }
                    $conid=$_POST['countryid'];
                    $stid=$_POST['sid'];
                    $ctid=$_POST['cid'];
                    $pcode=$_POST['Pin_code'];
                    $dob=$_POST['Date_of_birth'];
                    $addr=$_POST['Address'];
                    $adhar=$_POST['Adharcard_number'];
                    $pnum=$_POST['Pancard_number'];
                    $pass=$_POST['Password'];
                    //$inset=$_POST['Insertted_on'];
                    
                    //$path="./profileimages/"; 
                      $path="profileimages/";
       
                    $filename=$_FILES['Profile_Photo']['name'];



                    $temp=$_FILES['Profile_Photo']['tmp_name'];

                    $file_size=$_FILES['Profile_Photo']['size'];
                    $filetype=$_FILES['Profile_Photo']['type'];

                    $target_file=$path.basename($filename);
                    

                    move_uploaded_file($temp,"profileimages/".$filename);
                    
                    echo "Name:-".$_POST["First_Name"];
                    include './connection.php';
                    //$query="INSERT INTO tbl_usermaster(Id,Email_Id,First_Name,Last_Name,Middle_Name,Gender,countryid,sid,cid,Pin_code,Date_of_birth,Address,Profile_Photo,Adharcard_number,Pancard_number,Password,Insertted_on) VALUES ('','$Email','$fname','$lname','$mname','$gender','$conid','$stid','$ctid','$pcode','$dob','$addr','$pphoto','$adhar','$pnum','$pass','$inset')";
               
                    $query="INSERT INTO tbl_usermaster(Email_Id,First_Name,Last_Name,Middle_Name,Gender,countryid,sid,cid,Pin_code,Date_of_birth,Address,Profile_Photo,Adharcard_number,Pancard_number,Password,Insertted_on) VALUES (   '$Email','$fname','$lname','$mname','$gender','$conid','$stid','$ctid','$pcode','$dob','$addr','$target_file','$adhar','$pnum','$pass','".  date("Y-m-d \t h-i-s")."');";
                    $sql_insert = mysqli_query($conn, $query);
                    if ($sql_insert)
                    {
                        echo "<br> &block;&blk34;&blk12;&blk14; Data Inserted &check;";
                        $Id=$conn->insert_id;
                        //$pid=$conn->insert_id;
                        header("location:view.php?Id=".$Id);
                        //echo "data inserted.....&check;";
                    }
                    else
                    {
                        echo $query;
                        die(mysqli_error($conn));
                        
                    }
                }         
            }
    ?>
    
     <div class="container">
      <div class="py-3 text-center">
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Register</h4>
          <form class="needs-validation" novalidate action="#" method="POST" enctype="multipart/form-Data">
            <div class="row">
              <div class="col-md-4 mb-3">                        
                <label for="firstName">First name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" name="First_Name" class="form-control" id="firstName" placeholder="First " value="" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="Middle name">Middle name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                <input type="text" name="Middle_Name" class="form-control" id="middleName" placeholder="Middle name" value="" required>
                <div class="invalid-feedback">
                  Valid Middle name is required.
                </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                <input type="text" name="Last_Name" class="form-control" id="lastName" placeholder="Last name" value="" required>
                <div class="invalid-feedback">
                  Valid Last name is required.
                </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="mb-3">
                      <label for="email">Email <span class="text-muted">(Optional)</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                          <input type="email" name="Email_Id" class="form-control" id="email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        Please enter a valid email address.
                      </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text"  name="Pin_code" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
                <div class="d-block">
              <label for="gender">Gender</label>
              <div class="custom-control custom-radio">
                  <input id="credit" name="Gender" type="radio" value="M" class="custom-control-input " checked>
                <label class="custom-control-label" for="male">Male</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="debit" name="Gender" type="radio" value="F" class="custom-control-input">
                <label class="custom-control-label" for="female">Female</label>
              </div>
            </div>
            </div>
            <div class="mb-3 my-3">
              <label for="address">Address</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                <input type="text" name="Address" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your address.
                </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="Country ID">Country ID</label>
                    <input type="text"  name="countryid" class="form-control" id="Country ID" placeholder="" required>
                        <div class="invalid-feedback">
                          Country ID  required.
                        </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="State ID">State ID</label>
                    <input type="text"  name="sid" class="form-control" id="State ID" placeholder="" required>
                        <div class="invalid-feedback">
                          State ID  required.
                        </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="City ID">City ID</label>
                    <input type="text"  name="cid" class="form-control" id="City ID" placeholder="" required>
                        <div class="invalid-feedback">
                          City ID  required.
                        </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Birth Date">Birth Date</label>
                    <input type="date"  name="Date_of_birth" class="form-control" id="Birth Date" placeholder="" required pattern="m/d/Y">
                        <div class="invalid-feedback">
                          Birth Date  required.
                        </div>
                </div>
            </div>
          <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="Addharcard Number">Aadharcard Number</label>
                    <input type="number"  name="Adharcard_number" class="form-control" id="Aadharcard Number" placeholder="" required>
                        <div class="invalid-feedback">
                         Aadharcard Number  required.
                        </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Pancard Number">Pancard Number</label>
                    <input type="number"  name="Pancard_number" class="form-control" id="Pancard Number" placeholder="" required>
                        <div class="invalid-feedback">
                        Pancard Number  required.
                        </div>
                    
                    <img src="capcha.php">
                    <input type="text" name="captcha">
                    
                    
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Password">Password</label>
                    <input type="password"  name="Password" class="form-control" id="Password" placeholder="" required>
                        <div class="invalid-feedback">
                        password  required.
                        </div>
                </div>
                <!--<div class="col-md-3 mb-3">
                    <label for="Inserted On">Inserted On</label>
                    <input type="datetime"  name="Insertted_on" class="form-control" id="Inserted On" placeholder="" required>
                        <div class="invalid-feedback">
                        inserted on  required.
                        </div>
                </div>-->
          </div>
              <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="Select Image">Select Image</label>
                    <input type="file"  name="Profile_Photo" class="form-control" id="fileToUpload" placeholder="" required>
                        <div class="invalid-feedback">
                        photo  required.
                        </div>
                </div>
              </div>
                   
            <hr class="mb-4">
            <div class="row">
              <div class="col-md-3 mb-3">
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_signup">Sign up <i class="fas fa-user-plus"></i></button>
                </div>
              </div>
            </div>
          </form>
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