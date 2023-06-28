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
    <title>Đăng Ký</title>
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

            <form action="" name="mf" method="post" onsubmit="return checkLogin()">
                <h1>Đăng Ký</h1>
                <div class="userName">
                    <label for=""><i class="fas fa-user"></i></label>
                    <input type="text" id="valuserName" name="userName" placeholder="Tên Đăng Nhập" required>
                </div>
                <div class="passWord">
                    <label for=""><i class="fas fa-lock"></i></label>
                    <input type="passWord" id="valpassWord" name="passWord" placeholder="Mật Khẩu" required>
                </div>
                <div class="passWord">
                    <label for=""><i class="fas fa-lock"></i></label>
                    <input type="passWord" id="valpassWord" class="pass2" name="passWord" placeholder="Nhập Lại Mật Khẩu" required>
                </div>
                <div class="memail">
                    <label for=""><i class="fas fa-envelope"></i></label>
                    <input type="email" id="valemail" name="email" placeholder="Email" required>
                </div>
                <div class="creatAcc">
                    <span>Bạn Đã Có Tài Khoản ?</span>
                    <span><a href="./index.php">Đăng Nhập</a></span>
                </div>
                <div class="submit">
                    <input type="submit" name="bnt-submit" value="Đăng Ký">
                </div>
                <span id="disError">
                    <?php
                        if (isset($_POST['bnt-submit']) and $_POST['bnt-submit'] == 'Đăng Ký') {
                            $user = $_POST['userName']; // tài khoản
                            $passWord = $_POST['passWord']; // mật khauar
                            $email = $_POST['email']; // email

                            $conn = connectDB();
                            $sql = "INSERT INTO user (userName, passWord, email, isAdmin, id_role, image, disabled) VALUES ('".$user."','".md5($passWord)."','".$email."', b'0',2,'avata_emty.png',b'0')";
                            if ($conn ->query($sql)) {
                                $codeDiscount = "HR".str_rand(6);
                                $email_to = $email;
                                $subject = "Chào Mừng Bạn Đến Với PoDo";
                                $message = '
                                            <html>
                                                
                                                <img src="https://popofastfood.000webhostapp.com/images/logoPopo.png" width="200px" alt="">
                                                <h2>Chào Mừng Bạn Đến Với PoDo</h2>
                                                <div class="content">
                                                    <p>Bạn Đã Đăng Ký Thành Công Tài Khoản PoDo.<br>
                                                        Bây giờ bạn có thể thỏa sức đăt mua những món ăn ngon trên hệ thống đồ ăn nhanh PoDo</p>
                                                    <i><p>Tài Khoản: <b>'.$user.'</b></p></i>
                                                    <i><p>Mật Khẩu: <b>'.$passWord.'</b></p></i>
                                                    <p><b>Free Ship</b><br>Tặng bạn một mã free ship khi mua hàng lần đầu</p>
                                                    <span><b>CODE: <i>'.$codeDiscount.'</i></b></span>
                                                    <br>
                                                    <br>
                                                    <a href="http://localhost/DuAn1">Mua Ngay</a>
                                                </div>
                                            </html>';

                                $headers = "From:popo.fastfoodfpt@gmail.com \r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-type: text/html\r\n";

                                // mail($email_to, $subject, $message, $headers);
                                $result = $conn -> query("SELECT MAX(user.idUser) AS 'id_new' FROM user");
                                $row = $result -> fetch_assoc();
                                insertCode($codeDiscount, $row['id_new']);
                                insertNotification("Chào Mừng Bạn Đến Với PoDo","Bạn đã đăng ký thành công và được tặng một mã free ship: ","$codeDiscount",$row['id_new']);
                                echo "<span style='color: #56fb41;'>Đăng Ký Tài Khoản Thành Công !</span>";
                            } else {
                                echo "Tên Đăng Nhập Hoặc Email Đã Tồn Tại !";
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
            var valPassword2 = document.querySelector('.pass2');
            var valEmail = document.querySelector('#valemail');
            var disError = document.querySelector('#disError');
            if (valUser.value == "") {
                disError.style.display = "block";
                disError.innerHTML = "Bạn Chưa Nhập User Name !";
                return false;
            } else if (valPassword.value == "") {
                disError.style.display = "block";
                disError.innerHTML = "Bạn Chưa Nhập PassWord !";
                return false;
            } else if (valPassword.value != valPassword2.value) {
                disError.style.display = "block";
                disError.innerHTML = "PassWord phải trùng nhau !";
                return false;
            } else if (valemail.value == "") {
                disError.style.display = "block";
                disError.innerHTML = "Bạn Chưa Nhập Email !";
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>