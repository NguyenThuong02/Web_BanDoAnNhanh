<?php 

// hiển thị logo
function logo($note){
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM information ");
    $row = $result -> fetch_assoc();
    if ($note == 0) {
        echo '
            <img class="img-fluid" src="../images/'.$row['logo'].'" alt="Theme-Logo" />
        ';
    } else if ($note ==1) {
        echo '
            <img class="img-fluid" src="../../images/'.$row['logo'].'" alt="Theme-Logo" />
        ';
    } else if ($note ==2) {
        echo '
            <img src="./images/'.$row['logo'].'" alt="logo PoDo" />
        ';
    } else if ($note ==3) {
        echo '
            <img src="./images/'.$row['logo'].'" alt="logo PoDo" />
        ';
    }
}

//  hiển thị đường link tới trang quản trị nếu đăng nhập bằng tài khản Admin (1)
function disAdmin($note) {
    if(isset($_SESSION['user'])) {
        $conn = connectDB();
        global $idCustomer; 
        $idCustomer = $_SESSION['user']['idUser'];
        $result = $conn -> query("SELECT isAdmin FROM user WHERE idUser = ".$idCustomer."");
        $row = $result -> fetch_assoc();
        if ($row['isAdmin']==1) {
            if ($note == 0) {
                echo '<div class="linkAdmin">
                        <a href="./Admin/"><i class="fab fa-expeditedssl"></i> Quản Trị Trang Web</a>
                        </div>';
            } else if ($note ==1) {
                echo'<div class="linkAdmin">
                        <a href="../Admin/"><i class="fab fa-expeditedssl"></i> Quản Trị Trang Web</a>
                    </div>';
                
            }
        }
      }
}

//  hiển thị đường link tới trang quản trị nếu đăng nhập bằng tài khản Admin(2)
function disAdmin2($note) {
  if(isset($_SESSION['user'])) {
      $conn = connectDB();
      global $idCustomer; 
      $idCustomer = $_SESSION['user']['idUser'];
      $result = $conn -> query("SELECT isAdmin FROM user WHERE idUser = ".$idCustomer."");
      $row = $result -> fetch_assoc();
      if ($row['isAdmin']==1) {
          if ($note == 0) {
              echo '<div class="linkAdmin">
                      <a href="../Admin/"><i class="fab fa-expeditedssl"></i> Quản Trị Trang Web</a>
                      </div>';
          } else if ($note ==1) {
              echo'<div class="linkAdmin">
                      <a href="../Admin/"><i class="fab fa-expeditedssl"></i> Quản Trị Trang Web</a>
                  </div>';
              
          }
      }
    }
}
// hiên thi avata comment 
function disAvata() {
  if(isset($_SESSION['user'])) {
    $conn = connectDB();
        $idCustomer = $_SESSION['user']['idUser'];
        $result = $conn -> query("SELECT userName,image FROM user WHERE idUser = ".$idCustomer."");
        $row = $result -> fetch_assoc();
          echo '<img src="../images/avata/'.$row['image'].'" class = "avata_comment_top" alt="">';
  }
}

// hiện thì ảnh khi đẵ đăng nhập nếu chưa đăng nhập thì hiện thị đăng nhập đăng ký
function disLogin($note) {
    if(isset($_SESSION['user'])) {
        $conn = connectDB();
        $idCustomer = $_SESSION['user']['idUser'];
        $result = $conn -> query("SELECT userName,image FROM user WHERE idUser = ".$idCustomer."");
        $row = $result -> fetch_assoc();
        if ($note ==0) {
            echo '
            <span class="showUser">
              <div class="user__name" onclick="showNavUser()">
                <img src ="./images/avata/'.$row['image'].'" class="img__avatar">
                <span class="userName">'.$row['userName'].'</span>
                <i class="fas icon_down_user">&#xf107;</i>
              </div>
              <div class="show__nav__user">
                <ul>
                  <li><a href="./UserManager/order.php">Đơn Hàng</a></li>
                  <li><a href="./UserManager/historyOrder.php">Lịch Sử Mua Hàng</a></li>
                  <li><a href="./UserManager/settingUser.php">Tài Khoản</a></li>
                  <li><a class="disMobl" href="./Login/logout.php">Đăng Xuất</a></li>
                </ul>
              </div>
            </span>
            ';
        }else if ($note ==1) {
                echo '
                <span class="showUser">
              <div class="user__name" onclick="showNavUser()">
                <img src ="../images/avata/'.$row['image'].'" class="img__avatar">
                <span class="userName">'.$row['userName'].'</span>
                <i class="fas icon_down_user">&#xf107;</i>
              </div>
              <div class="show__nav__user">
                <ul>
                  <li><a href="../UserManager/order.php">Đơn Hàng</a></li>
                  <li><a href="../UserManager/historyOrder.php">Lịch Sử Mua Hàng</a></li>
                  <li><a href="../UserManager/settingUser.php">Tài Khoản</a></li>
                  <li><a href="../Login/logout.php">Đăng Xuất</a></li>
                </ul>
              </div>
            </span>
            
                ';
            }
            else if ($note ==3) {
              echo '
              <span class="showUser">
              <div class="user__name" onclick="showNavUser()">
                <img src ="../images/avata/'.$row['image'].'" class="img__avatar">
                <span class="userName">'.$row['userName'].'</span>
                <i class="fas icon_down_user">&#xf107;</i>
              </div>
              <div class="show__nav__user">
                <ul>
                  <li><a href="../UserManager/order.php">Đơn Hàng</a></li>
                  <li><a href="../UserManager/historyOrder.php">Lịch Sử Mua Hàng</a></li>
                  <li><a href="../UserManager/settingUser.php">Tài Khoản</a></li>
                  <li><a href="../Login/logout.php">Đăng Xuất</a>
                </ul>
              </div>
            </span>
            ';
          }
    } else {
        echo '
          <a class="hover__bg" href="./Login/creatLogin.php" style = "display: inline;" href="">Đăng Ký</a>
          <a class="hover__bg" href="./Login/index.php" style = "display: inline;" href="">Đăng Nhập</a>
        ';
    }
      
}

// hiện thị giỏ hàng và số lượng sản phẩm đang có trong giỏ hàng

function cart($note) {
    if (isset($_SESSION['user'])) {
        $idCustomer = $_SESSION['user']['idUser'];
        $conn = connectDB();
        $resultCount = $conn -> query("SELECT CD.id_cartDetail FROM cart C INNER JOIN cartdetail CD INNER JOIN user U INNER JOIN product P ON C.id_user = U.idUser AND C.idCartDetail = CD.id_cartDetail AND CD.id_product = P.id_product AND U.idUser =".$idCustomer."");
        $countCart = $resultCount -> num_rows;
        if ($note == 0) {
            echo'
              <div class="cart_icon">
                <i class="fas fa-shopping-cart"></i>
                <sub>'.$countCart.'</sub>
              </div>';
        } else if ($note == 1) {
            echo'
              <div class="cart_icon">
                <i class="fas fa-shopping-cart"></i>
                <sub>'.$countCart.'</sub>
              </div>';
        }
      }
}

// show scombo
function showProductHot () {
    $conn = connectDB();
              $result = $conn->query("SELECT * FROM product WHERE id_category = 32");
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '
                    <a href="./Product_Detail/sanpham.php?id='.$row['id_product'].'">
                      <div class="item-product-hot">
                        <div class="item-product-hot-img">
                          <img src="./images/'.$row['image'].'" alt=""/>
                          <span class="discount">- '.$row['discount'].'%</span>
                          <span class="price">'.number_format($row['price']-$row['discount']/100).' đ</span>
                        </div>
                        <div class="item-product-information">
                          <p class="name-product">'.$row['nameProduct'].'</p>

                        </div>
                      </div>
                      <!-- end  item-product-hot-->
                    </a>
                  ';
                }
              }
}










