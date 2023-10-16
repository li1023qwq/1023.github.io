// login.php - 登录页面

session_start();   // 启动会话

include "dbconfig.php";   // 引入数据库配置文件

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 验证用户名和密码是否正确
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $username;   // 设置会话变量
        header("Location: index.php");       // 跳转到主页
        exit();
    } else {
        echo "用户名或密码错误";
    }
}

mysqli_close($conn);   // 关闭数据库连接
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">用户名：</label>
    <input type="text" name="username" required><br>
    <label for="password">密码：</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="登录">
</form>