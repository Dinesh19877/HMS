const myslide = document.querySelectorAll(".myslide");
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 6000);
function autoSlide() {
  counter += 1;
  slidefun(counter);
}
function plusSlides(n) {
  counter += n;
  slidefun(counter);
  resetTimer();
}
function currentSlide(n) {
  counter = n;
  slidefun(counter);
  resetTimer();
}
function resetTimer() {
  clearInterval(timer);
  timer = setInterval(autoSlide, 6000);
}

function slidefun(n) {
  let i;
  for (i = 0; i < myslide.length; i++) {
    myslide[i].style.display = "none";
  }

  if (n > myslide.length) {
    counter = 1;
  }
  if (n < 1) {
    counter = myslide.length;
  }
  myslide[counter - 1].style.display = "block";
}


function printerror(Id, Msg) {
  document.getElementById(Id).innerHTML = Msg;
}
function validform() {
  let name = document.FORM.name.value.trim();
  let email = document.FORM.email.value.trim();
  let pnumber = document.FORM.pnumber.value.trim();
let message =document.FORM.Message.value.trim();
  let name_error = email_error = pnumber_error= Message_error= true;

  if (name == "") {
    printerror("name_error", "blank space not allowed");

}
else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(name) === false) {
        printerror("name_error", "enter valid character");

    }
    else if (name.length <= 2) {
        printerror("name_error", "enter full name");

    } 
    else if (name.length >= 20) {
        printerror("name_error", "name not valid");

    }
    else {
        printerror("name_error", "");
        name_error = false;

    }

}



// ====================== e-mail validation ================================


if (email == ""){
printerror("email_error","blankspace not allowed")
}
else{
var regress =  /^[a-zA-Z][a-zA-Z0-9]*@[a-zA-Z.]+\.[a-zA-Z]+$/

if(regress.test(email)=== false){
    printerror("email_error","enter valid email address")
}
else {
printerror("email_error" , "")
email_error = false ; 
}

}



// ====================== phonenumber validation========================

if(pnumber ==""){
printerror("pnumber_error", "blank space not allowed")
}
else{
var regex= /^[1-9]\d{9}$/;
if(regex.test(pnumber) === false){
    printerror("pnumber_error","phone.number must be of 10 digits")
}
else{
    printerror("pnumber_error" , "")
    pnumber_error = false;
}
}
if (message == "") {
  printerror("Message_error", "blankspace not allowed");
} else {
  printerror("Message_error", "");
  Message_error = false;
}


if ((name_error || email_error || pnumber_error|| Message_error) == true) {
  return false 
}
}