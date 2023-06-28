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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
    <link rel="stylesheet" href="./style-cart.css" />
    <title>Đặt Hàng</title>
  </head>

  <body>
    <div class="container">
      <header>
        <?php 
          if(isset($_SESSION['user'])) {
            global $idCustomer;
            $idCustomer = $_SESSION['user']['idUser'];
            $conn = connectDB();
            $result = $conn -> query("SELECT * FROM user INNER JOIN information ON idUser = ".$idCustomer."");
            $row = $result -> fetch_assoc();
            echo'
              <img src="../images/'.$row['logo'].'" alt="" />
              <div class="admin__cart">
                <span class="user_name"><img class="img_user" src="../images/avata/'.$row['image'].'">'.$row['userName'].'</span>
                <span class="title_cart">Thông Tin Đặt Hàng</span>
              </div>
              <a href="../index.php"><i class="fas fa-angle-double-right"></i> Tiếp tục mua hàng</a>
            ';
          }
        ?>
      </header>
      <!-- end header -->
      <main>
      <div class="orderStep">
              <div class="orderStep__item active">
                <div class="number__title">
                  <span>1</span>
                </div>
                <div class="content__title">
                  <h3>Thông Tin Người Nhận</h3>
                </div>
                <i class="fas fa-angle-double-right"></i>
              </div>
              <!-- end orderStep__item -->
              <div class="orderStep__item">
                <div class="number__title">
                  <span>2</span>
                </div>
                <div class="content__title">
                  <h3 class="">Phí Vận Chuyển</h3>
                </div>
                <i class="fas fa-angle-double-right"></i>
              </div>
              <!-- end orderStep__item -->
              <div class="orderStep__item">
                <div class="number__title">
                  <span>3</span>
                </div>
                <div class="content__title">
                  <h3 class="">Xác Nhận</h3>
                </div>
              </div>
              <!-- end orderStep__item -->
      </div>
      <div class="pay">
            <div class="information">
              <h2>Thông Tin Người Nhận</h2>
              <form action="./insertOrder2.php">
                <div class="form-group float-lert">
                  <label for="">Họ Và Tên <span class="unique">*</span></label>
                  <input type="text" name="fullName" placeholder="Nhập họ và tên" value="<?php if(isset($_SESSION['user']['fullName'])){echo($_SESSION['user']['fullName']);} ?>"required/>
                </div>
                <div class="form-group float-lert">
                  <label for="">Email <span class="unique">*</span></label>
                  <input type="email" name="mail" value="<?php if(isset($_SESSION['user']['email'])){echo($_SESSION['user']['email']);} ?>" placeholder="Nhập email" required/>
                </div>
                <div class="form-group float-lert">
                  <label for="">Số Điện Thoại <span class="unique">*</span></label>
                  <input type="text" name="phone" value="<?php if(isset($_SESSION['user']['phone'])){echo($_SESSION['user']['phone']);} ?>" placeholder="Nhập số điện thoại" required/>
                </div>
                <div class="form-group float-lert">
                  <label for="">Địa Chỉ Chi Tiết <span class="unique">*</span></label>
                  <input type="text" name="adress" value="<?php if(isset($_SESSION['user']['adress'])){echo($_SESSION['user']['adress']);} ?>" placeholder="Địa Chỉ" required/>
                </div>
                <div class="select-group">
                  <div class="select-address">
                    <label for="">Thành Phố <span class="unique">*</span></label>
                    <select name="addressProvinces" id="" required>
                      <option value="Hà Nội">Hà Nội</option>
                    </select>
                  </div>
                  <div class="select-address">
                    <label for="">Quận / Huyện <span class="unique">*</span></label>
                    <select name="addressDistrict" class="address_district" id="district" required>
                      <option value="">Chọn Quận / Huyện</option>
                      <?php  showDistrict(); ?>
                    </select>
                  </div>
                  <div class="select-address">
                    <label for="">Phường / Xã <span class="unique">*</span></label>
                    <select name="addressWard" class="address_ward" required>
                      <option value="">Chọn Phường / Xã</option>
                    </select>
                  </div>
                </div>
                <div class="note">
                  <label for="">Ghi Chú</label>
                  <textarea type="" cols="50" name="txtNote" placeholder="Ghi chú đơn hàng"></textarea>
                </div>
                <div class="bnt-pay">
                  <button name="bntContinue">Tiếp Tục</button>
                </div>
              </form>
            </div>
            <!-- end information -->
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

      <!-- end footer -->
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



  </body>

  <script src="./JsCart.js"></script>
</html>
<?php
dataLocation();
} else { ?>
<script> 
  if (confirm('Vui Lòng Đăng Nhập Để Tiếp Tục Chức Năng')) {
    window.location.assign("../login/index.php");
  } else {
    history.back();
  }
</script>
<?php } ?>
