<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $u = $_POST['username']; 
    $p = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$u'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($p, $row['password'])) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        header("Location: home.php");
        exit();

    } else {
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<form method="post">
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button name="login">เข้าสู่ระบบ</button>

   
</form>
 <a href="register.php">สมัครสมาชิก</a>