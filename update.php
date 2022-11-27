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

if (isset($_POST['p_name']) and isset($_POST['mobile_no'])) {

  $server = "localhost";
  $username = "root";
  $password = "";

  $con  = mysqli_connect($server, $username, $password);

  $pp = '';
  $mbf = '';
  if (isset($_GET['id1']) and isset($_GET['mb1'])) {


    $pp = $_GET['id1'];
    $mbf = $_GET['mb1'];
  }
  $p_name = $_POST['p_name'];

  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email'];

  $disease = $_POST['disease'];

  $sql2 = " UPDATE `hospital`.`info` SET `p_name`='$p_name' , `address`='$address' , `dob`='$dob' ,
   `mobile_no`='$mobile_no' , `email`=' $email' , `disease`='$disease' ,
   WHERE `p_name`= '$pp' AND `mobile_no`='$mbf' ; ";

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

  <link rel="stylesheet" href="action.css">

</head>

<body>
  <header>

    <nav>
      <section>

        <span class="span_a">
          <a href="index.html">
            <img src="images/dd.jpg" alt="" id="home_back_image">
          </a>

        </span>
        <span>
          <marquee direction="X-UA-Compatible" id="running_tag"> WELCOME ! NOW YOU CAN UPDATE AND DELETE A RECORDS</marquee>
        </span>
        <span>
          <br>
          <div>

          </div>
          <div class="same">

            <input type="search" id="running_tagg" class="search_tag" placeholder="TYPE HERE TO SEARCH">
            <button type="submit" id="button" onclick="cancel();"> CANCEL SEARCH </button>


          </div>

      </section>
    </nav>

  </header>



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

      $sql = " SELECT * FROM `hospital`.`info` ";

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

             <a href='action.php?id=" . $result['p_name'] . "&addres=" . $result['address'] . "'>
             <button  class='action2 deleted' >
                  DELETE
                 </button>

              </a>
              
              
             <button  class='action2 updated' onclick='update_record(" . $index . ")'>
                  UPDATE 
                
              </button>
                  

             </td>
         
            </tr>

            <form action='update.php?id1=" . $result['p_name'] . "&mb1=" . $result['mobile_no'] . "' method='post' >
            <tr class='row row1 dd' >
    <td class='srno1'>
       NAME
    </td>
    <td class='name1'>
        <input type='text' name='p_name' class='input_tag' required value=" . $result['p_name'] . " >

    </td>
   
    <td class='action1'>
    
      
    </td>

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       ADDRESS
    </td>
    <td class='name1'>
        <input type='text' name='address' class='input_tag' required value=" . $result['address'] . ">
        
   
        </td>
   
        <td class='action1'>
        
          
        </td>

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       DISEASE
    </td>
    <td class='name1'>
        <input type='text' name='disease' class='input_tag' value=" . $result['disease'] . ">
   
    </td>

   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       AGE
    </td>
    <td class='name1'>
        <input type='number' name='age' class='input_tag'  value=" . $result['age'] . ">
   
    </td>
   
  
   
    <td class='action1'>
    
      
    </td>


   </tr>
   

   <tr class='row dd'>
    <td class='srno1'>
       DOB
    </td>
    <td class='name1'>
        <input type='date' name='dob' class='input_tag' value=" . $result['date'] . ">
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       MOBILE NO 
    </td>
    <td class='name1'>
        <input type='number' name='mobile_no' class='input_tag' required value=" . $result['mobile_no'] . ">
   
    </td>
   
    <td class='action1'>
    
      
    </td>
   

   </tr>

   <tr class='row dd'>
    <td class='srno1'>
       EMAIL
    </td>
    <td class='name1'>
        <input type='email' name='email' class='input_tag' value=" . $result['email'] . ">
        </td>
      
      
   
        <td class='action1'>
        
          
        </td>
   

   </tr>
   <tr class='row dd'>
    <td class='srno1'>
       INFO
    </td>
    <td class='name1'>
        <input type='text' name='textarea' class='input_tag' value=" . $result['textarea'] . ">
   
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
      
       <button  class='action2 deleted' click='clear_text();'>
        CLEAR
       </button>
    
      
       <button type='submit' class='action2 updated' id=''>
         DONE
        </button> 
      </a>
       
    </td;
       

    

       </tr>

       </form>
     

            
     
       ";
      }


      $con->close();




      ?>


    </table>







  </div>

  <?php

  echo "

     <script >
     
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

     
 search =document.getElementById('running_tagg');


