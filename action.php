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



if (
  isset($_POST['p_name']) and isset($_POST['mobile_no']) and isset($_POST['address'])

  and isset($_POST['dob']) and isset($_POST['appoint'])

)  //update
{

  $server = "localhost";
  $username = "root";
  $password = "";

  $con  = mysqli_connect($server, $username, $password);

  if (isset($_GET['id1']) and isset($_GET['mb1'])) {

    $pp = $_GET['id1'];
    $mbf = $_GET['mb1'];
  }


  $p_name = $_POST['p_name'];
  $textarea = $_POST['textarea'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email'];
  $appoint = $_POST['appoint'];
  $disease = $_POST['disease'];

  $sql2 = " UPDATE `hospital`.`info` SET `p_name`='$p_name' , `address`='$address' , `dob`='$dob' ,
   `mobile_no`='$mobile_no' , `email`=' $email' , `disease`='$disease' , `textarea`='$textarea' , `appoint`='$appoint' 
   WHERE `p_id`= '$pp' AND `mobile_no`='$mbf' ; ";
  //  
  $con->query($sql2);

  $con->close();
}

if (isset($_GET['id']) and isset($_GET['addres']) and isset($_GET['mb'])) {

  $server = "localhost";
      $username = "root";
      $password = "";

      $con  = mysqli_connect($server, $username, $password);

  $id = $_GET['id'];

  $addres = $_GET['addres'];

  $mobile = $_GET['mb'];

  $sql1 = " DELETE FROM `hospital`.`info` WHERE `p_id`='$id'  AND `address`='$addres'  AND `mobile_no`='$mobile';";
  $con->query($sql1);

  
  $con->query($sql1);

  $sql12 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info`; ";
  // $dd = 0;
  $data1 = $con->query($sql12);
  while ($result1 = $data1->fetch_assoc()) {
    $dd = $result1['count1'];

    $con->close();
  }
}


$server = "localhost";
$username = "root";
$password = "";

$con  = mysqli_connect($server, $username, $password);



$sql1 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info`; ";
$dd = 0;
$data1 = $con->query($sql1);
while ($result1 = $data1->fetch_assoc()) {
  $dd = $result1['count1'];
}


?>












<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="view2.css">

  <link rel="stylesheet" href="nav.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>

  <style>
    /* nav :nth-child(1) */
    nav :nth-child(7) {

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







  <div class="select-option1 dd" style="margin-left:12px; width:200px;">









    <div class="info">

      <div class="user">
        <?php

        // $server = "localhost";
        // $username = "root";
        // $password = "";

        // $con  = mysqli_connect($server, $username, $password);



        // $sql1 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info`; ";

        // $data1 = $con->query($sql1);
        // while ($result1 = $data1->fetch_assoc()) {


        echo "<h2>
        Appointments   : " . $dd . "
      </h2>";
        // }


        ?>
        <i class="fa-solid fa-calendar-check"></i>


      </div>

    </div>

  </div>

  <div class="same2">

    <input type="search" id="running_tagg2" class="search_tag2" placeholder=" search here ">
    <i class="fa-solid fa-xmark" onclick="cancel();"></i>


  </div>




  <div class="main" id="tables">
    <table id="table1" cellspacing="0">

      <tr class="t_head">
        <td id="sr_no" style="width:110.87px">
          SR NO
        </td>
        <td id="name" style="width:813px">
          PATIENT NAME
        </td>
        <td id="action" style="width:px">
          ACTION
        </td>
      </tr>

    </table>


    <table id="table2" cellspacing="0">

      <?php





      $server = "localhost";
      $username = "root";
      $password = "";

      $con  = mysqli_connect($server, $username, $password);

      // if (isset($_GET['id']) and isset($_GET['addres']) and isset($_GET['mb'])) {
      //   $id = $_GET['id'];

      //   $addres = $_GET['addres'];

      //   $mobile = $_GET['mb'];

      //   $sql1 = " DELETE FROM `hospital`.`info` WHERE `p_id`='$id'  AND `address`='$addres'  AND `mobile_no`='$mobile';";
      //   $con->query($sql1);

      //   $sql12 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info`; ";
      //   // $dd = 0;
      //   $data1 = $con->query($sql12);
      //   while ($result1 = $data1->fetch_assoc()) {
      //     $dd = $result1['count1'];
      //   }
      // }

      $sql = " SELECT * ,year(CURDATE())- year(dob) as age FROM `hospital`.`info`; ";

      $data = $con->query($sql);

      $index = 0;


      while ($result = $data->fetch_assoc()) {



        $index = $index + 1;



        echo "
            
             <tr class='row row11'>
             <td class='srno1'>
               " . $index . "
             </td>
             <td class='name1'>
              " . $result['p_name'] . "
             </td>
             <td class='action1'>

             <a href='action.php?id=" . $result['p_id'] . "&addres=" . $result['address'] . "&mb=" . $result['mobile_no'] . "'>
             <button type='submit' class='action2 deleted' >
                  DELETE
                 </button>

              </a>
              
              
             <button type='submit' class='action2 updated' onclick='update_record(" . $index . ")'>
                  UPDATE 
                
              </button>
                  

             </td>
         
            </tr>

            <form action='action.php?id1=" . $result['p_id'] . "&mb1=" . $result['mobile_no'] . "' method='post' >


            <tr class='row row1 dd' >
    <td class='srno1'>
       NAME
    </td>
    <td class='name1'>
    
        <input type='text' name='p_name' class='input_tag ddd' required value='" . $result['p_name'] . "'>

    </td>
   
    <td class='action1'>
    
      
    </td>

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       ADDRESS
    </td>
    <td class='name1'>
        <input type='text' name='address' class='input_tag ddd' required value='" . $result['address'] . "'>
        
   
        </td>
   
        <td class='action1'>
        
          
        </td>

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       DISEASE
    </td>
    <td class='name1'>
        <input type='text' name='disease' class='input_tag ddd' value='" . $result['disease'] . "'>
   
    </td>

   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       APPOINT
    </td>
    <td class='name1'>
<input type='text' list='brow' name='appoint' class='input_tag ddd' style='margin-left:44px;' value='" . $result['appoint'] . "'>

<datalist id='brow'>

";



        $sql1 = "SELECT * FROM `hospital`.`doctor` ; ";
        $data1 =   $con->query($sql1);

        while ($result1 = $data1->fetch_assoc()) {


          echo "

            
            <option value='    " . $result1['d_name'] . "'>
            &nbsp&nbsp&nbsp
            " . $result1['d_degree'] . "
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         </option>
         

         
            
           
            

           ";
        }













        echo "



   </td>
    <td class='action1'>
    
      
    </td>
   

   </tr>
   

   <tr class='row dd'>
    <td class='srno1'>
       DOB
    </td>
    <td class='name1'>
        <input type='date' name='dob' class='input_tag' value='" . $result['dob'] . "'>
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       MOBILE NO 
    </td>
    <td class='name1'>
        <input type='number' name='mobile_no' class='input_tag' required value='" . $result['mobile_no'] . "'>
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       EMAIL
    </td>
    <td class='name1'>
        <input type='email' name='email' class='input_tag' value='" . $result['email'] . "'>
        </td>
      
      
   
        <td class='action1'>
        
          
        </td>
   

   </tr>
   <tr class='row dd'>
    <td class='srno1'>
       INFO
    </td>
    <td class='name1'>
        <input type='text' name='textarea' class='input_tag' value='" . $result['textarea'] . "'>
   
    </td>

   
    <td class='action1'>
    
      
    </td>
   
    
    </tr>

    <tr class='row row2 dd'>
  
    <td class='srno1'>
       

        <button type='' class='action2 deleted' onclick='cancel1(" . $index . ");'>
        CANCEL 
       </button>
    </td>
    
        <td class='name1'>
       
    </td>

        
       <td class='action1'>
      
       
    
      
       <button type='submit' class='action2 updated' id=''>
         DONE
        </button> 
        
      
       
    </td;
       

    

       </tr>

       </form>
     

            
     
       ";
      }


      $con->close();




      ?>


    </table>







  </div>


  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

    let j = (document.getElementsByClassName('row').length);


    for (let i = 0; i < j; i++) {



      let update_d = document.getElementsByClassName('row')[i];
      update_d.style.display = 'none';

    }


    let j1 = (document.getElementsByClassName('row11').length);

    for (let i = 0; i < j1; i++) {


      document.getElementsByClassName('row11')[i].style.display = '';

    }


    search = document.getElementById('running_tagg2');


    search.addEventListener('keypress', function search_Info() {


      let name1 = document.getElementById('table2');
      let name2, name3, search2;

      for (let j = 0; j < (document.getElementsByClassName('row11').length); j++) {

        name2 = document.getElementsByClassName('row11')[j];
        console.log('j', j, 'j');

        name3 = name2.getElementsByTagName('td')[1];



        let name4 = name3.innerHTML.toUpperCase();


        search2 = search.value.toUpperCase();
        console.log('search', search2);
        console.log('name', name4);

        if (name4.indexOf(search2) > -1) {


        } else {

          document.getElementsByClassName('row11')[j].style.display = 'none';
        }

      }

      if (search2.length == 0) {
        cancel();

      }





    });




    function cancel() {



      let name1 = document.getElementById('table2');
      let name2, name3;

      for (let j = 0; j < (document.getElementsByClassName('row11').length); j++) {

        name2 = name1.getElementsByClassName('row11')[j];

        name2.style.display = '';

      }

      let search = document.getElementById('running_tagg');
      search.value = '';


    }


    function update_record(update_index) {

      let navbar = document.getElementsByClassName('same2')[0];

      let dip2 = document.getElementsByClassName('select-option1')[0];

      navbar.style.display = 'none';

      navbar.style.display = 'none';




      dip2.style.display = 'none';




      let table1 = document.getElementById('table1');
      table1.style.display = 'none';

      let name11 = document.getElementById('table2');
      let name22;

      for (let j = 0; j < (document.getElementsByClassName('row11').length); j++) {

        name22 = name11.getElementsByClassName('row11')[j];

        name22.style.display = 'none';

      }


      let main = document.getElementById('tables');


      main.style.marginTop = '6%';

      main.style.border = '';

      let name1 = document.getElementById('table2');

      let name2 = name1.getElementsByClassName('row')[update_index];

      let name3 = name2.getElementsByTagName('td')[1];


      console.log(((update_index * 10) - 8) + 9);
      for (let i = ((update_index * 10) - 9); i < (((update_index * 10) - 9) + 9); i++) {


        console.log('a', i);
        let update_d = document.getElementsByClassName('row')[i];
        update_d.style.display = '';

      }



    }





    function cancel1(index1) {
      let update_d;


      values();

      let navbar = document.getElementsByClassName('same2')[0];

      let dip2 = document.getElementsByClassName('select-option1')[0];


      navbar.style.display = '';



      dip2.style.display = '';



      navbar.style.display = '';

      let table1 = document.getElementById('table1');
      table1.style.display = '';

      let main = document.getElementById('tables');


      main.style.marginTop = '';


      for (let i = ((index1 * 10) - 9); i < (((index1 * 10) - 9) + 9); i++) {


        update_d = document.getElementsByClassName('row')[i];
        update_d.style.display = 'none';

      }


      for (let i = 0; i < document.getElementsByClassName('row11').length; i++) {

        document.getElementsByClassName('row11')[i].style.display = '';


      }



    }
    let array = [];
  </script>



</body>

</html>