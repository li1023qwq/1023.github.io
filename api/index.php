
<!DOCTYPE html>
<html>
<head>
    <title>在线聊天</title>
    <meta http-equiv="refresh" content="5"> <!-- 每5秒刷新一次页面 -->
</head>
<body>
    <h1>在线聊天</h1>

    <?php
    // 连接到MySQL数据库
    $conn = mysqli_connect('mysql.sqlpub.com:3306', 'li1023', '56a1568713d16dba', 'li1023');

    // 检查数据库连接是否成功
    if (!$conn) {
        die("数据库连接失败: " . mysqli_connect_error());
    }

    // 获取聊天记录
    $query = "SELECT * FROM chat ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    // 显示聊天记录
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>" . $row['username'] . ":</strong> " . $row['message'] . "</p>";
        }
    } else {
        echo "<p>暂无聊天记录</p>";
    }

    // 关闭数据库连接
    mysqli_close($conn);
    ?>

    <form method="post" action="">
        <input type="text" name="username" placeholder="用户名" required><br>
        <textarea name="message" placeholder="请输入消息" required></textarea><br>
        <input type="submit" value="发送">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 获取用户输入的用户名和消息
        $username = $_POST['username'];
        $message = $_POST['message'];

        // 连接到MySQL数据库
        $conn = mysqli_connect("localhost", "username", "password", "database_name");

        // 检查数据库连接是否成功
        if (!$conn) {
            die("数据库连接失败: " . mysqli_connect_error());
        }

        // 插入聊天记录
        $query = "INSERT INTO chat (username, message) VALUES ('$username', '$message')";
        mysqli_query($conn, $query);

        // 关闭数据库连接
        mysqli_close($conn);

        // 重定向到当前页面，以便刷新聊天记录
        header("Location: " . $_SERVER['PHP_SELF']);
    }
    ?>
</body>
</html>