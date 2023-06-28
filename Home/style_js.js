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
//animation



// function scrollAnimation() {
//     if (document.body.scrollTop > 95 || document.documentElement.scrollTop > 95) {
//         document.querySelector(".show-product-img").style.display = "flex"
//     }
//     // ------ //
//     if (document.body.scrollTop > 325 || document.documentElement.scrollTop > 325) {
//         document.querySelector(".product_hot").style.display = "block"
//     }
//     // ------ //
//     if (document.body.scrollTop > 790 || document.documentElement.scrollTop > 790) {
//         document.querySelector(".list-category").style.display = "block"
//     }
//     // ------ //
//     if (document.body.scrollTop > 1120 || document.documentElement.scrollTop > 1120) {
//         document.querySelector(".product_lemonTea").style.display = "block"
//     }
//     // ------ //
//     if (document.body.scrollTop > 1925 || document.documentElement.scrollTop > 1925) {
//         document.querySelector(".product_drinkTea").style.display = "block"
//     }
//     // ------ //
//     if (document.body.scrollTop > 2685 || document.documentElement.scrollTop > 2685) {
//         document.querySelector(".quisle").style.display = "block"
//     }
//     // ------ //
//     if (document.body.scrollTop > 3000 || document.documentElement.scrollTop > 3000) {
//         document.querySelector("footer").style.display = "block"
//     }
// }

// scrollAnimation();

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

var bannerMobile = document.querySelectorAll('.bannerImg');


var resizeTimer;
$(window).resize(function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(viewport, 100);
});

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