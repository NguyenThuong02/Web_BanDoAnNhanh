<?php 
require_once('./ConnectDB/connectDB.php');
ob_start();
session_start();
require_once('./Library/library.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="logo" href="./images/logoToc.jfif" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <!-- link fontawesome -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Itim&display=swap"
      rel="stylesheet"
    />
    <!-- font google -->
    <link rel="stylesheet" href="./Home/owl.carousel.min.css" />
    <link rel="stylesheet" href="./Home/owl.theme.default.min.css" />
    <!-- carousel -->
    <link rel="icon" href="./images/logoPopo.png" type="image/x-icon">

    <title>Chào mừng đến với PoDo</title>
    <style>
      :root {
        --bg-color: #1ea2bf;
        --text-color: #157332;
        --textPrice-color: #d21e1eff;
      }
    </style>
    <link rel="stylesheet" href="./Home/style_home.css" />
    <link rel="stylesheet" href="./Home/style_home_animate.css">
  </head>
  <body>
    <div class="containerr">
      <header>
        <div class="subsystem">
          <div class="social_network">
            <a href="https://www.facebook.com/thanh.thuong.4444" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/thanh.thuong14/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/thanh.thuong.4444" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.tiktok.com/@thuongnguyenqq" target="_blank"><i class="fab fa-tiktok"></i></a>
          </div>
          <?php disAdmin(0)?>
          <div class="account">
            <span class="notification">
              <i class="fas fa-bell" onclick="showNotification()"></i>
                <sub><?php
                    if (isset($_SESSION['user'])) {
                      showCountNotification($_SESSION['user']['idUser']);
                    } else {
                      echo 0;
                    } 
                  ?></sub>
            <div class="show_Notification">
              <ul>
                <?php if (isset($_SESSION['user'])) {
                  showNotification($_SESSION['user']['idUser']);
                } else {
                  echo "<h4>Không có thông báo nào !</h4>";
                } ?>
              </ul>
            </div>
            </span>
            <?php disLogin(0)?>
          </div>
        </div>
        <div class="header_top">
          <div class="logo">
            <?php logo(2);?>
          </div>
          <div class="box-header_content">
          <div class="slogan">
            <h1>Yêu Là Phải Nói - Cũng Như Đói Là Phải Ăn</h1>
          </div>
          <!-- end slogan -->
          <div class="section_policy">
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="./images/policy_images_1.png" alt="">
              </div>
              <div class="policy_item_content">
                <h4>Bảo đảm chất lượng</h4>
                <p>Sản phẩm bảo đảm chất lượng.</p>
              </div>
            </div>
            <!-- end policy item -->
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="./images/policy_images_2.png" alt="">
              </div>
              <div class="policy_item_content">
                <h4>Miễn phí giao hàng</h4>
                <p>Cho đơn hàng đầu tiên.</p>
              </div>
            </div>
            <!-- end policy item -->
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="./images/policy_images_3.png" alt="">
              </div>
              <div class="policy_item_content">
                <h4>Hỗ trợ 24/7</h4>
                <p>Hotline: <?php showPhoneWeb(); ?></p>
              </div>
            </div>
            <!-- end policy item -->
          </div>
          <!-- end  section_policy-->
          </div>
          
        </div>
        <!-- end header_top -->
        <div class="header_bottom">
          <nav class="nav_top">
            <button class="bnt-bars">
              <i class="fas fa-bars"></i>
            </button>
            <ul>
              <li><a href="./index.php">Trang Chủ</a></li>
              <li><a href="./Product/index.php">Thực Đơn</a></li>
              <li><a href="">Giảm Giá</a></li>
              <li><a href="./introduce/index.php">Thông Tin</a></li>
              <button class="bnt-close">
                <i class="fas fa-times"></i>
              </button>
              <!-- end logo -->
            
            </ul>
            
          </nav>
          <!-- end nav_top -->
          <div class="search">
              <form action="./Product/index.php" method="post">
                <input type="text" oninput="errorLog()" placeholder="Tìm Kiếm Sản Phẩm" name="txtSearch" required/>
                <button name="bntSearch" onclick="return checkForm()"><i class="fas fa-search"></i></button>
              </form>
              <div class="error_log">
                <span>Không được để trống !</span>
              </div>
          </div>
          <!-- end search-->
          <div class="cart">
            <?php 
              if (isset($_SESSION['user'])) {
                cart(0);
              } else {
                echo'
                <div class="cart_icon">
                  <i class="fas fa-shopping-cart"></i>
                  <sub>0</sub>
                </div>';
              }
            ?>
            <div class="showCart">
              <h4>Sản Phẩm Đã thêm</h4>
              <ul class="list_cart">
                <form action="" method="post">
                  <?php
                    if(isset($_SESSION['user'])) {
                      showCartMini($_SESSION['user']['idUser'], 1);
                      if (isset($_POST['deleteCart'])) {
                        $conn = connectDB();
                        $idCartDetail = $_POST['deleteCart'];
                        $sql1 = "DELETE FROM cart WHERE cart.idCartDetail =".$idCartDetail.""; // xóa giỏi hàng có mã hàng chi tiết đấy
                        $conn -> query($sql1);
          
                        $sql2= "DELETE FROM cartdetail WHERE cartdetail.id_cartDetail =".$idCartDetail.""; // xóa giỏ hàng chi tiết
                        $conn -> query($sql2);
                        header("Refresh:0");
                      }
                    }
                    else {
                      echo '<li class="cartEmpty">Giỏ Hàng Trống !</li>';
                    }
                  ?>
                </form>
              </ul>
              <a class="linkCart" href="./Cart/giohang.php">Xem giỏ hàng</a>
            </div>
            <!-- end showCart -->
          </div>
          <!-- end cart -->
          
        </div>
        <!-- end header_bottom -->
      </header>
      <!-- end header -->
      <main>
        <div class="banner">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php 
                $i=1;
                $conn = connectDB();
                $result = $conn->query("SELECT * FROM slide ");
                if ($result->num_rows > 0) {
                  while($row = $result -> fetch_assoc()){
                    if ($i++==1) {
                      echo '
                        <div class="carousel-item active">
                          <a href="'.$row['link'].'">
                          <img class="bannerImg" src="./images/'.$row['image'].'" class="d-block w-100" alt="...">
                          </a>
                        </div>
                      ';
                    } else {
                      echo '
                        <div class="carousel-item">
                          <a href="'.$row['link'].'">
                          <img class="bannerImg" src="./images/'.$row['image'].'" class="d-block w-100" alt="...">
                          </a>
                        </div>
                      ';
                    }
                  }
                }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!-- end banner -->
        <div class="product_hot">
          <div class="title-product_hot">
            <h1 id="title_deal">Commbo</h1>
          </div>
          <!-- end title-product_hot -->
          <div class="box-product_Hot">
            <div class="owl-carousel owl-theme">
              <?php showProductHot();?>
            </div>
          </div>
        </div>
        <!-- end product-hot -->
        <div class="product_lemonTea">
        <div class="title-product_hot">
            <h1 id="title_deal">Đồ Ăn Nhanh</h1>
          </div>
          <!-- end title-product_hot -->
          <div class="box-product_Hot">
          <?php showProductCategory(30)?>
          </div>
        </div>
        <!-- end product_lemonTea -->
        <div class="product_drinkTea">
        <div class="title-product_hot">
            <h1 id="title_deal">Đồ Uống</h1>
          </div>
          <!-- end title-product_hot -->
          <div class="box-product_Hot">
          <?php showProductCategory(31)?>
          </div>
          <!-- end box-product_Hot -->
        </div>
        <!-- end product_drinkTea -->
        <div class="list-category">
          <div class="title-list-category">
            <h1>Danh Mục Sản Phẩm</h1>
          </div>
          <div class="slide-category">
            <div class="owl-carousel owl-theme">
            <?php 
              $conn = connectDB();
              $result = $conn->query("SELECT * FROM category");
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { 
                  echo '<a href="./Product/index.php?idML='.$row['id_category'].'" class="linkCategory">
                          <div class="item list-category-item">
                            <img src="./images/'.$row['image'].'" alt="" />
                            <span>'.$row['nameCategory'].'</span>
                          </div>
                        </a>
                  ';
                }
              }
              ?>
            </div>
          </div>
        </div> 
        <!-- end list category-->
        <div class="quisle">
          <div class="title_quisle">
            <h1>Các Thương Hiệu Đã Liên Kết</h1>
          </div>
          <div class="item_quisle">
            <a href="https://www.grab.com" target="_blank"><img src="./images/logo_grap.png" alt="Grap" /></a>
            <a href="https://www.now.vn" target="_blank"><img src="./images/logo_now.png" alt="Now" /></a>
            <a href="https://momo.vn" target="_blank"><img src="./images/logo_momo.png" alt="MoMo" /></a>
          </div>
        </div>
      </main>
      <footer>
        <div class="section_information">
          <div class="section_information_address">
            <div class="logo-footer">
              <?php logo(3);?>
            </div>
            <div class="information_address">
              <h2>Cửa Hàng PoDo</h2>
              <ul>
                <?php 
                $conn = connectDB();
                $result = $conn->query("SELECT * FROM information");
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                    echo '
                      <li>'.$row['address1'].'</li>
                    ';
                }
                ?>
              </ul>
            </div>
          </div>
          <!-- end section_information_address -->
          <div class="contact_information">
            <h2>Chính sách và quy định chung</h2>
            <div class="contact_information_content">
              <p class="contact_information_content_sub">
              Các chính sách và quy định chung này liên quan đến việc Khách hàng sử dụng website của PoDo
              </p>
              <img src="./images/hostline.png" alt="">
            </div>
          </div>
          <!-- end contact_information -->
          <div class="list_product_footer">
            <h2>Danh mục thông tin</h2>
            <ul>
              <li><a href="">Đồ Uống</a></li>
              <li><a href="">Sữa Chua</a></li>
              <li><a href="">Đồ Ăn Vặt</a></li>
              <li><a href="">Điều Khoản Và Trách Nhiệm</a></li>
            </ul>
          </div>
        </div>
        <div class="copy_right">
          <p>Nhom 90 © PoDo. KMA</p>
        </div>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./Home/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./Home/style_js.js"></script>
    <script>
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 100,
        nav: true,
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 3,
          },
          1000: {
            items: 5,
          },
        },
      });
    </script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "106683535040589");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
      function viewport() {
          var e = window,
              a = 'inner';
          if (!('innerWidth' in window)) {
              a = 'client';
              e = document.documentElement || document.body;
          }
          if (e[a + 'Width'] <= 768) {
              bannerMobile[0].src = "./images/banner-mobile001.jpg"
              bannerMobile[1].src = "./images/banner-mobile002.jpg"
              bannerMobile[2].src = "./images/banner-mobile001.jpg"
          } if (e[a + 'Width'] > 768) {
            <?php 
              $conn = connectDB();
              $result = $conn->query("SELECT * FROM slide ");
              $i= 0;
              if ($result->num_rows > 0) {
                while($row = $result -> fetch_assoc()){
                  echo 'bannerMobile['.$i++.'].src = "./images/'.$row['image'].'";';
                }
              }  
            ?>
          }
      }
    </script>
  </body>
</html>
