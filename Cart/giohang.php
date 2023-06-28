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
  <title>Giỏ Hàng</title>
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
              <span class="title_cart">Giỏ Hàng Của Bạn</span>
            </div>
            <a href="../index.php"><i class="fas fa-angle-double-right"></i> Tiếp tục mua hàng</a>
          ';
        }
      ?>
    </header>
    <!-- end header -->
    <main>
      <div class="main-top">
        <hr />
      </div>
      <!-- end main top -->
      <div class="content">
        <h1><i class="fas fa-shopping-cart"></i>Thông Tin Giỏ Hàng</h1>
        <div class="showCart">
          <form action="" method="post">
            <table>
              <tr>
                <th class="mobl1">STT</th>
                <th>Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Size</th>
                <th>Đơn Giá</th>
                <th class="mobl2">Tổng Tiền</th>
                <th>Tác Vụ</th>
              </tr>
              <?php 
                if(isset($_SESSION['user'])) {
                  $totalPrice = 0;
                  $conn = connectDB();
                  $result = $conn -> query("SELECT * FROM cart C INNER JOIN cartdetail CD INNER JOIN user U INNER JOIN product P ON C.id_user = U.idUser AND C.idCartDetail = CD.id_cartDetail AND CD.id_product = P.id_product AND U.idUser =".$idCustomer."");
                  if ($result->num_rows > 0) {
                    $count = 0;
                    while($row = $result -> fetch_assoc()){
                      ++$count;
                      $price = $row['price']-($row['price']*$row['discount'])/100;
                        echo '
                          <tr>
                            <td class="mobl1">'.$count.'</td>  
                            <td><img class="imgProduct" style = "width: 80px;" src="../images/'.$row['image'].'"></img></td>
                            <td>'.$row['nameProduct'].'</td>
                            <td class="mobl3"><input class="amount" min="1" max="99" type="number" value="'.$row['qty'].'"/></td>
                            <td>'.$row['size'].'</td>
                            <td class="productCash">'.number_format($price).' đ</td>
                            <td class="totalCash mobl2">'.number_format($price*$row['qty']).' đ</td>
                            <td><button name="deleteCart" value = "'.$row['id_cartDetail'].'">Xóa</button></td>
                          </tr>
                          ';
                        $totalPrice += ($price*$row['qty']);
                    }
                  }
                }
              ?>
              <tr class="totalCash">
                <td>Tổng Tiền:</td>
                <?php 
                  if(isset($_SESSION['user'])) {
                    if ($totalPrice > 0) {
                      echo '<td colspan="7" class="showTotalCash">'.number_format($totalPrice).' đ</td>';
                    } else {
                      echo '<td colspan="7" class="showTotalCash">Giỏ Hàng Trống</td>';
                    }
                    
                  } else {
                    echo '
                      <td colspan="7" class="showTotalCash">Giỏ Hàng Trống</td>
                    ';
                  }
                ?>
              </tr>
            </table>
            <div class="form-submit">
              <a href="./insertOrder1.php" id="linkInsertOrder">Đặt Hàng Ngay</a>
            </div>
          </form>
          <?php 
            if (isset($_SESSION['user'])) {
              if (isset($_POST['deleteCart'])) {
                $conn = connectDB();
                $idCartDetail = $_POST['deleteCart'];
                $sql1 = "DELETE FROM cart WHERE cart.idCartDetail =".$idCartDetail.""; // xóa giỏi hàng có mã hàng chi tiết đấy
                $conn -> query($sql1);

                $sql2= "DELETE FROM cartdetail WHERE cartdetail.id_cartDetail =".$idCartDetail.""; // xóa giỏ hàng chi tiết
                $conn -> query($sql2);
                header("location: ./giohang.php");
              }
              
            }
          ?>
          </div>
        <!-- end showcart -->
      </div>
      <!-- end content -->
    </main>
    <!-- end main -->
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

  <script>
   var valCash = document.querySelector('.showTotalCash').innerHTML
   if (valCash == "0 VND") {
     document.querySelector('.error').style.display = "flex";
   } else{
    document.querySelector('.error').style.display = "none";
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
    window.location.assign("../Login/index.php");
  } else {
    history.back();
  }
</script>
<?php } ?>