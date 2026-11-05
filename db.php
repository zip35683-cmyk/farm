
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "green_wasta";
$port = 3307;

$conn = mysqli_connect($host, $user, $pass, $dbName, $port);

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

echo "เชื่อมต่อสำเร็จ";
?>
