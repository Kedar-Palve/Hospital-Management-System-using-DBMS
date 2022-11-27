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

$con = mysqli_connect($server, $username, $password, $database);
$d = 1;

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $id = $_POST['id'];
    $dob = $_POST['dob'];
    $degree = $_POST['degree'];
    $photo = mysqli_real_escape_string($con, $_POST['photo']);
    $start = $_POST['start'];
    $end = $_POST['end'];


    //CREATE TRIGGER `old_info_record` BEFORE DELETE ON `info` FOR EACH ROW 
    //BEGIN insert into old_info 
    //values(old.p_id,old.p_name,old.address,old.dob,old.mobile_no, old.email,old.disease,old.textarea,old.appoint,
    //old.reg_date); end;

    //CREATE TRIGGER `old_doctor_record` BEFORE DELETE ON `doctor` FOR EACH ROW 
    //BEGIN insert into old_doctor(d_id,d_name,fees,d_degree,d_dob,d_photo,start_time,end_time) 
    //values (old.d_id,old.d_name,old.fees,old.d_degree,old.d_dob,old.d_photo,old.start_time,old.end_time); end;

    // create sequence seq_id start with 1 increment by 1 minvalue 1 maxvalue 10000 nocycle;
    //create sequence seq_id1 start with 28 increment by 1 minvalue 1 maxvalue 10000 nocycle;
    // create sequence seqid start with 1 increment by 1 minvalue 0 maxvalue 100000 nocycle;
    //alter table doctor add constarint doct_id primary key (d_id);



    $sql = " SELECT * FROM `hospital`.`doctor` WHERE `d_name`='$name';";

    $datad = $con->query($sql);

    $indexd = 1;

    while ($resultd = $datad->fetch_assoc()) {
        $indexd = $indexd + 1;
    }





    if ($indexd == 1) {


        $sql = " INSERT  INTO `hospital`.`doctor`(`d_id` , `d_name`,`fees`,`d_degree`,`d_dob`,`d_photo`,`start_time`,`end_time`)
    VALUES ( next value for seqid ,'$name' , '$id' , '$degree' , '$dob' , '$photo' , '$start', '$end');";


        $con->query($sql);
        echo "<script> alert(' doctor added successfully .')</script>";

        // header('location:home.php#login2');
    } else {

        $dd = ' doctor is already present .';
        echo "<script> alert(' doctor is already present , try another one .')</script>";
        // header('location:home.php#login2');
    }

    $con->close();
}

