<?php
    include("db_connection.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    // Function to generate a random verification code
    function generateVerificationCode() {
        return rand(100000, 999999); // Generate a random 6-digit code
    }

    // Function to send email
    function sendVerificationEmail($recipient, $subject, $message) {
        $mail = new PHPMailer();
        // Configuration for SMTP
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0; // Set to 2 for debugging
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com"; // Update this with your SMTP server
        $mail->Username   = "itsderma101@gmail.com"; // Update with your email address
        $mail->Password   = "epegjdmbihwnauyf"; // Update with your email password

        $mail->IsHTML(true);
        $mail->AddAddress($recipient);
        $mail->SetFrom("itsderma101@gmail.com", "Derma101");
        $mail->Subject = $subject;
        $mail->Body    = $message;

        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $Midname = $_POST['Midname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Generate verification code
        $verificationCode = generateVerificationCode();

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into database
        $sql = "INSERT INTO tblusers (firstName, middleName, lastName, email, password, verification_code) VALUES ('$fname', '$Midname', '$lname', '$email', '$hashed_password', '$verificationCode')";

        if ($conn->query($sql) === TRUE) {
            // Send verification email
            if (sendVerificationEmail($email, "Verify Your Email", "Your verification code is: $verificationCode")) {
                // Redirect to verify-account.php
                header("Location: verify-account.php");
                exit();
            } else {
                echo "Error sending verification email.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
