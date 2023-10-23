<?php
session_start();

// 连接到MySQL数据库
$servername = "mysql.sqlpub.com:3306";
$username = "li1023qwq";
$password = "81fbc8ed084fb42f";
$dbname = "li1023qwq";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查数据库连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 获取要保存的用户名和消息
$username = $_POST['username'];
$message = $_POST['message'];

// 保存消息到数据库
$sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "消息保存成功";
} else {
    echo "保存消息时出错: " . $conn->error;
}

$conn->close();
?>