<?php
    include('db_connection.php');

    $id = $_GET['patientID']; // fetched ID
    $sql = "SELECT password FROM tblusers WHERE patientID=$id;"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pass = $row["password"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $current_password = $_POST["current_password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];

        // Check if current password input matches
        if ($pass != $current_password) {
            echo "<script>alert('Current Password is incorrect. Please try again.');
                window.location.href = 'patient-profile.php?patientID=$id';</script>";
            
        } else { 
            // Check if new password matches the confirmation password
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE tblusers SET password = '$hashed_password' WHERE patientID = '$id'";
                    $result = $conn->query($sql);
                    if ($result) {         
                        echo "<script>alert('Password changed successfully!');
                        window.location.href = 'patient-profile.php?patientID=$id';</script>";
                    }
            } else {
                echo "<script>alert('Password do not match. Please try again.');
                window.location.href = 'patient-profile.php?patientID=$id';</script>";
            }     
        } 
    }
?>