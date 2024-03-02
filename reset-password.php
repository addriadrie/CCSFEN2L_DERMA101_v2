<?php
    // Include database connection
    include "db_connection.php";

    // Define variables for error handling and success message
    $error = "";
    $success_message = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve token from the form
        $token = $_POST["token"];
        
        // Retrieve new password and password confirmation from the form
        $new_password = $_POST["password"];
        $password_confirmation = $_POST["password_confirmation"];
        
        // Validate if passwords match
        if ($new_password !== $password_confirmation) {
            $error = "Passwords do not match.";
        } else {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Update password and clear reset_token in the database
            $sql = "UPDATE tblusers SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
            
            if ($conn->query($sql) === TRUE) {
                $success_message = "Password reset successfully.";
                header("refresh:3;url=login.php"); // Redirect to login.php after 3 seconds
            } else {
                $error = "Error updating password: " . $conn->error;
            }
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

    <title>Reset Password</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">

    <style>
        body {
            font-family: DM Sans, Poppins;
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
            margin-top: 40%;
            margin-left: 21px;
        }

        .join {
            font-size: 22px; 
            font-family: 'DM Sans'; 
            font-weight: bold; 
            text-align: left;
            color: rgb(0,0,0,.8);
            font-weight: bold;
            margin-top: 15px;
            margin-left: 30px;
            margin-bottom: 5px;
        }

        .tagline {
            font-family: 'Poppins';
            font-size: 12px;
            text-align: left;
            line-height: normal;
            color:black;
            margin-left: 30px;
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
            margin-bottom: 20px;
            margin-top: 60px;
        }

        .tagline-right {
            font-family: 'Poppins';
            font-size: 13px;
            color: black;
            text-align: left;
            margin-bottom: 35px;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 14px;        
            color: rgb(0,0,0,.8);
            text-align: left;
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
            margin-bottom: 20px;
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
            margin-top: 5px;
            margin-bottom: 80px;
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
                <p class="title">Reset Password</p>
                <?php if($error !== ""): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php elseif($success_message !== ""): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                <?php else: ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <?php if(isset($_GET['token'])): ?>
                            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
                        <?php endif; ?>
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" required>
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                        <button class="reset-btn" type="submit">Update Password</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>