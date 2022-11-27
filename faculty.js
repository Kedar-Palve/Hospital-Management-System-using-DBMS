if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


let add=document.getElementsByClassName("add")[0];
add.addEventListener("click",function()
{
    let ddd=document.getElementsByClassName("first_body_div")[0];
    ddd.style.display="none";

    let display1=document.getElementsByClassName("display")[0];
    display1.style.display="none";//marginTop="700px";

    let searchbar=document.getElementsByClassName("same2")[0];
    searchbar.style.display="none";

    

 let d1=document.getElementsByClassName("form")[0];
 d1.style.visibility="visible";

 

//  



 
 d1.style.transform="translateY(10px)";

});

let cross=document.getElementsByClassName("cross")[0];

cross.addEventListener("click",function()
{

    let d1=document.getElementsByClassName("form")[0];
 d1.style.visibility="hidden";
 d1.style.transform="translateY(-700px)";

setTimeout(dp,500);
 

 
 
});

function dp()
{
    let add=document.getElementsByClassName("first_body_div")[0];
    add.style.display="";

    let display1=document.getElementsByClassName("display")[0];
    display1.style.display="";//marginTop="700px";
}

