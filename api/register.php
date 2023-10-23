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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>注册</title>
</head>
<body>
  <h2>注册</h2>
  <form action="register.php" method="POST">
    <label for="username">用户名：</label>
    <input type="text" name="username" required><br><br>
    <label for="password">密码：</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="注册">
  </form>
</body>
</html>
