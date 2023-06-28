<?php
require_once('../ConnectDB/connectDB.php');
ob_start();
session_start();
require_once('../Library/library.php');
if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="../images/logoPopo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <!-- link fontawesome -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet" />
    <!-- font google -->
    <link rel="stylesheet" href="./Home/owl.carousel.min.css" />
    <link rel="stylesheet" href="./Home/owl.theme.default.min.css" />
    <!-- carousel -->
    <style>
      :root {
        --bg-color: #1ea2bf;
        --textName-color : #157332;
        --textPrice-color: #fb492c;
        --boder-color: #cabbbb;
      }
      
    </style>
    <title>Đơn Hàng Của Bạn</title>
    <link rel="stylesheet" href="./styleAllUserManager.css" />
    <?php if (isset($_POST['bntSuccess'])) {
    echo '<style>
            .notification__modal {
              display: flex;
            }
          </style>';
  }?>
</head>
<body>
  
    <div class="notification__modal">
      <div class="notification__modal-content">
        <button class="closeFeedBack"><i class="fas fa-times-circle"></i></button>
        <div class="notification-title">
          <h2>Cảm ơn bạn đã mua hàng tại PoDo</h2>
        </div>
        <form action="" method="post">
          <div class="content__feedback">
            <h3>Bạn vui lòng để lại đánh giá về chất lượng sản phẩm !</h3>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" checked />
                <label for="star5" title="5 Sao">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" checked />
                <label for="star4" title="4 Sao">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" checked />
                <label for="star3" title="3 Sao">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2 Sao">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1 Sao">1 star</label>
            </div>
            <div class="inp__txt__feedBack">
              <input type="text" placeholder="Viết đánh giá . . ." name="txtContentFeedBack">
            </div>
            <input type="text" name="codeOrderFeedBack" value="<?php if (isset($_POST['bntSuccess'])) { echo $_POST['bntSuccess'];}?>" id="codeOrderFeedBack">
          </div>
          <div class="bnt__sent__feedback">
            <button name="bntSentFeedBack">Gửi</button>
          </div>
          </form>

      </div>
    </div>
    <?php 
    
          // lưu phản hồi của khách hàng
      if (isset($_POST['bntSentFeedBack'])) {
        insertFeedBack($_SESSION['user']['idUser'], $_POST['codeOrderFeedBack'], $_POST['rate'], $_POST['txtContentFeedBack']);
      }
    ?>
    <div class="containerr">
    <header>
        <div class="subsystem">
          <div class="social_network">
            <a href="https://www.facebook.com/thanh.thuong.4444" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/thanh.thuong14/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/thanh.thuong.4444" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.tiktok.com/@thuongnguyenqq" target="_blank"><i class="fab fa-tiktok"></i></a>
          </div>
          <?php disAdmin(1)?>
          <div class="account">
          <span class="notification"><i class="fas fa-bell" onclick="showNotification()"></i>
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
            <?php
              if(isset($_SESSION['user'])) {
                disLogin(3);
              } else {
                echo '
                <a class="hover__bg" href="../Login/creatLogin.php" style = "display: inline;" href="">Đăng Ký</a>
                <a class="hover__bg" href="../Login/index.php" style = "display: inline;" href="">Đăng Nhập</a>
              ';
              }
            ?> 
          </div>
        </div>
        <div class="header_top">
          <div class="logo">
            <?php logo(0);?>
          </div>
          <div class="box-header_content">
          <div class="slogan">
            <h1>Yêu Là Phải Nói - Cũng Như Đói Là Phải Ăn</h1>
          </div>
          <!-- end slogan -->
          <div class="section_policy">
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="../images/policy_images_1.png" alt="">
              </div>
              <div class="policy_item_content">
                <h4>Bảo đảm chất lượng</h4>
                <p>Sản phẩm bảo đảm chất lượng.</p>
              </div>
            </div>
            <!-- end policy item -->
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="../images/policy_images_2.png" alt="">
              </div>
              <div class="policy_item_content">
                <h4>Miễn phí giao hàng</h4>
                <p>Cho đơn hàng đầu tiên.</p>
              </div>
            </div>
            <!-- end policy item -->
            <div class="policy_item">
              <div class="policy_item_icon">
                <img src="../images/policy_images_3.png" alt="">
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
              <li><a href="../index.php">Trang Chủ</a></li>
              <li><a href="../Product/index.php">Thực Đơn</a></li>
              <li><a href="">Giảm Giá</a></li>
              <li><a href="">Thông Tin</a></li>
              <button class="bnt-close">
                <i class="fas fa-times"></i>
              </button>
            </ul>
            <!-- end logo -->
            
          </nav>
          <!-- end nav_top -->
          <div class="search">
              <form action="../Product/index.php" method="post">
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
                      showCartMini($_SESSION['user']['idUser'],2);
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
              <a class="linkCart" href="../Cart/giohang.php">Xem giỏ hàng</a>
            </div>
            <!-- end showCart -->
          </div>
          <!-- end cart -->
          
        </div>
        <!-- end header_bottom -->
      </header>
        <!-- end header -->
      <main>
        <div class="title_name">
          <h1><i class="fas fa-shipping-fast"></i>Đơn Hàng</h1>
        </div>
        <div class="box__oder__content">
          <!--   -->
          <?php 
            $conn = connectDB();
            $result = $conn -> query("SELECT DISTINCT orderr.feeShip, orderr.dateOrder, orderr.codeOrder, status.statusName FROM orderr INNER JOIN status ON orderr.status = status.id WHERE orderr.idUser = ".$_SESSION['user']['idUser']." AND orderr.status NOT IN (5,6) ORDER BY orderr.idOder DESC");
            if ($result -> num_rows > 0) {
              while($row = $result -> fetch_assoc()) {
          ?>
          <div class="show__oder__item">
            <div class="show__oder__item-head">
                <span class="book__date">Ngày Đặt: <?php echo $row['dateOrder'];?></span>
                <span class="code_order">Mã Đơn: <i><?php echo $row['codeOrder'];?></i></span>
                <span class="status_oder">Trạng Thái: <i><?php echo $row['statusName'];?></i></span>
            </div>
            <!-- end show__oder__item-head -->
            <div class="show__oder__item-main">
              <?php showOdered($_SESSION['user']['idUser'], $row['codeOrder']); ?>
              <div class="product_oder-infomation">
                <h3>Thông tin người nhận</h3>
                <span>Người nhận: Nguyễn Thanh Thưởng</span>
                <span>Địa chỉ: Học viện Mật Mã, Chiến Thắng, Hà Nội</span>
                <span>Tiền hàng: <b><?php echo number_format($totalCashPro); ?> đ</b></span>
                <span>Phí Ship: <b><?php echo number_format($row['feeShip']); ?> đ</b></span>
              </div>
            </div>
            <!-- end show__oder__item-main -->
            .
            <div class="show__oder__item-footer">
              <div class="totalCash">
                <span class="totalCash__title">Tổng Số Tiền:</span>
                <span class="totalCash__price"><?php echo number_format($row['feeShip']+$totalCashPro); ?> đ</span>
              </div>
              <div class="bnt__group">
                <form action="" method="post">
                <?php 
                  if ($row['statusName'] == "Đã giao hàng") {
                    echo '<button class="bnt__finish bntSuccess" name="bntSuccess" value="'.$row['codeOrder'].'">Đã Nhận Hàng</button>';
                  } else {
                    echo '<button class="bnt__finish bnt__hide" onclick="return false">Đã Nhận Hàng</button>';
                  }
                  if ($row['statusName'] == "Đang xử lý") {
                    echo '<button class="bnt__cancel" name="bntCancel" value="'.$row['codeOrder'].'" onclick="return confirmCancel()">Hủy Đơn Hàng</button>';
                  } else {
                    echo '<button class="bnt__cancel" onclick="return cancelSubmit()">Hủy Đơn Hàng</button>';
                  }
                  
                ?>
                </form>
              </div>
            </div>

          </div>
          <!-- end show__oder__item -->
          <?php }} else {
            echo '<p class="alert__empty">Hiện tại không có đơn hàng nào !</p>';
          } ?>
        </div>
      </main>
      <!-- end main -->
      <?php 
      // Hủy đơn hàng
          cancelOrder();
          successOrder();
          
      ?>
      <footer>
        <div class="section_information">
          <div class="section_information_address">
            <div class="logo-footer">
              <?php logo(0);?>
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
              <img src="../images/hostline.png" alt="">
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
    </script>
    <script src="./styleJs.js"></script>


</body>
</html>
<?php } else { ?>
<script> 
  if (confirm('Vui Lòng Đăng Nhập Để Tiếp Tục Chức Năng')) {
    window.location.assign("../login/index.php");
  } else {
    history.back();
  }
</script>
<?php } ?>