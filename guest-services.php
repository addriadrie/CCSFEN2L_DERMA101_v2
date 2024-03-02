<?php
    include('db_connection.php');

    session_start();
    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/db_connection.php";
            $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";  
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
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
        }

        .carousel-caption{
            font-family: DM Sans;
            color: white;
            font-weight: bold;
            font-size: 48px;
            line-height: normal;
            text-align: left;
            margin-left: 550px;
            margin-bottom: 95px;
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

        .card-title {
            font-family: DM Sans;
            font-weight: bold;
            font-size: 18px;
        }

        .card-fee {
            font-family: DM Sans;
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .card-sub {
            font-family: Poppins;
            font-weight: normal;
            font-size: 14px;
            color: #BE9355;
            /*color: rgb(0, 0, 0, 0.6);*/
            margin-bottom: 3px;
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

        .footer-icons {
            float: right;
        }

    </style>
    <title>Services</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="guest-index.php">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guest-index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="guest-services.php" style="color: #BE9355;">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guest-aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#contact">Contact</a>
                </li>
            </ul>
            <span class="nav-item">
                <a href="login.php" style="color: #BE9355; text-decoration: none;"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Login</a>
            </span>
        </div>
    </nav>

    <!-- HEADER --> 
    <div class="carousel slide">
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
    <div class="container">
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Most Popular</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Recommended Services</p>
            <?php
                $sql = "SELECT  tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee, tblservice.serviceID FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.serviceID='1-LS07' OR tblservice.serviceID='2-HR01' OR tblservice.serviceID='3-FC07' OR tblservice.serviceID='4-BD03' OR serviceID='5-WX05';";
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
                                    <p class="card-title">' . $row["serviceName"] . '</p>
                                    <div class="row justify-content-between">
                                        <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                        <p class="card-fee">' . $row["serviceFee"] . ' <p>
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-title">' . $row["serviceName"] . '<p>
                                        <div class="row justify-content-between">
                                            <p class="card-sub">' . $row["categName"] . '<p>
                                            <p class="card-fee">' . $row["serviceFee"] . '</p>
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=1;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">   
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["serviceName"] . '</h5>
                                        <div class="row justify-content-between">
                                            <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                            <p class="card-fee">' . $row["serviceFee"] . ' <p>                
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=2;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["serviceName"] . '</h5>
                                        <div class="row justify-content-between">
                                            <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                            <p class="card-fee">' . $row["serviceFee"] . ' <p>                                            
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=3;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["serviceName"] . '</h5>
                                        <div class="row justify-content-between">
                                            <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                            <p class="card-fee">' . $row["serviceFee"] . ' <p>                                            
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=4;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["serviceName"] . '</h5>
                                        <div class="row justify-content-between">
                                            <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                            <p class="card-fee">' . $row["serviceFee"] . ' <p>                                        
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
                    $sql = "SELECT tblservice.image, tblservice.serviceName, tblcategory.categName, tblservice.serviceFee FROM tblservice INNER JOIN tblcategory ON tblservice.categID=tblcategory.categID WHERE tblservice.categID=5;";
                    $result = $conn->query($sql);

                if (!$result) { die("Invalid Query: " . $conn->connect_error);}
                ?> 
                <div class="row row-cols-1 row-cols-md-5 g-4"> <?php
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col">
                                <div class="card h-100">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/ class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["serviceName"] . '</h5>
                                        <div class="row justify-content-between">
                                            <p class="card-sub"> ' . $row["categName"] . ' <p> 
                                            <p class="card-fee">' . $row["serviceFee"] . ' <p>                                        
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
                        <p class="footer-copyright" style="text-align: right; color: #C0C0C0; font-size: 14px;">Copyright © 2024. All rights reserved.</p>
                    </div>
                </div>           
            </div>     
        </div>           
    </footer>
   
    <script>
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
    </script>
</body>
</html>
