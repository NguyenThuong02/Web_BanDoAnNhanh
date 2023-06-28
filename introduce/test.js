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






var index1 = 0;
var index2 = 0;
var index3 = 1;
var index4 = 1;
var index5 = 1;

function showCategory() {
    index2++;
    if (index2 % 2 == 0) {
        document.querySelector('.inp-category').style.display = "block";
        document.querySelector('.icon-dropDownDM').innerHTML = "►"
    } else {

        document.querySelector('.inp-category').style.display = "none";
        document.querySelector('.icon-dropDownDM').innerHTML = "▼"
    }
}

function showColor() {
    index4++;
    if (index4 % 2 == 0) {
        document.querySelector('.inp-color').style.display = "block";
        document.querySelector('.icon-dropDownCL').innerHTML = "►"
    } else {

        document.querySelector('.inp-color').style.display = "none";
        document.querySelector('.icon-dropDownCL').innerHTML = "▼"
    }
}

function showSize() {
    index5++;
    if (index5 % 2 == 0) {
        document.querySelector('.inp-size').style.display = "block";
        document.querySelector('.icon-dropDownS').innerHTML = "►"
    } else {

        document.querySelector('.inp-size').style.display = "none";
        document.querySelector('.icon-dropDownS').innerHTML = "▼"
    }
}

function chekboxAll() {
    // document.querySelector(".list-choose input").checked = "checked";
    var checkbox = document.querySelectorAll(".inp-category input[type=checkbox]");
    index3++;
    if (index3 % 2 == 0) {

        checkbox.forEach((item, index) => {

            item.checked = "checked";
        })
    } else {
        checkbox.forEach((item, index) => {

            item.checked = "";
        })
    }
}

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
// check emty search 
const valSearch = document.querySelector('.search input');

function checkForm() {
    if (valSearch.value.trim() == "") {
        document.querySelector('.error_log').style.display = "block";
        return false;
    } else {
        return true;
    }
}

function errorLog() {
    if (valSearch.value.trim() != "") {
        document.querySelector('.error_log').style.display = "none";
    }
}