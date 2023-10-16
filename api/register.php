// register.php - 注册页面

include "dbconfig.php";   // 引入数据库配置文件

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // 验证用户名是否已存在
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "该用户名已被注册";
    } else {
        // 插入新用户数据到数据库
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "注册成功";
        } else {
            echo "注册失败：" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);   // 关闭数据库连接
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">用户名：</label>
    <input type="text" name="username" required><br>
    <label for="password">密码：</label>
    <input type="password" name="password" required><br>
    <label for="email">邮箱：</label>
    <input type="email" name="email" required><br>
    <input type="submit" value="注册">
</form>