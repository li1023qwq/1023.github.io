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
$email = $_POST['email'];

// 检查电子邮件地址是否存在
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 生成重置密码令牌
    $resetToken = bin2hex(random_bytes(32));

    // 将重置密码令牌存储到数据库中
    $sql = "UPDATE users SET reset_token='$resetToken' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // 发送重置密码链接到用户的电子邮件
        $resetLink = "http://example.com/reset_password_form.php?token=$resetToken";
        // 发送邮件代码
        echo "重置密码链接已发送到您的电子邮件地址";
    } else {
        echo "重置密码失败: " . $conn->error;
    }
} else {
    echo "电子邮件地址不存在";
}

$conn->close();
?>