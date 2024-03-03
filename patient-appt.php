<?php
    include('db_connection.php');

    $id = $_GET['patientID']; // fetched ID
    $sql = "SELECT patientID, firstName FROM tblusers WHERE patientID='$id';"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row["patientID"];
    $fname = $row["firstName"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- DROPDOWN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style>
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

        .greeting {
            color: #BE9355; 
            font-size: 16px;          
            font-weight: normal;            
            margin-top: 10%;
        }

        .dropdown-menu {
            font-family: DM Sans;
            font-size: 13px;
        }
    </style>

    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="images/LOGO.png">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <img src="images/LOGO.png" alt="Derma101" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patient-home.php?patientID=<?php echo $id ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color: #BE9355;">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        
            <ul class="nav navbar-nav">
                <li class="nav-item greeting">Hi, <?php echo $fname ?></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #BE9355"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item disabled" aria-disabled="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="guest-index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>

    <br><br>

    <?php
        // get appt of patient
        $sql = "SELECT apptID, apptDate, serviceID, patientNote, statusID FROM tblappt WHERE patientID=$id;";
        $result = $conn->query($sql);
        if (!$result) { die("Invalid Query: " . $conn->connect_error);}
    ?>

    <div class="container"> <?php
        while($row = $result->fetch_assoc()) {
            $apptID = $row["apptID"];
            $date = $row["apptDate"];
            $formattedDate = date("l, F j, Y", strtotime($date));
            $svcID = $row["serviceID"];           
            $note = $row["patientNote"];
            $statusID = $row["statusID"];

            echo '
                <div class="card">
                    <p class="card-header">'.$formattedDate.'</p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Appointment ID</p>
                                <p>'.$apptID.'</p>
                            </div>
                            <div class="col-md-4">
                                <p>Service</p>
                                <p>'?><?php
                                $svcsql = "SELECT serviceName FROM tblservice WHERE serviceID='$svcID';"; 
                                $svcresult = $conn->query($svcsql);
                                $svcrow = $svcresult->fetch_assoc();
                                $svcName = $svcrow["serviceName"];
                                echo $svcName;
                                ?><?php echo'</p>
                            </div>
                            <div class="col-md-4">
                                <p>Status</p>
                                <p>'?><?php
                                $stsql = "SELECT tblstatus.status FROM tblstatus WHERE statusID='$statusID';"; 
                                $stresult = $conn->query($stsql);
                                $strow = $stresult->fetch_assoc();
                                $stName = $strow["status"];
                                echo $stName;
                                ?><?php echo'</p>
                            </div>
                        </div>
                        <div>
                            <p>Note</p>
                            <p>'.$note.'</p>
                        </div>                      
                    </div>
                </div> <br>';      
        } ?>
    </div>

</body>
</html>