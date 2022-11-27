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




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="view2.css">

  <link rel="stylesheet" href="nav.css">




</head>

<body>


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

  <!-- <div class="select-option1">
              <span class="order1"><h4>ORDER BY AGE</h4></span>
              <select name="orderr" class="select adj" onchange="location=this.value;">
              <option value="view2.php?" selected> SELECT ..</option>
              <option value="order.php?id1=ASC"  >ASC</option>
              <option value="order.php?id1=DESC" >DESC</option>
              
            
             </select>
          </div> -->











  <div class="select-option1">
    <span class="order ">
      <h4>GROUP BY DISEASE</h4>
    </span>
    <?php
    $id2 = '';
    if (isset($_GET['id2'])) {

      //$id2=$_GET['id2'];
      $id2 = $_GET['id2'];
      $id3 = $_GET['id3'];
      $id4 = $_GET['id4'];
    }
    if ($id2 == 'ON') {
      echo "
                            
                        <select name='orderr' class='select adj' onchange='location=this.value;'>
                            
                            <option value='list_group.php?id2=ON&id3=" . $id3 . "&id4=" . $id4 . "'' selected>ON</option>
                            <option value='list1.php?&do_id=" . $id4 . "&do_name=" . $id3 . "'>OFF</option>
                           </select>
                            
                            ";
    } else {

      echo "
                            
      <select name='orderr' class='select adj' onchange='location=this.value;'>
                        
                            <option value='list_group.php?id2=ON&id3=" . $id3 . "&id4=" . $id4 . "' >ON</option>
                            <option value='list1.php?&do_id=" . $id4 . "&do_name=" . $id3 . "' selected>OFF</option>
                           </select>
                            
                            ";
    }




    ?>



  </div>



  <div class="select-option1" style="margin-left:12px; width:200px;">









    <div class="info">

      <div class="user">
        <?php

        
            

        $id3 = $_GET['id3'];

        $server = "localhost";
        $username = "root";
        $password = "";

        $con  = mysqli_connect($server, $username, $password);

        // $sql=" SELECT * FROM `hospital`.`info` ";

        $sql1 = " SELECT count(`p_name`) as count1 FROM `hospital`.`info` WHERE `appoint`='$id3'; ";

        $data1 = $con->query($sql1);
        while ($result1 = $data1->fetch_assoc()) {
          echo "<h2>
  Appointments   : " . $result1['count1'] . "
   </h2>";
        }


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
        <td id="sr_no" class="sr_no1" style="width:110.87px">
          SR NO
        </td>
        <td id="name" style="width:813px">
          DISEASE
        </td>
        <td id="name1">
          COUNT
        </td>
        <td id="action">
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


      if (isset($_GET['id2'])) {

        $id2 = $_GET['id2'];
        $id3 = $_GET['id3'];





        $sql1 = " SELECT `disease` , count(`disease`) as `cnt` FROM `hospital`.`info` where `appoint`='$id3'
              GROUP BY `disease` ; ";

        $data = $con->query($sql1);

        $index = 0;


        while ($result = $data->fetch_assoc()) {



          $index = $index + 1;







          echo
          "<tr class='row row11'>
             <td class='srno1'>
               " . $index . "
             </td>
             <td class='name1'>
              " . $result['disease'] . "
             </td>
             <td class='srno1'>
             <p  name='p_name' class='input_tag' required >" . $result['cnt'] . "</p>
           </td>
             <td class='action1'>
             
                <span class='action2 '>
               </span>
               <button type='submit' class='action2 updated' onclick='view_record(`dd" . $index . "`)'>
                  VIEW 
                
              </button>
                  
              
        
             </td>
         
            </tr>";

          $temp = $result['disease'];



          //  create index index_disease_appoint on info (disease,appoint);


          $sql2 = " SELECT `info`.* FROM `hospital`.`info` where `info`.`appoint`='$id3' AND `disease`='$temp';";





          $data2 = $con->query($sql2);

          while ($result2 = $data2->fetch_assoc()) {

            echo "
                
                <tr class='row row1 dd dd" . $index . "' style='border-top: 4px solid black;'>
            <td class='srno1'>
               NAME
            </td>
            <td class='name1'>
                <p  name='p_name' class='input_tag' required  >" . $result2['p_name'] . "</p>
        
            </td>
           
            <td class='action1'>
            
              
            </td>
        
           </tr>
           <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       ADDRESS
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' required  >" . $result2['address'] . "</p>
        
   
        </td>
   
        <td class='action1'>
        
          
        </td>
   </tr>
   <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       DISEASE
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' required >" . $result2['disease'] . "</p>
        
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   
   </tr>
   <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       AGE
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' required >" . $result2['appoint'] . "</p>
        
   
    </td>
   
  
   
    <td class='action1'>
    
      
    </td>
   </tr>
   
   <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       DOB
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' >" . $result2['dob'] . "</p>
        
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   
   </tr>
   <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       MOBILE NO 
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' required  >" . $result2['mobile_no'] . "</p>
        
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   
   </tr>
   <tr class='row dd dd" . $index . "'>
    <td class='srno1'>
       EMAIL
    </td>
    <td class='name1'>
    <p  name='p_name' class='input_tag' required  >" . $result2['email'] . "</p>
        
        </td>
      
      
   
        <td class='action1'>
        
          
        </td>
   
   </tr>
   <tr class='row dd edit dd" . $index . "'>
    <td class='srno1 border_design'>
       INFO
    </td>
    <td class='name1 border_design'>
    <p  name='p_name' class='input_tag ddd' required  >" . $result2['textarea'] . "</p>
        
   
    </td>
   
    <td class='action1 border_design'>
    
      
    </td>
    
   
    
    
           
           
           ";
          }


          echo "
            </tr>
            <tr class='row row2 dd dd" . $index . "''>
          
            <td class='srno1'>
               
        
                <button type='' class='action2 deleted' onclick='cancel1();'>
                CANCEL 
               </button>
            </td>
            
                <td class='name1'>
               
            </td>
        
                
               <td class='action1'>
        
        
               
            </td;
               
        
            
        
               </tr>
               ";
        }
      }


      $con->close();




      ?>


    </table>







  </div>





     <script>

      
     
     let j =(document.getElementsByClassName('row').length);
   
   for(let i=0 ; i< j;  i++)
   {
 
   
   
 let update_d=document.getElementsByClassName('row')[i];
   update_d.style.display='none';
   
   }
   let j1 =(document.getElementsByClassName('row11').length);
   for(let i=0 ; i< j1 ; i++)
   {
   document.getElementsByClassName('row11')[i].style.display='';
   }
   
