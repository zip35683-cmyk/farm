<?php
include "db.php";

if (isset($_POST['register'])) {

    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // ตรวจสอบอีเมลซ้ำ
    $sql = "SELECT * FROM users WHERE email = '$e'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "อีเมลนี้ถูกใช้แล้ว";
    } else {

        // สมัครสมาชิก
        $sql = "INSERT INTO users (username, email, password, role, point)
                VALUES ('$u', '$e', '$p', 'user', 0)";

        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
            echo "สมัครไม่สำเร็จ";
        }
    }
};
?>

<form method="post">
    <input name="username" placeholder="Username" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" minlength="8" placeholder="Password" required>

    <button type="submit" name="register">สมัครสมาชิก</button>
</form>

<a href="login.php">Login</a>
