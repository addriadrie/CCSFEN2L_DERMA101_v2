<?php
    include('db_connection.php');

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            header("Location: login.php?error=emptyfields");
            exit();
        } else {
            $mysqli = new mysqli("localhost", "root", "", "db_derma");

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $query = "SELECT * FROM tblusers WHERE email=? LIMIT 1";
            // Use prepared statements to prevent SQL injection
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Verify password
            if ($user && password_verify($password, $user["password"])) {
                // Password is correct
                $_SESSION["user_id"] = $user["id"];
                header("Location: patient-home.php");
                exit();
            } else {
                // Invalid credentials
                header("Location: login.php?error=invalidlogin");
                exit();
            }
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
            font-family: DM Sans;
            margin: 0;
            padding: 0;
            background: #f4f5f6;
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
            padding: 40px;
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
            margin-top: 50px;
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
            margin-top: 8px;          
        }

        .link {
            color: #555;
            font-size: 12px;
            text-align: center;
            line-height: normal;
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

    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>

<body>
    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error; ?><br>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Authentication Successful!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="panels">
            <div class="panel upper-panel">
                <img src="images/LOGO.png" alt="Logo" class="logo">
                <p class="join">Join In Derma101</p>
                <p class="tagline">Derma 101 aims to provide professional excellent dermatological services specializing in both pathologic and cosmetic dermatology upholding the highest ethical standards and quality care.</p>
            </div>
            <div class="panel lower-panel">
                <p class="welcome">Welcome Back</p>
                <p class="tagline-welcome">Enhance your Beauty Today</p>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required>
                        <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                    </div>
                    <button type="submit" class="sign-in-btn">Log In</button>
                </form>
                <p class="link" style="margin-top: 15px; margin-bottom: 10px;">Don't have an account yet? <a href="signup.php" style="color:#be9355">Sign Up</a></p>
                <p class="link" style="margin-bottom: 50px">Are you an admin? <a href="admin-login.php" style="color:#be9355">Login here</a></p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            <?php if(isset($_SESSION['user_id'])): ?>
                $('#successModal').modal('show');
            <?php endif; ?>
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>