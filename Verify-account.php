<?php
    // Include your database connection file
    include 'db_connection.php';

    // Check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if verification code is submitted
    if(isset($_POST['verification_code'])) {
        $verification_code = $_POST['verification_code'];

        // Query to check if verification code exists in the database
        $query = "SELECT * FROM tblusers WHERE verification_code = '$verification_code'";
        $result = mysqli_query($conn, $query);

        // Check if query execution was successful
        if($result) {
            // Check if any rows were returned
            if(mysqli_num_rows($result) > 0) {
                // Verification code exists, update user status to verified
                $update_query = "UPDATE tblusers SET is_verified = 1 WHERE verification_code = '$verification_code'";
                $update_result = mysqli_query($conn, $update_query);

                // Check if update query was successful
                if($update_result) {
                    // Redirect user to login page
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Error updating user status: " . mysqli_error($conn);
                }
            } else {
                // Verification code does not exist in the database
                echo "Invalid verification code.";
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
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
        }

        .signup-lower-panel {
            background: #fff;
            padding: 35px;
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
            margin-bottom: 60%;
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
                <form method="post" action="">
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