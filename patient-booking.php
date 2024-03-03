<?php
    include('db_connection.php');

    $pntID = $_GET['patientID']; // fetched ID
    $svcID = $_GET['serviceID']; // fetched ID

    // get patient info
    $sql = "SELECT patientID, firstName, middleName, lastName, email FROM tblusers WHERE patientID='$pntID';"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pntID = $row["patientID"];
    $fname = $row["firstName"];
    $midname = $row["middleName"];
    $lname = $row["lastName"];
    $email = $row["email"];

    // get service info
    $sql = "SELECT tblservice.serviceID, tblservice.serviceName, tblcategory.categName FROM tblservice INNER JOIN tblcategory WHERE serviceID='$svcID';"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $svcID = $row["serviceID"];
    $svcName = $row["serviceName"];
    $ctgName = $row["categName"];
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
            font-family: DM Sans;
            font-size: 13px;
        }

        .breadcrumb {
            font-family: DM Sans;
            font-size: 14px;
        }

        .form-control {
            font-family: "DM Sans"; 
            font-size: 16px;
        }

        .info {
            width: 100%;
        }

        .button {
            border-radius: 30px;
            padding: 10px;
            color: white;
            background-color: #BE9355;
            border-color: transparent;
        }
        .footer {
            background-color: #f4f5f6;
            font-family: DM Sans;
        }
        .footer-title {
            font-family: Poppins;
            font-weight: bold;
            color: #BE9355;
            font-size: 18px;
        }
        .icons {
            float: right;
        }

        .reco {
            font-family: DM Sans;
            font-weight: bold;
        }

        .col {
            font-family: DM Sans;
            font-size: 15px;
        }
        input[type="date"] {
            font-size: 16px;
            width: 325px;
        }
        .sched-title {
            font-family: DM Sans; 
            font-size: 18px; 
            font-weight: bold; 
            color: #BE9355;
            background-color: #f5f5f5;
            width: 310px;
            margin-left: 10px;
            text-align: left;
        }
        .sched-time {
            background-color: white;
            width: 280px;
            text-align: left;
            margin-left: 25px;
            margin-bottom: 0%;
        }
        .sched-note {
            text-align: left;
            margin-left: 25px;
            font-size: 12px;
            width: 280px;
        }
        ul {
            list-style-type: none;
        }

    </style>

    <title>Book Appointment</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        
            <ul class="nav navbar-nav">
                <li class="nav-item greeting">Hi, <?php echo $fname ?></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #BE9355"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item disabled" aria-disabled="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="guest-index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>


    <!-- BREADCRUMB -->
    <div class="container">
        <br><br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="patient-home.php">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking</li>
            </ol>
        </nav>
    </div>

    <br>

    <div class="container">
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Book Appointment</p> <br>
        <ul>
            <li>
                <div class="row align-items-start">
                    <div class="col">
                        <input class="form-control" type="text" value="<?php echo $ctgName ?>" aria-label="Disabled input example" disabled readonly name="ctgName">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" value="<?php echo $svcName ?>" aria-label="Disabled input example" disabled readonly name="svcName"> 
                    </div>
                    <div class="col">
                        <input type="date" id="txtDate" min="<?php echo date("Y-m-d"); ?>" name="date"> </li>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-sm-8 p-3">
                            <ul>
                                <li>
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $fname ?>" name="fname">
                                        </div>
                        
                                        <div class="col">
                                            <label class="form-label">Middle Name</label>
                                            <input type="email" class="form-control" value="<?php echo $midname ?>" id="midname">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Last Name</label>
                                            <input type="email" class="form-control" value="<?php echo $lname ?>" id="lname">
                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <br>
                                    <h4 style="font-family: DM Sans; font-weight:bold;">Additional Note</h4>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="note"></textarea>
                                        <label style="font-weight: lighter; font-family: DM Sans; color:#D3D3D3;">Please indicate any special instructions such as allergies, pregnancy, and the like.</label>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-warning" style="font-family: DM Sans;">Submit</button>
                                    <br><br>
                                </li>
                            </ul>                                               
                        </div>
                        <div class="col-4 p-3 mb-2">
                        <div class="col">
                            <ul> 
                                <div class="sched" style="background-color: #f5f5f5;">
                                    <li> 
                                        <br>
                                        <p class="sched-title">&nbsp;&nbsp;&nbsp;MON - SAT</p>
                                        <p class="sched-time">&nbsp;10:00AM - 8:00PM <br> &nbsp;Walk-In and Appointment</p>
                                        <p class="sched-note">For consultation, you may drop by anytime between 2:00PM to 8:00PM</p>
                                        &nbsp;
                                    </li>
                                </div>
                                <div class="sched" style="background-color: #f5f5f5; margin-left: -110px; width: 325px;">
                                    <li> 
                                        <p class="sched-title">&nbsp;&nbsp;&nbsp;SUN</p>
                                        <p class="sched-time">&nbsp;10:00AM - 8:00PM <br> &nbsp;Walk-In and Appointment</p>
                                        <p class="sched-note">Appointment for consultation</p>
                                        <br>
                                    </li>
                                </div>
                            </ul>
                            <br><br>   
                        </div>
                        </div>
                    </div>
                </div>            
            </li>
    </div>
            
    <br><br>
    <!-- FOOTER -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-8">
                        <br> <br> 
                        <p class="footer-title">Contact Us</p>
                        <p class="footer-address" style="font-size: 16px;">2/F 1 Cirq Building, Sen. Lorenzo Sumulong Avenue, Brgy. San Roque, Antipolo, Philippines</p>
                        <br><br>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <div class="icons">
                                <br><br>
                                <a href="https://www.facebook.com/Derma101" style="color: #BE9355;"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="derma101ph@yahoo.com" style="color: #BE9355;"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="derma101ph.com" style="color: #BE9355;"><i class="fa fa-link fa-2x" aria-hidden="true"></i></a>                  
                            </div>
                        </p> <br><br><br><br>
                        <p class="footer-copyright" style="text-align: right; color: #C0C0C0;">Copyright © 2024. All rights reserved.</p>
                    </div>
                </div>           
            </div>     
        </div>           
    </footer>

</body>
</html>