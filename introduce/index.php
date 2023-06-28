<?php   
require_once('../ConnectDB/connectDB.php');
ob_start();
session_start();
require_once('../Library/library.php');
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
    <link rel="stylesheet" href="style.css">


    <style>
      :root {
        --bg-color: #1ea2bf;
        --textName-color : #157332;
        --textPrice-color: #fb492c;
        --text-color: #157332;
      }
    </style>
    <title>Thông tin</title>
 
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
              <li><a href="./index.php">Thông Tin</a></li>
              <button class="bnt-close">
              <i class="fas fa-times"></i>
            </button>
            </ul>
            <!-- end logo -->
            
          </nav>
          <!-- end nav_top -->
          <div class="search">
              <form action="" method="post">
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
                      showCartMini($_SESSION['user']['idUser'], 2);
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

    <main>
        <div class='content'>
                    <h1 class="Text TieuDe">Chào mừng đến với PoDo</h1>
                    <p class="Text NoiDung1">Podo là một website bán đồ ăn nhanh hàng đầu với một loạt các món ăn phong phú và đa dạng. 
                      Với sự tiện lợi và dễ dàng truy cập từ bất kỳ thiết bị nào, Podo mang đến cho khách hàng những trải nghiệm ẩm thực tuyệt vời ngay tại nhà.
                      Tại Podo, bạn có thể tìm thấy các món ăn phổ biến như pizza, burger, sandwich, sushi và nhiều hơn nữa. 
                      Với danh mục đa dạng, Podo đáp ứng mọi nhu cầu ẩm thực của khách hàng, từ những người thích đồ ăn truyền thống cho đến những người muốn khám phá các món ăn mới lạ.
</p>
                    <p class="Text NoiDung2">Podo cung cấp một trải nghiệm mua sắm trực tuyến dễ dàng và an toàn. Giao diện đơn giản và dễ sử dụng của Podo cho phép bạn tìm kiếm và chọn lựa các món ăn yêu thích chỉ trong vài cú nhấp chuột. Chất lượng và an toàn thực phẩm cũng được Podo đảm bảo, với những đối tác chất lượng và quy trình kiểm soát nghiêm ngặt.
                      Cuối cùng, Podo cung cấp dịch vụ giao hàng nhanh chóng và tin cậy. Đội ngũ giao hàng chuyên nghiệp của Podo đảm bảo món ăn của bạn sẽ được giao đến tận cửa nhà một cách nhanh chóng và an toàn. Bạn có thể thưởng thức bữa ăn ngon miệng mà không cần phải lo lắng về việc di chuyển hoặc đứng xếp hàng.
                      Ngoài ra, Podo cũng cam kết đảm bảo chất lượng và an toàn thực phẩm. Họ chỉ hợp tác với các nhà cung cấp uy tín và đảm bảo tuân thủ các quy trình kiểm soát nghiêm ngặt để đảm bảo rằng món ăn mà bạn nhận được là tươi ngon và an toàn cho sức khỏe.
                     </p>
                    
                    <p class="Text NoiDung3">Với tất cả những lợi ích trên, Podo là một địa chỉ trực tuyến tuyệt vời cho những người muốn thưởng thức đồ ăn nhanh ngon lành tại nhà. Truy cập Podo ngay hôm nay và khám phá một thế giới ẩm thực đa dạng và hấp dẫn.
                      Hãy để Podo mang đến cho bạn những trải nghiệm ẩm thực đáng nhớ và tạo nên những kỷ niệm ngon lành cùng gia đình và bạn bè.
                      Bạn không cần phải lo mất thời gian và cực kỳ căng thẳng trong việc tìm kiếm đồ ăn và chuẩn bị bữa ăn. 
                      Với Podo, bạn có thể thoải mái lựa chọn và đặt món ăn mà không cần phải rời khỏi nhà. Đơn giản chỉ với vài cú click chuột, bạn có thể trải nghiệm sự tiện lợi và nhanh chóng trong việc đặt hàng.
</p>
                    <h4 class="Text End">Xin chân thành cảm ơn quý khách!</h4>

        </div>
    </main>

    <footer>
    <div class="quisle">
                <div class="title_quisle">
                    <h1>Các Thương Hiệu Đã Liên Kết</h1>
                </div>
                <div class="item_quisle">
                    <img src="../images/logo_grap.png" alt="Grap" />
                    <img src="../images/logo_now.png" alt="Now" />
                    <img src="../images/logo_momo.png" alt="MoMo" />
                </div>
            </div>
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



    

    <script src="./test.js"></script>
</body>
</html>