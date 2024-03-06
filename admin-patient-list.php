<?php
    include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
        }

        .nav-item {
            font-family: DM Sans;
            font-weight: bold;
            font-size: 14px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #BE9355;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: black;
            text-decoration: none;
        }

        thead {
            font-family: 'Poppins';
            font-size: 14px;
            text-align: center;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            border-bottom: 3px solid #BE9355;
        }

        td {
            font-family: 'DM Sans';
            font-size: 14px;
        }

        table {
            border-radius: 10px;
            overflow: hidden;
        }

        .btn {
            font-family: 'DM Sans';
            font-size: 12px;
        }

        .footer {
            background-color: #f4f5f6;
            font-family: DM Sans;
            bottom: 0;
            left: 0;
        }
        
        .footer-title {
            font-family: Poppins;
            font-weight: bold;
            color: #BE9355;
            font-size: 16px;
            margin-bottom: 0px;
        }

        .footer-icons {
            float: right;
        } 

    </style>

    <title>Patients List</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-clinic.php">Appointments</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="guest-index.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Divider -->
    <hr class="my-1" style="border-top: 1px solid #BE9355;">

    <br><br>

    <div class="wrapper"> 
        <div class="container">
            <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Patients List</p><br>
            
            <!-- NO BACKEND -->
            <!-- <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div> 
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col">
                            <select class="form-select">
                                <option selected>Sort by...</option>
                                <option value="firstName_ASC">First Name (A-Z)</option>
                                <option value="lastName_ASC">Last Name (A-Z)</option>
                                <option value="recent">Recent</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                        <select class="form-select">
                            <option selected>Filter by...</option>
                            <option value="recent">Most Recent</option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                        <a href="add_patient.php" class="btn sign-in-btn">Add Patient</a>
                    </div>
                </div>
            </div>-->
        </div> 

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Blood Type</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch patient data from database
                    $sql = "SELECT * FROM tblusers";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['patientID']}</td>";
                            echo "<td>{$row['firstName']}</td>";
                            echo "<td>{$row['middleName']}</td>";
                            echo "<td>{$row['lastName']}</td>";
                            echo "<td>{$row['dateOfBirth']}</td>";
                            echo "<td>{$row['sex']}</td>";
                            echo "<td>{$row['bloodType']}</td>";
                            echo "<td>{$row['email']}</td>";
                            // Add View and Edit icons
                            echo "<td>";
                            echo "<a href='admin-view.php?patientID={$row['patientID']}' class='btn btn-info btn-sm btn-view' style='margin-right: 5px'><i class='fas fa-eye'></i> View</a>";
                            // echo "<a href='edit_patient.php?patientID={$row['patientID']}' class='btn btn-primary btn-sm btn-edit'><i class='fas fa-edit'></i> Edit</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No patients found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div id="contact" class="footer" style="width: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-8">
                        <br>
                        <p class="footer-title">Contact Us</p>
                        <p class="footer-address" style="font-size: 14px;">2/F 1 Cirq Building, Sen. Lorenzo Sumulong Avenue, Brgy. San Roque, Antipolo, Philippines</p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <br>
                            <div class=" footer-icons">
                                <a href="https://www.facebook.com/Derma101" style="color: #BE9355;"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="mailto:derma101ph@yahoo.com" style="color: #BE9355;"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="https://www.derma101ph.com" style="color: #BE9355;"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></a>                  
                            </div>
                        </p>
                        <br>
                        <p class="footer-copyright" style="text-align: right; color: #C0C0C0; font-size: 12px;">Copyright © 2024. All rights reserved.</p>
                    </div>
                </div>           
            </div>     
        </div>           
    </footer>

    <!-- Dagdag na mga scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
