<?php 
    require_once('../../ConnectDB/connectDB.php');
    ob_start();
    session_start();
    if ($_SESSION['user']['id_role'] != 1) {
        header("location: .../../Login");
    } else {
        global $idCustomer;
        $idCustomer = $_SESSION['user']['idUser'];
        require_once('../../Library/library.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đơn Hàng</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="../../images/logoToc.jfif" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <!-- morris chart -->
    <link rel="stylesheet" type="text/css" href="../assets/css/morris.js/css/morris.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="./style_order.css">
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
                                <a href="" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <?php avatar($idCustomer,2); ?>
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
                        <div class="sidebar_toggle"><a href=""><i class="icon-close icons"></i></a></div>
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
                                <form class="form-material" action="" method="get">
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
                            <?php if ($_SESSION['user']['isAdmin'] == 1) { ?>
                            <div class="pcoded-navigation-label">V1</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu  pcoded-trigger">
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
                            <?php } ?>
                            <div class="pcoded-navigation-label">V2</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
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
                            <?php if ($_SESSION['user']['isAdmin'] == 1) { ?>
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
                            <?php } ?>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Đơn Hàng</h5>
                                            <p class="m-b-0">Xem và quản lý các đơn hàng tại đây !</p>
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
                                    <div class="page-body">
                                        <?php 
                                                if (isset($_GET['idDH'])) {
                                                    $idDH = $_GET['idDH'];
                                                    $conn = connectDB();
                                                    $result = $conn -> query("SELECT U.userName, U.idUser, S.statusName, S.id, O.dateOrder, O.nameReceiver, O.phoneReceiver, O.emailReceiver, O.adressReceiver, O.noteOrder, O.feeShip, OD.price, OD.qty, OD.size FROM orderr O INNER JOIN oderdetail OD INNER JOIN user U INNER JOIN status S ON O.id_oderDetail = OD.id_oderDetail AND O.idUser = U.idUser AND O.status = S.id WHERE O.codeOrder = '".$idDH."'");
                                                    if ($result -> num_rows > 0) {
                                                        $rowOrder = $result -> fetch_assoc();
                                        ?>
                                            <div class="order_title">
                                                <a href="./index.php"><i class="fas fa-angle-left"></i> Quay Lại</a>
                                                <h1>Thông Tin Đơn Hàng</h1>
                                                <span>Mã Đơn: <b><?php echo $idDH; ?></b></span>
                                            </div>
                                            <hr>
                                            <div class="box-content-orderDetail">
                                                <div class="content-orderDetail">
                                                    <div class="content-orderDetail-head">
                                                        <span>Người Đặt: <b><?php echo $rowOrder['userName']; ?></b></span>
                                                        <span>Trạng Thái: <b><?php echo $rowOrder['statusName']; ?></b></span>
                                                        <span>Ngày Đặt: <span><?php echo $rowOrder['dateOrder']; ?></span></span>
                                                    </div>
                                                    <!-- end content-orderDetail-head -->
                                                    <div class="content-orderDetail-main">
                                                    <?php  showProductOrderItem($rowOrder['idUser'] ,$idDH); ?>
                                                    </div>
                                                    <div class="content-orderDetail-note">
                                                        <label for="">Ghi Chú: </label>
                                                        <span><?php echo $rowOrder['noteOrder']; ?></span>
                                                    </div>
                                                    <div class="orderDetail-information">
                                                        <div class="orderDetail-information-group">
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Người Nhận:</label>
                                                                <span><?php echo $rowOrder['nameReceiver']; ?></span>
                                                            </div>
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Số Điện Thoại:</label>
                                                                <span><?php echo $rowOrder['phoneReceiver']; ?></span>
                                                            </div>
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Email:</label>
                                                                <span><?php echo $rowOrder['emailReceiver']; ?></span>
                                                            </div>
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Địa Chỉ:</label>
                                                                <span><?php echo $rowOrder['adressReceiver']; ?></span>
                                                            </div>
                                                        </div>
                                                        <!-- end  orderDetail-information-group -->
                                                        <div class="orderDetail-information-group">
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Tiền Hàng: </label>
                                                                <span class="price"><?php echo number_format($totalCashProduct); ?> đ</span>
                                                            </div>
                                                            <div class="content-orderDetail-information-item">
                                                                <label for="">Phí Ship: </label>
                                                                <span class="price"><?php echo number_format($rowOrder['feeShip']); ?> đ</span>
                                                            </div>
                                                            <div class="content-orderDetail-information-item lable__total">
                                                                <label for="">Tổng Tiền: </label>
                                                                <span class="price"><?php echo number_format($rowOrder['feeShip'] + $totalCashProduct) ?> đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- orderDetail-information -->
                                                </div>
                                                <?php if ($rowOrder['id'] < 5 ) {?>
                                                <div class="list-item-function">
                                                        <form action="" method="post">
                                                            <div class="form__group-function">
                                                                <label for="">Trạng Thái: </label>
                                                                <select name="valStatus">
                                                                    <?php showStatus($rowOrder['id']); ?>
                                                                </select>
                                                                <button name="bntUpdateStatus" class="bnt__update">Cập Nhật</button>
                                                            </div>
                                                            <div class="form__group-function">
                                                                <button name="bntCancelOrder" class="bnt_cancel">Hủy Đơn Hàng</button>
                                                            </div>
                                                        </form>
                                                </div>
                                                    <!-- end list-item-function -->
                                                    <?php }
                                                    if($rowOrder['id']==5) {
                                                        echo "<div class='list-item-function'> <span class='orderSuccess'>Đã Nhận Hàng Và Thanh Toán Tiền</span> </div>";
                                                    } else if ($rowOrder['id']== 6) {
                                                        echo "<div class='list-item-function'> <span class='orderCancelled'>Đơn Hàng Này Đã Bị Hủy</span> </div>";
                                                        
                                                    }
                                                     ?>
                                            </div>
                                            <!-- end box-content-orderDetail -->
                                            <?php 
                                                    // cập nhật trạng thái đơn hàng
                                                    if (isset($_POST['bntUpdateStatus'])) {
                                                        updateStatus($rowOrder['idUser'], $idDH, $_POST['valStatus']);

                                                        // thông báo tới người dùng đã thay đổi trạng thái
                                                        $resultS = $conn -> query("SELECT * FROM status WHERE status.id = ".$_POST['valStatus']."");
                                                        $rowS = $resultS -> fetch_assoc();
                                                        insertNotification("Đơn Hàng Đã Chuyển Trạng Thái", "Đơn hàng ".$idDH." đã chuyển trạng thái thành ",$rowS['statusName'], $rowOrder['idUser']);
                                                        header('Refresh:0');
                                                    }

                                                    // Hủy đơn hàng
                                                    if (isset($_POST['bntCancelOrder'])) {
                                                        updateStatus($rowOrder['idUser'], $idDH, 6);

                                                        // thông báo tới người dùng đã thay đổi trạng thái
                                                        $resultS = $conn -> query("SELECT * FROM status WHERE status.id = ".$_POST['valStatus']."");
                                                        $rowS = $resultS -> fetch_assoc();
                                                        insertNotification("Thông Báo Hủy Đơn", "Đơn hàng ".$idDH." đã được hủy bởi hệ thống","", $rowOrder['idUser']);
                                                        header('Refresh:0');
                                                    }
                                                } else {
                                                    echo "<p class='keySearch'>Từ Khóa: <b>".$idDH."</b></p>
                                                    <h2 class='emty__order-title' style='color: var(--text-color-red);'>Không tìm Thấy Đơn Hàng Nào !</h2>
                                                                <img class='emty__order-img' src='../../images/empty-cart.png'>
                                                            ";
                                                }
                                                
                                                } ?>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">

                            </div>
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
    <!-- Morris Chart js -->
    <script src="../assets/js/raphael/raphael.min.js"></script>
    <script src="../assets/js/morris.js/morris.js"></script>
    <!-- Custom js -->
    <script src="../assets/pages/chart/morris/morris-custom-chart.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>

</html>
<?php } ?>