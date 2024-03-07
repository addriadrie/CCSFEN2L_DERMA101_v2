<?php 
    include("db_connection.php");

    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    //     $statusID = $_POST["statusID"];

    //     if ($statusID == 1) {
    //         $sql = "UPDATE tblappt SET statusID = $statusID WHERE patientID = $apptID";
    //         $result = $conn->query($sql);
    //         if ($result) {         
    //             //
    //         }
    //     }
    // }
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

    <title>Clinic Schedule</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid #BE9355;">
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
                    <a class="nav-link" href="admin-patient-list.php" style="color: #BE9355;">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin-clinic.php" style="color: #BE9355;">Appointments</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="guest-index.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>

    <div class="wrapper"> 
        <div class="container">
            <p style="font-family:DM Sans; text-align:center; color:#BE9355; font-weight:bold; font-size:24px">Appointments List</p><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Appointment ID</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $apptsql = "SELECT * FROM tblappt";
                        $apptresult = $conn->query($apptsql);
                        if ($apptresult && $apptresult->num_rows > 0) {
                            while ($apptrow = $apptresult->fetch_assoc()) {
                                $apptID = $apptrow["apptID"];
                                $pntID = $apptrow["patientID"];
                                $date = $apptrow["apptDate"];
                                $svcID = $apptrow["serviceID"];           
                                $statID = $apptrow["statusID"];

                                echo '
                                    <tr>
                                    <td>'.$pntID.'</td>
                                    <td>'?><?php $sql = "SELECT firstName, lastName FROM tblusers WHERE patientID='$pntID';"; 
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        $fname = $row["firstName"];
                                        $lname = $row["lastName"];
                                        echo $fname . " " . $lname ;
                                        ?><?php echo'</td>
                                    <td>'.$apptID.'</td>
                                    <td>'?><?php $sql = "SELECT serviceName FROM tblservice WHERE serviceID='$svcID';"; 
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row["serviceName"];
                                        ?><?php echo'</td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <form method="post">
                                        <select class="form-select" aria-label="Default select example" name="statusID" required>
                                            <option selected>'?> <?php
                                                if($statID==1){
                                                    echo '
                                                    <option selected>Pending</option> 
                                                    <option>Completed</option>
                                                    <option>Cancelled</option>';
                                                } else if($statID==2){
                                                    echo '
                                                    <option selected>Completed</option> 
                                                    <option>Pending</option>
                                                    <option>Cancelled</option>';
                                                } else if($statID==3){
                                                    echo '
                                                    <option selected>Cancelled</option> 
                                                    <option>Pending</option>
                                                    <option>Completed</option>';
                                                } 
                                                echo'
                                            </option>
                                        </select>
                                        </form>
                                    </td>                                 
                                    </tr>
                                ';

                            }
                        } else {
                            echo "<tr><td colspan='9'>No appointments found</td></tr>";
                        }                                   
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>