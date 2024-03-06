<?php
    include('db_connection.php');

    $id = $_GET['patientID']; // fetched ID

    // get patient info to print in form
    $sql = "SELECT patientID, firstName, middleName, lastName, email, dateOfBirth, sex, bloodType, password FROM tblusers WHERE patientID=$id;"; 
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
    $password = $row["password"];

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
        if ($newfname != $fname || $newmidname != $midname || $newlname != $lname || $newsex != $sex || $newblood != $blood || $newdob != $dob || $newemail != $email || $newpass != $password) {
            $updatesql = "UPDATE tblusers SET firstName = '$newfname', middleName = '$newmidname', lastName = '$newlname', sex = '$newsex', bloodType = '$newblood', dateOfBirth = '$newdob', email = '$newemail' WHERE patientID = '$id'";
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

        .btn-submit {
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

        .btn-pass {
            font-family: "DM Sans";
            font-weight: bold;
            color: #BE9355;
            border-radius: 12px;
            padding: 6px;  
            border-color: #BE9355;
            background-color: white;
            float: right;
            margin-top: 15px;
            margin-right: 15px;
        }

        .card {
            border: 2px solid #BE9355;
            border-radius: 10px;
            width: 80%;
            margin: 0 auto;
        }

        .card-header {
            font-family: 'Poppins';
            font-weight: bold;
            font-size: 16px;
            background-color: rgb(225, 172, 65, .5);
            border-bottom: 2px solid #BE9355;
            padding: 10px;
            padding-left: 50px;            
        }

        .title {
            font-family: 'DM Sans';
            font-size: 16px;
            font-weight: lighter;
            color: #BE9355;
            padding-left: 15%; 
            margin-bottom: 0;
        }

        .sub {
            font-family: 'DM Sans';
            font-size: 16px;
            font-weight: bold;
            padding-left: 15%;
            margin-right: 30px;
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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color: #BE9355;">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-clinic.php">Appointments</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="guest-index.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Divider -->
    <hr class="my-1" style="border-top: 1px solid #BE9355;">

    <br><br><br>

    <!-- PROFILE -->
    <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Profile</p>
    <br>

    <form method="post">
        <div class="container" style="width: 70%;">       
            <p class="form-title">Personal Information</p>
            <div>
                <div class="form-group col-md-4">
                    <label class="form-label">FIRST NAME</label>
                    <input type="text" class="form-control" value="<?php echo $fname ?>" name="fname" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label">MIDDLE NAME</label>
                    <input type="text" class="form-control" value="<?php echo $midname ?>" name="midname">
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label">LAST NAME</label>
                    <input type="text" class="form-control" value="<?php echo $lname ?>" name="lname" required>
                </div>
            </div>
            <div>           
                <div class="form-group col-md-6">
                    <label class="form-label">SEX</label>
                    <select class="form-select" aria-label="Default select example" name="sex" required>
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
                    <select class="form-select" aria-label="Default select example" name="blood">
                        <option selected><?php
                            if($blood === '' || $blood=='Unknown'){ ?>
                                <option selected>Unknown</option> 
                                <option>O+</option> 
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option><?php }
                            else if($blood=='O+'){ ?> 
                                <option selected>O+</option> 
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='O-'){ ?> 
                                <option selected>O-</option> 
                                <option>O+</option> 
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='A+'){ ?> 
                                <option selected>A+</option> 
                                <option>O+</option> 
                                <option>O-</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='A-'){ ?> 
                                <option selected>A-</option> 
                                <option>O+</option> 
                                <option>O-</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='B+'){ ?> 
                                <option selected>B+</option> 
                                <option>O+</option>
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>                                
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='B-'){ ?> 
                                <option selected>B-</option> 
                                <option>O+</option>
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>                                
                                <option>B+</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='AB+'){ ?> 
                                <option selected>AB+</option> 
                                <option>O+</option>
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>                                
                                <option>B-</option>                                
                                <option>AB-</option>
                                <option>Unknown</option><?php }
                            else if ($blood=='AB-'){ ?> 
                                <option selected>AB-</option> 
                                <option>O+</option>
                                <option>O-</option> 
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>                                
                                <option>B-</option>                                
                                <option>AB+</option>
                                <option>Unknown</option><?php } ?>
                        </option>
                    </select>                    
                </div>
            </div>
            <div>
                <div class="form-group col-md-6">
                    <label class="form-label">DATE OF BIRTH</label>
                    <input type="date" class="form-control" value="<?php echo $dob ?>" name="dob" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">EMAIL</label>
                    <input type="email" class="form-control" value="<?php echo $email ?>" name="email" required>
                </div>
            </div>
            <button type="submit" class="btn-submit" name="submit">Update Profile</button>
        </div>
        <br><br>
    </form>

    <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Appointments</p>
    <br>

    <?php
        // get appt of patient
        $sql = "SELECT apptID, apptDate, serviceID, patientNote, statusID FROM tblappt WHERE patientID=$id;";
        $result = $conn->query($sql);
        if (!$result) { die("Invalid Query: " . $conn->connect_error);}
    ?>

    <div class="container"> <?php
        while($row = $result->fetch_assoc()) {
            $apptID = $row["apptID"];
            $date = $row["apptDate"];
            $formattedDate = date("l, F j, Y", strtotime($date));
            $svcID = $row["serviceID"];           
            $note = $row["patientNote"];
            $statusID = $row["statusID"];

        echo '
            <div class="card">
                <p class="card-header">'.$formattedDate.'</p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">APPOINTMENT ID</p>
                            <p class="sub">'.$apptID.'</p>
                        </div>
                        <div class="col-md-4">
                            <p class="title">SERVICE</p>
                            <p class="sub">'?><?php
                            $svcsql = "SELECT serviceName FROM tblservice WHERE serviceID='$svcID';"; 
                            $svcresult = $conn->query($svcsql);
                            $svcrow = $svcresult->fetch_assoc();
                            $svcName = $svcrow["serviceName"];
                            echo $svcName;
                            ?><?php echo'</p>
                        </div>
                        <div class="col-md-4">
                            <p class="title">STATUS</p>
                            <p class="sub">'?><?php
                            $stsql = "SELECT status FROM tblstatus WHERE statusID=$statusID;"; 
                            $stresult = $conn->query($stsql);
                            $strow = $stresult->fetch_assoc();
                            $stName = $strow["status"];
                            echo $stName;
                            ?><?php echo'</p>
                        </div>
                    </div>
                    <div>
                        <p class="title" style="padding-left: 38px">NOTE</p>
                        <p class="sub" style="padding-left: 38px">'.$note.'</p>                                                 
                    </div>                                    
                </div>
            </div> <br>';      
        } ?>
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

    <script>
        function showConfirmation() {         
            if (new_password.length >= 8) {
                if (new_password != confirm_password) {
                    alert('Password do not match. Please try again.');
                } else {
                    var result = confirm("Are you sure you want to change password?");
                    if (result) {
                        window.location.href = "change-password.php?patientID=".$id;
                    }
                }   
            }            
        }
    </script>
    
</body>
</html>