if (isset($_GET['id'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";

    $con = mysqli_connect($server, $username, $password, $database);

    $id1 = $_GET['id'];

    // $sqll=" SELECT `d_name` from `hospital`.`doctor` where `d_id`='$id1';";
    // $data=$con->query($sqll);

    // while($result=$data->fetch_assoc())
    // {
    //     $result1=$result['d_name'];

    // $sql1=" UPDATE `info` set `info`.`appoint`='not availabe' where `appoint`='$result1' ; ";
    // $con->query($sql1);
    //  }

    // create or replace procedure update_info(in did int(11))
    // BEGIN
    //    DECLARE dname type of doctor.d_name;
    //    SELECT d_name into dname from doctor where d_id=did;
    //    UPDATE info set info.appoint='not availabe' where appoint=dname ;

    // end

    $update = " CALL update_info('$id1');";
    $con->query($update);
    $sql = " DELETE from `hospital`.`doctor` where `d_id`='$id1';";
    $con->query($sql);



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

    <link rel="stylesheet" href="faculty1.css">
    <!-- <link rel="stylesheet" href="view2.css"> -->

    <link rel="stylesheet" href="nav.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>


    <style>
        /* nav :nth-child(1) */
        nav :nth-child(5) {

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




    <div class="same2" style="">

        <input type="text" id="running_tagg2" class="search_tag2" placeholder=" search here "></input>
        <i class="fa-solid fa-xmark" onclick="cancel();"></i>
        <!-- <i class="fa-regular fa-rectangle-xmark"></i> -->
        <!-- <button type="submit" id="button2" > CANCEL SEARCH </button> -->



    </div>

    <div class="first_body_div">

        <button class="add">
            ADD DOCTOR
        </button>




    </div>




    <form class="form" action="faculty.php?id=add1" method="post">

        <h2> New Doctor </h2>
        <br>
        <!-- <i class="fa-solid fa-circle-xmark cross"></i> -->
        <i class="fa-solid fa-xmark cross"></i>

        <div>

            <span><input type="text" class="input_form name" name="name" placeholder=" Name " required></span>
            <span><input type="text" class="input_form degree" name="degree" placeholder=" Degree" required></span>
            <span><input type="number" class="input_form id" name="id" placeholder=" fees" required></span>
            <span><input type="date" class="input_form day" name="dob" required></span>
            <span><input type="text" class="input_form ff" name="photo" placeholder=" Photo (url)"> </span>

            <span><input type="time" class="input_form time " name="start"></span>
            <span><input type="time" class="input_form time " name="end"></span>


        </div>

        <button type="submit" class="submit">SUBMIT</button>
        <button type="reset" class="reset">RESET</button>



    </form>



    <div class="info display">

        <?php


        $server = "localhost";
        $username = "root";
        $password = "";

        $con  = mysqli_connect($server, $username, $password);


        $sql2 = "SELECT * ,year(CURDATE())- year(d_dob) as age FROM `hospital`.`doctor` ;";

        $data = $con->query($sql2);

        while ($result = $data->fetch_assoc()) {



            echo "

        
          
        <div class='inner_display " . $result['d_name'] . "' >
        <abbr title=' click here to view patients appoint with doctor '>
        <a href='list1.php?do_id=" . $result['d_id'] . "&do_name=" . $result['d_name'] . "'>

         <div><img class='photo' src='" . $result['d_photo'] . "' ></a></div>    </abbr>
           
             
             <span class='br_word'><h2>" . $result['d_name'] . "</h2></span>
            <span class='br_word br_word1'>" . $result['d_degree'] . "</span>
            
            
            
            <span class='br_word'>" . $result['start_time'] . " &nbsp to &nbsp   " . $result['end_time'] . " </span>
            
            <span class='br_word' > " . $result['d_dob'] . " ( age : " . $result['age'] . " )</span>
            <a href='faculty.php?id=" . $result['d_id'] . "'>
             
            <button>delete</button>
       
            </a>

           
        </div>

       

        ";
        }






        ?>




    </div>



    <!-- <div class="info display -->



    <!-- <script src="faculty.js">

    </script> -->

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }


        let add = document.getElementsByClassName("add")[0];
        add.addEventListener("click", function() {
            let ddd = document.getElementsByClassName("first_body_div")[0];
            ddd.style.display = "none";

            let display1 = document.getElementsByClassName("display")[0];
            display1.style.display = "none"; //marginTop="700px";

            let searchbar = document.getElementsByClassName("same2")[0];
            searchbar.style.display = "none";



            let d1 = document.getElementsByClassName("form")[0];
            d1.style.visibility = "visible";



            //  




            d1.style.transform = "translateY(10px)";

        });

        let cross = document.getElementsByClassName("cross")[0];

        cross.addEventListener("click", function() {

            let d1 = document.getElementsByClassName("form")[0];
            d1.style.visibility = "hidden";
            d1.style.transform = "translateY(-700px)";

            setTimeout(dp, 1);




        });

        function dp() {
            let add = document.getElementsByClassName("first_body_div")[0];
            add.style.display = "";

            let display1 = document.getElementsByClassName("display")[0];
            display1.style.display = ""; //marginTop="700px";
            let searchbar = document.getElementsByClassName("same2")[0];
            searchbar.style.display = "";


        }





        let search = document.getElementsByClassName("search_tag2")[0];

        let element = document.getElementsByClassName('inner_display');

        search.addEventListener('keydown', () => {

            for (let index = 0; index < element.length; index++) {
                // const element = array[index];

                if (element[index].className.indexOf(search.value) > -1) {
                    element[index].style.display = '';
                } else {
                    element[index].style.display = 'none';
                }

            }
        })

        function cancel() {

            for (let index = 0; index < element.length; index++) {
                // const element = array[index];

                element[index].style.display = '';


            }
            search.value = '';
        }
    </script>


</body>

</html>