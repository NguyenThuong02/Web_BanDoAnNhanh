<?php 
    require_once('../../ConnectDB/connectDB.php');
    ob_start();
    session_start();
    if ($_SESSION['user']['isAdmin'] !=1 ) {
        header("location: ../../Login/");
    } else {
        global $idCustomer;
        $idCustomer = $_SESSION['user']['idUser'];
        require_once('../../Library/library.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản Lý Sản Phẩm</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="../../images/logoToc.jfif" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
      <link rel="stylesheet" href="./style_product.css">
  </head>
  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../index.php">
                            <?php logo(1) ?>
                            <span>Quản Lý PoDo</span>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <?php avatar($idCustomer,2)?>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="../../Login/logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Đăng Xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                <?php avatar($idCustomer,3)?>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="../../Login/logout.php"><i class="ti-layout-sidebar-left"></i>Đăng Xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 p-b-0">
                                <form class="form-material" action="../Order_AD/order_detail.php" method="get">
                                    <div class="form-group form-primary">
                                        <input type="text" name="idDH" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Tìm Đơn Hàng</label>
                                    </div>
                                </form>
                            </div>
                            <div class="pcoded-navigation-label">Chức Năng</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Tổng Quát</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">V1</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
                                        <span class="pcoded-mtext">Quản Lý Hệ Thống</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="./index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Lý Sản Phẩm</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../Category_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Lý Loại Sản Phẩm</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="../Customer_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Lý Khách Hàng</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../Comment_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Lý Bình Luận</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../Slider_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Trị Slider</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../Discount_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản trị mã giảm giá</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">V2</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../Order_AD/index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-truck"></i><b>C</b></span>
                                        <span class="pcoded-mtext">Đơn Hàng</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">V3</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../Statistics_AD/index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                                        <span class="pcoded-mtext">Thống Kê</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">V4</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../Setting/index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-cogs"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">Cài Đặt</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Quản Lý Sản Phẩm</h5>
                                            <p class="m-b-0">Quản lý các sản phẩm của bạn !</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="inp__product">
                                        <h1 class="title_product_list">Danh Sách Sản Phẩm</h1>
                                        <form id="form__input__product" action="" method="post" enctype="multipart/form-data">
                                        <h1 class="title_product_add">Thêm Sản Phẩm Mới</h1>
                                          <div class="inp__product__content">
                                            <div class="form__group code__product">
                                              <label for="">Mã Sản Phẩm</label>
                                              <input type="text" id="inp__code__product" name="idProduct" value="auto code" />
                                            </div>
                                            <!-- end code__product -->
                                            <div class="form__group view__product">
                                              <label for="">Số Lượt Xem</label>
                                              <input type="text" id="view__product" value="0" disabled/>
                                            </div>
                                            <!-- end view__product -->
                                            <div class="form__group name__product">
                                              <label for="">Tên Sản Phẩm</label>
                                              <input type="text" id="inp__name__product" name="inpNameProduct" class="valInp" required/>
                                            </div>
                                            <!-- end name__product -->
                                            <div class="form__group price__product">
                                              <label for="">Đơn Giá</label>
                                              <input type="text" id="inp__price__product" name="inpPriceProduct" class="valInp" required/>
                                            </div>
                                            <!-- end price__product -->
                                            <div class="form__group discount__product">
                                              <label for="">Giảm Giá</label>
                                              <input type="text" id="inp__discount__product" name="inpDiscount" class="valInp" required/>
                                            </div>
                                            <!-- end discount__product -->
                                            <div class="form__group img__product">
                                              <label for="">Hình Ảnh</label>
                                              <input type="file" name="upFile" id="inp__img" class="valInp" accept=".jpg, .jpeg, .png, .jfif" required/>
                                            </div>
                                            <!-- end img__product -->
                                            <div class="form__group category__product">
                                              <label for="">Loại Sản Phẩm</label>
                                              <select name="inpSelectCategory" id="inp__category" required>
                                                <option value="">-- Chọn Loại SP --</option>
                                                <?php 
                                                    $conn = connectDB();
                                                    $result = $conn -> query("SELECT * FROM category");
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()){
                                                            echo'
                                                                <option value="'.$row['id_category'].'">'.$row['nameCategory'].'</option>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                              </select>
                                            </div>
                                            <!-- end category__product -->
                                            <div class="form__group dateAdd__product">
                                              <label for="">Ngày Nhập</label>
                                              <input type="date" name="inpDate" id="inp__date" class="valInp" required/>
                                            </div>
                                            <!-- end dateAdd__product -->
                                            
                                            <div class="form__group dateAdd__product">
                                              <label for="">Thông Tin Sản Phẩm</label>
                                              <textarea rows="10" cols="100" name="product_desc" id="product_desc" placeholder="Nhập Thông Tin Sản Phẩm"></textarea>
                                            </div>
                                            <!-- end dateAdd__product -->
                                            
                                          </div>
                                          <div class="bnt_product">
                                            <button class="bnt_add" id="bnt__add__data" name="bnt_insert_data" value="Thêm Mới">Thêm mới</button>
                                            <button class="bnt_retype" onclick="return reInput()">Nhập lại</button>
                                            <button class="bnt_showList" onclick="return showListproduct()">Danh sách</button>
                                          </div>
                                          <!-- end bnt_product -->
                                        </form>
                                            <?php 
                                                // insert data
                                                $conn = connectDB();
                                                if (isset($_POST['bnt_insert_data']) and $_POST['bnt_insert_data'] == 'Thêm Mới') {
                                                    $valNameProduct = $_POST['inpNameProduct']; // nameProduct
                                                    $valPriceProduct = $_POST['inpPriceProduct']; // price product
                                                    $valDiscount = $_POST['inpDiscount']; // Discount
                                                    // img product 
                                                    $nameIMG = $_FILES['upFile']['name'];
                                                    $tmp_name = $_FILES['upFile']['tmp_name'];
                                                    move_uploaded_file($tmp_name, "../../images/". $nameIMG);
                                                    // end img product
                                                    $valSelectCategory = $_POST['inpSelectCategory']; // category
                                                    $valDate = $_POST['inpDate']; //date
                                                    $informationProduct = $_POST['product_desc']; // information product

                                                    $sql = "INSERT INTO product VALUES (null,'$valNameProduct','$valPriceProduct','$valDiscount','$nameIMG','$informationProduct','$valSelectCategory',0,'$valDate')";
                                                    if ($conn->query($sql)) {
                                                        echo '<span class="notification__success">Bạn Đã Thêm Thành Công !</span>';
                                                    } else {
                                                        echo '<span class="notification__fail">Không Thể Thêm Sản Phẩm Này. Vui lòng thử lại !</span>';
                                                    }
                                                }
                                                // update dữ liệu
                                                else if (isset($_POST['bnt_insert_data']) and $_POST['bnt_insert_data'] == 'Cập Nhật') {
                                                    $valIdProduct = $_POST['idProduct'];
                                                    $valNameProduct = $_POST['inpNameProduct']; // nameProduct
                                                    $valPriceProduct = $_POST['inpPriceProduct']; // price product
                                                    $valDiscount = $_POST['inpDiscount']; // Discount
                                                    $urlImage = $_POST['upFile']; //img
                                                    $valSelectCategory = $_POST['inpSelectCategory']; // category
                                                    $valDate = $_POST['inpDate']; //date
                                                    $informationProduct = $_POST['product_desc']; // information product

                                                    $result = $conn->query("UPDATE product SET nameProduct = '".$valNameProduct."', price = '".$valPriceProduct."', discount = '".$valDiscount."', image = '".$urlImage."', product.describe='".$informationProduct."',id_category = '".$valSelectCategory."', date ='".$valDate."' WHERE product.id_product = ".$valIdProduct."");
                                                    if (!$result) {
                                                        echo '<span class="notification__fail">Sửa Thất Bại !</span>';
                                                    } else {
                                                        echo '<span class="notification__success">Sửa Thành Công !</span>';
                                                        echo '<script>
                                                                setTimeout(function(){
                                                                    window.location.assign("./index.php");
                                                                }, 2000);
                                                                </script>';
                                                    }
                                                }
                                            
                                            ?>


                                      </div>
                                      <!-- end input__product -->
                                      <form id="form__show__list" action="" method="post">
                                        <div class="show__list">
                                          <div class="show__list__content">
                                            <table>
                                                <tr>
                                                    <th class="checkbox"></th>
                                                    <th>Hình Ảnh</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Đơn Giá</th>
                                                    <th>Giảm Giá</th>
                                                    <th>Thông Tin</th>
                                                    <th>Loại Hàng</th>
                                                    <th colspan="2">Chức Năng</th>
                                                </tr>
                                                <?php 
                                                    $conn = connectDB();
                                                    $result = $conn -> query("SELECT P.image, P.nameProduct,P.price, P.discount, P.describe, C.nameCategory, P.id_product  FROM product P INNER JOIN category C ON P.id_category = C.id_category");
                                                    if ($result ->  num_rows > 0) {
                                                        while($row = $result ->  fetch_assoc()){
                                                            echo '
                                                                <tr>
                                                                    <td><input type="checkbox" name="checkbox[]" value="'.$row['id_product'].'"/></td>
                                                                    <td class="show__list__img" ><img src="../../images/'.$row['image'].'"></td>
                                                                    <td>'.$row['nameProduct'].'</td>
                                                                    <td>'.number_format($row['price']).'đ</td>
                                                                    <td>'.$row['discount'].'%</td>
                                                                    <td>'.substr($row['describe'], 0 , 100).'...</td>
                                                                    <td>'.$row['nameCategory'].'</td>
                                                                    <td class="box__bnt">
                                                                    <button class="bnt__product product__edit" name="edit" value="'.$row['id_product'].'">Sửa</button>
                                                                    </td>
                                                                    <td class="box__bnt">
                                                                    <button class="bnt__product product__delete" onclick="return confirmDelete()" name="delete" value="'.$row['id_product'].'">Xóa</button>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </table>
                                          </div>
                                          <!-- end show__list__conten -->
                                          <div class="manage__product">
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__product" onclick="return selectChekboxAll()">
                                                Chọn Tất Cả
                                              </button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__product" onclick="return closeChekboxAll()">
                                                Bỏ Chọn Tất Cả
                                              </button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__product" name="bntSelectChoose" onclick="return confirmDelete()">
                                                Xóa Các Mục Đã Chọn
                                              </button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__product" onclick="showAddproduct()">
                                                Nhập Thêm
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- show list -->
                                      </form>
                                      <?php 
                                        // xóa nhiều dữ liệu
                                        if (isset($_POST['bntSelectChoose'])) {
                                            $conn = connectDB();
                                            if (isset($_POST['checkbox'])) {
                                                $valCheckbox = $_POST['checkbox'];
                                                foreach ($valCheckbox as $value) {
                                                    // xóa bảng order
                                                    $resultA = $conn -> query("SELECT * FROM oderdetail WHERE oderdetail.id_product = ".$value."");
                                                    if ($resultA -> num_rows > 0) {
                                                        while($rowA = $resultA -> fetch_assoc()) {
                                                            $conn -> query("DELETE FROM orderr WHERE orderr.id_oderDetail = ".$rowA['id_oderDetail']."");
                                                        }
                                                    }

                                                    //  xóa bảng order detail
                                                    $conn -> query("DELETE FROM oderdetail WHERE oderdetail.id_product = ".$value."");

                                                    // xóa bảng cart
                                                    $resultB = $conn -> query("SELECT * FROM  cartdetail WHERE cartdetail.id_product = ".$value."");
                                                    if ($resultB -> num_rows > 0) {
                                                        while($rowB = $resultB ->  fetch_assoc()) {
                                                            $conn -> query("DELETE FROM cart WHERE cart.idCartDetail = ".$rowB['id_cartDetail']."");
                                                        }
                                                    }

                                                    // xóa bảng cartdetail
                                                    $conn -> query("DELETE FROM cartdetail WHERE cartdetail.id_product = ".$value."");


                                                    // xóa bảng comment
                                                    $conn -> query("DELETE FROM comment WHERE comment.id_product = ".$value."");

                                                    // xóa bảng feedback
                                                    $conn -> query("DELETE FROM feedback WHERE feedback.idProduct = ".$value."");

                                                    // xóa sản phẩm
                                                    $resultFinal = $conn -> query("DELETE FROM product WHERE product.id_product = ".$value."");
                                                }
                                                if ($resultFinal) {
                                                   echo '<span class="notification__success">Xóa Thành Công !</span>';
                                                   echo '<script>
                                                   setTimeout(function(){
                                                       window.location.assign("./index.php");
                                                   }, 2000);
                                                   </script>';
                                                } else {
                                                    echo '<span class="notification__fail">Xóa Thất Bại !</span>';
                                                }
                                            }
                                        }
                                        // xóa lần lượt
                                        if(isset($_POST['delete'])) {
                                            $valSP = $_POST['delete'];
                                            $conn = connectDB();
                                            // xóa bảng order
                                            $resultA = $conn -> query("SELECT * FROM oderdetail WHERE oderdetail.id_product = ".$valSP."");
                                            if ($resultA -> num_rows > 0) {
                                                while($rowA = $resultA -> fetch_assoc()) {
                                                    $conn -> query("DELETE FROM orderr WHERE orderr.id_oderDetail = ".$rowA['id_oderDetail']."");
                                                }
                                            }

                                            //  xóa bảng order detail
                                            $conn -> query("DELETE FROM oderdetail WHERE oderdetail.id_product = ".$valSP."");

                                            // xóa bảng cart
                                            $resultB = $conn -> query("SELECT * FROM  cartdetail WHERE cartdetail.id_product = ".$valSP."");
                                            if ($resultB -> num_rows > 0) {
                                                while($rowB = $resultB ->  fetch_assoc()) {
                                                    $conn -> query("DELETE FROM cart WHERE cart.idCartDetail = ".$rowB['id_cartDetail']."");
                                                }
                                            }

                                            // xóa bảng cartdetail
                                            $conn -> query("DELETE FROM cartdetail WHERE cartdetail.id_product = ".$valSP."");


                                            // xóa bảng comment
                                            $conn -> query("DELETE FROM comment WHERE comment.id_product = ".$valSP."");

                                            // xóa bảng feedback
                                            $conn -> query("DELETE FROM feedback WHERE feedback.idProduct = ".$valSP."");

                                            // xóa sản phẩm
                                            $resultFinal = $conn -> query("DELETE FROM product WHERE product.id_product = ".$valSP."");
                                            if ($resultFinal) {
                                                echo '<span class="notification__success">Xóa Thành Công !</span>';
                                                echo '<script>
                                                        setTimeout(function(){
                                                            window.location.assign("./index.php");
                                                        }, 2000);
                                                        </script>';
                                            } else {
                                                echo '<span class="notification__fail">Xóa Thất Bại !</span>';
                                            }

                                        }

                                        // hiển thị dữ liệu để sửa
                                        if (isset($_POST['edit'])) {
                                            $valSP = $_POST['edit'];
                                            $result = $conn->query("SELECT * FROM product WHERE id_product = '".$valSP."'");
                                            if ($result->num_rows > 0) {
                                                // hiện thị dữ liệu
                                                $row = $result->fetch_assoc();
                                                echo "
                                                    <script type='text/javascript'>
                                                    document.getElementById('bnt__add__data').innerHTML = 'Cập Nhật';
                                                    document.getElementById('bnt__add__data').value = 'Cập Nhật';
                                                
                                                    document.getElementById('inp__code__product').value = '".$row['id_product']."';
                                                    document.getElementById('view__product').value = '".$row['view']."';
                                                    document.getElementById('inp__name__product').value = '".$row['nameProduct']."';
                                                    document.getElementById('inp__price__product').value = '".$row['price']."';
                                                    document.getElementById('inp__discount__product').value = '".$row['discount']."';
                                                    document.getElementById('inp__category').value = '".$row['id_category']."';
                                                    document.getElementById('inp__date').value = '".$row['date']."';
                                                    document.getElementById('product_desc').value = '".$row['describe']."';
                                                    document.querySelector('.title_product_add').innerText = 'Sửa Sản Phẩm';
                                                    document.querySelector('#inp__img').type = 'text';
                                                    document.querySelector('#inp__img').value = '".$row['image']."';
                                                </script>
                                                ";
                                                
                                            }
                                        }
                                      
                                      ?>
                                </div>
                            </div>
                            <!-- Main-body start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="../assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="../assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Custom js -->
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/vertical/vertical-layout.min.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script src="./jsProduct.js"></script>
</body>

</html>
<?php 
    }
?>



<!-- <div class="form__group special__product">
    <label for="">Sản Phẩm Đặc Biệt</label>
    <div class="inp__choose__special">
        <div class="inp__special__item">
            <input type="radio" name="inp__special__item">
            <label for="">Đặc Biệt</label>
        </div>
        <div class="inp__special__item">
            <input type="radio" name="inp__special__item">
            <label for="">Bình Thường</label>
        </div>
    </div>
</div> -->
<!-- end special__product -->\
<!-- // script 

        // var resetRadio = document.querySelectorAll(".inp__choose__special input");
        // resetRadio.forEach((item, index) => {
        //     item.checked = false;
        // })

-->