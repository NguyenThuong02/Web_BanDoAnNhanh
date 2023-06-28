<?php 
require_once('../ConnectDB/connectDB.php');
require_once('../Library/library.php');
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@700&display=swap" rel="stylesheet">
    <style>
      :root {
        --bg-color: #1ea2bf;
        --text-color: #157332;
      }
    </style>
    <link rel="stylesheet" href="./styleNem.css">
    <script src="https://kit.fontawesome.com/9238eff31b.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <?php logo(0);?>
            </div>
        </header>
        <main>

            <form action="" name="mf" id="formLG" method="post" onsubmit="return checkLogin()">
                <h1>Đăng Nhập</h1>
                <div class="userName">
                    <label for=""><i class="fas fa-user"></i></label>
                    <input type="text" id="valuserName" name="userName" placeholder="Nhập Tên Đăng Nhập" required>
                </div>
                <div class="passWord">
                    <label for=""><i class="fas fa-lock"></i></label>
                    <input type="passWord" id="valpassWord" name="passWord" placeholder="Nhập Mật Khẩu" required>
                </div>
                <div class="rememberMe">
                    <input type="checkbox" name="rememberMe" id="">
                    <label for="">Nhớ Mật Khẩu</label>
                </div>
                <div class="creatAcc">
                    <span>Bạn Chưa Có Tài Khoản ?</span>
                    <span><a href="./creatLogin.php">Tạo Tài Khoản</a></span>
                </div>
                <div class="submit">
                    <input type="submit" name="bnt-submit" value="Đăng Nhập">
                </div>
                    <span id="disError">
                        <?php
                            if (isset($_POST['bnt-submit']) and $_POST['bnt-submit'] == 'Đăng Nhập') {
                                $user = $_POST['userName'];
                                $passWord = md5($_POST['passWord']);
                                $conn = connectDB();
                                $result = $conn->query("SELECT * FROM user WHERE userName = '$user' and passWord = '$passWord'");
                                if ($result->num_rows > 0) {
                                    $row = $result -> fetch_assoc();
                                    if ($row['disabled'] != 1) {
                                        $_SESSION['user'] = $row;
                                        if ($_SESSION['user']['id_role'] == 1) {
                                            header("location: ../Admin/");
                                        } else {
                                            header("location: .././");
                                        }
                                    } else {
                                        echo 'Tài khoản này đã bị vô hiệu hóa. Vui lòng liên hệ với tổng đài để được hỗ trợ !';
                                    }
                                } else {
                                    echo "Tài Khoản Hoặc Mật Khẩu Không Đúng !";
                                }
                            }
                            ?>
                    </span>
            </form>
        </main>
    </div>

    <script type="text/javascript">
        function checkLogin() {
            var valUser = document.querySelector('#valuserName');
            var valPassword = document.querySelector('#valpassWord');
            var disError = document.querySelector('#disError');

            if (valUser.value == "") {
                disError.style.display = "block";
                disError.innerHTML = "Bạn Chưa Nhập User Name !";
                document.querySelector('#formLG').style.border = "1px solid red";
                document.querySelector('form').style.animationName  = "error";
                document.querySelector('form').style.animationDuration   = "0.3s";
                return false;
            } else if (valPassword.value == "") {
                disError.style.display = "block";
                disError.innerHTML = "Bạn Chưa Nhập PassWord !";
                document.querySelector('#formLG').style.border = "1px solid red";
                document.querySelector('form').style.animationName  = "error";
                document.querySelector('form').style.animationDuration   = "0.3s";
                return false;
            } else {
                    return true;
            }
        }
    </script>
    <script src="./jsLogin.js"></script>
</body>

</html>