// Mua Ngay
// <span class="price-product">'.number_format($row['price']).' đ</span>

// 
// show sản phẩm theo loại tham số truyền vào là mã loại
function showProductCategory($category) {
    $conn = connectDB();
    $result = $conn->query("SELECT * FROM product WHERE id_category = '".$category."' LIMIT 0,8");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="item-product-hot">
          <div class="item-product-hot-img">
            <img src="./images/'.$row['image'].'" alt="" />
            <a href="./Product_Detail/sanpham.php?id='.$row["id_product"].'">Mua Ngay</a>
            <span class="discount">- '.$row['discount'].'%</span>
          </div>
          <div class="item-product-information">
            <a href="./Product_Detail/sanpham.php?id='.$row["id_product"].'" class="name-product">'.substr($row['nameProduct'],0,24).'</a>
            <span class="priceSaled-product">'.number_format(ceil(($row['price']-($row['price']*$row['discount'])/100))).' đ</span>
            <span class="price-product">'.number_format($row['price']).' đ</span>

          </div>
        </div>
        <!-- end  item-product-hot-->
        ';
      }
    }
}

//  đếm số lượt xem
function updateView() {
    if (isset($_GET['id'])) {
        $conn = connectDB();
        $idProduct = $_GET['id'];
        $conn->query("UPDATE product SET view = view + 1 WHERE product.id_product = ".$idProduct."");
    }
}

// thêm sản phẩm vào giỏ hàng
// buy now 
function buyProduct() {
    if (isset($_GET['id'])) {
        if (isset($_POST['bnt_buyNow']) || isset($_POST['bnt_add_cart']) ) { 
          $conn = connectDB();  
          $size = $_POST['listChooseSize']; //size
          $idProduct = $_GET['id']; //id sản phẩm
          $idCustomer = $_SESSION['user']['idUser']; //id user
          $qty = $_POST['valQty']; // số lượng

          $sql1 = "INSERT INTO cartdetail VALUES (null,'$idProduct','$qty','$size')";
          $result2 = $conn ->query($sql1);

          $result = $conn -> query("SELECT max(id_cartDetail) AS 'id_cartDetail' FROM cartdetail");
          $row = $result->fetch_assoc();

          $sql2 = "INSERT INTO cart VALUES (null,".$idCustomer.",".$row['id_cartDetail'].")";
          $result3 = $conn ->query($sql2);
          
          if (isset($_POST['bnt_buyNow'])) {
            header('location: ../Cart/giohang.php');
          } else if(isset($_POST['bnt_add_cart'])){
            header('location: ../');
          }
        }
      }
}

// hiển thị thông tin sản phẩm
// show information product
function productInF($idProduct) {
    if (isset($_GET['id'])) {
        $conn = connectDB();
        $result = $conn->query("SELECT * FROM product WHERE id_product=".$idProduct."");
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
          <div class="details_product_title">
              <h2>'.$row['nameProduct'].'</h2>
          </div>
          <div class="details_content">
            <p>'.$row['describe'].'</p>
          </div>
        '; 
      }
    }
      
}

// Hiển thị các sản phẩm tương tự
function showProductSimilar($idProduct) {
    if(isset($_GET['id'])) {
        $conn = connectDB();
        $result = $conn->query("SELECT * FROM product WHERE id_product=".$idProduct."");
        if ($result->num_rows > 0) {
        $rowParent = $result->fetch_assoc();
            $result = $conn -> query("SELECT * FROM product WHERE id_category = ".$rowParent['id_category']." AND id_product != ".$idProduct." ORDER BY RAND() LIMIT 0, 4");
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo '
                <div class="item-product-hot">
                <div class="item-product-hot-img">
                  <img src="../images/'.$row['image'].'" alt="" />
                  <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'">Mua Ngay</a>
                  <span class="discount">- '.$row['discount'].'%</span>
                </div>
                <div class="item-product-information">
                  <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'" class="name-product">'.substr($row['nameProduct'],0,24).'</a>
                  <span class="priceSaled-product">'.number_format(ceil(($row['price']-($row['price']*$row['discount'])/100))).' đ</span>
                  <span class="price-product">'.number_format($row['price']).' đ</span>
      
                </div>
              </div>
              <!-- end  item-product-hot-->
                ';
              }
            }
        }
      }
    
}

// Hiện thị bình luân của khách hàng trong từng sản phẩm
function showCommentProduct() {
    if (isset($_GET['id'])) {
        $idProduct = $_GET['id'];
        $conn = connectDB();
        $result = $conn -> query("SELECT * FROM product PR INNER JOIN comment CM INNER JOIN user U ON CM.id_product = PR.id_product AND CM.user_id = U.idUser  WHERE CM.disabled NOT IN (1) AND PR.id_product=".$idProduct."");
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            echo '
              <div class="comment_item">
                <div class="id_name_member">
                    <div class="show__account">
                        <img src ="../images/avata/'.$row['image'].'" class="img__avatar">
                        <span>'.$row['userName'].'</span>
                    </div>
                    <div class="time__comment">'.$row['date'].'</div>
                </div>
                <!-- end id_name_member -->
                <div class="content_comment_member">
                  <p>'.$row['content'].'</p>
                </div>
              </div>
              <!-- end comment_item -->
              ';
          }
        }
      }
    
}


//  hiển thị sản phẩm theo danh mục
function showProductCategory2($category) {
    $conn = connectDB();
    if ($category==0) {
      $result = $conn->query("SELECT * FROM product");
    } else {
      $result = $conn->query("SELECT * FROM product WHERE id_category = '".$category."'");
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="item-product-hot">
          <div class="item-product-hot-img">
            <img src="../images/'.$row['image'].'" alt="" />
            <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'">Mua Ngay</a>
            <span class="discount">- '.$row['discount'].'%</span>
          </div>
          <div class="item-product-information">
            <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'" class="name-product">'.$row['nameProduct'].'</a>
            <span class="priceSaled-product">'.number_format(ceil(($row['price']-($row['price']*$row['discount'])/100))).' đ</span>
            <span class="price-product">'.number_format($row['price']).' đ</span>
          </div>
        </div>
        <!-- end  item-product-hot-->
        ';
      }
    }
}

// hiện thị theo nhiều loại sản phẩm
function showListCategory($category) {
  $conn = connectDB();
  foreach($category as $value){
    $result = $conn->query("SELECT * FROM product WHERE id_category = '".$value."'");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="item-product-hot">
          <div class="item-product-hot-img">
            <img src="../images/'.$row['image'].'" alt="" />
            <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'">Mua Ngay</a>
            <span class="discount">- '.$row['discount'].'%</span>
          </div>
          <div class="item-product-information">
            <a href="../Product_Detail/sanpham.php?id='.$row["id_product"].'" class="name-product">'.$row['nameProduct'].'</a>
            <span class="priceSaled-product">'.number_format(ceil(($row['price']-($row['price']*$row['discount'])/100))).' đ</span>
            <span class="price-product">'.number_format($row['price']).' đ</span>
          </div>
        </div>
        <!-- end  item-product-hot-->
        ';
      }
    }
  }
}

