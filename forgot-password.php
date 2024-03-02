<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    // Function to send email using PHPMailer
    function send_mail($recipient, $subject, $token)
    {
        // Construct the reset link with the token
        $reset_link = "https://localhost/derma101/reset-password.php?token=" . $token;
        
        // Email message with the reset link
        $message = "To reset your password, click <a href='$reset_link'>here</a>.";
        
        // PHPMailer configuration
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com"; // Update with your SMTP host
        $mail->Username   = "itsderma101@gmail.com"; // Update with your email address
        $mail->Password   = "epegjdmbihwnauyf"; // Update with your email password

        // Email content setup
        $mail->IsHTML(true);
        $mail->AddAddress($recipient, "Esteemed Customer");
        $mail->SetFrom("itsderma101@gmail.com", "Derma101");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);

        // Send email
        if(!$mail->Send()) {
            return false; // Return false if email sending fails
        } else {
            return true; // Return true if email sent successfully
        }
    }

    // Database connection setup
    include "db_connection.php";

    $success_message = "";
    $error_message = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect the email
        $email = $_POST["email"];
        
        // Generate a unique token
        $token = uniqid();
        
        // Save the token in the database
        $sql = "UPDATE tblusers SET reset_token='$token' WHERE email='$email'";
        
        if ($conn->query($sql) === TRUE) {
            // Send the token link to the user's email
            $subject = "Password Reset";
            
            if(send_mail($email, $subject, $token)) {
                $success_message = "Reset token sent successfully.";
            } else {
                $error_message = "Error sending reset token.";
            }
        } else {
            $error_message = "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        body {
            font-family: 'DM Sans', Poppins;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px; /* Adjusted width */
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 10px;
            display: flex;
            flex-direction: column; /* Align panels vertically by default */
        }

        .panels {
            display: flex;
            flex-direction: column; /* Align panels vertically by default */
        }

        .panel {
            padding: 20px;
            text-align: center;
            flex: 1; /* Take up equal space in a column */
        }

        .upper-panel {
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
            margin-left: 20px;
        }

        .join {
            font-size: 22px; 
            font-family: 'DM Sans'; 
            font-weight: bold; 
            text-align: left;
            color: rgb(0,0,0,.8);
            font-weight: bold;
            margin-top: 15px;
            margin-left: 28px;
            margin-bottom: 5px;
        }

        .tagline {
            font-family: 'Poppins';
            font-size: 12px;
            text-align: left;
            line-height: normal;
            color:black;
            margin-left: 28px;
            margin-right: 15px;
            margin-bottom: 150px;
        }

        .lower-panel {
            background: #fff;
            padding: 40px;
            border-radius: 0 0 10px 10px; /* Adjust as needed */
            display: flex;
            flex-direction: column;
        }

        .title {
            font-family: 'DM Sans';
            font-size: 24px;
            color: #be9355;
            font-weight: bold;
            text-align: left;
            margin-bottom: 0px;
            margin-top: 50px;
        }

        .tagline-right {
            font-family: 'Poppins';
            font-size: 13px;
            color: black;
            text-align: left;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left; 
        }

        label {
            display: block;
            font-size: 14px;        
            color: rgb(0,0,0,.8);
            margin-bottom: 5px;
        }

        input {
            font-family: 'DM Sans';
            font-size: 13px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .reset-btn {
            font-family: 'DM Sans';
            background-color: #be9355;
            font-size: 14px;
            color: #fff;
            padding: 8px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .link {
            color: #555;
            font-size: 12px;
        }

        /* Media Queries for Responsive Design */
        @media only screen and (min-width: 769px) {
            .container {
                max-width: 717px; /* Adjust as needed for desktop view */
            }

            .panels {
                flex-direction: row; /* Arrange panels horizontally on desktop */
            }

            .upper-panel {
                border-radius: 10px 0 0 10px; /* Adjust as needed */
                width: 717px; /* Set specific width for the left panel */
                max-width: 50%; /* Limit to 50% of the viewport width */
            }

            .lower-panel {
                border-radius: 0 10px 10px 0; /* Adjust as needed */
                width: 717px; /* Set specific width for the right panel */
                max-width: 50%; /* Limit to 50% of the viewport width */
            }
        }
    </style>

    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">

</head>
<body>
    <div class="container">
        <div class="panels">
            <div class="panel upper-panel">
                <img src="images/LOGO.png" alt="Logo" class="logo">
                <p class="join">Join In Derma101</p>
                <p class="tagline">Derma 101 aims to provide professional excellent dermatological services specializing in both pathologic and cosmetic dermatology upholding the highest ethical standards and quality care.</p>
            </div>
            <div class="panel lower-panel">
                <p class="title">Forgot Password</p>
                <p class="tagline-right">There is nothing to worry about; we'll send you a message to help you reset your password.</p>
                <div class="form-group">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" required>
                        <button class="reset-btn" type="submit">Send Reset Link</button>
                        <div class="success-message"><?php echo $success_message; ?></div>
                        <div class="error-message"><?php echo $error_message; ?></div>
                    </form>
                </div>
                <p class="link" style="margin-bottom: 50px">Already have an account? <a href="login.php" style="color: #be9355;">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
