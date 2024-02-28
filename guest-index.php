<?php
    // WHY DO WE NEED TO START A SESSION FOR A GUEST WITH NO ACCOUNT THEREFORE NO USER ID?
    // session_start();
    // if (isset($_SESSION["user_id"])) {
    //     $mysqli = require __DIR__ . "/connect.php";
    //         $sql = "SELECT * FROM user
    //         WHERE id = {$_SESSION["user_id"]}";  
    //     $result = $mysqli->query($sql);
    //     $user = $result->fetch_assoc();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

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

        .carousel-sub {
            font-family: DM Sans;
            color: white;
            font-weight: normal;
            font-size: 24px;
            line-height: normal;
            text-align: center;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 7px;
            position: absolute;
            bottom: 39%;
            left: 30.5%;
            z-index: 20;
        }

        .carousel-title {
            font-family: Poppins;
            color: white;
            font-weight: bold;
            font-size: 48px;
            line-height: 60px;
            text-align: center;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 2px;
            position: absolute;
            bottom: 22%;
            left: 30%;
            z-index: 20;
        }

        .btn-consult {
            background-image: linear-gradient(to right, #D1913C 0%, #FFD194  51%, #D1913C  100%);
            margin: 10px;
            padding: 10px 20px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: black;                
            border-radius: 20px;
            font-family: DM Sans;
            font-size: 16px;
            border: 0px;
            position: absolute;
            bottom: 10%;
            left: 39%;
            z-index: 20;
        }

        .btn-consult:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }

        .btn-services {
            border-color:#FFD194;
            border-width: 3px;
            background-color: rgba(255,250,250,.6);
            margin: 10px;
            padding: 10px 20px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: black;                
            border-radius: 20px;
            font-family: DM Sans;
            font-size: 16px;
            position: absolute;
            bottom: 9.5%;
            left: 50%;
            z-index: 20;
        }

        .btn-services:hover {
            background-position: right center;
            color:#BE9355;
            text-decoration: none;
        }

        .services-photos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .service-photo img {
            width: 280px;
            height: auto;
            margin: 10px;
        }

        .services-btn {
            border-color: #BE9355;
            border-width: 3px;
            color: #BE9355;
            border-radius: 16px;
            font-family: DM Sans;
            font-weight: bold;
            display: flex;
            margin-top: 10px;
            margin-left: 45%;
        }

        .services-btn:hover {
            background-color: white;
        }

        .about-us-content {
            font-family: DM Sans;
            padding-left: 20px;
        } 

        .about-us-container {
            display: flex;
            align-items: center;
            justify-content: center

        }

        .read-more-button {
            background-color: #BE9355;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .read-more-button:hover {
            background-color: #FFC080;
        }

        .btn-book {
            background-image: linear-gradient(to right, #D1913C 0%, #FFD194  51%, #D1913C  100%);
            margin: 10px;
            padding: 10px 20px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: black;                
            border-radius: 20px;
            font-family: DM Sans;
            font-size: 16px;
            border: 0px;
            position: absolute;
            bottom: 10%;
            left: 39%;
            z-index: 20;
        }

        .btn-book:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
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
    <title>Derma 101</title>
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
                    <a class="nav-link active" aria-current="page" href="guest-index.php" style="color: #BE9355;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
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
                <img src="index-images/index-header.png" class="d-block w-100">
                <div class="carousel-sub">
                    ENHANCING THE BEAUTY IN YOU
                </div>
                <div class="carousel-title">
                    Trust only the experts,<br>Trust DERMA 101
                </div>
                <div>
                    <button class="btn-consult">
                        <a href="login.php" style="color: white; text-decoration: none;">Consult Now</a>
                    </button>
                    <button class="btn-services">
                        <a href="#services" style="color: black; text-decoration: none;">See Services</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SERVICES -->
    <div id="services" class="container">
        <br><br>
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Most Popular</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Our Exclusive Services</p>
    </div>

    <div class="container">
        <div class="services-photos">
            <div class="service-photo">
                <img src="index-images/services-laser.png" alt="Laser Treatments">
                <img src="index-images/services-facial.png" alt="Facial Treatments">
                <img src="index-images/services-wax.png" alt="Waxing Treatments">
            </div>
            <div class="service-photo">
                <img src="index-images/services-hair.png" alt="Hair Removal">
                <img src="index-images/services-body.png" alt="Body Treatments">             
            </div>
        </div>
        <button class="services-btn">
            <a href="guest-services.php" style="color: #BE9355; text-decoration: none;">&nbsp;&nbsp;See More&nbsp;&nbsp;</a>
        </button>
    </div>

    <br><br>

    <!-- ABOUT US -->
    <div style="background-color: #f4f5f6;">
        <div id="about" class="container">
            <br><br>    
            <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">About Us</p>
            <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Our Story</p>
            <br>

            <div class="about-us-container">
                <img src="index-images/index-aboutus.jpg" alt="Derma 101 Employees" width="550px" style="float:left;">
                <div class="about-us-content">
                    <p style="font-weight: bold;">It all started from a vision…</p> 
                    <p>Derma 101 would be the start of something big; it would be the basic foundation of all.</p>
                    <p>For 15 years now, Derma 101 has been true to its mission of providing professional excellent dermatological services upholding the highest ethical standard and quality care. We continue to grow and help people and we will continue to strive for excellence to serve you better.</p>
                    <a href="guest-aboutus.php" class="btn read-more-button">Read More</a>
                </div>

            </div>
            <br><br>
        </div>
    </div>

    <!-- INSIDE -->
    <div class="container">
        <br><br>
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">A Glimpse of Us</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Inside DERMA 101</p>
    </div>

    <div class="container" style="display:flex; justify-content:center">
        <iframe width="900" height="500" src="index-images/index-clinic.mp4" frameborder="0" allowfullscreen></iframe>
        </iframe>
    </div>

    <br><br>

    <!-- TESTIMONIALS -->
    <div style="background-color: #f4f5f6;">
        <div class="container">
            <br><br>
            <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Testimonials</p>
            <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">What Our Customer Says?</p>
        </div>

        <div class="container">
            <div class="col" style="display:flex; justify-content:center">
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Frizty.espleguira.10%2Fposts%2Fpfbid0251P7JVKUyExFFeQpXBQQVLmXhTvMgreZjGvCkBWhSHd9rrm7jRo216wwUtQ8am5Al&width=350&show_text=true&height=585&appId" width="350" height="585" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> &nbsp;&nbsp;&nbsp;
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjeresa.arizala%2Fposts%2Fpfbid0EDe1TAP7z2ADbxX6VMDp6zAA7xaWcftQkw7FjUfR4GLyuBqMgF2RnGaj5eCN8TCYl&width=350&show_text=true&height=430&appId" width="350" height="430" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> &nbsp;&nbsp;&nbsp;
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fits.IrishGarciaObogne%2Fposts%2Fpfbid02rnAqu9AthoFs4MHhpqG5St4MXbcFVk8CA1WkeUifJArwmYpKJhrML7QjkkY4R9ijl&width=350&show_text=true&height=559&appId" width="350" height="559" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    
            </div>
            <div class="col" style="display:flex; justify-content:center">
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Ferikamaie.sawma%2Fposts%2Fpfbid0uPY5wG8grjCJ7qodW1oM4vownHWTgBEqWZMH8oL4fr7yUmbCPJvZGqBRqkkk23a2l&width=350&show_text=true&height=757&appId" width="350" height="757" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> &nbsp;&nbsp;&nbsp;
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid02dYeCz2Xuxr3agNCBC1CuGbdm1YB99mVB6U9itpnBJhEYxuzUtPLTEXHipVR4wSd3l%26id%3D100089483392518&width=350&show_text=true&height=755&appId" width="350" height="755" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> &nbsp;&nbsp;&nbsp;
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Ferikamaie.sawma%2Fposts%2Fpfbid06iywtYY75M7UKmHXvARBuQzfRzSjMFmQHLGfyi5SJaZvnDYWx6WmdBkRKim22o76l&width=350&show_text=true&height=687&appId" width="350" height="687" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>      
        </div>
    <br><br>
    </div>
    
    <!-- BOOK -->
    <div class="container">
        <br><br>
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Get in Touch</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Book An Appointment</p>
    </div>

    <div class="container" style="display:flex; justify-content:center">
        <div class="row" style="display:flex; justify-content:center">
            <div class="col-sm-7">
                <div class="input-group" style="width: 350px; margin-right: 120px">
                    <div class="input-group-text">@</div>
                    <input type="text" id="guestEmail" class="form-control" placeholder="Email">                       
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <button class="btn btn-warning"><a href="login.php" style="color: white; text-decoration: none">Book Now</a></button>
            </div>
        </div>
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
        function setEmail() {
            var guestEmail = document.getElementById('guestEmail').value;
            localStorage.setItem('guestEmail', guestEmail);
        }
    </script>
</body>
</html>