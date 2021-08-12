<?php 
include "config.php";
$err_text = null;
$username = null;
$dpassword = null;     
$cpassword = null;

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $dpassword = $_POST['password'];     
    $cpassword = $_POST['cpassword'];
    if($dpassword == $cpassword)
    {
        $password = md5($dpassword);
        $sql = "insert into taikhoan(username, password, type) values('$username', '$password', 0);";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            $err_text = "Tài khoản đã tồn tại";
        }else{
            echo "<script type='text/javascript'>alert('Tạo tài khoản thành công !');
                window.location='login.php';
                </script>";
        }
    }else{
        $err_text = "Xác nhận mật khẩu không chính xác";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng kí tài khoản</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" 
        rel="stylesheet">
    </head>
    <body>
        <form class="register" action="" method="POST">
            <h2>Đăng kí tài khoản Tiêm chủng</h2>
            <label>User Name</label>
            <input type="text" name="username" <?php if($username != null) echo "value= $username" ?> required>
            <label>Password</label>
            <input type="password" name="password" <?php if($dpassword != null) echo "value= $dpassword" ?>  required>
            <label>Confirm Password</label>
            <input type="password" name="cpassword" <?php if($cpassword != null) echo "value= $cpassword" ?> required>
            <?php echo "<p style=\"color:red; font-size:14px;\">$err_text</>" ?>
            <button class="login" name="submit">Đăng kí</button>
            <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </form>
    </body>
</html>