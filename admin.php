
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
            font-family: DM Sans;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 300px; /* Adjust as needed */
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
        }

        .join {
            font-size: 22px; 
            font-family: 'DM Sans'; 
            font-weight: bold; 
            text-align: left;
            color: rgb(0,0,0,.8);
            font-weight: bold;
            margin-top: 15px;
            margin-left: 15px;
            margin-bottom: 5px;
        }

        .tagline {
            font-family: 'Poppins';
            font-size: 12px;
            text-align: left;
            line-height: normal;
            color:black;
            margin-left: 15px;
            margin-right: 15px;
        }

        .lower-panel {
            background: #fff;
            padding: 25px;
            border-radius: 0 0 10px 10px; /* Adjust as needed */
            display: flex;
            flex-direction: column;
        }

        .welcome {
            font-family: 'DM Sans';
            font-size: 24px;
            color: #be9355;
            font-weight: bold;
            text-align: left;
            margin-top: 20%;
            margin-bottom: 5px;
        }

        .tagline-welcome {
            font-family: 'Poppins';
            font-size: 13px;
            color: black;
            text-align: left;
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
            font-size: 12px;
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .forgot-password {
            margin-top: 10px;
            color: #be9355;
            text-decoration: none;
            font-size: 12px;
            display: block;
            float: right;
        }

        .sign-in-btn {
            background-color: #be9355;
            font-size: 14px;
            color: #fff;
            padding: 6px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;          
        }

        .admin-link {
            color: #555;
            font-size: 12px;
            text-align: center;
            line-height: normal;
            margin-top: 20px;
            margin-bottom: 20%;
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

    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>

<body>
    <div class="container">
        <div class="panels">
            <div class="panel upper-panel">
                <img src="images/LOGO.png" alt="Logo" class="logo">
                <p class="join">Derma 101</p>
                <p class="tagline">Admin login panel.</p>
            </div>
            <div class="panel lower-panel">
                <p class="welcome">Welcome, Admin</p>
                <p class="tagline-welcome">Please sign in to your account</p>
                <form method="post" action="admin-dashboard.php">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" id="email" name="email" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required>
                        <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                    </div>
                    <button type="submit" class="sign-in-btn">Log In</button>
                </form>
                <p class="admin-link">Are you a regular user? <a href="login.php" style="color: #be9355;">Login here</a></p>
            </div>
        </div>
    </div>
</body>
</html>