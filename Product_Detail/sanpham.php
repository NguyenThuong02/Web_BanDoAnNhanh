<?php 
require_once('../ConnectDB/connectDB.php');
ob_start();
session_start();
require_once('../Library/library.php');
// update lượt view sp
updateView();
if(isset($_GET['id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logoPopo.png" type="image/x-icon">
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
    <style>
      :root {
        --bg-color: #1ea2bf;
        --textName-color : #157332;
        --textPrice-color: #fb492c;
      }
    </style>
    <!-- font google -->
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="./style_sanpham.css" />
  </head>
  <body>
    <div class="notification__modal">
      <div class="notification__modal-content">
        <div class="bntClose"><i class="fas fa-times-circle"></i></div>
        <h4>Vui lòng đăng nhập để sử dụng chức năng !</h4>
        <a href="../Login/index.php">Đăng Nhập</a>
      </div>
    </div>
    <div class="container">
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
      <main>
        <div class="box_information_product">
          <div class="title_information_product">
            <h1>Thông Tin Sản Phẩm</h1>
          </div>
          <form action="" method="post" onsubmit="return checkLogin()">
            <div class="show_product">
            <?php 
              if(isset($_GET['id'])) {
                global $idProduct;
                $idProduct = $_GET['id'];
                $conn = connectDB();
                $result = $conn -> query("SELECT product.image, product.nameProduct, product.price, product.discount, size.size1, size.size2, size.size3  FROM product INNER JOIN size INNER JOIN category ON product.id_category = category.id_category AND category.id_size = size.id_size WHERE id_product = ".$idProduct."");
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo '
                    <div class="img_product">
                      <img src="../images/'.$row['image'].'" alt="" />
                    </div>
                    <!-- end img_product -->
                    <div class="information_product">
                      <div class="title_product_item">
                        <h2>'.$row['nameProduct'].'</h2>
                      </div>
                      <div class="content_product_item">
                        <p class="price">Giá: <span>'.number_format(ceil(($row['price']-($row['price']*$row['discount'])/100))).' đ</span></p>
                        <p class="sale">'.number_format($row['price']).' đ</p>
                        <div class="size">
                          <label for="">Lựa Chọn Size: </label>
                          <select name="listChooseSize" id="">';
                          if (!empty($row['size1'])) {
                            echo '<option value="'.$row['size1'].'">'.$row['size1'].'</option>';
                          }
                          if (!empty($row['size2'])) {
                            echo '<option value="'.$row['size2'].'">'.$row['size2'].'</option>';
                          }
                          if (!empty($row['size3'])) {
                            echo '<option value="'.$row['size3'].'">'.$row['size3'].'</option>';
                          }
                            echo '
                            </select>
                          </div>
                            <div class="quantity">
                              <label for="">Số Lượng: </label>
                              <input
                                type="number"
                                placeholder="Số Lượng"
                                name="valQty"
                                min="1"
                                max="99"
                                value="1"
                              />
                            </div>
                            <div class="buy_roduct">
                              <button class="bnt_buyNow" name="bnt_buyNow">Mua Ngay</button>
                              <button class="bnt_add_cart" name="bnt_add_cart">Thêm Vào Giỏ Hàng</button>
                            </div>
                        </div>
                        <!-- end content_product_item -->
                      </div>
                      <!-- end information_product -->
                      ';
                }
              } else {

              }
                  ?>
            </div>
          </form>
          <?php buyProduct()?> 
          <!-- end show_product -->
          <div class="details_product">
          <?php productInF($_GET['id']);?>
          </div>
        </div>
        <!-- end box_information_product -->
        <div class="comment_product">
          <div class="title_comment_product">
            <div class="title-item active">
              <i class="fas fa-comments"></i>
              <h2>Bình Luận</h2>
            </div>
            <div class="title-item ">
              <i class="fas fa-calendar-check"></i>
              <h2>Đánh Giá</h2>
            </div>
            <div class="title-item ">
              <i class="fas fa-share-alt"></i>
              <h2>Chia Sẻ</h2>
            </div>
            <div class="line"></div>
          </div>
          <!-- end title_comment_product -->
          <div class="tab__content__comment">
            <div class="tab__group tab__comment active">
              <div class="show_comment">
              <?php showCommentProduct()?>
              </div>
              <!-- end show_comment -->
              <div class="input_comment">
                <form action="" method="post"  onsubmit="return checkLogin()">
                <?php disAvata(); ?>
                  <input type="text" placeholder="Viết Bình Luận" name="content_comment" required/>
                  <button name="bnt_sent_comment">Bình Luận</button>
                </form>
              </div>
            </div>
            <div class="tab__group tab__feedback ">
              <h1>Đánh Giá Chất Lượng</h1>
              <div class="tab__feedback-main">
                <?php 
                  $idProduct = $_GET['id'];
                  $conn = connectDB();
                  $result = $conn -> query("SELECT * FROM feedback INNER JOIN user ON feedback.idUser = user.idUser WHERE feedback.idProduct = ".$idProduct."");
                  if ($result -> num_rows > 0) {
                    while($row = $result -> fetch_assoc()) {
                ?>
                  <div class="tab__feedback-content-item">
                    <div class="tab__feedback-user">
                      <img src="../images/avata/<?php echo $row['image']; ?>" alt="">
                      <div class="tab__feedback-user-star">
                        <span class=userName><?php echo $row['userName']; ?></span>
                        <div class="feedBack__star">
                          <?php showStar($row['starPoint']);
                            echo '<span>('.$row['starPoint'].'/5)</span>';
                           ?>
                        </div>
                      </div>
                      <span class="date__feedBack"><?php echo $row['dateFeedback']; ?></span>
                    </div>
                    <div class="tab__feedback-content">
                      <p><?php echo $row['content']; ?></p>
                    </div>
                    <!-- end tab__feedback-content -->
                  </div>
                <!-- end tab__feedback-content-item -->
                <?php
                    }
                  } else {
                    echo '<p class="feedBackEmpty">Hiện tại chữa có đánh giá nào cho sản phẩm này !</p>';
                  }
                ?>
                
              </div>
            </div>
            <div class="tab__group tab__share">
              <h1>Chia Sẻ Sản Phẩm</h1>
              <div class="tab__share-input">
                <label for="">Link: </label>
                <input type="text" value="<?php echo getCurURL(); ?>" id="txtLink" >
                <button onclick="copyTxt()"><i class="far fa-copy"></i></button>
              </div>
              <div class="socialNetwork">
                <h3>Hoặc</h3>
                <div class="show__socialNetwork">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=https://ci4.googleusercontent.com/proxy/c9vD3EDrtcK7-avr0CLxFI9Z4t3ptY1lDYnGJYIQXiIqVukR6Qjqc5nV7lKd93zbIo7hTnS6O9CovNjFdG1Hf4frRKZieO69pKaOgT8=s0-d-e1-ft#<?php echo getCurURL(); ?>&display=popup&ref=plugin&src=like&kid_directed_site=0&app_id=113869198637480" target="_blank"><img src="../images/logo_fb.png"></i></a>
                  <div class="zalo-share-button" data-href="<?php echo getCurURL(); ?>" data-oaid="579745863508352884" data-layout="4" data-color="blue" data-customize=false></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end tab__content__comment -->
          <?php 
            if (isset($_GET['id'])) {
              if (isset($_POST['bnt_sent_comment'])) {
                if (isset($_SESSION['user'])) {
                  if (!empty($_POST['content_comment'])) {
                    $idProduct;
                    $idCustomer;
                    $contentComment = $_POST['content_comment'];
                    $conn = connectDB();
                    $sql = "INSERT INTO comment VALUES (null,'$contentComment','$idCustomer',null,'$idProduct',b'0')";
                    if($conn ->query($sql)) {
                      header("location: ./sanpham.php?id=".$idProduct."");
                    } 
                  } else {
                    echo "<span style='color: red;'> Vui Lòng Nhập Bình Luận</span>";
                  }
                }
              }
            }
          ?>
        </div>
        <!-- end comment_product -->
        <div class="similar_product">
          <div class="title_similar_product">
            <h2>Các Sản Phẩm Tương Tự</h2>
          </div>
          <div class="box_product_similar">
          <?php showProductSimilar($_GET['id']);?>
          </div>
        </div>
        <!-- end similar_product -->
        

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
      </main>
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
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script src="./js_sanpham.js"></script>
    <script>
    function checkLogin() {
      var user = document.querySelector('.userName');
      if (!user) {
        document.querySelector('.notification__modal').style.display = "flex"
        return false;
      } else {
        return true;
      }
    }
    </script>
    <script>
      var countShow = 1;
      function showNotification() {
        countShow+=1;
          if (countShow % 2 == 0 ) {
              document.getElementsByClassName('show_Notification')[0].style.display = "block"
          } else {
              document.getElementsByClassName('show_Notification')[0].style.display = "none"
          }
          console.log(countShow);
      }
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



  </body>
</html>
<?php }?>