<?php

session_start();
if (isset($_SESSION['confirm'])) {
  // seccion_end();


  // seccion_end();
} else {

      session_unset();
      session_destroy();
   header('location:home.php');
  //  seccion_end();
   die();
}

?>





<?php




$server = "localhost";
$username = "root";
$password = "";
$database = "hospital";
$con  = mysqli_connect($server, $username, $password);



$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
$count5 = 0;

$dd1 = 0;
$dd2 = 0;
$dd3 = 0;

$sqld = " SELECT year(CURDATE())-year(`dob`) as age  FROM `hospital`.`info`;";

$datad = $con->query($sqld);

while ($resultd = $datad->fetch_assoc()) {

    if ($resultd['age'] >= 0 and $resultd['age'] < 10) {
        $count1 = $count1 + 1;
    } else  if ($resultd['age'] >= 10 and $resultd['age'] <= 30) {
        $count2 = $count2 + 1;
    } else if ($resultd['age'] > 30 and $resultd['age'] <= 45) {
        $count3 = $count3 + 1;
    } else if ($resultd['age'] > 46 and $resultd['age'] <= 70) {
        $count4 = $count4 + 1;
    } else if ($resultd['age'] > 80 and $resultd['age'] <= 110) {
        $count5 = $count5 + 1;
    }
}


$sqldd = " SELECT year(CURDATE())-year(`d_dob`) as age  FROM `hospital`.`doctor`;";

$datadd = $con->query($sqldd);

while ($resultdd = $datadd->fetch_assoc()) {

    if ($resultdd['age'] >= 0 and $resultdd['age'] <= 20) {
        $dd1 = $dd1 + 1;
    } else  if ($resultdd['age'] > 20 and $resultdd['age'] <= 40) {
        $dd2 = $dd2 + 1;
    } else if ($resultdd['age'] > 40 and $resultdd['age'] <= 80) {
        $dd3 = $dd3 + 1;
    }
}

$sql1 = " SELECT count(`user_name`) as count1 FROM `hospital`.`user_login`; ";
$user_count = 0;
$doctor_count = 0;
$patient_count = 0;
$admin_count = 0;
$old_patient = 0;
$doctors = 0;
$doctor = 0;
$doctodname = "";
$data1 = $con->query($sql1);
while ($result1 = $data1->fetch_assoc()) {
    $user_count = $result1['count1'];
}


$sql12 = " SELECT count(`d_name`) as count1 FROM `hospital`.`doctor`; ";
$doctor_count = 0;
$data12 = $con->query($sql12);
while ($result12 = $data12->fetch_assoc()) {
    $doctor_count = $result12['count1'];
}

$sql12d = " SELECT count(`n_name`) as count1 FROM `hospital`.`nurse`; ";
$nurse_countd = 0;
$data12d = $con->query($sql12d);
while ($result12d = $data12d->fetch_assoc()) {
    $nurse_countd = $result12d['count1'];
}


