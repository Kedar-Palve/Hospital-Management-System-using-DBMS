let right = document.querySelectorAll(".fa-circle-chevron-right")[0];
let left = document.querySelectorAll(".fa-circle-chevron-left")[0];

let review = document.querySelectorAll(".reviews")[0];


let count = document.querySelectorAll(".dd").length;
console.log(count);
// console.log("erf");

let count2 = count / 2;
let a = 0;
let d = 1;

function translate_dd() {



    d = -104.45 * a;
    if (a < 0) {
        let dip = (-104.45 * count2);
        // review.style.transform = `translateX(${dip}%)`;
        // left.style.color = "whitesmoke";
        return;
    }
    if (a < count2) {
        review.style.transform = `translateX(${d}%)`;
        right.style.color = "black";
        left.style.color = "black";


    }
    else {
        review.style.transform = `translateX(0%)`;
        // right.style.color = "whitesmoke";
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