// forgot_password.php - 忘记密码页面

include "dbconfig.php";   // 引入数据库配置文件

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // 验证用户名和邮箱是否匹配
    $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // 生成新密码
        $new_password = substr(md5(uniqid()), 0, 8);

        // 更新密码到数据库
        $query = "UPDATE users SET password = '$new_password' WHERE username = '$username'";
        if (mysqli_query($conn, $query)) {
            echo "新密码已发送到您的邮箱";
            // 发送新密码到用户邮箱
            // ...
        } else {
            echo "更新密码失败：" . mysqli_error($conn);
        }
    } else {
        echo "用户名和邮箱不匹配";
    }
}

mysqli_close($conn);   // 关闭数据库连接
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">用户名：</label>
    <input type="text" name="username" required><br>
    <label for="email">邮箱：</label>
    <input type="email" name="email" required><br>
    <input type="submit" value="提交">
</form>