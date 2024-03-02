<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .first-title {
            font-family: Poppins;
            color: black;
            font-weight: bold;
            font-size: 28px;
            text-align: center;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 2px;
            position: absolute;
            bottom: 68%;
            left: 50%;
            z-index: 20;
        }

        .first-sub {
            font-family: DM Sans;
            color: black;
            font-weight: normal;
            font-size: 20px;
            line-height: normal;
            text-align: left;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 1px;
            position: absolute;
            bottom: 25%;
            left: 50%;
            right: 5%;
            z-index: 20;
        }

        .second-title {
            font-family: Poppins;
            color: #BE9355;
            font-weight: bold;
            font-size: 28px;
            text-align: left;
            text-shadow: 4px 4px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 2px;
        }

        .second-sub {
            font-family: DM Sans;
            color: black;
            font-weight: normal;
            font-size: 16px;
            line-height: normal;
            text-align: justify;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 1px;
            margin-right: 525px;
        }

        .third-title {
            font-family: Poppins;
            color: black;
            font-weight: bold;
            font-size: 28px;
            text-align: center;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 2px;
            position: absolute;
            bottom: 60%;
            left: 60%;
            z-index: 20;
        }

        .third-sub {
            font-family: DM Sans;
            color: black;
            font-weight: normal;
            font-size: 20px;
            line-height: normal;
            text-align: left;
            text-shadow: 4px 5px 4px rgb(0, 0, 0, 0.25);
            letter-spacing: 1px;
            position: absolute;
            bottom: 30%;
            left: 60%;
            right: 5%;
            z-index: 20;
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

    <title>About Us</title>
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
                    <a class="nav-link" aria-current="page" href="guest-index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guest-services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="guest-aboutus.php" style="color: #BE9355;">About Us</a>
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

    <div style="background-color: #f4f5f6;">
        <br><br>
        <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">The Story Behind</p>
        <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:32px">About Us</p>
        <br>
    </div>

    <!-- FIRST SECTION -->
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="aboutus-images/section-1.png" class="d-block w-100">
                <div class="first-title">
                    Enhancing the Beauty in You
                </div>
                <div class="first-sub">
                    <p> It all started from a vision… DERMA 101 would be the start of something big; it would be the basic foundation of all. </p>
                    <p> For 15 years now, DERMA 101 has been true to its mission of providing professional excellent dermatological services upholding the highest ethical standard and quality care. We continue to grow and help people, and we will continue to strive for excellence to serve you better. </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECOND SECTION -->
    <div style="background-color: #f4f5f6;">
        <div class="container">
            <br><br>
            <img src="aboutus-images/section-2.png" width="500px" style="float:right;">
            <div class="second-title">
                <p>Trust Only The Experts</p> 
            </div>
            <div class="second-sub">
                <p>&nbsp;&nbsp;&nbsp;Dr. Melanie S. Anclote, MD is a Fellow of the Philippine Dermatological Society and International Fellow of the American Academy of Dermatology.</p>
                <p>&nbsp;&nbsp;&nbsp;Doc Mel is a graduate of the University of Santo Tomas College of Medicine and Surgery as Magna Cum Laude. She took her internship training program at UST Hospital after which she took the Physician Licensure Exam and landed on the top 8th among the passers.</p>
                <p>&nbsp;&nbsp;&nbsp;She took her Residency training program in Dermatology at the Jose R. Reyes Memorial Medical Center and served as Chief Resident.</p>
                <p>&nbsp;She passed the board certification issued by the Philippine Dermatological Society and became a Fellow of the same organization and International Fellow of the American Academy of Dermatology.</p>
                <p>&nbsp;&nbsp;&nbsp;Doc Mel is continuously honing her skills and expanding her knowledge thru various local and international conventions, continuing medical education, seminars and workshops. She is committed to excel in the field of Dermatology to serve the Antipolenos and Rizalenos better.</p>
            </div>
        </div>
        <br><br>
    </div>

    <!-- THIRD SECTION -->
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="aboutus-images/section-3.png" class="d-block w-100">
                <div class="third-title">
                    Trust DERMA 101
                </div>
                <div class="third-sub">
                    <p>Derma 101 aims to provide professional excellent dermatological services specializing in both pathologic and cosmetic dermatology upholding the highest ethical standards and quality care.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- TESTIMONIALS -->
    <div style="background-color: #f4f5f6;">
        <div class="container">
            <br><br><br>
            <p style="font-family:Poppins; text-align:center; color:#D3D3D3; margin-bottom:auto; font-size:20px;">Testimonials</p>
            <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">What Our Customer Says?</p>
        </div>
        <br>
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
    <br><br><br>

    </div>

    <!-- BOOK -->
    <div class="container">
        <br><br><br>
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

    <br><br><br>

    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="aboutus-images/footer-image.png" class="d-block w-100">
            </div>
        </div>
    </div>

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

</body>
</html>