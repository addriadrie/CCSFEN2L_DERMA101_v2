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
            padding: 30px;
            border-radius: 0 0 10px 10px; /* Adjust as needed */
        }

        .welcome {
            font-family: 'DM Sans';
            font-size: 24px;
            color: #be9355;
            font-weight: bold;
            text-align: left;
            margin-top: 20px;
            margin-bottom: 5px;
        }

        .tagline-welcome {
            font-family: 'Poppins';
            font-size: 13px;
            color: black;
            text-align: left;
            margin-bottom: 20px;
        }

        /* label {
            display: block;
            font-size: 12px;        
            color: rgb(0,0,0,.8);
            margin-bottom: 3px;
        } */

        input {
            font-size: 12px;
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .signup-form-group {
            margin-bottom: 15px;
            text-align: left;
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

        .login-link {
            margin-top: 10px;
            color: #555;
            font-size: 11px;
        }

        .password-hint {
            font-size: 10px;
            margin-top: 5px;
            color: #555;
            margin-bottom: 5px; /* Add margin-bottom to give space between the hint and checkbox */
        }

        .terms-checkbox {
            display: flex;
            align-items: center;
            margin-top: 5px; /* Adjust as needed */
        }

        #terms {
            width: 15px; /* Set width of checkbox */
            height: 15px; /* Set height of checkbox */
            margin-right: 8px;
        }

        .terms-agreement {
            font-size: 11px;
            color: #555;
            flex: 1; /* Allow the label to fill available horizontal space */
            max-width: 470px; /* Set maximum width for the label */
            overflow: hidden;
            text-overflow: ellipsis; /* Add ellipsis (...) for overflow text */
            margin-top: 5px;
        }

    /* Media Queries for Responsive Design */
    @media only screen and (min-width: 481px) {
        /* I-adjust ang mga halaga batay sa pangangailangan */
        .signup-container {
            max-width: 300px;
        }

        .signup-upper-panel,
        .signup-lower-panel {
            width: 100%; /* Paiba-ibahin ang sukat ng panel upang umayon sa mas maliit na screen */
            max-width: 100%;
            border-radius: 10px; /* Kung hindi na kinakailangan ang pagkakaiba-iba */
        }
    }

    @media only screen and (min-width: 769px) {
        /* I-adjust ang mga halaga batay sa pangangailangan */
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

    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>
    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <?= $error ?> <br>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="signup-container">
        <div class="signup-panels">
            <div class="signup-panel signup-upper-panel">
                <img src="images/LOGO.png" alt="Logo" class="logo">
                <p class="join">Join In Derma101</p>
                <p class="tagline">Derma 101 aims to provide professional excellent dermatological services specializing in both pathologic and cosmetic dermatology upholding the highest ethical standards and quality care.</p>
            </div>
            <div class="signup-panel signup-lower-panel">
                <p class="welcome">Create Your Account</p>
                <p class="tagline-welcome">It's Free and Easy</p>
                <form action="signup-process.php" method="post">
                    <div class="signup-form-group">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="signup-form-group">
                        <!-- <label for="Midname">Middle Name </label> -->
                        <input type="text" id="Midname" name="Midname" placeholder="Middle name">
                    </div>
                    <div class="signup-form-group">
                        <!-- <label for="lname">Last Name</label> -->
                        <input type="text" id="lname" name="lname" placeholder="Last name" required>
                    </div>
                    <div class="signup-form-group">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="signup-form-group">
                        <!-- <label for="password">Create Password</label> -->
                        <input type="password" id="password" name="password" placeholder="Create password*" required>
                        <p class="password-hint">*Must be 8 characters</p>
                    </div>
                    <div class="signup-form-group terms-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms" class="terms-agreement">
                            By creating an account means you agree to the
                            <a href="terms_and_conditions.html" target="_blank">Terms and Conditions</a>
                            and
                            <a href="privacy_policy.html" target="_blank">Privacy Policy</a>
                        </label>
                    </div>
                    <button class="signup-btn" type="submit">Sign Up</button>
                </form>
                <p class="login-link">Already have an account? <a href="login.php" style="color: #be9355;">Login</a></p>
            </div>
        </div>
    </div>

    <!-- Modal for success message -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modalMessage"></p>
        </div>
    </div>

    <!-- JavaScript for modal functionality -->
    <script>
        function openModal(message) {
            var modal = document.getElementById('successModal');
            document.getElementById('modalMessage').innerHTML = message;
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('successModal');
            modal.style.display = 'none';
        }

        function validateForm() {
            var password = document.getElementById('password').value;

            if (password.length < 8) {
                alert("Password must be at least 8 characters");
                return false; // Prevent form submission
            } else {
                return true; // Allow form submission
            }
        }
    </script>
</body>
</html>