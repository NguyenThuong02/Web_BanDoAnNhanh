<?php 
require_once('../ConnectDB/connectDB.php');
ob_start();
session_start();
require_once('../Library/library.php');
if (isset($_SESSION['user'])) {
  if (isset($_GET['fullName'])) {
    if (isset($_SESSION['infOrder'])) {
      unset($_SESSION['infOrder']);
    }
    addDataSession($_GET['fullName'], $_GET['mail'], $_GET['phone'], $_GET['adress'], $_GET['txtNote']);
  }
  unset($_SESSION['infOrder']['discount']);
  
?>
  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            <div class="orderStep__item active">
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
      <div class="pay__main">
        <div class="pay__main-left">
          <div class="title__shipFee">
              <h2>Phí Vận Chuyển</h2>
          </div>
          <div class="choose__ship">
              <input type="radio" name="" checked="checked" id="">
              <label for="">Thanh Toán Khi Nhận hàng</label>
          </div>
          <div class="show__adress">
              <div class="show__adress-item">
                  <label for="">Người Nhận: </label>
                  <input type="text" value="<?php if(isset($_SESSION['infOrder']['fullName'])) {echo($_SESSION['infOrder']['fullName']);} ?>" disabled>
              </div>
              <div class="show__adress-item">
                  <label for="">Địa Chỉ: </label>
                  <input type="text" value="<?php if(isset($_SESSION['infOrder']['adress'])) {echo($_SESSION['infOrder']['adress']);} ?>" disabled>
              </div>
          </div>
            <div class="shipfee__cash">
                <label for="">Phí Ship:</label>
                <span class="price__sale">35.000 đ</span>
                <span class="price">35.000 đ</span>
            </div>
        </div>
        <!-- end pay main left -->
        <div class="codeDiscount">
          <form action="">
              <label for="">Mã Giảm Giá:</label>
              <input type="text" name="inpCode" required>
              <button name="bntAplly">Áp Mã</button>
          </form>
          <div class="show__discount">
              <?php 
                apllyDiscount();
              ?>
          </div>
          <div class="list__discount">
            <?php if (countCodeDiscount($_SESSION['user']['idUser']) > 0) {
              $count = countCodeDiscount($_SESSION['user']['idUser']);
              echo '<h4>Bạn có <b>'.$count.'</b> mã chưa dùng</h4>';
            } ?>
            <ul>
                <?php showListCodeDiscount($_SESSION['user']['idUser']); ?>
            </ul>
          </div>
          <div class="bnt__next">
              <a href="./insertOrder3.php">Tiếp Tục</a>
          </div>
        </div>
      </div>
      <!-- end pay main -->
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
<?php 
  echo '<script>
          var dataDiscount = document.querySelector(".show__discount i").innerHTML;
          if(dataDiscount) {
            const formatter = new Intl.NumberFormat("vn", {
              style: "currency",
              currency: "VND",
              minimumFractionDigits: 0
            })
            const totalP = (100 - Number(dataDiscount))/100*35000
            document.querySelector(".price__sale").innerHTML =  formatter.format(totalP);
          } else {
            document.querySelector(".price").style.display = "none";

          }
        </script>';
?>

  <script>
  function applyCode() {
    document.querySelector('.codeDiscount input').value = this.children[1].innerHTML;
  }

  const bntAddCodes = document.querySelectorAll('.listCode');
  for (const bntAddCode of bntAddCodes) {
      bntAddCode.addEventListener('click', applyCode)
  }

  </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'/>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/>
<script src= './JsCart.js'></script>
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
<?php } else { ?>
<script> 
  if (confirm('Vui Lòng Đăng Nhập Để Tiếp Tục Chức Năng')) {
    window.location.assign("../login/index.php");
  } else {
    history.back();
  }
</script>
<?php } ?>