// hiển thị các loại sản phẩm trong danh mục -> trang sản phẩm
function showCategory($idCategory) {
  $conn = connectDB();
  if ($idCategory==0) {
    $result = $conn -> query("SELECT * FROM category");
    if ($result -> num_rows >0) {
      echo'<li><span class="label-Sp">Tất cả</span><input type="checkbox" name="" onclick="chekboxAll()" checked="checked" onsubmit="submit()"></li>';
      while ($row = $result ->fetch_assoc()) {
        echo'
          <li><span class="label-Sp">'.$row['nameCategory'].'</span><input type="checkbox" checked="checked" class="valCheckbox" name="valCheckbox[]" value="'.$row['id_category'].'"></li>
        ';
      }
    }
  } else {
    $result = $conn -> query("SELECT * FROM category");
    if ($result -> num_rows >0) {
      echo'<li><span class="label-Sp">Tất cả</span><input type="checkbox" name="" onclick="chekboxAll()" onsubmit="submit()"></li>';
      while ($row = $result ->fetch_assoc()) {
        if ($row['id_category']==$idCategory) {
        echo'<li><span class="label-Sp">'.$row['nameCategory'].'</span><input type="checkbox" class="valCheckbox" name="valCheckbox[]" checked="checked" value="'.$row['id_category'].'"></li>';
        } else {
        echo' <li><span class="label-Sp">'.$row['nameCategory'].'</span><input type="checkbox" class="valCheckbox" name="valCheckbox[]" value="'.$row['id_category'].'"></li>';
        }
      }
    }
  }
}


// hiển thị từ khóa tìm kiếm
function disTxtSearch($txtSearch) {
  echo '<span class="disTxtSearch">- '.$txtSearch.'</span>';
}

// hiển thị thông báo
function showNotification($idUser) {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM notification WHERE id_user = ".$idUser." ORDER BY id DESC ");
  if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      echo '
        <li>
          <div class="show_Notification-item">
            <h5>'.$row['title'].'</h5>
            <p>'.$row['content'].'<span class="codeDiscount"> '.$row['value'].'</span></p>
          </div>
        </li>';
    }
  } else {
    echo '<li><div class="show_Notification-item"><h5>Chưa có thông báo nào !</h5></div></li>';
  }
  
}

//  hiển thị số lượt thông báo
function showCountNotification($idUser) {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM notification WHERE id_user = ".$idUser." ORDER BY id DESC ");
  if ($result -> num_rows > 0) {
    echo $result -> num_rows;
  } else {
    echo "0";
  }
}


// hiển thị giỏ hàng khi hover vào nút giỏ hàng

function showCartMini($idCustomer, $note) {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM cart C INNER JOIN cartdetail CD INNER JOIN user U INNER JOIN product P ON C.id_user = U.idUser AND C.idCartDetail = CD.id_cartDetail AND CD.id_product = P.id_product AND U.idUser =".$idCustomer."");
  if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      if ($note == 1) {
        echo '
        <li>
          <img src="./images/'.$row['image'].'" alt="">
          <div class="information_product">
            <span class="name_product">'.$row['nameProduct'].' <i class="price__item_cart">X '.$row['qty'].'</i></span>
            <span class="totalCash">'.number_format($row['price']).' đ</span>
          </div>
          <div class="delete_cart">
            <button name="deleteCart" value = "'.$row['id_cartDetail'].'"><i class="fas fa-trash-alt"></i></button>
          </div>
        </li>
      ';
      } else if ($note == 2) {
        echo '
        <li>
          <img src="../images/'.$row['image'].'" alt="">
          <div class="information_product">
            <span class="name_product">'.$row['nameProduct'].' <i class="price__item_cart">X '.$row['qty'].'</i></span>
            <span class="totalCash">'.number_format($row['price']).' đ</span>
          </div>
          <div class="delete_cart">
            <button name="deleteCart" value = "'.$row['id_cartDetail'].'"><i class="fas fa-trash-alt"></i></button>
          </div>
        </li>
      ';
      }
    }
  } else {
    echo '<li class="cartEmpty">Giỏ Hàng Trống !</li>';
  }

}

// hiện thị đơn hàng trong userManager
function showOdered($idCusomer, $codeOrder) {
  $conn = connectDB();
  global $totalCashPro;
  $totalCashPro = 0;
  $result = $conn -> query("SELECT P.image, P.nameProduct, OD.qty, P.id_product, OD.price FROM orderr O INNER JOIN oderdetail OD INNER JOIN product P ON O.id_oderDetail = OD.id_oderDetail AND OD.id_product = P.id_product WHERE O.idUser = ".$idCusomer." AND O.codeOrder = '".$codeOrder."'");
  if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()) {
      echo '
      <div class="product_oder-item">
        <div class="product_oder-item-img">
          <img src="../images/'.$row['image'].'" alt="">
        </div>
        <!-- end product_oder-item-img -->
        <div class="product_oder-item-information">
          <a href="../Product_Detail/sanpham.php?id='.$row['id_product'].'"><h4>'.$row['nameProduct'].'</h4></a>
          <span>Số Lượng: '.$row['qty'].'</span>
        </div>
        <div class="product_oder-item-cash">Đơn Giá: <i>'.number_format($row['price']).' đ</i></div>
      </div>
      <!-- end product_oder-item  -->
      ';
      $totalCashPro += ($row['price']*$row['qty']);
    }
  }
}

// tính tổng tiền của từng đơn hàng 
// function totalCashOrder($idCusomer, $orderDate) {
//   $conn = connectDB();
//   $totalCash = 0;
//   $result = $conn -> query("SELECT * FROM orderr O INNER JOIN oderdetail OD INNER JOIN product P ON O.id_oderDetail = OD.id_oderDetail AND OD.id_product = P.id_product WHERE O.idUser = ".$idCusomer." AND O.dateOrder = '".$orderDate."'");
//   if($result -> num_rows > 0){
//     while($row = $result -> fetch_assoc()) {
//       $totalCash += ((($row['price']-($row['price']*$row['discount'])/100))*$row['qty']);
//     }
//   }
//   return number_format($totalCash);
// }

// hủy đơn hàng

function cancelOrder() {
  if (isset($_POST['bntCancel'])) {
    $conn = connectDB();
    $codeOrder = $_POST['bntCancel'];
    $conn -> query("UPDATE orderr SET status = 6 WHERE orderr.codeOrder = '".$codeOrder."' AND orderr.idUser = ".$_SESSION['user']['idUser']."");
    header("Refresh:0");
  }
}

// xác nhận đã nhận hàng
function successOrder() {
  if (isset($_POST['bntSuccess'])) {
    $conn = connectDB();
    $codeOrder = $_POST['bntSuccess'];
    $conn -> query("UPDATE orderr SET status = 5 WHERE orderr.codeOrder = '".$codeOrder."' AND orderr.idUser = ".$_SESSION['user']['idUser']."");
  }
}
// tạo mã giảm giá mặc định
function str_rand($len) {
  $str = '';
  $times = ceil($len/32);
  for ($i = 0; $i < $times; $i++) {
      $str .= md5(rand());
  }
  return substr($str, 0, $len);
}
// lưu mã code vào database
function insertCode($codeDiscount,$idCustomer ) {
  $conn = connectDB();
  $date = date('Y-m-j');
  $newdate = strtotime ( '+3 month' , strtotime ( $date ) ) ;
  $newdate = date ( 'Y-m-j' , $newdate );
  $conn -> query("INSERT INTO codediscount VALUES(null,'".$codeDiscount."',100,'".$newdate."',0,".$idCustomer.")");
}
// lưu thông tin đơn hàng vào session
function addDataSession($fullName,$mail,$phone,$adress,$txtNote) {
  if (!isset($_SESSION['infOrder'])) {
    if (empty($txtNote)) {
      $txtNote = 'Không';
    }
    $_SESSION['infOrder'] = array();
    $_SESSION['infOrder']['fullName'] = $fullName;
    $_SESSION['infOrder']['mail'] = $mail;
    $_SESSION['infOrder']['phone'] = $phone;
    $_SESSION['infOrder']['adress'] = $adress;
    $_SESSION['infOrder']['txtNote'] = $txtNote;
  }
}

