<?php 
    require_once('../../ConnectDB/connectDB.php');
    ob_start();
    session_start();
    if ($_SESSION['user']['isAdmin']!=1) {
        header("location: ../../Login/");
    } else {
        global $idCustomer;
        $idCustomer = $_SESSION['user']['idUser'];
        require_once('../../Library/library.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản Lý Loại Sản Phẩm</title>
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
      <link rel="stylesheet" href="./style_category.css">
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
                        <a href="../../">
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
                                <a href="" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
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
                                        <li class="">
                                            <a href="../Product_AD/index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Quản Lý Sản Phẩm</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="./index.php" class="waves-effect waves-dark">
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
                                            <h5 class="m-b-10">Quản Lý Loại Sản Phẩm</h5>
                                            <p class="m-b-0">Quản lý các loại sản phẩm của bạn !</p>
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
                                    <div class="inp__category">
                                        <form id="form__input__category" action="" method="post" enctype="multipart/form-data">
                                        <h1 class="title__category">Thêm Loại Hàng Mới</h1></h1>
                                          <div class="form__group name__category">
                                            <label for="">Tên Loại: </label>
                                            <input type="text" id="nameCategory" class="valInp" name="nameCategory" required />
                                          </div>
                                          <!-- end name__category -->
                                          <div class="form__group size__category">
                                            <label for="">Chọn Loại Size: </label>
                                            <select name="idSize" id="sizeID" class="valInp">
                                                <?php showSizeOption(); ?>
                                                
                                            </select>
                                          </div>
                                          <!-- end name__category -->
                                          <div class="form__group img__category">
                                            <label for="">Hình ảnh: </label>
                                            <input type="file" id="imgCategory" class="valInp" name="fileCategory" accept=".jpg, .jpeg, .png, .jfif" required/>
                                          </div>
                                          <!-- end img__category -->
                                          
                                          <div class="bnt_category">
                                            <button id="bnt_add" class="bnt_add" name="bnt_add"" value="Thêm Mới">Thêm mới</button>
                                            <button class="bnt_retype" onclick="reInput()">Nhập lại</button>
                                            <button class="bnt_showList" onclick="showListCategory()">Danh sách</button>
                                          </div>
                                          <!-- end bnt_category -->
                                        </form>
                                      </div>
                                      <?php 
                                      // them du lieu 
                                        $conn = connectDB();
                                        if (isset($_POST['bnt_add']) and $_POST['bnt_add'] == 'Thêm Mới') {
                                            $nameCategory = $_POST['nameCategory'];
                                            $idSize = $_POST['idSize'];
                                            $nameIMG = $_FILES['fileCategory']['name'];
                                            $tmp_name = $_FILES['fileCategory']['tmp_name'];
                                            move_uploaded_file($tmp_name, "../../images/". $nameIMG);
                                            $sql = "INSERT INTO category VALUES (null,'$nameCategory','$nameIMG', ".$idSize.")";
                                            if ($conn->query($sql)) {
                                                echo '<span class="notification__success">Bạn Đã Thêm Thành Công !</span>';
                                            } else {
                                                echo '<span class="notification__fail">Thêm Thất Bại. Vui Lòng Thử Lại !</span>';
                                            }
                                        }
                                        // update dữ liệu
                                        else if (isset($_POST['bnt_add']) and $_POST['bnt_add'] == 'Cập Nhật') {
                                            $idCategory = $_GET['edit'];
                                            $nameCategory = $_POST['nameCategory'];
                                            $idSize = $_POST['idSize'];
                                            $urlImage = $_POST['fileCategory'];
                                            $result = $conn->query("UPDATE category SET nameCategory='".$nameCategory ."',image='".$urlImage."', id_size = ".$idSize." WHERE id_category = '".$idCategory."'");
                                            if (!$result) {
                                                echo '<span class="notification__fail">Sửa Thất Bại. Vui Lòng Thử Lại !</span>';
                                            } else {
                                                echo '<span class="notification__success">Bạn Sửa Thành Công !</span>';
                                                echo '<script>
                                                                setTimeout(function(){
                                                                    window.location.assign("./index.php");
                                                                }, 2000);
                                                                </script>';
                                            }
                                        }
                                      
                                      ?>
                                      <!-- end input__category -->
                                    <form id="form__show__list" action="" method="post">
                                        <div class="show__list">
                                          <div class="show__list__content">
                                            <table>
                                              <tr>
                                                <th class="checkbox"></th>
                                                <th>Tên Loại</th>
                                                <th>Loại Size</th>
                                                <th>Hình Ảnh</th>
                                                <th colspan="2">Chức Năng</th>
                                              </tr>
                                              <?php 
                                              $conn = connectDB();
                                              $result = $conn -> query("SELECT * FROM category INNER JOIN size ON category.id_size = size.id_size");
                                              if ($result->num_rows > 0) {
                                                  while($row = $result-> fetch_assoc()) {
                                                      // lưu ý name của checkbox thì để kiểu mảng để có thể lấy data đc nhiều phần tử
                                                            // hiển thị tên size
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
                                                    echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="checkbox[]" value = "'.$row['id_category'].'"/></td>
                                                            <td>'.$row['nameCategory'].'</td>
                                                            <td>'.$valueX.'</td>
                                                            <td class="show__list__img" ><img src="../../images/'.$row['image'].'"></td>
                                                            <td class="box__bnt">
                                                            <button class="bnt__category category__edit" name ="edit" value="'.$row['id_category'].'">Sửa</button>
                                                            </td>
                                                            <td class="box__bnt">
                                                            <button class="bnt__category category__delete" onclick="return confirmDelete()" name ="delete" value="'.$row['id_category'].'">Xóa</button>
                                                            </td>
                                                        </tr>';
                                                  }
                                                }
                                              ?>
                                            </table>
                                          </div>
                                          <!-- end show__list__conten -->
                                          <div class="manage__category">
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__category" onclick="return selectChekboxAll()">Chọn Tất Cả</button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__category" onclick="return closeChekboxAll()">Bỏ Chọn Tất Cả</button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__category" name="bntDeletechoose" onclick="return confirmDelete()">Xóa Các Mục Đã Chọn</button>
                                            </div>
                                            <div class="bnt__chooseAll">
                                              <button class="bnt__category" onclick="showAddCategory()">Nhập Thêm</button>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- show list -->
                                        <!-- edit data -->
                                        <?php 
                                        // hiển thị dữ liệu để sửa
                                            if (isset($_POST['edit'])) {
                                                $valSP = $_POST['edit'];
                                                $result = $conn->query("SELECT * FROM category WHERE id_category = '".$valSP."'");
                                                if ($result->num_rows > 0) {
                                                    // hiện thị dữ liệu
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "
                                                            <script type='text/javascript'>
                                                            document.getElementById('bnt_add').innerHTML = 'Cập Nhật';
                                                            document.getElementById('bnt_add').value = 'Cập Nhật';
                                                            document.getElementById('sizeID').value = '".$row['id_size'] . "';
                                                            document.getElementById('nameCategory').value = '".$row['nameCategory'] . "';
                                                            document.querySelector('#imgCategory').type = 'text';
                                                            document.querySelector('.title__category').innerText = 'Sửa Loại Sản Phẩm';
                                                            document.querySelector('#imgCategory').value = '".$row['image']."';
                                                        </script>
                                                        ";
                                                    }
                                                }
                                            }
                                        ?>
                                    </form>
                                    <?php 
                                    
                                        // Xóa dữ liệu lần lượt 
                                        if(isset($_POST['delete'])) {
                                            $valML = $_POST['delete'];
                                            $conn = connectDB();
                                            $conn -> query("DELETE FROM product WHERE id_category = ".$valML."");
                                            $resultCC = $conn -> query("DELETE FROM category WHERE category.id_category = ".$valML."");
                                            if ($resultCC) {
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
                                        
                                        //  xóa nhiều dữ liệu
                                        if (isset($_POST['bntDeletechoose'])) {
                                            $conn = connectDB();
                                            if (isset($_POST['checkbox'])) {
                                                $valCheckbox = $_POST['checkbox'];
                                                // lặp các loại sản phẩm vừa chọn
                                                foreach ($valCheckbox as $value) {

                                                    //  lặp các sản phẩm có mã loại vừa chọn
                                                    $resultAA = $conn -> query("SELECT * FROM product WHERE id_category = ".$value."");
                                                    if ($resultAA -> num_rows > 0) {
                                                        while ($rowAA = $result-> fetch_assoc()) {
                                                            // xóa bảng order
                                                            $resultA = $conn -> query("SELECT * FROM oderdetail WHERE oderdetail.id_product = ".$rowAA['id_product']."");
                                                            if ($resultA -> num_rows > 0) {
                                                                while($rowA = $resultA -> fetch_assoc()) {
                                                                    $conn -> query("DELETE FROM orderr WHERE orderr.id_oderDetail = ".$rowA['id_oderDetail']."");
                                                                }
                                                            }

                                                            //  xóa bảng order detail
                                                            $conn -> query("DELETE FROM oderdetail WHERE oderdetail.id_product = ".$rowAA['id_product']."");

                                                            // xóa bảng cart
                                                            $resultB = $conn -> query("SELECT * FROM  cartdetail WHERE cartdetail.id_product = ".$rowAA['id_product']."");
                                                            if ($resultB -> num_rows > 0) {
                                                                while($rowB = $resultB ->  fetch_assoc()) {
                                                                    $conn -> query("DELETE FROM cart WHERE cart.idCartDetail = ".$rowB['id_cartDetail']."");
                                                                }
                                                            }

                                                            // xóa bảng cartdetail
                                                            $conn -> query("DELETE FROM cartdetail WHERE cartdetail.id_product = ".$rowAA['id_product']."");


                                                            // xóa bảng comment
                                                            $conn -> query("DELETE FROM comment WHERE comment.id_product = ".$rowAA['id_product']."");

                                                            // xóa bảng feedback
                                                            $conn -> query("DELETE FROM feedback WHERE feedback.idProduct = ".$rowAA['id_product']."");

                                                            // xóa sản phẩm 
                                                            $conn -> query("DELETE FROM product WHERE product.id_product = ".$rowAA['id_product']."");
                                                        
                                                        }
                                                        
                                                    
                                                    }


                                                    // xóa loại hàng
                                                    $resultFinal = $conn -> query("DELETE FROM category WHERE category.id_category = ".$value."");
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
                                    ?>
                                </div>
                                <!-- end page-wrapper -->
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
<script src="../ckeditor5-build-classic/ckeditor.js"></script>
<script src="./jsCategory.js"></script>
</body>

</html>
<?php
    }
?>