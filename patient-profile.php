<?php
    include('db_connection.php');

    $id = $_GET['patientID']; // fetched ID

    // get patient info to print in form
    $sql = "SELECT patientID, firstName, middleName, lastName, email, dateOfBirth, sex, bloodType FROM tblusers WHERE patientID='$id';"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row["patientID"];
    $fname = $row["firstName"];
    $midname = $row["middleName"];
    $lname = $row["lastName"];
    $email = $row["email"];
    $dob = $row["dateOfBirth"];
    $sex = $row["sex"];
    $blood = $row["bloodType"];

    //changing user info
    if($_SERVER["REQUEST_METHOD"] == "POST"){
         // fetching info upon submission
        $newfname = $_POST["fname"];
        $newmidname = $_POST["midname"];
        $newlname = $_POST["lname"];
        $newsex = $_POST["sex"];
        $newblood = $_POST["blood"];
        $newdob = $_POST["dob"];
        $newemail = $_POST["email"];

        // comparing info submitted before updating
        if ($newfname != $fname || $newmidname != $midname || $newlname != $lname || $newsex != $sex || $newblood != $blood || $newdob != $dob || $newemail != $email) {
            $updatesql = "UPDATE tblusers SET firstName = '$newfname', middleName = '$newmidname', lastName = '$newlname', sex = '$newsex', bloodType = '$newblood', dateOfBirth = '$newdob', email = '$newemail' WHERE patientID = $id";
            $updateresult = $conn->query($updatesql);
            if ($updateresult) {         
                header('location: patient-profile.php?patientID='.$id);
            }
        }       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- DROPDOWN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style>
        .nav-item {
            font-family: DM Sans;
            font-weight: bold;
            font-size: 14px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #BE9355;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: black;
            text-decoration: none;
        }

        .greeting {
            color: #BE9355; 
            font-size: 16px;          
            font-weight: normal;            
            margin-top: 10%;
        }

        .dropdown-menu {
            width: max-content;
            font-family: DM Sans;
            border-radius: 10px;
        }

        .dropdown-name {
            font-family: 'Poppins';
            font-size: 14px;
            font-weight: bold;
            padding: 10px;
            padding-top: 5px;
            padding-bottom: 0;
        }

        .dropdown-email {
            font-family: 'Poppins';
            font-size: 11px;
            color: #999999;
            padding: 10px; 
            padding-top: 0;
        }

        .dropdown-divider {
            color: #f5f5f5;
            margin: 0 auto;         
            width: 85%;
        }

        .form-title {
            font-family: 'DM Sans';
            font-weight: bold;
            font-size: 16px;
            margin-left: 15px;
        }

        .form-label {
            font-family: "DM Sans"; 
            font-size: 12px;
            margin-top: 5px;
            color: #999999;
            font-weight: lighter;
        }

        .form-control, .form-select {
            font-family: "DM Sans"; 
            font-size: 16px;
        }

        .button {
            font-family: "DM Sans";
            color: white;
            background-color: #BE9355;
            border-radius: 12px;
            padding: 8px;  
            border-color: transparent;
            float: right;
            margin-top: 15px;
            margin-right: 15px;
        }

        .footer {
            background-color: #f4f5f6;
            font-family: DM Sans;
        }
        
        .footer-title {
            font-family: Poppins;
            font-weight: bold;
            color: #BE9355;
            font-size: 16px;
        }

        .footer-icons {
            float: right;
        }  
    </style>

    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="patient-home.php?patientID=<?php echo $id ?>">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="patient-home.php?patientID=<?php echo $id ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patient-appt.php?patientID=<?php echo $id ?>">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        
            <ul class="nav navbar-nav">
                <li class="nav-item greeting">Hi, <?php echo $fname ?></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #BE9355"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-name"><?php echo $fname . " " . $lname ?></li>
                        <li class="dropdown-email"><?php echo $email ?></li>
                        <div class="dropdown-divider"></div>
                        <li class="dropdown-link"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Profile</a></li>
                        <div class="dropdown-divider"></div>                   
                        <li class="dropdown-link"><a href="guest-index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>

    <br><br><br>

    <!-- PROFILE -->
    <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Profile</p>
    <br>

    <form method="post">
        <div class="container">       
            <p class="form-title">Personal Information</p>
            <div>
                <div class="form-group col-md-4">
                    <label class="form-label">FIRST NAME</label>
                    <input type="text" class="form-control" value="<?php echo $fname ?>" name="fname">
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label">MIDDLE NAME</label>
                    <input type="text" class="form-control" value="<?php echo $midname ?>" name="midname">
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label">LAST NAME</label>
                    <input type="text" class="form-control" value="<?php echo $lname ?>" name="lname">
                </div>
            </div>
            <div>           
                <div class="form-group col-md-6">
                    <label class="form-label">SEX</label>
                    <select class="form-select" aria-label="Default select example" name="sex">
                        <option selected><?php
                            if($sex=='F'){ ?> 
                                <option selected>Female</option> 
                                <option>Male</option> <?php }
                            else { ?> 
                                <option selected>Male</option> 
                                <option>Female</option> <?php } ?>
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">BLOOD TYPE</label>
                    <input type="text" class="form-control" value="<?php echo $blood ?>" name="blood">
                </div>
            </div>
            <div>
                <div class="form-group col-md-6">
                    <label class="form-label">DATE OF BIRTH</label>
                    <input type="date" class="form-control" value="<?php echo $dob ?>" name="dob">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">EMAIL</label>
                    <input type="email" class="form-control" value="<?php echo $email ?>" name="email">
                </div>
            </div>
            <button type="submit" class="button" name="submit">Update Profile</button>
        </div>
    </form>

    <br><br>

        <div class="container">
            <p class="form-title">Security</p>
            <div class="form-group col-md-8">
                <label class="form-label">CHANGE PASSWORD</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="form-group col-md-4">
                <label class="form-label">CHANGE PASSWORD</label>
                <input type="text" class="form-control" value="<?php echo $fname ?>" name="fname">
            </div>
        </div>
        


    <br><br><br><br>

    <!-- FOOTER -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-8">
                        <br> <br> 
                        <p class="footer-title">Contact Us</p>
                        <p class="footer-address" style="font-size: 14px;">2/F 1 Cirq Building, Sen. Lorenzo Sumulong Avenue, Brgy. San Roque, Antipolo, Philippines</p>
                        <br><br>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <div class=" footer-icons">
                                <br><br>
                                <a href="https://www.facebook.com/Derma101" style="color: #BE9355;"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="mailto:derma101ph@yahoo.com" style="color: #BE9355;"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="https://www.derma101ph.com" style="color: #BE9355;"><i class="fa fa-globe fa-2x" aria-hidden="true"></i></a>                  
                            </div>
                        </p> <br><br><br><br>
                        <p class="footer-copyright" style="text-align: right; color: #C0C0C0; font-size: 12px;">Copyright © 2024. All rights reserved.</p>
                    </div>
                </div>           
            </div>     
        </div>           
    </footer>
    
</body>
</html>