// sử dụng mã giảm giá 
function apllyDiscount() {
  if (isset($_GET['inpCode'])) {
    unset($_SESSION['infOrder']['feeShip']);
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM codediscount WHERE codeContent = '".$_GET['inpCode']."'");
    if ($result -> num_rows > 0) {
      while($row = $result -> fetch_assoc()){
        if ($row['id_user'] == $_SESSION['user']['idUser'] && $row['count'] < 1) {
          if ($row['endDate'] > date("Y-m-d")) {
            echo '<li><span>Bạn đã được giảm <i>'.$row['discount'].'</i> % phí ship</span></li>';
            $_SESSION['infOrder']['feeShip'] = ((100-$row['discount'])/100)*70;
            $conn -> query("UPDATE codediscount SET codediscount.count = codediscount.count + 1 WHERE codediscount.codeContent = '".$_GET['inpCode']."'");
          } else {
            echo '<li><span>Mã Code Này Đã Hết Hạn</span></li>';
            $_SESSION['infOrder']['feeShip'] = 35000;
          }
        } else if(empty($row['id_user'])) {
          echo '<li><span>Bạn đã được giảm <i>'.$row['discount'].'</i> % phí ship</span></li>';
          $_SESSION['infOrder']['feeShip'] = ((100-$row['discount'])/100)*35000;
          $conn -> query("UPDATE codediscount SET codediscount.count = codediscount.count + 1 WHERE codediscount.codeContent = '".$_GET['inpCode']."'");
        } else {
          echo '<li><span>Mã Code Không Hợp Lệ</span></li>';
          $_SESSION['infOrder']['feeShip'] = 35000;
        }

      } 

    } else {
      echo '<li><span>Mã Code Này Không Tồn Tại !</span></li>';
      $_SESSION['infOrder']['feeShip'] = 35000;
    }
  } else {
    $_SESSION['infOrder']['feeShip'] = 35000;
  }
}

// hiện thị số lượng mã giảm giá có thể dùng
function countCodeDiscount($idUser) {
  $conn = connectDB();
  $countCode = 0;
  $result =$conn -> query("SELECT COUNT(codediscount.codeContent) AS 'count1' FROM codediscount WHERE codediscount.count < 1 AND codediscount.id_user = ".$idUser."  AND date(codediscount.endDate)-date(NOW()) > 0");
  if($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
    $countCode += $row['count1'];
  }

  $resultA = $conn -> query("SELECT COUNT(codediscount.codeContent) AS 'count2' FROM codediscount WHERE codediscount.id_user IS null AND date(codediscount.endDate)-date(NOW()) > 0");
  if($resultA -> num_rows > 0) {
    $rowA = $resultA -> fetch_assoc();
    $countCode += $rowA['count2'];
  }
  return $countCode;
}

//  hiện thị gợi ý các mã chưa dùng
function showListCodeDiscount($idUser) {
  $conn = connectDB();
  $result =$conn -> query("SELECT * FROM codediscount WHERE codediscount.count < 1 AND codediscount.id_user = ".$idUser."  AND date(codediscount.endDate)-date(NOW()) > 0");
  if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()){
      echo '<li class ="listCode"><i class="fas fa-plus-circle"></i><span>'.$row['codeContent'].'</span> - giảm '.$row['discount'].'% phí vận chuyển </li>';
    }
  }

  $resultA = $conn -> query("SELECT * FROM codediscount WHERE codediscount.id_user IS null AND date(codediscount.endDate)-date(NOW()) > 0");
  if($resultA -> num_rows > 0) {
    while($rowA = $resultA -> fetch_assoc()){
      echo '<li class ="listCode"><i class="fas fa-plus-circle"></i><span>'.$rowA['codeContent'].'</span> - giảm '.$rowA['discount'].'% phí vận chuyển </li>';
    }
  }
}







// lưu dữ liệu đặt hàng vào database
// ghi chú: phần này phải insert dữ liệu vào 2 bảng trong đó có bảng oder và orderDetail.
//  Để có thể insert nhiều bảng cùng lúc thì phải sử dụng vòng lặp. có bao nhiêu sản phẩm trong giỏ hàng thì phải lặp lại bấy nhiêu lần
//  phải inset bảng oderDetail trước sau đó mới insert được bảng order (! phần này hơi khó hiểu đọc kỹ nhé ae!!)
// 
function insertOrder() {
  $idUser = $_SESSION['user']['idUser'];
  $fullName = $_SESSION['infOrder']['fullName'];
  $phone = $_SESSION['infOrder']['phone'];
  $mail = $_SESSION['infOrder']['mail'];
  $adress = $_SESSION['infOrder']['adress'];
  $txtNote = $_SESSION['infOrder']['txtNote'];
  $feeShip = $_SESSION['infOrder']['feeShip'];
  $codeOrder = ('DH00'.str_rand(5));
  $conn = connectDB();
  $result1 = $conn -> query("SELECT * FROM cart C INNER JOIN cartdetail CD INNER JOIN user U INNER JOIN product P ON C.id_user = U.idUser AND C.idCartDetail = CD.id_cartDetail AND CD.id_product = P.id_product AND U.idUser =".$_SESSION['user']['idUser']."");
  if ($result1 -> num_rows > 0) {
    while($row = $result1 -> fetch_assoc()){
      $price = $row['price']-($row['price']*$row['discount'])/100;
      $conn -> query("INSERT INTO oderdetail VALUES (null, ".$row['id_product'].", ".$price.", ".$row['qty'].",'".$row['size']."') ");

      $result2 = $conn -> query("SELECT max(id_oderDetail) AS 'id_oderDetail' FROM oderdetail");
      $row1 = $result2->fetch_assoc();

      $conn -> query("INSERT INTO orderr VALUES (null,'".$codeOrder."' ,".$idUser.",".$row1['id_oderDetail'].", 1, '".$fullName."', '".$phone."', '".$mail."', '".$adress."', '".$txtNote."', ".$feeShip.", current_timestamp(), '')");

    }
  }

  // Saukhi lưu được dữ liệu vào order rồi thì tiến hành xóa bảng cart
  $conn -> query("DELETE FROM cart WHERE cart.id_user = ".$idUser."");
  
}

// gửi mail khi đặt hàng thành công

