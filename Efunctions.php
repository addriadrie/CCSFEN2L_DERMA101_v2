<?php
    session_start();
    // Function para sa pag-check kung ang email ay naverify na
    function check_verified()
    {
        if (isset($_SESSION['USER'])) {
            $id = $_SESSION['USER']->id;

            // Query to check if the user's email is verified
            $query = "SELECT * FROM tblusers WHERE patientID = :id AND email = email_verified LIMIT 1";
            $vars = array(':id' => $id);
            $row = database_run($query, $vars);

            // Check if query returned a row
            if ($row) {
                return true; // User's email is verified
            }
        }

        return false; // User's email is not verified or session user is not set
    }

    function check_login($redirect = true)
    {
        if (isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])) {
            return true; // User is logged in
        }

        if ($redirect) {
            header("Location: login.php"); // Redirect to login page if user is not logged in
            die;
        } else {
            return false; // User is not logged in
        }
    }


    function login($data)
    {
        $errors = array();

        // Validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email";
        }

        // Validate password length
        if (strlen(trim($data['password'])) < 8) {
            $errors[] = "Password must be at least 4 chars long";
        }

        // Check for errors
        if (count($errors) == 0) {
            $arr['email'] = $data['email'];
            $password = hash('sha256', $data['password']);

            $query = "SELECT * FROM user WHERE email = :email LIMIT 1";

            $row = database_run($query, $arr);

            if (is_array($row)) {
                $row = $row[0];

                if ($password === $row->password) {
                    $_SESSION['USER'] = $row;
                    $_SESSION['LOGGED_IN'] = true;

                } else {
                    $errors[] = "Wrong email or password";
                }

            } else {
                $errors[] = "Wrong email or password";
            }
        }

        return $errors;
    }
    
    function signup($data) {
        $errors = array();

        // validate
        if (!preg_match('/^[a-zA-Z\s]+$/', $data['fname']) || !preg_match('/^[a-zA-Z\s]+$/', $data['Midname']) || !preg_match('/^[a-zA-Z\s]+$/', $data['lname'])) {
            $errors[] = "Please enter valid first name, middle name, and last name";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email";
        }

        if (strlen(trim($data['password'])) < 8) {
            $errors[] = "Password must be at least 8 chars long";
        }
        $check = database_run("SELECT * FROM tblusers WHERE email = :email LIMIT 1", ['email' => $data['email']]);
        if (is_array($check)) {
            $errors[] = "That email already exists";
        }

        // save
        if (count($errors) == 0) {
            $firstName = $data['fname'];
            $middleName = $data['Midname'];
            $lastName = $data['lname'];
            $email = $data['email'];
            $password = hash('sha256', $data['password']);
            $date = date("Y-m-d H:i:s");

            $query = "INSERT INTO tblusers (firstName, middleName, lastName, email, password, date) VALUES (:firstName, :middleName, :lastName, :email, :password, :date)";

            $arr = array(
                'firstName' => $firstName,
                'middleName' => $middleName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $password,
                'date' => $date
            );

            database_run($query, $arr);
        }

        return $errors;
    }


    function database_run($query, $vars = array())
    {
        $string = "mysql:host=localhost;dbname=db_derma";

        try {
            $con = new PDO($string, 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stm = $con->prepare($query);
            $check = $stm->execute($vars);

            if ($check) {
                $data = $stm->fetchAll(PDO::FETCH_OBJ);

                if (count($data) > 0) {
                    return $data;
                }
            }

            return false;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
?>
