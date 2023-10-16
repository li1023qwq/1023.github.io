<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取表单数据
$token = $_GET['token'];
$newPassword = $_POST['new_password'];

// 检查重置密码令牌是否有效
$sql = "SELECT * FROM users WHERE reset_token='$token'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 更新用户密码
    $sql = "UPDATE users SET password='$newPassword', reset_token=NULL WHERE reset_token='$token'";
    if ($conn->query($sql) === TRUE) {
        echo "密码已成功重置";
    } else {
        echo "密码重置失败: " . $conn->error;
    }
} else {
    echo "重置密码令牌无效";
}

$conn->close();
?>