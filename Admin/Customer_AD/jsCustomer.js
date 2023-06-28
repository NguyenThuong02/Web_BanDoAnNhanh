function selectChekboxAll() {
    var checkbox = document.querySelectorAll(".show__list__content input[type=checkbox]");
    checkbox.forEach((item, index) => {

        item.checked = "checked";
    })
    return false;
}

function closeChekboxAll() {
    var checkbox = document.querySelectorAll(".show__list__content input[type=checkbox]");
    checkbox.forEach((item, index) => {
        item.checked = "";
    })
    return false;
}


function reInput() {
    var resetInp = document.querySelectorAll(".form__group input");
    resetInp.forEach((item, index) => {
        item.value = "";
    })
    var resetRadio = document.querySelectorAll(".inp__choose__special input");
    resetRadio.forEach((item, index) => {
        item.checked = false;
    })
    var resetSelect = document.querySelectorAll(".category__customer select");
    resetSelect.forEach((item, index) => {
        item.value = "";
    })
    return false;
}

function showListcustomer() {
    document.getElementById('form__input__customer').style.display = "block"
    document.getElementById('form__show__list').style.display = "none";
    return false;
}

function showAddcustomer() {
    document.getElementById('form__input__customer').style.display = "none"
    document.getElementById('form__show__list').style.display = "block";
    return false;
}

const valBntSubmit = document.querySelector('#bnt_add_data').value;

function checkPass() {
    if (valBntSubmit == "Cập Nhật") {
        return true;
    } else {
        var pass = document.getElementById('pass__customer').value;
        var enPass = document.getElementById('en__pass__customer').value;
        if (pass == enPass) {
            return true;
        } else {
            alert('Mật Khẩu Không Trùng Khớp Vui Lòng Nhập Lại !');
            return false;
        }
    }

}