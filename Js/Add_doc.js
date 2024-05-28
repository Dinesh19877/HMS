function printerror(Id, Msg) {
    document.getElementById(Id).innerHTML = Msg;
}

function validform() {
    let name = document.FORM.name.value.trim();
    let Qualifications = document.FORM.Qualifications.value.trim();
    let address = document.FORM.address.value.trim();
    let pnumber = document.FORM.pnumber.value.trim();
    let speciality = document.FORM.department.value.trim();
    let NMC = document.FORM.NMC.value.trim();
    let date = document.FORM.date.value.trim();
    let time = document.FORM.time.value.trim();

    let full_name_error = pnumber_error = address_error = department_error = date_error = nmc_error = Qualifications_error = time_error = true


    //    ===================== name validation ============================
    if (name == "") {
        printerror("full_name_error", "blank space not allowed");

    }
    else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {
            printerror("full_name_error", "enter valid character");

        }
        else if (name.length <= 2) {
            printerror("full_name_error", "enter full name");

        }
        else if (name.length >= 20) {
            printerror("full_name_error", "name not valid");

        }
        else {
            printerror("full_name_error", "");
            full_name_error = false;

        }

    }
    // ====================Qualification===============
    if (Qualifications == "") {
        printerror("Qualifications_error", "blank space not allowed");

    }
   

        else {
            printerror("Qualifications_error", "");
            Qualifications_error = false;

        

    }

    // =================================address validate==============


    if (address == "") {
        printerror("address_error", "blank space not allowed");
    }
    else {
        printerror("address_error", "");
        address_error = false;
    }




    // =================================Speciality  validate==============

    if (speciality == "") {
        printerror("department_error", "blank space not allowed");

    }


        else {
            printerror("department_error", "");
            department_error = false;

        }





    // ====================== phonenumber validation========================

    if (pnumber == "") {
        printerror("pnumber_error", "blank space not allowed")
    }
    else {
        var regex = /^[1-9]\d{9}$/;
        if (regex.test(pnumber) === false) {
            printerror("pnumber_error", "phone.number must be of 10 digits")
        }
        else {
            printerror("pnumber_error", "")
            pnumber_error = false;
        }
    }

    // =========================== NMC =====================
    if (NMC == "") {
        printerror("nmc_error", "blank space not allowed")
    }
    else {
        var regex = /^[1-9]\d{4}$/;
        if (regex.test(NMC) === false) {
            printerror("nmc_error", "phone.number must be of 4 digits")
        }
        else {
            printerror("nmc_error", "")
            nmc_error = false;
        }
    }


    // ====================== date========================
    if (date == "") {
        printerror("date_error", "blank space not allowed");
    }
    else {
        printerror("date_error", "");
        date_error = false;
    }

    // ==========================time error======================

    if (time == "") {
        printerror("time_error", "blank space not allowed");
    }
    else {
        printerror("time_error", "");
        time_error = false;
    }


      

    if ((full_name_error || pnumber_error || address_error|| department_error || date_error || Qualifications_error || time_error || nmc_error) == true) {
        return false;
    }

}





const selectImage = document.querySelector('.select-image');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');

selectImage.addEventListener('click', function () {
    inputFile.click();
})

inputFile.addEventListener('change', function () {
    const image = this.files[0]
    if(image.size < 2000000) {

    const reader = new FileReader();
    reader.onload = () => {
        const allImg = imgArea.querySelectorAll('img');
        allImg.forEach(item => item.remove());
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add('active');
        imgArea.dataset.img = image.name;
    }
    reader.readAsDataURL(image);
}
else{
    document.getElementById("img_error").innerHTML = "Image size more than 2MB"
}
})








