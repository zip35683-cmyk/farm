<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>ยินดีต้อนรับ</h2>

<?php
echo $_SESSION['username'];
?>

<br>
<a href="login.php">ออกจากระบบ</a>