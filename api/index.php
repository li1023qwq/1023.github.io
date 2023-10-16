<!DOCTYPE html>
<html>
<head>
    <title>登录注册示例</title>
</head>
<body>
    <h1>登录</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="用户名" required><br>
        <input type="password" name="password" placeholder="密码" required><br>
        <input type="submit" value="登录">
    </form>

    <h1>注册</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="用户名" required><br>
        <input type="password" name="password" placeholder="密码" required><br>
        <input type="submit" value="注册">
    </form>
</body>
</html>