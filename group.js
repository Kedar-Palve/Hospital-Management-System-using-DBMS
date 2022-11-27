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
     
 search =document.getElementsByClassName('search_tag2')[0];
search.addEventListener('keypress',()=>{
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


    function view_record(update_index , count1)
   {
    let navbar=document.getElementsByClassName('same2')[0];

    let dip2=document.getElementsByClassName('select-option1')[0];
    let dip3=document.getElementsByClassName('select-option1')[1];
    let dip4=document.getElementsByClassName('info')[0];
  
  navbar.style.display='none';
  // dip1.style.display='none';
  dip2.style.display='none';
  dip3.style.display='none';
  dip4.style.display='none';

  
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
//   console.log(((update_index*10)-8)+9);
  let temp=0;
  console.log(update_index,count1);
  console.log((update_index*10)-9);
  console.log(((update_index-1)*10)+(9*count1));
     
  for(let i=((update_index*10)-9) ; i<(((update_index-1)*10)+(8*count1)) ; i++)
     {
        // console.log('i',i);
    
  
    
   let update_d=document.getElementsByClassName('row')[i];
     update_d.style.display='';
     temp=i;
     }
    //  console.log(i);
    //  console.log(temp);
     let update_d1=document.getElementsByClassName('row')[temp+1];
     update_d1.style.display='';
     update_d1=document.getElementsByClassName('row')[temp+2];
     update_d1.style.display='';
    
   }
    
function cancel1(index1 , count1)
{
  let update_d;
  
  
  let navbar=document.getElementsByClassName('same2')[0];


  let dip2=document.getElementsByClassName('select-option1')[0];
    let dip3=document.getElementsByClassName('select-option1')[1];
    let dip4=document.getElementsByClassName('info')[0];
  
  navbar.style.display='none';
  // dip1.style.display='none';
  dip2.style.display='';
  dip3.style.display='';
  dip4.style.display='';

  
  navbar.style.display='';
   
  let table1= document.getElementById('table1');
  table1.style.display='';
  let main=document.getElementById('tables');
   
   main.style.marginTop='';
  
   let temp=0;
   for(let i=((index1*10)-9) ; i<(((index1-1)*10)+(8*count1)) ; i++)
     {
   
  
    update_d=document.getElementsByClassName('row')[i];
     update_d.style.display='none';
     temp=i;
     }
     let update_d1=document.getElementsByClassName('row')[temp+1];
     update_d1.style.display='none';
     update_d1=document.getElementsByClassName('row')[temp+2];
     update_d1.style.display='none';
  
     for( let i=0 ; i <document.getElementsByClassName('row11').length ; i++)
     {
                                  
      document.getElementsByClassName('row11')[i].style.display='';
           
     }
    
}