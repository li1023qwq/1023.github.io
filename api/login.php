<?php
// 连接到数据库
$connection = mysqli_connect('mysql.sqlpub.com:3306', 'li1023qwq', '81fbc8ed084fb42f', 'li1023qwq');

// 获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 查询用户表中是否存在匹配的用户名和密码
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

// 验证登录信息
if (mysqli_num_rows($result) == 1) {
  // 登录成功，保存用户信息到会话
  session_start();
  $_SESSION['username'] = $username;
  header('Location: dashboard.php');
} else {
  // 登录失败，返回登录页面
  header('Location: login.html');
}

// 关闭数据库连接
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>登录</title>
</head>
<body>
  <h2>登录</h2>
  <form action="login.php" method="POST">
    <label for="username">用户名：</label>
    <input type="text" name="username" required><br><br>
    <label for="password">密码：</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="登录">
  </form>
</body>
</html>
