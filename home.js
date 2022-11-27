
let password1 = document.getElementsByClassName("password")[0];
let check = document.getElementsByClassName("login_c_input")[0];
check.addEventListener("click", () => {

    if (password1.type == "text") {
        password1.type = "password";
        console.log(44)
    }
    else {
        password1.type = "text";
    }
})

let password2 = document.getElementsByClassName("password")[1];
let check2 = document.getElementsByClassName("login_c_input")[1];
check2.addEventListener("click", () => {

    if (password2.type == "text") {
        password2.type = "password";
        console.log(44)
    }
    else {
        password2.type = "text";
    }
})

let password3 = document.getElementsByClassName("password")[2];
let check3 = document.getElementsByClassName("login_c_input")[2];
check3.addEventListener("click", () => {

    if (password3.type == "text") {
        password3.type = "password";
        console.log(44)
    }
    else {
        password3.type = "text";
    }
})



let signup = document.getElementsByClassName("display")[0];
let signin = document.getElementsByClassName("display2")[0];

let signupd2 = document.getElementsByClassName("signup2")[0];
let login = document.getElementsByClassName("login")[0];
let signupd = document.getElementsByClassName("signup")[0];
let login2 = document.getElementsByClassName("login2")[0];

// box-shadow:rgba(50,50,93,0.25) 0px 2px 5px -1px ,rgba(0,0,0,0.3) 0px 1px 3px -1px;

signupd.style.boxShadow = "2px 2px 4px rgba(0,0,0,0.2),0px -2px 4px rgba(0,0,0,0.2)";
login.style.boxShadow = "2px 2px 4px rgba(0,0,0,0.2),-2px -2px 4px rgba(0,0,0,0.2)";
signupd2.style.boxShadow = "none";
login2.style.boxShadow = "none";



let right = document.querySelectorAll(".fa-circle-chevron-right")[0];
let left = document.querySelectorAll(".fa-circle-chevron-left")[0];

let review = document.querySelectorAll(".reviews")[0];


let count = document.querySelectorAll(".dd").length;
console.log(count);

let count2 = count / 4;
let a = 0;
let d = 1;

function translate_dd() {



    d = -104.45 * a;
    if (a < 0) {
        let dip = (-104.45 * count2);
        // review.style.transform = `translateX(${dip}%)`;
        left.style.color = "whitesmoke";
        return;
    }
    if (a < count2) {
        review.style.transform = `translateX(${d}%)`;
        right.style.color = "black";
        left.style.color = "black";


    }
    else {
        review.style.transform = `translateX(0%)`;
        right.style.color = "whitesmoke";
        a = 0;
    }

    // review.style.transform='translate3d(-400px , 0px , -200px);';
    // a++;
    console.log(d)
    // }, 4000);



}
function rightd() {
    a++;
    translate_dd();
}

function leftd() {
    a--;
    translate_dd()
}
let d1 = 1;


signup.addEventListener("click", () => {




    signupd2.style.boxShadow = "2px 2px 4px rgba(0,0,0,0.2),0px -2px 4px rgba(0,0,0,0.2)";
    login2.style.boxShadow = "2px 2px 4px rgba(0,0,0,0.2),-2px -2px 4px rgba(0,0,0,0.2)";

    setTimeout(() => {
        login2.style.zIndex = "2";
        signupd2.style.zIndex = "2";

    }, 500)
    login.style.transform = "translateX(-500px)";
    signupd.style.transform = "translateX(500px)";
    console.log(login2);


})

signin.addEventListener("click", () => {

    console.log(44)
    signupd.style.zIndex = "2";
    login.style.zIndex = "2";
    signupd2.style.zIndex = "-2";
    login2.style.zIndex = "-2";
    // setTimeout(() => {
    signupd2.style.boxShadow = "none";

    login2.style.boxShadow = "none";
    login.style.transform = "translateX(0)";
    signupd.style.transform = "translateX(0)";
    // setTimeout(() => {



})

let arr = document.getElementsByClassName("arrow1")[1];

let doct = document.getElementsByClassName("doct")[0];



let count_doct = document.querySelectorAll(".doct").length;

let count2_doct = count_doct / 4;
let a_doct = 0;
let d_doct = 1;

let doct_ddoct=document.getElementsByClassName("doctors")[0];

function translate_dd_doct() {



    d_doct = -99 * a_doct;
    if (a_doct < 0) {
        let dip_doct = (-104.45 * count2_doct);
        // review.style.transform = `translateX(${dip_doct}%)`;
        // left.style.color = "whitesmoke";
        return;
    }
    if (a_doct < count2_doct) {
        console.log(a_doct)
        doct_ddoct.style.transform = `translateX(${d_doct}%)`;
        right.style.color = "black";
        left.style.color = "black";


    }
    else {
        doct_ddoct.style.transform = `translateX(0%)`;
        right.style.color = "whitesmoke";
        a_doct = 0;
    }

    // review.style.transform='translate3d(-400px , 0px , -200px);';
    // a++;
    // }, 4000);



}
function rightd_doct() {
    a_doct++;
    translate_dd_doct();
}

function leftd_doct() {
    a_doct--;
    translate_dd_doct()
}
