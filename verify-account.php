<?php
    require "mail.php";
    require "Efunctions.php";
    check_login();

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "GET" && !check_verified()) {
        // send email
        $verificationCode = rand(10000, 99999);
        $email = $_SESSION['USER']->email;

        // save verification code to the database
        $query = "UPDATE tblusers SET verification_code = ? WHERE email = ?";
        $vars = array($verificationCode, $email);
        database_run($query, $vars);

        // send email with verification code
        $message = "Your verification code is " . $verificationCode;
        $subject = "Email verification";
        send_mail($email, $subject, $message);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!check_verified()) {
            $email = $_SESSION['USER']->email;
            $verificationCode = $_POST['verification_code'];

            // Query para sa pag-check ng verification code
            $query = "SELECT * FROM tblusers WHERE email = ? AND verification_code = ?";
            $vars = array($email, $verificationCode);
            $row = database_run($query, $vars);

            // Pag-check kung may resulta ang query at tama ang verification code
            if (!empty($row)) {
                $row = $row[0];
                // Update ng user's verification status
                $query = "UPDATE tblusers SET is_verified = 1, verification_code = NULL WHERE email = ?";
                $vars = array($email);
                database_run($query, $vars);

                // Redirect patungo sa login page
                header("Location: login.php");
                exit();
            } else {
                // Kung mali ang verification code, idagdag ito sa mga errors
                $errors[] = "Incorrect verification code. Please try again.";
            }
        } else {
            $errors[] = "You're already verified.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        body {
            font-family: Poppins;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .signup-container {
            max-width: 300px; /* Adjust as needed */
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 10px;
            display: flex;
            flex-direction: column; /* Align panels vertically by default */
        }

        .signup-panels {
            display: flex;
            flex-direction: column; /* Align panels vertically by default */
        }

        .signup-panel {
            padding: 20px;
            text-align: center;
            flex: 1; /* Take up equal space in a column */
        }

        .signup-upper-panel {
            background-image: url('images/sidenav-bg.png');
            background-size: cover;
            color: #be9355;
            border-radius: 5px 5px 0 0;
            margin-left: -15px;
        }

        .logo {
            width: 70px;
            height: auto;
            display: block;
            margin-top: 45%;
            margin-left: 18px;
        }

        .join {
            font-size: 22px; 
            font-family: 'DM Sans'; 
            font-weight: bold; 
            text-align: left;
            color: rgb(0,0,0,.8);
            font-weight: bold;
            margin-top: 15px;
            margin-left: 25px;
            margin-bottom: 5px;
        }

        .tagline {
            font-family: 'Poppins';
            font-size: 12px;
            text-align: left;
            line-height: normal;
            color:black;
            margin-left: 25px;
            margin-right: 15px;
            margin-bottom: 150px;
        }

        .signup-lower-panel {
            background: #fff;
            padding: 20px;
            border-radius: 0 0 10px 10px; /* Adjust as needed */
        }

        .welcome {
            font-family: 'DM Sans';
            font-size: 24px;
            color: #be9355;
            font-weight: bold;
            text-align: left;
            margin-top: 30%;
            margin-bottom: 5px;
        }

        .tagline-welcome {
            font-family: 'Poppins';
            font-size: 13px;
            color: black;
            text-align: left;
            margin-bottom: 40px;
        }

        input {
            font-size: 12px;
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 10px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 14px;        
            color: rgb(0,0,0,.8);
            margin-bottom: 5px;
        }

        .signup-btn {
            background-color: #be9355;
            font-size: 14px;
            color: #fff;
            padding: 6px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Media Queries for Responsive Design */
        @media only screen and (min-width: 769px) {
            .signup-container {
                max-width: 717px; /* Adjust as needed for desktop view */
            }

            .signup-panels {
                flex-direction: row; /* Arrange panels horizontally on desktop */
            }

            .signup-upper-panel {
                border-radius: 10px 0 0 10px; /* Adjust as needed */
                width: 717px; /* Set specific width for the left panel */
                max-width: 50%; /* Limit to 50% of the viewport width */
            }

            .signup-lower-panel {
                border-radius: 0 10px 10px 0; /* Adjust as needed */
                width: 717px; /* Set specific width for the right panel */
                max-width: 50%; /* Limit to 50% of the viewport width */
            }
        }
    </style>

    <title>Email Verification</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>
    <div>
    </div>
    <div class="signup-container">
        <div class="signup-panels">
            <div class="signup-panel signup-upper-panel">
                <img src="images/LOGO.png" alt="Logo" class="logo">
                <p class="join">Join In Derma101</p>
                <p class="tagline">Derma 101 aims to provide professional excellent dermatological services specializing in both pathologic and cosmetic dermatology upholding the highest ethical standards and quality care.</p>
            </div>
            <div class="signup-panel signup-lower-panel">
                <p class="welcome">Email Verification</p>
                <p class="tagline-welcome">Verify your email to complete the registration</p>
                <form method="post">
                    <div class="form-group">
                        <label for="verification_code">Verification Code</label>
                        <input type="text" id="verification_code" name="verification_code" required>
                    </div>
                    <button class="signup-btn" type="submit">Verify Email</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>