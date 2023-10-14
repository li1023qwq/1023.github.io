<?php
// 连接到数据库
$mysqli = new mysqli('mysql.sqlpub.com:3306', 'li1023', '56a1568713d16dba', 'li1023');

// 检查连接是否成功
if ($mysqli->connect_errno) {
    die('连接数据库失败：' . $mysqli->connect_error);
}

// 处理用户发送的消息
if (isset($_POST['username']) && isset($_POST['message'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $message = $mysqli->real_escape_string($_POST['message']);
    $timestamp = time();
    $mysqli->query("INSERT INTO messages (username, message, timestamp) VALUES ('$username', '$message', '$timestamp')");
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
    <input type="text" name="username" placeholder="用户名">
    <input type="text" name="message" placeholder="消息">
    <button type="submit">发送</button>
</form>

<!-- 自动刷新 -->
<script>
    setInterval(function() {
        location.reload();
    }, 5000);
</script>