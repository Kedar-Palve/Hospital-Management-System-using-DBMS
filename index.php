


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




if (isset($_POST['p_name']) and isset($_POST['address']) and isset($_POST['mobile_no']) and isset($_POST['appoint'])) {

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";
    $con  = mysqli_connect($server, $username, $password);





    $p_name = $_POST['p_name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $appoint = $_POST['appoint'];
    $disease = $_POST['disease'];
    $textarea = $_POST['textarea'];



    //alter table info add column p_id int primary key  AUTO_INCREMENT;
    //alter table info MODIFY column p_name varchar(44) not null;

    $sql = "INSERT INTO `hospital`.`info` (`p_name`, `address`, `dob`, `mobile_no`, `email`, `disease`, `textarea` , `appoint` , `reg_date`)
    VALUES ('$p_name', ' $address', '$dob', '$mobile_no', '$email', '$disease' , '$textarea' , '$appoint' , CURDATE() );";

    $con->query($sql);

    $con->close();
}

$server = "localhost";
$username = "root";
$password = "";
$database = "hospital";
$con  = mysqli_connect($server, $username, $password);



// where `age` between 10 and 20

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

    if ($resultdd['age'] >= 0 and $resultdd['age'] <=20) {
        $dd1 = $dd1 + 1;
    } else  if ($resultdd['age'] > 20 and $resultdd['age'] <= 40) {
        $dd2 = $dd2 + 1;
    } else if ($resultdd['age'] > 40 and $resultdd['age'] <= 80) {
        $dd3 = $dd3 + 1;
    }
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

    <link rel="stylesheet" href="home.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="nav.css">


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>






</head>

<body>

<style>

    /* nav :nth-child(1) */
    nav :nth-child(3){
        
    padding-bottom: 15px;
    border-bottom: 3px solid rgb(255, 52, 52);
    color:#00FF00;
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

    
    
 

    <div id="info">
        <form class="input_form" id="login" action="index.php" method="POST">
          <h2 class="text_appoint">
                    APPOINT
                </h2>
            <div>


                

                <!-- <i class="fa-solid fa-stethoscope ii"></i> -->

                 <div>

                <span class="img_span"><i class="fa-solid fa-user"></i></span>

                <input type="text" name="p_name" id="p_name" placeholder="PATIENT NAME " required value="" maxlength="44">
                </div>
                <!-- <br>

                <br> -->

                <div>
                <span><i class="fa-solid fa-calendar-check"></i></span>
                <input list="brow" name="appoint"  class="datalist" placeholder="APPOINT DOCTOR ">
                <datalist id="brow">


                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";

                    $con  = mysqli_connect($server, $username, $password);

                    $sql = "SELECT * FROM `hospital`.`doctor` ; ";
                    $data =   $con->query($sql);

                    while ($result = $data->fetch_assoc()) {


                        echo "
    
                                 
                                 <option value='" . $result['d_name'] . "'>
                                 &nbsp&nbsp&nbsp
                                 " . $result['d_degree'] . "
                                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              </option>
                              
    
                              
                                 
                                
                                 
    
                                ";
                    }



                    $con->close();

                    ?>
                </datalist>


               </div> 

                 
               <!-- <br>
                <br> -->

                           <div>

                           
                <span class="img_span"><i class="fa-solid fa-calendar"></i></span>
                <input type="date" name="dob" id="dob" placeholder="DOB" value="" maxlength="44">
             </div>   
             
             <!-- <br>

                <br> -->

                <div>

                <span class="img_span"><i class="fa-solid fa-phone"></i></span>
                <input type="number" name="mobile_no" id="mobile_no" placeholder="MOBILE NO" required value="" maxlength="44">
             </div>   
             <!-- <br>

                <br> -->

                  <div>
                <span class="img_span"><i class="fa-solid fa-paper-plane"></i></span>
                <input type="email" name="email" id="email" placeholder="EMAIL" required value="" maxlength="44">
              </div>  
              <!-- <br>

                <br> -->

                <div>
                <span class="img_span"><i class="fa-solid fa-virus"></i></span>
                <input type="text" name="disease" id="disease" placeholder="DISEASE" value="" maxlength="44">
              </div>  
              <!-- <br>
                <br> -->

                

               <!-- <br><br> -->

               <div class="address">

                <span class="img_span"><i class="fa-solid fa-location-dot"></i></span>
                <input type="text" name="address" id="address"  placeholder="ADDRESS " required value="" maxlength="44">
               </div>

               <div>
                <i class="fa-solid fa-envelope textareadi"></i>
                <textarea name="textarea" id="textarea" cols="103" rows="4" placeholder="OTHER INFORMATION" value="" maxlength="500"></textarea>
              </div>  
              
              <!-- <br>


                <br> -->
                <div class="buttons">
                    <button type="submit" class="button1" id="submit_button">SUBMIT</button>
                    <button type="reset" class="button2">RESET</button>
                </div>

            </div>
        </form>
    </div>
    

   



    <footer>



    </footer>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }


        


        
    </script>

    <script src="index.js"> </script>

</body>

</html>