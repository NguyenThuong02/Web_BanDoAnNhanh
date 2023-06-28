window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 120 ||
        document.documentElement.scrollTop > 120
    ) {
        document.querySelector(".header_bottom").style.position = "fixed";
    } else {
        document.querySelector(".header_bottom").style.position = "unset";
    }
}

// click menu 
function clickMenu() {
    var bntBars = document.querySelector('.bnt-bars');
    var menuList = document.querySelector('.nav_top ul');
    var bntClose = document.querySelector('.bnt-close');
    var i = 2;
    bntBars.onclick = function openListMenu() {
        i++;
        if (i % 2 != 0) {
            menuList.style.display = "block";
            bntClose.style.display = "inline";
        } else {
            menuList.style.display = "none";
            bntClose.style.display = "none";
        }
    }
    bntClose.onclick = function openCloseMenu() {
        menuList.style.display = "none";
        bntClose.style.display = "none";
    }
}
clickMenu();







// thong bao
var countShow = 1;

function showNotification() {
    countShow += 1;
    if (countShow % 2 == 0) {
        document.getElementsByClassName('show_Notification')[0].style.display = "block"
    } else {
        document.getElementsByClassName('show_Notification')[0].style.display = "none"
    }
    console.log(countShow);
}
// showNavUser()
var countClickNavUser = 1;

function showNavUser() {
    ++countClickNavUser;
    if (countClickNavUser % 2 == 0) {
        document.querySelector('.show__nav__user').style.display = "block";
        document.querySelector('.show__nav__user').style.animation = "dropDown 0.5s alternate-reverse";
        document.querySelector('.icon_down_user').innerHTML = "&#xf106;";
    } else {
        document.querySelector('.show__nav__user').style.display = "none";
        document.querySelector('.icon_down_user').innerHTML = "&#xf107;";
    }
}

// các đơn hàng chuyển sang trạng thái khác thì sẽ không hủy được

// function cancelOrder() {
//     document.getElementsByClassName("bnt__hide").addEventListener("click", cancelSubmit);
// }

function cancelSubmit() {
    alert("Bạn Không Thể Hủy Đơn Hàng Khi Đơn Hàng Đã Được Xử Lý !");
    return false;
}

function confirmCancel() {
    var boolen = confirm("Bạn có chắc muốn hủy đơn hàng này không ?");
    if (boolen) {
        return true;
    } else {
        return false;
    }
}



//  show feedback
const modalFeedBack = document.querySelector('.notification__modal');
const closeFeedBack = document.querySelector('.closeFeedBack');

function showFeedback() {
    modalFeedBack.style.display = "flex"
}
const bntSuccessOrder = document.querySelector('.bntSuccess');
bntSuccessOrder.addEventListener('click', showFeedback)
closeFeedBack.addEventListener('click', function() {
    modalFeedBack.style.display = "none"
    window.location.assign("./order.php");
})


// tài khoản

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

//  show form đổi mật khẩu
function showInpContact() {
    const inpFormPass = document.querySelector('.edit_contact');
    const bntEdit = document.querySelector('.showInpPass')
    bntEdit.style.display = "none"
    inpFormPass.style.display = "block"
}
// kiểm tra trùng khớp mật khẩu
function checkPass() {
    const passNew = document.querySelector('#passNew').value;
    const erPass = document.querySelector('#erpass').value;
    const errorPass = document.querySelector('.errorPass');
    if (passNew == erPass) {
        return true;
    } else {
        errorPass.innerHTML = "Mật Khẩu mới không trùng khớp !"
        return false;
    }
}