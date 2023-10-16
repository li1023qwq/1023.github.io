<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
</head>
<body>
	<h1>登录</h1>
	<form action="login.php" method="post">
		<label for="username">用户名：</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">密码：</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="登录">
	</form>
	<br>
	<h1>注册</h1>
	<form action="register.php" method="post">
		<label for="username">用户名：</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">密码：</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="登录">
	</form>
	<br>
	<a href="reset_password.php">忘记密码？</a>
</body>
</html>