function sentMail() {
  $conn = connectDB();
  $idCustomer = $_SESSION['user']['idUser'];
  $contentProduct = '';
  $totalCash = 0;
  $result = $conn -> query("SELECT * FROM cart C INNER JOIN cartdetail CD INNER JOIN user U INNER JOIN product P ON C.id_user = U.idUser AND C.idCartDetail = CD.id_cartDetail AND CD.id_product = P.id_product AND U.idUser =".$idCustomer."");
  while($row = $result -> fetch_assoc()){
    $price = ($row['price']-($row['price']*$row['discount'])/100);
    $contentProduct .= "
    <tr>
      <td>".$row['nameProduct']."</td>
      <td>".$row['qty']."</td>
      <td>".$row['size']."</td>
      <td>".number_format($price)." đ</td>
    </tr>
    ";
    $totalCash += $price*$row['qty'];
  }
  $email_to = $_SESSION['user']['email'];
  $subject = "Đặt Hàng Thành Công Trên PoDo";
  $message = '
              <html>
                  
                  <img src="https://popofastfood.000webhostapp.com/images/logoPopo.png" width="200px" alt="">
                  <h2>Bạn đã đặt hàng thành công trên PoDo</h2>
                  <div><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost/duAn1/UserManager/order.php"></div>
                  <div class="content">
                    <table>
                      <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Size</th>
                        <th>Đơn Giá</th>
                      </tr>
                      '.$contentProduct.'
                      <hr>
                      <tr>
                        <td>Tổng Tiền Hàng: </td>
                        <td colspan="7">'.number_format($totalCash).' đ</td>
                      </tr>
                      <tr>
                        <td>Phí Ship: </td>
                        <td colspan="7">'.number_format($_SESSION['infOrder']['feeShip']).' đ</td>
                      </tr>
                      <tr>
                        <td>Tổng Tiền: </td>
                        <td colspan="7">'.number_format(($_SESSION['infOrder']['feeShip']+$totalCash)).' đ</td>
                      </tr>
                    </table>
                    <br>
                    <a href="http://localhost/DuAn1/UserManager/order.php">Xem Đơn Hàng</a>
                  </div>
              </html>';

  $headers = "From:popo.fastfoodfpt@gmail.com \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($email_to, $subject, $message, $headers);
}

// hàm thông báo (Khi đăng ký tài khoản mới, khi đặt hàng thành công, khi thay đổi trạng thái)

function insertNotification($title, $content, $value, $idUser) {
  $conn = connectDB();
  $conn -> query("INSERT INTO notification VALUES (null,'".$title."','".$content."','".$value."',".$idUser.")");
}

//hiện thị lịch sử đơn hàng
function showHistoryOrderProduct($codeOrder, $idCustomer) {
  $connF = connectDB();
  global $totalHistoryItemPrice;
  $totalHistoryItemPrice = 0;
  $resultF = $connF -> query("SELECT P.nameProduct, P.id_product, OD.qty, OD.price FROM orderr O INNER JOIN oderdetail OD INNER JOIN product P ON O.id_oderDetail = OD.id_oderDetail AND OD.id_product = P.id_product WHERE O.idUser = ".$idCustomer." AND O.codeOrder = '".$codeOrder."'");
  if ($resultF -> num_rows > 0) {
    while($rowF = $resultF -> fetch_assoc()) {
          echo "| <a href='../Product_Detail/sanpham.php?id=".$rowF['id_product']."'>".$rowF['nameProduct']."</a>"." |";
          $totalHistoryItemPrice += ($rowF['price']*$rowF['qty']);
    }
  }
}

//  hiển thị các quận huyện
function showDistrict() {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM location_district WHERE location_district.provinceid = '01TTT'");
  if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      echo '<option value="'.$row['districtid'].'">'.$row['name'].'</option>';
    }
  }
}

// data Quận huyện ajax 
function dataLocation() {
    $conn = connectDB();
    if (isset($_POST['idDistrictA'])) {
      $key = $_POST['idDistrictA'];
      $resultA = $conn -> query("SELECT * FROM location_ward WHERE location_ward.districtid = '".$key."'");
      if ($resultA -> num_rows > 0) {
          while($rowA = $resultA -> fetch_assoc()) {
              echo '<option value="'.$rowA['wardid'].'">'.$rowA['name'].'</option>';
          }
      }
    }
}

// hiện thị số sao (điểm số feedback)

function showStar($countStar) {
    for ($i=0; $i < $countStar; $i++) { 
      echo '<i class="fas fa-star"></i>';
    }
    for ($j = 0; $j < 5-$i; $j++) {
      echo '<i class="far fa-star"></i>';
    }
}
// lấy ra url của hiện Tại
function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
      $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}              
// lưu dữ liệu feedback
function insertFeedBack($idUser, $codeOrder, $pointStar, $contentFeedback) {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM orderr O INNER JOIN oderdetail OD ON O.id_oderDetail = OD.id_oderDetail WHERE O.codeOrder = '".$codeOrder."' AND O.idUser = ".$idUser."" );
  while ($row = $result ->fetch_assoc()) {
    $conn -> query("INSERT INTO feedback VALUES (null, ".$idUser.", ".$row['id_product'].", '".$contentFeedback."', ".$pointStar.", null)");
  }
}

// update ảnh đại diện user
function updateAvatar($img, $idUser) {
  $conn = connectDB();
  $conn -> query("UPDATE user SET image = '".$img."' WHERE idUser = ".$idUser."");
  header("Refresh:0");
}

// hiện thị Thông tin liên hệ
function personalInformation($idUser) {
  
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM user WHERE idUser = ".$idUser."");
  $row = $result -> fetch_assoc();
  echo '
  <div class="from_group_item">
      <label for="">Họ và Tên:</label>
      <input type="text" required name="txtFullName" disabled value="'.$row['fullName'].'">
  </div>
  <div class="from_group_item">
      <label for="">Email:</label>
      <input type="text" required name="txtEmail" disabled value="'.$row['email'].'">
  </div>
  <div class="from_group_item">
      <label for="">Số Điện Thoại:</label>
      <input type="text" required  name="txtPhone" disabled value="'.$row['phone'].'">
  </div>
  <div class="from_group_item">
      <label for="">Địa Chỉ:</label>
      <input type="text" required  name="txtadress" disabled value="'.$row['adress'].'">
  </div>';
}

function editPassWord($idUser,$passTrue,$passOld,$passNew){
  if ($passTrue == md5($passOld)) {
    $conn = connectDB();
    $result = $conn -> query("UPDATE user SET passWord = '".md5($passNew)."' WHERE user.idUser = ".$idUser.";");
    if ($result) {
      echo '<span style="color: green;">Bạn đã thay đổi mật khẩu thành công</span>';
      $_SESSION['user']['passWord'] = md5($passNew);
    } else {
      echo "Không thể thay đổi mật khẩu !";
    }
  } else {
    echo 'Sai mật khẩu. Vui lòng nhập lại !';
  }
}

// hiện thị số điện thoại của website
function showPhoneWeb() {
  $conn = connectDB();
  $result = $conn->query("SELECT * FROM information");
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['phone'];
  }
}










// -------------------------- Admin --------------------
// admin: avata admin
function avatar($id,$note) {
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM user WHERE idUser = '".$id."'");
    $row = $result -> fetch_assoc();
    if ($note == 0) {
        echo '
            <img src=".././images/avata/'.$row['image'].'" class="img-radius" alt="User-Profile-Image">
            <span>'.$row['userName'].'</span>
        ';
    } else if ($note ==1) {
        echo '
            <img class="img-80 img-radius" src=".././images/avata/'.$row['image'].'" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">'.$row['userName'].'<i class="fa fa-caret-down"></i></span>
            </div>
        ';
    }
    else if ($note ==2){
        echo '
            <img src="../../images/avata/'.$row['image'].'" class="img-radius" alt="User-Profile-Image">
            <span>'.$row['userName'].'</span>
        ';
    }
    else if ($note ==3){
        echo '
            <img class="img-80 img-radius" src="../../images/avata/'.$row['image'].'" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">'.$row['userName'].'<i class="fa fa-caret-down"></i></span>
            </div>
        ';
    }
}
// admin:  vai trò  khách hàng
function role() {
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM role");
    if ($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
            echo '
                <option value="'.$row['id_role'].'">'.$row['nameRole'].'</option>
            ';

        }
    }

}

