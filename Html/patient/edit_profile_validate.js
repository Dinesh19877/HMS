function printerror(Id, Msg) {
    document.getElementById(Id).innerHTML = Msg;
}

function validform() {
    let name = document.FORM.name.value.trim();
    let email = document.FORM.email.value.trim();
    let pnumber = document.FORM.pnumber.value.trim();
    let password = document.FORM.password.value.trim();



    let name_error = email_error = pnumber_error = password_error  = true
   
   
   
//    ===================== name validation ============================
    
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



    // ====================== e-mail validation ================================



    var regress = /^\S+@\S+\.\S+$/;

    if(regress.test(email)=== false){
        printerror("email_error","enter valid email address")
    }
 else {
    printerror("email_error" , "")
    email_error = false ; 
 }





// ====================== phonenumber validation========================


    var regex= /^[1-9]\d{9}$/;
    if(regex.test(pnumber) === false){
        printerror("pnumber_error","phone.number must be of 10 digits")
    }
    else{
        printerror("pnumber_error" , "")
        pnumber_error = false;
    }


// ==================== password validation =======================


    if(password.length < 6){
        printerror("password_error" , "enter atleast 6 characters");
    }
    else{
        printerror("password_error" , "")
        password_error = false ;
    }

    if ((name_error || email_error || pnumber_error || password_error) == true) {
        return false 
    }



}





const tooglepassword = document.querySelector("#togglePassword");
const password1 = document.querySelector("#password");
tooglepassword.addEventListener("click" , function(){
    const type = password1.getAttribute("type")=== "password" ? "text" :"password";
    password1.setAttribute("type",type );
    this.classList.toggle("bi-eye")
})


