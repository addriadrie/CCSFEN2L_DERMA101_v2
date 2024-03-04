<?php
    include('db_connection.php');

    $id = $_GET['patientID']; // fetched ID
    $sql = "SELECT patientID, firstName, lastName, email FROM tblusers WHERE patientID='$id';"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row["patientID"];
    $fname = $row["firstName"];
    $lname = $row["lastName"];
    $email = $row["email"];
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
    <!-- STYLESHEET -->
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

        .carousel-caption{
            font-family: DM Sans;
            color: white;
            font-weight: bold;
            font-size: 48px;
            line-height: normal;
            text-align: left;
            margin-left: 480px;
            margin-bottom: 95px;
            margin-right: -50px;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
        }

        [data-tab-content] {
            display: none;
        }

        .active[data-tab-content] {
            display: block;
        }

        body {
            padding: 0;
            margin: 0;
        }

        .tabs {
            font-family: DM Sans;
            font-size: 16px;
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
            border-bottom: 3px solid burlywood;
        }

        .tab {
            cursor: pointer;
            padding: 10px;
        }

        .tab.active {
            color: white;
            background-color: #BE9355;
        }

        .tab:hover {
            background-color: #f2e9d2;
            font-weight: bold;
        }

        .tab-content {
            margin-left: 20px;
            margin-right: 20px;
        }

        .card {
            margin-left: 10px;
            height: auto;
            border-radius: 10px;
        }

        .card-title {
            display: block;
            font-family: DM Sans;
            font-weight: bold;
            font-size: 18px;
            padding: 5px;
        }

        .card-fee {
            display: block;
            color: black;
            font-family: DM Sans;
            font-size: 16px;
            margin-left: 12px;
            margin-top: -5px;
        }

        .card-sub {
            font-family: Poppins;
            font-weight: normal;
            font-size: 12px;
            color: #BE9355;
            margin-left: 15px;
            border: 1px solid #BE9355;
            border-radius: 5px;
            padding: 3px;
            width: auto;
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

    <title>Derma 101</title>
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
                    <a class="nav-link active" aria-current="page" href="#" style="color: #BE9355;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#services">Services</a>
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
                        <li class="dropdown-link"><a class="dropdown-item disabled" aria-disabled="true"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Profile</a></li>
                        <div class="dropdown-divider"></div>                   
                        <li class="dropdown-link"><a href="guest-index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>

    <!-- HEADER --> 
    <div class="carousel slide" style="margin-top: -20px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/services-header.png" class="d-block w-100">
                <div class="carousel-caption">
                    Healthy skin allows you to face the world with confidence.  
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!-- RECOMMENDED -->       
    <div class="container" id="services">
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Most Popular</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Recommended Services</p>
            <?php
                $sql = "SELECT  tblservice.image, tblservice.serviceID, tblservice.serviceName, tblservice.serviceFee, tblcategory.categName FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.serviceID='1-LS07' OR tblservice.serviceID='2-HR01' OR tblservice.serviceID='3-FC07' OR tblservice.serviceID='4-BD03' OR serviceID='5-WX05';";
                $result = $conn->query($sql);
                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
            ?> 
            <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                while($row = $result->fetch_assoc()) {
                    echo '
                        <div class="col">
                            <div class="card">
                                <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                <div class="card-body">
                                    <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                    <div class="row justify-content-between">
                                        <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                        <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                    </div>
                                </div>
                            </div>
                        </div>';
                } ?>
            </div>
        </div>
    </div>

    <br><br><br><br>

    <!-- SERVICES -->
    <div class="container">
        <!-- TABS -->
        <ul class="tabs">
            <li data-tab-target="#all" class="active tab">All Services</li>
            <li data-tab-target="#laser" class="tab">Laser</li>
            <li data-tab-target="#hair" class="tab">Hair Removal</li>
            <li data-tab-target="#facial" class="tab">Facial Treatments</li>
            <li data-tab-target="#body" class="tab">Body Treatments</li>
            <li data-tab-target="#wax" class="tab">Waxing Treatments</li>
        </ul>

        <div class="tab-content">
            <!-- ALL SERVICES -->
            <div id="all" data-tab-content class="active">
                <br>     
                <?php
                    $sql = "SELECT tblservice.serviceID, tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div> 
            
            <!-- LASER -->
            <div id="laser" data-tab-content>
                <br>     
                <?php
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=1;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div> 
            
            <!-- HAIR -->
            <div id="hair" data-tab-content>
                <br>     
                <?php
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=2;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div> 
            
            <!-- FACIAL -->
            <div id="facial" data-tab-content>
                <br>     
                <?php
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=3;";
                    $result = $conn->query($sql);

                    if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div> 
            
            <!-- BODY -->
            <div id="body" data-tab-content>
                <br>     
                <?php
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=4;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div> 
            
            <!-- WAX -->
            <div id="wax" data-tab-content>
                <br>     
                <?php
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=5;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <a class="card-title" href="patient-booking.php?patientID='.$id.'&serviceID='.$row['serviceID'].'">' . $row["serviceName"] . '</a>
                                        <div class="row justify-content-between">
                                            <p class="card-fee">' . $row["serviceFee"] . ' </p>
                                            <p class="card-sub"> ' . $row["categName"] . ' </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>';    
                    } ?>
                </div>
            </div> 
        </div>
    </div>

    <br><br><br>

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
        // services tabs
        const tabs = document.querySelectorAll('[data-tab-target]')
        const tabContents = document.querySelectorAll('[data-tab-content]')

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active') })
                tabs.forEach(tab => {
                    tab.classList.remove('active') })
                tab.classList.add('active')
                target.classList.add('active')
            })
        })
        function redirectAppt(ID) {
            var str = "patient-booking.php?serviceID=" + console.log(ID);
            window.location.href = str;
        }
    </script>
</body>
</html>