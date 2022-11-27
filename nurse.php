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



    $sql = " SELECT * FROM `hospital`.`nurse` WHERE `n_name`='$name';";

    $datad = $con->query($sql);

    $indexd = 1;

    while ($resultd = $datad->fetch_assoc()) {
        $indexd = $indexd + 1;
    }


        


    if ($indexd == 1) {


        $sql = " INSERT  INTO `hospital`.`nurse`(`n_name`,`n_contact`,`n_address`,`n_dob`,`n_photo`,`start_time`,`end_time`)
    VALUES ('$name' , '$id' , '$degree' , '$dob' , '$photo' , '$start', '$end');";
                      

    $con->query($sql);
        echo "<script> alert(' nurse added successfully .')</script>";

        // header('location:home.php#login2');
    } else {

        $dd = ' nurse is already present .';
        echo "<script> alert(' nurse is already present , try another one .')</script>";
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

    // create table nurse(n_id int AUTO_INCREMENT, n_name varchar(44) UNIQUE , n_address varchar(44)

    //   , n_contact varchar(44) , n_dob date , n_photo varchar(44) ,
    //  start_time time , end_time time , primary key (n_id));

    
    $sql = " DELETE from `hospital`.`nurse` where `n_id`='$id1';";
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

    <link rel="stylesheet" href="nav1.css">
    <!-- <link rel="stylesheet" href="view2.css"> -->

    <link rel="stylesheet" href="nav.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>


    <style>
        /* nav :nth-child(1) */
        nav :nth-child(6) {

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




    <div class="same2">

        <input type="text" id="running_tagg2" class="search_tag2" placeholder=" search here ">
        <i class="fa-solid fa-xmark" onclick="cancel();"></i>
        <!-- <i class="fa-regular fa-rectangle-xmark"></i> -->
        <!-- <button type="submit" id="button2" > CANCEL SEARCH </button> -->



    </div>

    <div class="first_body_div">

        <button class="add">
            ADD Nurse
        </button>




    </div>




    <form class="form" action="nurse.php?id=add1" method="post">

        <h2> New Nurse </h2>
        <br>
        <!-- <i class="fa-solid fa-circle-xmark cross"></i> -->
        <i class="fa-solid fa-xmark cross"></i>

        <div>

            <span><input type="text" class="input_form name11" name="name" placeholder=" Name " required></span>
            <span><input type="text" class="input_form degree11" name="degree" placeholder=" Address" required></span>
            <span><input type="text" class="input_form id11" name="id" placeholder=" contact" required></span>
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


        $sql2 = "SELECT * ,year(CURDATE())- year(n_dob) as age FROM `hospital`.`nurse` ;";

        $data = $con->query($sql2);

        while ($result = $data->fetch_assoc()) {



            echo "

        
          
        <div class='inner_display " . $result['n_name'] . "' >

        <div class='first'></div>
        

         <div><img class='photo' src='" . $result['n_photo'] . "' ></div>  
           
             
             <span class='name'>" . $result['n_name'] . "</span>
            <span class=' span id1' ><b>" . $result['n_id'] . "</b></span>
            
            
            
            <span class='span text1'><b>start time : </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $result['start_time'] . "  </span>
            <span class='span text2'><b>end time : </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $result['end_time'] . " </span>
            
            <span class='span text2' ><b>date of birth : </b>&nbsp&nbsp&nbsp&nbsp " . $result['n_dob'] . " ( age : " . $result['age'] . " )</span>
            <span class='span text2' ><b>Address : </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $result['n_address'] . "</span>
            
            <a href='nurse.php?id=" . $result['n_id'] . "'>
             
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