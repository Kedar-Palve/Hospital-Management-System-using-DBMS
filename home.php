<?php


$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);
$dd = "";

if (isset($_POST['user_name']) and isset($_POST['user_pass'])) {
    $name = $_POST['user_name'];
    $pass = $_POST['user_pass'];

    $sql = " SELECT * FROM `hospital`.`user_login` WHERE `user_name`='$name'  AND `user_password`='$pass';";

    $datad = $con->query($sql);

    $indexd = 1;

    while ($resultd = $datad->fetch_assoc()) {
        $indexd = $indexd + 1;
    }





    if ($indexd == 1) {
        $sql = " INSERT INTO `hospital`.`user_login`(`user_name`,`user_password`) values('$name','$pass');";
        $con->query($sql);



        echo "<script> alert(' user created successfully .')</script>";

        // header('location:home.php#login2');
    } else {

        $dd = 'username is already taken .';



        echo "<script> alert('username is already taken , try another one .')</script>";


        // header('location:home.php#login2');
    }
}

if (isset($_POST['name']) and isset($_POST['message'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $sql1 = " INSERT INTO `hospital`.`feedback`(`name`,`contact`,`message`,`r_date`)values('$name','$contact','$message',CURDATE());";


    $con->query($sql1);

    echo "<script> alert(' message send successfully  .. ')</script>";
    // $con->close();
    // header('location:home.php#feedback');
    // die();
}

if (isset($_POST['admin_name']) and isset($_POST['admin_password'])) {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    // $message=$_POST['message'];
    $sql3 = " SELECT * FROM `hospital`.`admin_login`;";


    $data3 = $con->query($sql3);

    while ($result3 = $data3->fetch_assoc()) {
        // unset($_SESSION['confirm']);

        if ($result3['admin_name'] == $admin_name and $result3['admin_password'] == $admin_password) {


            // echo $admin_name;
            session_start();

            $_SESSION['confirm'] = "yes";
            header('location:index.php');
            // seccion_end();
            // seccion_unset();
            // seccion_destroyed();
            die();
        } else {




            // echo "<script> alert(' invalid admin name . ')</script>";
            // header('location:home.php#login2');
        }
    }
    // $con->close();
}




if (isset($_POST['user_name1']) and isset($_POST['user_password1'])) {
    $user_name = $_POST['user_name1'];
    $user_password = $_POST['user_password1'];
    // $message=$_POST['message'];
    $sql4 = " SELECT * FROM `hospital`.`user_login`;";


    $data4 = $con->query($sql4);

    while ($result4 = $data4->fetch_assoc()) {
        // unset($_SESSION['confirm']);

        if ($result4['user_name'] == $user_name and $result4['user_password'] == $user_password) {


            // echo $admin_name;
            session_start();

            $_SESSION['confirm2'] = "yes";
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_password'] = $user_password;
            header('location:user.php');
            // seccion_end();
            // seccion_unset();
            // seccion_destroyed();
            die();
        } else {

            $dd = "incorrect username";

            // echo "<script> alert(' incorrect username.')</script>";
        }
    }
    // $con->close();
}




$doctor_count = 0;
$patient_count = 0;
$admin_count = 0;

$doctors = 0;
$doctor = 0;
$doctodname = "";



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


$con->close();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="home_d.css">

    <link rel="stylesheet" href="nav.css">
</head>

<body>


    <header>
        <nav>





            <span class="hospi_text"> <b> Hospital &nbsp Deepak</b> </span>
            <span class="nav_panels" id="nav_panels1"><a href="#user">User</a></span>
            <span class="nav_panels"><a href="#admin">Admin</a></span>
            <span class="nav_panels"><a href="#service">Service</a></span>
            <span class="nav_panels"><a href="#review">reviews</a></span>
            <span class="nav_panels" id="contact_us1"><a href="#feedback">Feedback</a></span>
            <span class="nav_panels" id="contact_us1"><a href="#contact_us">Contact Us</a></span>
        </nav>
    </header>
    <marquee behavior="smooth" direction="left"> welcome </marquee>

    <div class="dd1">A century ago, we made a commitment. We’ve kept it.
        A family of hospitals for your family.
        A heritage in care. A reputation in excellence.
        A higher level of care.
        A leading light in healthcare.
        A Passion for Healing.
        A passion for putting patients first.</div>
    <div class="infod">
        <div class="appoint">
            <h2> <?php echo $doctor_count;  ?> + doctors </h2>

        </div>
        <div class="appoint">
            <h2> <?php echo $patient_count;  ?> + appointments</h2>
        </div>
        <div class="appoint">
            <h2> <?php echo $nurse_countd; ?> + nurses </h2>
        </div>
    </div>
    <div class="hospi_img">
        <!-- <img src="https://i.pinimg.com/736x/23/5b/ec/235bec5efcafd157892c684b40e13431.jpg" alt="" class="hospi_img1"> -->

        <div class="hospi_img1"></div>
      

    </div>

    <div class="doctor_d" id="service">



        <div class="info_d">

            <h2>
                Our Doctors
                <hr class="hr1">
            </h2>
            <p>
                A Transforming, Healing Presence.
                A Union of Compassion + Healthcare.
                Advanced Healthcare Made Personal.
                Advanced Medicine, Trusted Care.
                Advancing medicine. Touching lives.
                Advancing the boundaries of medicine.
                Because Your Life Matters.
                Best of Care, Close to Home.
            </p>

        </div>

        <div class="doctors">


            <?php

            $server = "localhost";
            $username = "root";
            $password = "";

            $con  = mysqli_connect($server, $username, $password);


            $sql2 = "SELECT * FROM `hospital`.`doctor` ;";

            $data = $con->query($sql2);

            while ($result = $data->fetch_assoc()) {

                echo ' <div class="doct">
           <img src='.$result['d_photo'].'>
           <h3>
               ' . $result['d_name'] . '
           </h3>

           <h4>

           ' . $result['d_degree'] . '

           </h4>
       </div>
       ';
            }


            ?>





        </div>







        <i class="fa-solid fa-circle-chevron-right fa-circle-chevron-right1 arrow1 arrow12" onclick="rightd_doct()"></i>

        <i class="fa-solid fa-circle-chevron-left fa-circle-chevron-left1 arrow1" onclick="leftd_doct()"></i>
    </div>


    <div class="formdiv" id="user">
        <div class="login">
            <div class="log_text">Log in</div>
            <div>
                <i class="fa-solid fa-user"></i>

            </div>
            <form action="home.php" class="form" method="POST">
                <div><input type="text" name="user_name1" class="login_input login_input1 login_text_input inputd" placeholder="     user name" maxlength="40" minlength="8" required></div>
                <div><input type="password" name="user_password1" class="login_input login_text_input password inputd" placeholder="      password" maxlength="40" minlength="8" required></div>
                <div><input type="checkbox" name="" class="login_input login_c_input"></div>
                <div><button>log in</button></div>
            </form>
            <div style="margin-top:12px">sign in as a user </div>


        </div>

        <div class="signup">
            <div class="signup_text">
                Hello User </div>
            <br>
            <div>
                dont have an accout? create an account
            </div>
            <button class="signup_button display">
                Sign Up
            </button>
        </div>

        <div class="login2" id="login2">
            <div class="log_text">Sign up</div>
            <div>
                <!-- <i class="fa-solid fa-user"></i> -->
                <i class="fa-solid fa-user"></i>

            </div>
            <form action="home.php" class="form" method="POST">
                <div><input type="text" name="user_name" class="login_input login_input1 login_text_input inputd" placeholder="     user name" required maxlength="40" minlength="8" required></div>
                <div><input type="password" name="user_pass" class="login_input login_text_input password inputd" placeholder="      password" required maxlength="40" minlength="8" required></div>

                <div><input type="checkbox" name="" class="login_input login_c_input"></div>
                <div><button>Sign up</button></div>
            </form>

            <div style="margin-top:12px">sign up as a user 2</div>
        </div>

        <div class="signup2">
            <div class="signup_text">
                Hello User </div>
            <br>
            <div>
                go to your an account by log in
            </div>
            <button class="signup_button display2">
                Log In
            </button>
        </div>
    </div>

    <div class="admin_div1" id="admin">

        <div class="login_admin">
            <div class="log_text">Log in</div>
            <div>
                <!-- <i class="fa-solid fa-user"></i> -->
                <!-- <i class="fa-duotone fa-user-tie"></i> -->
                <!-- <i class="fa-duotone fa-user-tie"></i> -->
                <i class="fa-sharp fa-solid fa-user"></i>
                <!-- <i class="fa-duotone fa-user"></i> -->
            </div>
            <form action="home.php" class="form" method="POST">
                <div><input type="text" name="admin_name" class="login_input login_input1 login_text_input inputd" placeholder="     user name" required></div>
                <div><input type="password" name="admin_password" class="login_input login_text_input password inputd" placeholder="      password" required></div>
                <div><input type="checkbox" name="" class="login_input login_c_input"></div>
                <div><button>log in</button></div>
            </form>
            <div style="margin-top:12px">sign in as a admin </div>
        </div>

    </div>


    <div class="review" id="review">
        <div class="about">
            <br>
            <h1>
                PEOPLE REACT
            </h1>
           
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


            </div>
                
                ';
            }
            $con->close();

            ?>








        </div>


    </div>


    <i class="fa-solid fa-circle-chevron-right fa-circle-chevron-right2 arrow" onclick="rightd()"></i>
    <i class="fa-solid fa-circle-chevron-left fa-circle-chevron-left2 arrow" onclick="leftd()"></i>



    <div class="admin_div" id="feedback">

        <div class="admin_form_div">

            <div class="form_admin_data">
                Feedback . let us contact with us for enquiry
            </div>
            <div>
                <!-- <i class="fa-solid fa-comment"></i> -->
                <i class="fa-solid fa-comments"></i>
            </div>

            <div class="form_admin_inputs">
                <form action="home.php" method="POST">
                    <div><input type="text" name="name" class="inputd" placeholder=" Name" required> </div>
                    <div><input type="text" name="contact" class="inputd" placeholder="Contact"> </div>
                    <div><textarea name="message" id="" cols="85" rows="4" maxlength="400" placeholder=" Write here" required></textarea> </div>
                    <div><button type="submit">Submit</button></div>
                </form>
            </div>


        </div>

    </div>

    <footer id="contact_us">
        <div class="div1">
            <h2>
                deepak
            </h2>
            <p>
                thanks for visiting us . contact us if you have any query. we will 24 hr for you . 
                you can send feedback , visit once you we will better fill
            </p>
        </div>
        <div class="div2">


            <div>
                <h3>
                    Mobile No
                </h3>

                <i class="fa-solid fa-phone ii"></i>

                <ul>
                    <li class="li">
                        4556 - 546546
                    </li>

                    <li>
                        4556 - 546546
                    </li>
                </ul>




            </div>
            <div>
                <h3>
                    Address
                </h3>

                <i class="fa-solid fa-location-dot locationd"></i>

                <p>
                    <!-- https://goo.gl/maps/KEZJVb4Aqy1JJT9t5 -->
                    Panchavati , Nashik , Maharashtra .
                    422 103
                </p>
            </div>
            <div>

                <h3>
                    Mail
                </h3>

                <i class="fa-solid fa-paper-plane ii"></i>

                <ul>
                    <li class="li">
                        sdf@hmame.com
                    </li>

                    <li>
                        sdf@hmamerge.com
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="youtubeddd">
                    You Tube
                </h3>

                <i class="fa-brands fa-youtube youtubed ii"></i>

                <p class="youtubedd">
                    youtube.com
                </p>
            </div>

        </div>

        <h4>copyright@dipak</h4>

    </footer>





    <script src="home.js">

    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>