<?php
// 连接到数据库
$connection = mysqli_connect('mysql.sqlpub.com:3306', 'li1023qwq', '81fbc8ed084fb42f', 'li1023qwq');

// 获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 插入用户数据到用户表
$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
mysqli_query($connection, $query);

// 关闭数据库连接
mysqli_close($connection);

// 跳转到登录页面
header('Location: login.html');
?>
