<?php
    function login($inputEmail, $inputPassword, &$errors) {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $dbPassword = "";
        $dbname = "db_derma";

        try {
            // Create a new PDO instance
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword);
            // Set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Sanitize the inputs
            $email = filter_var($inputEmail, FILTER_SANITIZE_EMAIL);

            // Query to fetch user from the database
            $query = "SELECT * FROM tblusers WHERE LOWER(email) = LOWER(:email) LIMIT 1"; // Case-insensitive email comparison
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the password
                if (password_verify($inputPassword, $user['password'])) {
                    // Password is correct
                    // Set session variables
                    $_SESSION['user_id'] = $user['userID'];
                    $_SESSION['email'] = $user['email'];
                    return true; // Login successful
                } else {
                    // Invalid password
                    $errors[] = "Invalid email or password"; // Login failed
                }
            } else {
                // User not found
                $errors[] = "User not found"; // Login failed
            }
        } catch(PDOException $e) {
            // Handle database connection error
            $errors[] = "Connection failed: " . $e->getMessage();
        }

        return false; // Login failed
    }


    function getUserByEmail($email) {
        global $conn;
        
        $email = mysqli_real_escape_string($conn, $email);
        $query = "SELECT * FROM tblusers WHERE email = '$email' LIMIT 1";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function database_run($query, $vars = array())
    {
        $con = new mysqli('localhost', 'root', '', 'db_derma101');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $stm = $con->prepare($query);
        if ($stm) {
            if (!empty($vars)) {
                $types = str_repeat('s', count($vars));
                $stm->bind_param($types, ...$vars);
            }
            $check = $stm->execute();

            if ($check) {
                $result = $stm->get_result();
                $data = $result->fetch_all(MYSQLI_ASSOC);

                if (count($data) > 0) {
                    return $data;
                }
            }
        }

        return false;
    }

    function check_verified()
    {
        $id = $_SESSION['USER']->userID;
        $query = "SELECT * FROM tblusers WHERE userID = ? LIMIT 1";
        $vars = array($id);
        $row = database_run($query, $vars);

        if (is_array($row)) {
            $row = $row[0];

            if ($row['email'] == $row['email_verified']) {
                return true;
            }
        }

        return false;
    }

    function check_login($redirect = true) {
        if (isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])) {
            return true;
        }

        if ($redirect) {
            header("Location: login.php");
            exit();
        } else {
            return false;
        }
    }
?>