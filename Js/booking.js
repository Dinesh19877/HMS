function printerror(Id, Msg) {
  document.getElementById(Id).innerHTML = Msg;
}
function validform1() {
  let Fname = document.FORM.Fname.value.trim();
  let Mname = document.FORM.Mname.value.trim();
  let Lname = document.FORM.Lname.value.trim();
  let age = document.FORM.age.value.trim();
  let blood_group = document.FORM.blood_group.value.trim();
  let address = document.FORM.address.value.trim();
  let Pnumber = document.FORM.Pnumber.value.trim();
  let category = document.FORM.category.value.trim();
  let subcategory = document.FORM.subcategory.value.trim();
  let inputDate = document.FORM.date.value.trim();
  let time = document.FORM.time.value.trim();

  let Fname_error =
    (Mname_error =
    Lname_error =
    age_error =
    bgroup_error =
    address_error =
    pnumber_error =
    department_error =
    doctor_department_error =
    date_error =
    time_error =
      true);

  if (Fname == "") {
    printerror("Fname_error", "blank space not allowed");
  } else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(Fname) === false) {
      printerror("Fname_error", "enter valid character");
    } else if (Fname.length <= 2) {
      printerror("Fname_error", "enter full Fname");
    } else if (Fname.length >= 20) {
      printerror("Fname_error", "Fname not valid");
    } else {
      printerror("Fname_error", "");
      Fname_error = false;
    }
  }

  var regex = /^[a-zA-Z\s]+$/;
  if (Mname.trim() !== "") {
    if (regex.test(Mname) === false) {
      printerror("Mname_error", "enter valid characters");
    } else if (Mname.length <= 2) {
      printerror("Mname_error", "enter full middle name");
    } else if (Mname.length >= 20) {
      printerror("Mname_error", "middle name is too long");
    } else {
      printerror("Mname_error", "");
      Mname_error = false;
    }
  } else {
    printerror("Mname_error", "");
    Mname_error = false;
  }

  if (Lname == "") {
    printerror("Lname_error", "blank space not allowed");
  } else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(Lname) === false) {
      printerror("Lname_error", "enter valid character");
    } else if (Lname.length <= 2) {
      printerror("Lname_error", "enter full Lname");
    } else if (Lname.length >= 20) {
      printerror("Lname_error", "Lname not valid");
    } else {
      printerror("Lname_error", "");
      Lname_error = false;
    }
  }

  if (age == "") {
    printerror("age_error", "blank space not allowed");
  } else {
    var regex = /^[1-9]\d{1}$/;
    if (regex.test(age) === false) {
      printerror("age_error", "age must be of 2 digits");
    } else {
      printerror("age_error", "");
      age_error = false;
    }
  }

  let bloodGroupRegex = /^(A|B|AB|O)[+-]?$/;
  if (blood_group.trim() !== "" && !bloodGroupRegex.test(blood_group)) {
    printerror("bgroup_error", "blood_group not match");
  } else {
    printerror("bgroup_error", "");
    bgroup_error = false;
  }

  if (address == "") {
    printerror("address_error", "blankspace not allowed");
  } else {
    printerror("address_error", "");
    address_error = false;
  }

  if (Pnumber == "") {
    printerror("pnumber_error", "blank space not allowed");
  } else {
    var regex = /^[1-9]\d{9}$/;
    if (regex.test(Pnumber) === false) {
      printerror("pnumber_error", "phone number must be of 10 digits");
    } else {
      printerror("pnumber_error", "");
      pnumber_error = false;
    }
  }

  if (category == "") {
    printerror("department_error", "blankspace not allowed");
  } else {
    printerror("department_error", "");
    department_error = false;
  }

  if (subcategory == "") {
    printerror("doctor_department_error", "blankspace not allowed");
  } else {
    printerror("doctor_department_error", "");
    doctor_department_error = false;
  }

  // if (date == "") {
  //  c
  // } else {
  //   printerror("date_error", "");
  //   date_error = false;
  // }

  const selectedDate = new Date(inputDate);
  const today = new Date();
  today.setHours(0, 0, 0, 0);
  const difference = selectedDate.getTime() - today.getTime();
  const differenceInDays = difference / (1000 * 3600 * 24);
  if(inputDate == "") {
    printerror("date_error", "blankspace not allowed");
  }else {
  if (selectedDate.getDay() === 6) {
    printerror("date_error", "Saturday is not selectable");
  } 
    else if (differenceInDays < 0 || differenceInDays > 3) {
      printerror("date_error", "Date must be today or in the next 3 days");
    } else {
      printerror("date_error", "");
      date_error = false;
    }
  }

  if (time == "") {
    printerror("time_error", "blankspace not allowed");
  } else {
    printerror("time_error", "");
    time_error = false;
  }

  if (
    (Fname_error ||
      Mname_error ||
      Lname_error ||
      age_error ||
      bgroup_error ||
      address_error ||
      pnumber_error ||
      department_error ||
      doctor_department_error ||
      date_error ||
      time_error) == true
  ) {
    return false;
  }
}
