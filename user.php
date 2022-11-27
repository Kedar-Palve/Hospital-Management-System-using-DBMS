<?php

$user_name = '';
$user_password = '';
session_start();
if (isset($_SESSION['confirm2'])) {
    // seccion_end();
    $user_name = $_SESSION['user_name'];
    $user_password = $_SESSION['user_password'];

    // seccion_end();
} else {

    session_unset();
    session_destroy();
     header('location:home.php');
    //  seccion_end();
     die();
}
//   seccion_end();



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



    $sql = "INSERT INTO `hospital`.`info` (`p_name`, `address`, `dob`, `mobile_no`, `email`, `disease`, `textarea` , `appoint` , `reg_date` ,`username`,`pass`)
    VALUES ('$p_name', ' $address', '$dob', '$mobile_no', '$email', '$disease' , '$textarea' , '$appoint' , CURDATE() , '$user_name' , '$user_password' );";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="nav.css">
</head>

<body>
    <header>

        <nav>
            <i class="fa-solid fa-circle-user logo"></i>
            <span class="hospi_text"><b><?php echo $user_name; ?></b></span>
            <span class="nav_panels" id="nav_panels1"><a href="#login">appoint</a> </span>
            <span class="nav_panels"><a href="#history"> history</a></span>
            <span class="nav_panels"><a href="logout.php"> Log Out</a></span>
            <!-- <span class="nav_panels"><i class="fa-solid fa-right-from-bracket"></i></span> -->
            <!-- <span class="nav_panels" id="contact_us1"><a href="#contact_us">CONTACT US</a></span> -->
        </nav>

    </header>

    <div id="info">
        <form class="input_form" id="login" action="user.php" method="POST">
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
                <input list="brow" name="appoint"  class="datalist" placeholder="APPOINT DOCTOR " required>
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
                <input type="date" name="dob" id="dob" placeholder="DOB" value="" maxlength="44" required>
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
                <input type="text" name="disease" id="disease" placeholder="DISEASE" value="" maxlength="44" required>
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
                <textarea name="textarea" id="textarea" cols="105" rows="4" placeholder="OTHER INFORMATION" value="" maxlength="500"></textarea>
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
    





    <div class="history" id="history">



        <div>
            <h2>
                Your Appointments
                </h2>
        </div>
        
        
        
            <?php

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";
        $con  = mysqli_connect($server, $username, $password);

        $sql11=" SELECT * FROM `hospital`.`info` WHERE `username`='$user_name' AND `pass`='$user_password';";

        $data11=$con->query($sql11);

        while($result=$data11->fetch_assoc())
        {
           $name=$result['appoint'];
           $src1='';
            $sql2=" SELECT `d_photo` FROM `hospital`.`doctor` WHERE `d_name`='$name';";
            $photo=$con->query($sql2);
            while($result2=$photo->fetch_assoc())
            {
                $src1=$result2['d_photo'];
            }
         
              echo "

              <div class='history_d dd'>
              
              
              <div class='div1'>
                <div> <span> NAME : </span> ".$result['p_name']."</div>
                <div> <span> DATE : </span> ".$result['reg_date']."</div>
                <div> <span> MOB NO : </span> ".$result['mobile_no']."</div>
                <div> <span> Address : </span> ".$result['address']."</div>
            </div>

            <div class='div2'>
                <div>
                    <img src='".$src1."' >
                </div>

                <div class='divd'>
                    ".$result['appoint']."
                </div>
            </div>

            </div>
              
              ";
        }

        ?>
        

        

            

         

        

           
       

       

        
        


    </div>




    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>