search.addEventListener('keypress',function search_Info(){


    let name1= document.getElementById('table2');
      let name2 , name3 ;
    
        for(let j=0 ; j < ( document.getElementsByTagName('tr').length -1 ) ; j++)
        {
            
          name2=name1.getElementsByClassName('row')[j];

        
          name3=name2.getElementsByTagName('td')[1];
    
         
         
         let name4=name3.innerHTML.toUpperCase();
        
     
          search2=search.value.toUpperCase();
         console.log(search2);
         console.log(name4);
       
          if(name4.indexOf(search2) > -1)
          {
            
          
          }
          else{
            
            name2.style.display='none';
          }
        
         }

           if(search2.length==0)
         {
              cancel();
             
         }
          
    



});




  function cancel()
  {
      

  let cancel=document.getElementById('');

    let name1= document.getElementById('table2');
   let name2 , name3;
    
    for(let j=0 ; j < ( document.getElementsByTagName('tr').length -1 ) ; j++)
    {
      
      name2=name1.getElementsByClassName('row')[j];
  
        name2.style.display='';
        
       }

      let search = document.getElementById('running_tagg');
      search.value='';


    }


    function update_record(update_index)
   {

    let navbar=document.getElementsByClassName('same')[0];
  
  navbar.style.display='none';

  let table1= document.getElementById('table1');
 table1.style.display='none';

 let name11= document.getElementById('table2');
 let name22; 

for(let j=0 ; j < ( document.getElementsByClassName('row11').length ) ; j++)
    {
      
      name22=name11.getElementsByClassName('row11')[j];
  
        name22.style.display='none';
        
       }
 

 let main=document.getElementById('tables');

 
 main.style.marginTop='6%';

 main.style.border='';

  let name1= document.getElementById('table2');

  let name2=name1.getElementsByClassName('row')[update_index];

  let name3=name2.getElementsByTagName('td')[1];


  console.log(((update_index*10)-8)+9);
  for(let i=((update_index*10)-9) ; i<(((update_index*10)-9)+9) ; i++)
     {
   
  
     console.log('a',i);
   let update_d=document.getElementsByClassName('row')[i];
     update_d.style.display='';
     
     }



   }




    
function cancel1(index1)
{
  let update_d;

  

  
  let navbar=document.getElementsByClassName('same')[0];
  
  navbar.style.display='';
   
  let table1= document.getElementById('table1');
  table1.style.display='';

  let main=document.getElementById('tables');

   
   main.style.marginTop='';
  
 
  for(let i=((index1*10)-9) ; i<(((index1*10)-9)+9) ; i++)
     {
   
  
    update_d=document.getElementsByClassName('row')[i];
     update_d.style.display='none';
     
     }

  
     for( let i=0 ; i <document.getElementsByClassName('row11').length ; i++)
     {

      document.getElementsByClassName('row11')[i].style.display='';
           

     }

     values();

}
let array=[];
function clear_text()
{
  let inner_info;
  
  console.log('rff');
  for(let i=0;i<document.getElementsByClassName('input_tag').length;i++)
  {
    array.push(document.getElementsByClassName('input_tag')[i].value);
    document.getElementsByClassName('input_tag')[i].value='';
  }

  

}

function values()
{

  for(let i=0;i<document.getElementsByClassName('input_tag').length;i++)
  {
    document.getElementsByClassName('input_tag')[i].value=array[i];
  }

}



let array1=[];


     
     
     </script>


      ";





  ?>

</body>

</html>