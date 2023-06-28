function showInpfile() {

    var valInpSubmit = document.getElementById('bnt_UpdateLogo');
    if (valInpSubmit.value == "edit") {
        document.getElementById('Upfile').style.display = "block";
        document.querySelector('.edit_logo span').style.display = "none";
        valInpSubmit.value = "update";
        valInpSubmit.innerHTML = "Cập Nhật";
        return false;
    } else {
        return true;
    }
}

function showInpAdress() {
    var valInpSubmit = document.getElementById('bnt_UpdateAdress');
    var valInpTxt = document.querySelectorAll('.edit_adress input[type="text"]')
    if (valInpSubmit.value == "edit") {
        valInpTxt.forEach(value => {
            value.disabled = false;
        });
        valInpSubmit.value = "update";
        valInpSubmit.innerHTML = "Cập Nhật";
        return false;
    } else {
        return true;
    }
}

function showInpContact() {
    var valInpSubmit = document.getElementById('bnt_Updatecontact');
    var valInpTxt = document.querySelectorAll('.edit_contact input')
    if (valInpSubmit.value == "edit") {
        valInpTxt.forEach(value => {
            value.disabled = false;
        });
        valInpSubmit.value = "update";
        valInpSubmit.innerHTML = "Cập Nhật";
        return false;
    } else {
        return true;
    }
}