// admin: up imager
function upFile($name,$url) {
    $nameIMG = $_FILES[$name]['name'];
    $tmp_name = $_FILES[$name]['tmp_name'];
    move_uploaded_file($tmp_name, $url. $nameIMG);
    return $nameIMG;
}

// admin:  insert into customer
function insertCustomer($userName,$passWord,$emailCustomer,$isAdmin,$role,$nameUrlImgae) {
    $conn = connectDB();
    $result = $conn -> query("INSERT INTO user (idUser, userName, passWord, email, isAdmin, id_role, image) VALUES (null,'".$userName."','".md5($passWord)."','".$emailCustomer."',b'".$isAdmin."',".$role.",'".$nameUrlImgae."')");
    if ($result) {
      echo '<span class="notification__success">Bạn Đã Thêm Thành Công !</span>';
    } else {
      echo '<span class="notification__fail">Không Thể Thêm Mới. Vui Lòng Thử Lại !</span>';
    }
}

// admin: update customer
function updateCustomer($idCustomer,$userName,$emailCustomer,$isAdmin,$role,$nameUrlImgae) {
    $conn = connectDB();
    $result = $conn->query("UPDATE user SET userName = '".$userName."', email = '".$emailCustomer."', isAdmin= b'".$isAdmin."',id_role = '".$role."', image ='".$nameUrlImgae."' WHERE user.idUser = ".$idCustomer."");
    if (!$result) {
      echo '<span class="notification__fail">Sửa Thất Bại. Vui Lòng Thử Lại !</span>';
    } else {
      echo '<span class="notification__success">Sửa Thành Công !</span>';
    }
}

// admin: delete select customer
 function deleteCustomer($valCheckbox) {
     $conn = connectDB();
    foreach ($valCheckbox as $idCustomer) {
        $resultFinalB = $conn -> query("UPDATE user SET disabled = b'0' WHERE user.idUser = ".$idCustomer."");
        if (isset($resultFinalB)) {
            if (!$resultFinalB) {
              echo '<span class="notification__fail">Bỏ Chặn Thất Bại. Vui Lòng Thử Lại !</span>';
            } else {
              echo '<script>
              alert("Bạn đã khôi phục thành công !");
              window.location.assign("./index.php");
              </script>';
            }
        }
    }
 }

 // admin: delete customer in turn 
 function deleteInTurn($idCustomer) {
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM user WHERE idUser = ".$idCustomer."");
    $row = $result -> fetch_assoc();
    if ($row['disabled'] != 1) {

      $resultFinal = $conn -> query("UPDATE user SET disabled = b'1' WHERE user.idUser = ".$idCustomer."");
      if (!$resultFinal) {
        echo '<span class="notification__fail">Chặn Thất Bại. Vui Lòng Thử Lại !</span>';
      } else {
        echo '<script>
        alert("Bạn đã vô hiệu hóa thành công !");
        window.location.assign("./index.php");
        </script>';
      }
    } else {

      $resultFinal = $conn -> query("UPDATE user SET disabled = b'0' WHERE user.idUser = ".$idCustomer."");
      if (!$resultFinal) {
        echo '<span class="notification__fail">Bỏ Chặn Thất Bại. Vui Lòng Thử Lại !</span>';
      } else {
        echo '<script>
        alert("Bạn đã khôi phục thành công !");
        window.location.assign("./index.php");
        </script>';
      }
    }

 }

 // admin:  hiển thị thông tin khi click vào nút sửa
 function showData() {
    if (isset($_POST['editCustomer'])) {
        $conn = connectDB();
        $idCustomer = $_POST['editCustomer'];
        $result = $conn->query("SELECT * FROM user WHERE idUser='".$idCustomer."'");
        if ($result->num_rows > 0) {
            // hiện thị dữ liệu
            $row = $result->fetch_assoc();
            echo "
                <script type='text/javascript'>
                document.getElementById('bnt_add_data').innerHTML = 'Cập Nhật';
                document.getElementById('bnt_add_data').value = 'Cập Nhật';
                document.getElementById('code__customer').value = '".$row['idUser']."';
                document.getElementById('name__customer').value = '".$row['userName']."';
                document.getElementById('email__customer').value = '".$row['email']."';
                document.getElementById('role').value = '".$row['id_role']."';
                document.getElementsByName('inpSpecial')[".$row['isAdmin']."].checked = 'checked';
                document.querySelector('.title__customer__add').innerText = 'Sửa Thành Viên';
                document.querySelectorAll('.pass__customer')[0].style.display = 'none';
                document.querySelector('#pass__customer').disabled = true;
                document.querySelectorAll('.pass__customer')[1].style.display = 'none';
                document.querySelector('#en__pass__customer').disabled = true;
                document.querySelector('#inp__img').type = 'text';
                document.querySelector('#inp__img').value = '".$row['image']."';
            </script>
            ";
            
        }
    }
 }

 // admin: tổng quan về số bình luận của sản phẩm
 function showComment() {
     $conn = connectDB();
     $result = $conn -> query("SELECT bl.id_product, hh.nameProduct , COUNT(*) AS 'countComment' , MAX(bl.date) AS 'maxDate', MIN(bl.date) AS 'minDate' FROM comment bl JOIN product hh ON hh.id_product=bl.id_product WHERE bl.disabled NOT IN (1) GROUP BY bl.id_product HAVING countComment > 0");
     if ($result -> num_rows > 0) {
         while($row = $result -> fetch_assoc()) {
            echo '
            <tr>
                <td>'.$row['nameProduct'].'</td>
                <td>'.$row['countComment'].'</td>
                <td>'.$row['minDate'].'</td>
                <td>'.$row['maxDate'].'</td>
                <td class="box__bnt">
                <a href="./commentDetail.php?idProduct='.$row['id_product'].'"><button class="bnt__comment comment__edit">Chi Tiết</button></a>
                </td>
            </tr> 
             
            ';
         }
     }


 }

//  admin: hiển thị tên sản phẩm trong phần quản trị bình luận chi tiết
 function showProductName ($idProductCM) {
    $conn = connectDB();
    $result = $conn -> query("SELECT * FROM product WHERE id_product = ".$idProductCM."");
    $nameProduct = $result -> fetch_assoc();
    echo '<h3>| '.$nameProduct['nameProduct'].'</h3>';
 }

//  admin: hiển thị quản lý bình luận chi tiết
 function showCommentDetail($idProductCM) {
    $conn = connectDB();
    $result = $conn -> query("SELECT U.image, U.userName, CM.date, CM.content, CM.id_comment FROM comment CM INNER JOIN user U  INNER JOIN product P ON CM.user_id = U.idUser AND CM.id_product = P.id_product WHERE CM.disabled NOT IN (1) AND CM.id_product= '".$idProductCM."' ORDER BY CM.date DESC ");
    if ($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()){
            echo '
                <div class="item_comment">
                    <div class="header_comment">
                        <div class="user">
                            <img src="../../images/avata/'.$row['image'].'" alt="">
                            <span>'.$row['userName'].'</span>
                        </div>
                        <div class="time_comment">
                            <span>'.$row['date'].'</span>
                        </div>
                    </div>
                    <!-- end header_comment -->
                    <div class="content_comment">
                        <p>'.$row['content'].'</p>
                        <div class="bnt-delete_comment">
                            <button name="bntDelete" value="'.$row['id_comment'].'">Ẩn</button>
                        </div>
                    </div>
                    <!-- end content_comment -->
                </div>
                <!-- end item_comment -->
            ';
        }
    } else {
      echo '<h5 style="color: #b51f1f;">Không có bình luận nào !</h5>';
    }
    
 }

