<?php
// 连接MySQL数据库
$servername = "mysql.sqlpub.com:3306";
$username = "li1023";
$password = "56a1568713d16dba";
$dbname = "li1023";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 检查用户名和密码是否匹配
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "登录成功";
} else {
    echo "登录失败";
}

$conn->close();
?>