$sql13 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info`; ";

$data13 = $con->query($sql13);
while ($result13 = $data13->fetch_assoc()) {
    $patient_count = $result13['count1'];
}


$sql14 = " SELECT count(`admin_name`) as count1 FROM `hospital`.`admin_login`; ";

$data14 = $con->query($sql14);
while ($result14 = $data14->fetch_assoc()) {
    $admin_count = $result14['count1'];
}

$sql15 = " SELECT count(*) as count1 FROM `hospital`.`feedback`; ";
$message_count = 0;
$data14 = $con->query($sql15);
while ($result14 = $data14->fetch_assoc()) {
    $message_count = $result14['count1'];
}

$sql16 = " SELECT count(`p_name`) as count1 FROM `hospital`.`old_info`; ";

$data16 = $con->query($sql16);
while ($result16 = $data16->fetch_assoc()) {
    $old_records = $result16['count1'];
}

$sql17 = " SELECT count(`d_name`) as count1 FROM `hospital`.`old_doctor`; ";

$data17 = $con->query($sql17);
while ($result17 = $data17->fetch_assoc()) {
    $doctors = $result17['count1'];
}

// $sql17 = " SELECT `appoint` FROM `hospital`.`info` WHERE `appoint`=( SELECT max(count(`appoint`))
// FROM  `hospital`.`info`  GROUP BY `aapoint`)";


$sql18 = " SELECT `appoint` , count(`appoint`) as count2 FROM `hospital`.`info` group by `appoint` having count(`appoint`)=( SELECT count(`appoint`)
      FROM  `hospital`.`info` GROUP BY `appoint` order by count(`appoint`) DESC limit 1);";
$doctordname='';
$data18 = $con->query($sql18);
while ($result18 = $data18->fetch_assoc()) {
    $doctor = $result18['count2'];
    $doctordname = $result18['appoint'];
}






$d1 = 0;
$d2 = 0;
$d3 = 0;
$d4 = 0;
$d5 = 0;



$d1name = '';
$d2name = '';
$d3name = '';
$d4name = '';
$d5name = '';


$sql19 = " SELECT count(`appoint`) as count2 , `appoint` FROM  `hospital`.`info` GROUP BY `appoint` having `appoint`<>'not availabe' order by count(`appoint`) DESC limit 5;";

$data19 = $con->query($sql19);
$index = 0;
while ($result19 = $data19->fetch_assoc()) {
    if ($index == 0) {

        $d1 = $result19['count2'];
        $d1name = $result19['appoint'];
    } else if ($index == 1) {


        $d2 = $result19['count2'];
        $d2name = $result19['appoint'];
    } else if ($index == 2) {
        $d3 = $result19['count2'];
        $d3name = $result19['appoint'];
    } else  if ($index == 3) {
        $d4 = $result19['count2'];
        $d4name = $result19['appoint'];
    } else if ($index == 4) {
        $d5 = $result19['count2'];
        $d5name = $result19['appoint'];
    }

    $index = $index + 1;
}

$salaryd=0;

$sql=" SELECT max(fees) as salary FROM `hospital`.`doctor`;";

 $data=$con->query($sql);
  


// $data17 = $con->query($sql17);
while ($result = $data->fetch_assoc())
{
      $salaryd=$result['salary'];
}



$con->close();


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL_MANAGEMENT SYSTEM </title>

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="data.css">

    <link rel="stylesheet" href="nav.css">


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>







    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
    <style>
        /* nav :nth-child(1) */
        nav :nth-child(4) {

            padding-bottom: 15px;
            border-bottom: 3px solid rgb(255, 52, 52);
            color: #00FF00;
            cursor: pointer;
        }
    </style>
    <header>

    <nav>
            <i class="fa-solid fa-circle-user logo"></i>
            <span class="hospi_text"><b><?php echo "  Admin "; ?></b></span>
            <span class="nav_panels" id="nav_panels1"><a href="index.php">Home</a> </span>
            <!-- <span class="nav_panels" id=""><a href="patient.php">D-left</a> </span>
            <span class="nav_panels" id=""><a href="doctorfac.php">App-left</a> </span> -->
            <span class="nav_panels" id=""><a href="data.php">data</a> </span>
            <span class="nav_panels" id=""><a href="faculty.php">Faculty</a> </span>
            <span class="nav_panels" id=""><a href="nurse.php">Nurse</a> </span>
            <span class="nav_panels"><a href="action.php"> Action</a></span>
            <span class="nav_panels"><a href="view2.php"> View</a></span>
            <span class="nav_panels"><a href="feedback.php"> Feedback</a></span>
            <span class="nav_panels" id=""><a href="doctorfac.php">D-left</a> </span>
            <span class="nav_panels" id=""><a href="  patient.php">App-left</a> </span>
            <span class="nav_panels"><a href="logout.php"> Log Out</a></span>
            <!-- <span class="nav_panels"><i class="fa-solid fa-right-from-bracket"></i></span> -->
            <!-- <span class="nav_panels" id="contact_us1"><a href="#contact_us">CONTACT US</a></span> -->
        </nav>


    </header>

    <div class="info">
        <div class="user">
            <h2>
                Total Users : <?php echo $user_count;  ?>
            </h2>
            <i class="fa-solid fa-users dd"></i>
        </div>
        <div class="user">
            <h2>
                Appointments : <?php echo $patient_count;  ?>
            </h2>
            <i class="fa-solid fa-calendar-check dd"></i>
        </div>

        <div class="user">
            <h2>
                Doctors : <?php echo $doctor_count;  ?>
            </h2>
            <i class="fa-solid fa-user-doctor dd"></i>
        </div>

        <div class="user">
            <h2>
                Nurse : <?php echo $nurse_countd;  ?>
            </h2>
            <i class="fa-solid fa-user-nurse dd"></i>
        </div>

        <div class="user">
            <h2>
                Admin : <?php echo $admin_count;  ?>
            </h2>
            <i class="fa-solid fa-user-nurse dd"></i>
        </div>


        <div class="user">
            <h2>
                Contact us : <?php echo $message_count;  ?>
            </h2>
            <!-- <i class="fa-solid fa-comment"></i> -->
            <!-- <i class="fa-solid fa-message-lines"></i> -->
            <!-- <i class="fa-solid fa-comment"></i> -->

            <i class="fa-solid fa-envelope dd"></i>


        </div>

        <div class="user">
            <h2>
                Successfull Appointments : <?php echo $old_records;  ?>
            </h2>


            <i class="fa-solid fa-user-check dd"></i>


        </div>




        <div class="user">
            <h2>
                Left Doctor's : <?php echo $doctors;  ?>
            </h2> <i class="fa-solid fa-user-slash dd"></i>
        </div>


        <div class="user">

            <h2>
                Dr. <?php echo $doctordname;  ?>
            </h2>


            <i class="fa-solid fa-user-shield dd"></i>
            <h4 class="dd1">
                Appointments : <?php echo $doctor;  ?>
                <h4>
                    <i class="fa-solid fa-star star"></i>

                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
        </div>

        <div class="user">
            <h2>
                Max Salary : <?php echo $salaryd;  ?>
            </h2>


            <i class="fa-solid fa-money-check-dollar dd"></i>


        </div>

    </div>

    <div class="graph">

        <div class="pied1">
            <h2> AGE OF APPOINTMENTS PERSON </h2>
            <canvas id="myChart"></canvas>

        </div>


        <div class="pied2">
            <h2> AGE OF DOCTOR </h2>
            <canvas id="myChart1"></canvas>
        </div>

        <div class="pied3">
            <h2> Performance </h2>
            <span> Top 5 doctors with highest Appointments </span>
            <canvas id="myChart2"></canvas>
        </div>

    </div>




    <!-- <div class="pied3">
        <h2> Patients </h2>
        <canvas id="myChart1"></canvas>
    </div> -->





    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }


        const ctx = document.getElementById('myChart').getContext('2d');
        const ctx1 = document.getElementById('myChart1').getContext('2d');
        const ctx2 = document.getElementById('myChart2').getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['0-10', '10-30', '30-45', '46-80', '80-110'],
                datasets: [{
                    label: '# AGE ',
                    data: <?php echo "[" . $count1 . "," . $count2 . "," . $count3 . "," . $count4 . "," . $count5 . "]"; ?>,
                    backgroundColor: [

                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });


        const myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['10-20', '20-40', '40-80'],
                datasets: [{
                    label: '# of Votes',
                    data: <?php echo "[" . $dd1 . "," . $dd2 . "," . $dd3 . "]"; ?>,
                    backgroundColor: [

                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)'

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });

        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?php echo "['" .$d2name . "','" . $d4name . "','" . $d1name . "','". $d3name . "','". $d5name . "']"; ?>,
                datasets: [{
                    label: ' Appointments',
                    data: <?php echo "[" . $d2 . "," . $d4 . "," . $d1 . ",". $d3 . ",". $d5 . "]"; ?>,
                    backgroundColor: [

                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });
    </script>

    <!-- <script src="index.js"> </script> -->

</body>

</html>