//  admin: phản hồi bình luận với khách hàng trong mục quản trị bình luận
 function sentComment($contentCM,$idProduct,$idCustomer) {
     $conn = connectDB();
     $result = $conn -> query("INSERT INTO comment VALUE (null,'".$contentCM."',".$idCustomer.",null,".$idProduct.")");
     if ($result) {
         header("location: ./commentDetail.php?idProduct=".$idProduct."");
     } else {
         echo 'Không thể bình luận';
     }

 }

//  admin: xóa bình luận trong mục quản lý bình luận
 function deleteComment($idComment) {
    $conn = connectDB();
    $result = $conn -> query("UPDATE comment SET disabled = b'1' WHERE comment.id_comment = ".$idComment."");
    if ($result) {
    header("Refresh:0");
    } else {
        echo "Không thể xóa bình luận";
    }
 }
//admin: show slider
function showEditPoster() {
  $conn = connectDB();
  $result = $conn ->query("SELECT *FROM poster");
  if ($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
    echo'
      <div class="banner_item">
        <div class="title_item">
            <span>Poster 1</span>
        </div>
        <div class="content_banner">
            <img src="../../images/'.$row['image1'].'" alt="">
            <button name="bntValueBanner" value="1">Chỉnh Sửa</button>
            <span>'.$row['image1'].'</span>
        </div>
      </div>
      <div class="banner_item">
        <div class="title_item">
            <span>Poster 2</span>
        </div>
        <div class="content_banner">
            <img src="../../images/'.$row['image2'].'" alt="">
            <button name="bntValueBanner" value="2">Chỉnh Sửa</button>
            <span>'.$row['image2'].'</span>
        </div>
      </div>
      <div class="banner_item">
        <div class="title_item">
            <span>Poster 3</span>
        </div>
        <div class="content_banner">
            <img src="../../images/'.$row['image3'].'" alt="">
            <button name="bntValueBanner" value="3">Chỉnh Sửa</button>
            <span>'.$row['image3'].'</span>
        </div>
      </div>
    ';
  }
}
//admin: edit slider
function editSlider($valSlider) {
  $conn = connectDB();
  $result = $conn -> query("SELECT *FROM poster");
  $row = $result -> fetch_assoc();
  if ($valSlider == 1) {
    echo '
    <form action="" method="post" enctype="multipart/form-data">
      <div class="edit__banner">
          <div class="title__edit__banner">
              <h3>Thay đổi Poster</h3>
          </div>
          <div class="content__edit__banner">
              <div class="show__banner__edit">
                  <img src="../../images/'.$row['image1'].'" alt="">
                  <span>'.$row['image1'].'</span>
              </div>
              <div class="between__banner__edit">
                  <i class="fas fa-arrow-right"></i>
              </div>
              <div class="input__banner__edit">
                  <input type="file" name="upFile" accept=".jpg, .jpeg, .png, .jfif" required>
              </div>
          </div>
          <div class="submit__edit__banner">
              <button name="bntEditSider" value="1">Thay Đổi</button>
          </div>
      </div>
    </form>
    ';
  } else if ($valSlider == 2) {
    echo '
    <form action="" method="post" enctype="multipart/form-data">
      <div class="edit__banner">
          <div class="title__edit__banner">
              <h3>Thay đổi ảnh slider</h3>
          </div>
          <div class="content__edit__banner">
              <div class="show__banner__edit">
                  <img src="../../images/'.$row['image2'].'" alt="">
                  <span>'.$row['image2'].'</span>
              </div>
              <div class="between__banner__edit">
                  <i class="fas fa-arrow-right"></i>
              </div>
              <div class="input__banner__edit">
                  <input type="file" accept=".jpg, .jpeg, .png, .jfif" name="upFile" required>
              </div>
          </div>
          <div class="submit__edit__banner">
          <button name="bntEditSider" value="2">Thay Đổi</button>
          </div>
      </div>
    </form>
    ';
  } else if ($valSlider == 3) {
    echo '
    <form action="" method="post" enctype="multipart/form-data">
      <div class="edit__banner">
          <div class="title__edit__banner">
              <h3>Thay đổi ảnh slider</h3>
          </div>
          <div class="content__edit__banner">
              <div class="show__banner__edit">
                  <img src="../../images/'.$row['image3'].'" alt="">
                  <span>'.$row['image3'].'</span>
              </div>
              <div class="between__banner__edit">
                  <i class="fas fa-arrow-right"></i>
              </div>
              <div class="input__banner__edit">
                  <input type="file" accept=".jpg, .jpeg, .png, .jfif" name="upFile" required>
              </div>
          </div>
          <div class="submit__edit__banner">
          <button name="bntEditSider" value="3">Thay Đổi</button>
          </div>
      </div>
    </form>
    ';
  }
}

//admin: update Poster
function updatePoster($idPoster, $nameImg) {
  $conn = connectDB();
  if ($idPoster == 1 ) {
    $result = $conn->query("UPDATE poster SET image1 ='".$nameImg."' WHERE poster.id_poster = 4");
  } else if ($idPoster == 2 ) {
    $result = $conn->query("UPDATE poster SET image2 ='".$nameImg."' WHERE poster.id_poster = 4");
  } else if ($idPoster == 3 ) {
    $result = $conn->query("UPDATE poster SET image3 ='".$nameImg."' WHERE poster.id_poster = 4");
  }
  if ($result) {
    echo "<span class='alert'>Thay Thành Công !</span>";
    header("location: ./index.php");
  } else {
    echo "<span class='alert'>Thay Không Thành Công !</span>";
  }
}
//
function updateLogoSetting($img) {
  $conn = connectDB();
  $conn -> query("UPDATE information SET logo = '".$img."'");
  header("Refresh:0");
}
// nameimg 
function nameImgLogo() {
  $conn = connectDB();
  $result = $conn -> query("SELECT logo FROM information");
  $row = $result -> fetch_assoc();
  echo '<span>'.$row['logo'].'</span>';
}
// nameimg 
function nameimg($idUser) {
  $conn = connectDB();
  $result = $conn -> query("SELECT image FROM user WHERE user.idUser = ".$idUser."");
  $row = $result -> fetch_assoc();
  echo '<span>'.$row['image'].'</span>';
}

// admin showAdress
function showAdress() {
  
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM information");
  $row = $result -> fetch_assoc();
  echo '
  <div class="from_group_item">
      <label for="">Địa Chỉ:</label>
      <input type="text" required name="txtAdress" disabled value="'.$row['address1'].'">
  </div>';
}

