<?php
session_start();

// 连接到数据库
$mysqli = new mysqli('mysql.sqlpub.com:3306', 'li1023', '56a1568713d16dba', 'li1023');

// 检查连接是否成功
if ($mysqli->connect_errno) {
    die('连接数据库失败：' . $mysqli->connect_error);
}

// 处理用户发送的消息
if (isset($_SESSION['username']) && isset($_POST['message'])) {
    $message = $mysqli->real_escape_string($_POST['message']);
    $timestamp = time();
    $stmt = $mysqli->prepare("INSERT INTO messages (username, message, timestamp) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $_SESSION['username'], $message, $timestamp);
    $stmt->execute();
}

// 获取最近的50条消息
$result = $mysqli->query("SELECT * FROM messages ORDER BY timestamp DESC LIMIT 50");

// 输出消息
while ($row = $result->fetch_assoc()) {
    echo '<div><strong>' . $row['username'] . '</strong>: ' . $row['message'] . '</div>';
}

// 关闭数据库连接
$mysqli->close();
?>

<!-- 聊天输入框 -->
<form method="post">
    <?php
    // 检查用户是否已登录
    if (isset($_SESSION['username'])) {
        echo '<input type="text" name="message" placeholder="消息">';
        echo '<button type="submit">发送</button>';
        echo '<a href="logout.php">退出</a>';
    } else {
        echo '<input type="text" name="username" placeholder="用户名">';
        echo '<button type="submit">登录</button>';
    }
    ?>
</form>

<!-- 自动刷新 -->
<script>
    setInterval(function() {
        location.reload();
    }, 5000);
</script>