search =document.getElementById('running_tagg2');
search.addEventListener('keypress',function search_Info(){
  let name1= document.getElementById('table2');
    let name2 , name3 , search2;
  
      for(let j=0 ; j < ( document.getElementsByClassName('row11').length ) ; j++)
      {
          
        name2=document.getElementsByClassName('row11')[j];
       console.log('j',j,'j');
      
        name3=name2.getElementsByTagName('td')[1];
  
       
       
       let name4=name3.innerHTML.toUpperCase();
      
   
        search2=search.value.toUpperCase();
       console.log('search',search2);
       console.log('name',name4);
     
        if(name4.indexOf(search2) > -1)
        {
        
        
        }
        else{
          
          document.getElementsByClassName('row11')[j].style.display='none';
        }
      
       }
         if(search2.length==0)
       {
            cancel();
           
        }
        
  
});
function cancel()
{
    
  let name1= document.getElementById('table2');
 let name2 , name3;
  
  for(let j=0 ; j < ( document.getElementsByClassName('row11').length) ; j++)
  {
    
    name2=name1.getElementsByClassName('row11')[j];

      name2.style.display='';
      
     }
    let search = document.getElementById('running_tagg2');
    search.value='';
  }
  function view_record(class_named) {
    let navbar = document.getElementsByClassName('same2')[0];

    let dip2 = document.getElementsByClassName('select-option1')[0];
    let dip3 = document.getElementsByClassName('select-option1')[1];
    let dip4 = document.getElementsByClassName('info')[0];

    navbar.style.display = 'none';
    // dip1.style.display='none';
    dip2.style.display = 'none';
    dip3.style.display = 'none';
    dip4.style.display = 'none';




    navbar.style.display = 'none';




    let table1 = document.getElementById('table1');
    table1.style.display = 'none';
    let name11 = document.getElementById('table2');

    let main = document.getElementById('tables');

    main.style.marginTop = '6%';
    let name22;
    for (let j = 0; j < (document.getElementsByClassName('row11').length); j++) {

      name22 = name11.getElementsByClassName('row11')[j];

      name22.style.display = 'none';

    }




    for (let k = 0; k < (document.getElementsByClassName(class_named).length); k++) {
   
      name22 = document.getElementsByClassName(class_named)[k];
      
      name22.style.display = '';

    }


  }

  function cancel1() {
    let update_d;


    let navbar = document.getElementsByClassName('same2')[0];







    let dip2 = document.getElementsByClassName('select-option1')[0];
    let dip3 = document.getElementsByClassName('select-option1')[1];
    let dip4 = document.getElementsByClassName('info')[0];



    navbar.style.display = 'none';
    // dip1.style.display='none';
    dip2.style.display = '';
    dip3.style.display = '';
    dip4.style.display = '';


    navbar.style.display = '';

    let table1 = document.getElementById('table1');
    table1.style.display = '';
    let main = document.getElementById('tables');

    main.style.marginTop = '';


    for (let j = 0; j < (document.getElementsByClassName('row').length); j++) {

      name22 = document.getElementsByClassName('row')[j];

      name22.style.display = 'none';

    }

    for ( j = 0; j < (document.getElementsByClassName('row11').length); j++) {

      name22 = document.getElementsByClassName('row11')[j];

      name22.style.display = '';

    }
  }
   
     </script>
  

  <!-- <script src="list_group.js"></script> -->

</body>

</html>