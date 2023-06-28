window.onscroll = function () {
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
  function clickMenu () {
    var bntBars = document.querySelector('.bnt-bars');
    var menuList = document.querySelector('.nav_top ul');
    var bntClose = document.querySelector('.bnt-close');
    var i = 2;
    bntBars.onclick = function openListMenu() {
      i++;
      if (i%2 != 0) {
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