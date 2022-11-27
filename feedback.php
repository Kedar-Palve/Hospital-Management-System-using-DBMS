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

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    $sql2 = " DELETE FROM `hospital`.`feedback` WHERE `id`='$id';";

    $con->query($sql2);
    $con->close();
}






?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="nav.css">
</head>

<body>


    <style>
      
        nav :nth-child(9) {

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



    <div class="review">
        <div class="about">
            <br>
            <h1>
                PEOPLE REACT
            </h1>
            <!-- <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, perferendis laudantium blanditiis eaque voluptates vero reprehenderit, porro architecto voluptas, vitae aut fugit ex ipsa quas excepturi deleniti! Quia excepturi molestias quasi nobis obcaecati minus optio eum delectus? Quas necessitatibus quod deleniti nesciunt illo qui!
        </p> -->
        </div>
        <div class="reviews">


            <?php


            $server = "localhost";
            $username = "root";
            $password = "";

            $con = mysqli_connect($server, $username, $password);

            $sql2 = "SELECT * FROM `hospital`.`feedback`;";

            $data2 = $con->query($sql2);

            while ($result = $data2->fetch_assoc()) {
                echo '
                
                <div class="dd aa">
                <i class="fa-solid fa-circle-user"></i>
                <span class="name">
                    ' . $result['name'] . '
                </span>
                <span class="time">
                ' . $result['r_date'] . '

                </span>
                <br><br>
                <p>
                ' . $result['message'] . '
                </p>
                <br><br>

                <h5>'.$result['contact'].'<h5>

                <a href="feedback.php?id=' . $result['id'] . '">
                <button>delete</button>
                </a>



            </div>
                
                ';
            }
            $con->close();

            ?>





            




        </div>


    </div>


    <i class="fa-solid fa-circle-chevron-right fa-circle-chevron-right2 arrow" onclick="rightd()"></i>
    <i class="fa-solid fa-circle-chevron-left fa-circle-chevron-left2 arrow" onclick="leftd()"></i>


    <script src="feedback.js">

    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>