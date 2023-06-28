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


//  hiển thị các chức năng phụ
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".title-item");
const panes = $$(".tab__group");

const tabActive = $(".title-item.active");
const line = $(".title_comment_product .line");

line.style.left = tabActive.offsetLeft + "px";
line.style.width = tabActive.offsetWidth + "px";

tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function() {
        $(".title-item.active").classList.remove("active");
        $(".tab__group.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
});

//  copy đường link sản phẩm

function copyTxt() {
    var copyText = document.getElementById("txtLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Đã Copy Link");
}
//  tắt thông báo
const bntClose = document.querySelector('.bntClose');
const boxNotification = document.querySelector('.notification__modal');
bntClose.addEventListener('click', function() {
    boxNotification.style.display = "none"
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