// admin updateAdress
function updateAddress($txtAdress) {
  try {
    $conn = connectDB();
    $conn -> query("UPDATE information SET address1 = '".$txtAdress."'");
    header('Refresh:0');
  } catch (Exception $e) {
    echo '<p>Cập Nhật Lỗi</p>';
  }
}
// admin updateAdress
function updatePersonalInformation($fullName, $email, $phone, $adress, $idUser) {
  try {
    $conn = connectDB();
    $conn -> query("UPDATE user SET fullName = '".$fullName."', email = '".$email."', phone = '".$phone."', adress = '".$adress."' WHERE idUser = ".$idUser."");

    // cập nhật session
    $_SESSION['user']['fullName'] = $fullName;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['phone'] = $phone;
    $_SESSION['user']['adress'] = $adress;
    header('Refresh:0');
  } catch (Exception $e) {
    echo '<p>Email này đã được sử dụng</p>';
  }
}
// admin showContact
function showContact() {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM information");
  $row = $result -> fetch_assoc();
  echo '
    <div class="from_group_item">
      <label for="">Số Điện Thoại:</label>
      <input type="number" name="txtNumber" required placeholder="(+84)" disabled value="'.$row['phone'].'">
    </div>
    <div class="from_group_item">
      <label for="">Email:</label>
      <input type="email" name="txtEmail" required disabled value="'.$row['email'].'">
    </div>';
                                                        
}

// admin updateContact
function updateContact($valPhone, $valEmail) {
  $conn = connectDB();
  $result = $conn -> query("UPDATE information SET phone = '".$valPhone."', email = '".$valEmail."';");
  header('Refresh:0');
}

// Hiện thị các sản phẩm của đơn hàng đó
function showProductOrderItem($idCusomer, $codeOrder) {
  global $totalCashProduct;
  $totalCashProduct = 0;
  $connA = connectDB();
  $resultA = $connA -> query("SELECT P.image, P.id_product, P.nameProduct, OD.price, OD.size, OD.qty FROM orderr O INNER JOIN oderdetail OD INNER JOIN product P ON O.id_oderDetail = OD.id_oderDetail AND OD.id_product = P.id_product WHERE O.idUser = ".$idCusomer." AND O.codeOrder = '".$codeOrder."'");
  if ($resultA -> num_rows > 0) {
      while($rowA = $resultA -> fetch_assoc()) {
        echo '
            <div class="list-main-product-item">
              <div class="list-main-product-img">
                  <img src="../../images/'.$rowA['image'].'" alt="">
              </div>
              <div class="list-main-product-name">
                  <a href="../../Product_Detail/sanpham.php?id='.$rowA['id_product'].'">'.$rowA['nameProduct'].'</a>
                  <span class="price">Đơn Giá: <b>'.number_format($rowA['price']).' đ</b></span>
              </div>
              <div class="list-main-product-qty">
                  <span class="size">Size: <b>'.$rowA['size'].'</b></span>
                  <span class="qty">Số Lượng: <b>'.$rowA['qty'].'</b></span>
              </div>
            </div>
            <!-- end list-main-product-item -->
        ';
        $totalCashProduct += $rowA['qty']*$rowA['price'];
      }
  }
}

// Hiện thị các option trạng thái
function showStatus($statusNow) {
  $connB = connectDB();
  $resultB = $connB -> query("SELECT * FROM status WHERE status.id NOT IN (1,6) AND status.id > ".$statusNow."");
  if ($resultB -> num_rows > 0) {
      while($rowB = $resultB -> fetch_assoc()) {
        echo '<option value="'.$rowB['id'].'">'.$rowB['statusName'].'</option>';
      }
  }
}
// cập nhật trạng thái đơn hàng trong admin
function updateStatus($idCusomer, $codeOrder, $valStatus) {
    $connC = connectDB();
    $connC -> query("UPDATE orderr SET orderr.status = ".$valStatus." WHERE  orderr.idUser = ".$idCusomer." AND orderr.codeOrder = '".$codeOrder."'");
    
}
// hiển thị các mã code hiện tại đang có
function showCodeDiscount() {
  $conn = connectDB();
  $result = $conn -> query("SELECT * FROM codediscount WHERE codediscount.id_user IS null ORDER BY codediscount.endDate DESC");
  if ($result -> num_rows > 0) {
    $i = 0;
    while($row = $result -> fetch_assoc()) {
      $diff = intval(date_diff(date_create(date("Y-m-d")), date_create($row['endDate']))->format("%R%a"));
      if ($diff <= 0) {
        $status = "<span style='color: red;'>Đã Hết Hạn</span>";
      }
      else if($diff > 0) {
        $status = "<span style='color: green;'>Đang Hoạt Động</span>";
      }
      echo '
        <tr>
          <td>'.++$i.'</td>
          <td>'.$row['codeContent'].'</td>
          <td class="valueDiscount">'.$row['discount'].' %</td>
          <td>'.$row['count'].'</td>
          <td>'.$row['endDate'].'</td>
          <td>'.$status.'</td>
          <td class="bnt__function">
              <button class="bnt_delete"  name="bntDelete" value="'.$row['idCode'].'">Xóa</button>
              <button class="bnt_edit" name="bntEdit" value="'.$row['idCode'].'">Sửa</button>
          </td>
        </tr>
      ';
    }
  } else {
    echo "<p>Hiện không có mã nào !</p>";
  }
}


// Thêm mã giảm giá mới
function insertCodeDiscount($endDate, $valueDiscount) {
  $conn = connectDB();
  $result = $conn -> query("INSERT INTO codediscount VALUES(null, 'HQ".str_rand(6)."', ".$valueDiscount.", '".$endDate."', 0, null)");
  if ($result) {
    echo '<p style="color: green;">Bạn đã thêm thành công !</p>';
  } else {
    echo "<p style='color: red;'>Lỗi thêm mới.... Vui lòng thử lại !</p>";
  }
}

// sửa mã giảm giá
function updateCodeDiscount($endDate, $valueDiscount, $idCode) {
  $conn = connectDB();
  $result = $conn -> query("UPDATE codediscount SET discount = '".$valueDiscount."', endDate = '".$endDate."' WHERE codediscount.idCode = ".$idCode.";");
  if ($result) {
    echo "<p style='color: green;'>Bạn đã cập nhật thành công</p>";
  } else {
    echo "<p style='color: red;'>Cập nhật lỗi.... Vui lòng thử lại !</p>";
  }
}
// xóa mã giảm giá
function deleteCodeDiscount($idCode) {
  $conn = connectDB();
  $result = $conn -> query("DELETE FROM codediscount WHERE codediscount.idCode = ".$idCode."");
  if ($result) {
    echo "<p style='color: green;'>Bạn đã xóa thành công !</p>";
  } else {
    echo "<p style='color: red;'>Xóa lỗi.... Vui lòng thử lại !</p>";
  }
}

function showDateEdit($idCode) {
  $conn = connectDB();
    $result = $conn->query("SELECT * FROM codediscount WHERE idCode = ".$idCode."");
    if ($result->num_rows > 0) {
        // hiện thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            echo "
                <script type='text/javascript'>
                document.querySelector('.bnt__newCodeDiscount').innerHTML = 'Cập Nhật';
                document.querySelector('.bnt__newCodeDiscount').value = 'update';
                document.querySelector('.id__discount').value = '".$row['idCode']."';
                document.querySelector('.value__discount').value = '".$row['discount']."';
                document.querySelector('.date__discount').value = '".$row['endDate']."';
            </script>
            ";
        }
    }
}

// hiện thị dữ liệu option size
function showSizeOption() {
$conn = connectDB();
$result = $conn -> query("SELECT * FROM size");
if ($result -> num_rows > 0) {
  while($row = $result -> fetch_assoc()) {
    $valueX = "";
    if (!empty($row['size1'])) {
      $valueX = $row['size1'];
    }
    if (!empty($row['size2'])) {
      $valueX .= " ,".$row['size2'];
    }
    if (!empty($row['size3'])) {
      $valueX .= " ,".$row['size3'];
    }
    echo '<option value="'.$row['id_size'].'">'.$valueX.'</option>';
  }
}
}

?>