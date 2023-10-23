<?php
session_start();

// 检查用户是否已登录
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // 重定向到登录页面
    exit();
}

// 连接到MySQL数据库
$servername = "mysql.sqlpub.com:3306";
$username = "li1023qwq";
$password = "81fbc8ed084fb42f";
$dbname = "li1023qwq";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查数据库连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 显示仪表盘页面
echo "欢迎 " . $_SESSION["username"] . "!";

// 添加在线聊天系统
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>仪表盘</title>

<!-- 引入样式文件 -->
<link rel="stylesheet" href="chat.css">

</head>
<body>

<!-- 添加聊天窗口 -->
<div class="chat-container">
  <div class="chat-header">
    <h3>在线聊天</h3>
  </div>
  <div class="chat-messages">
    <!-- 聊天消息将动态添加到这里 -->
    <?php
    // 从数据库中获取聊天消息
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='message'>" . $row["username"] . ": " . $row["message"] . "</div>";
        }
    }
    ?>
  </div>
  <div class="chat-input">
    <input type="text" id="message-input" placeholder="输入消息...">
    <button id="send-button">发送</button>
  </div>
</div>

<!-- 引入脚本文件 -->
<script src="chat.js"></script>

<script>
  const messageInput = document.getElementById('message-input');
  const sendButton = document.getElementById('send-button');
  const chatMessages = document.querySelector('.chat-messages');

  // 发送消息
  sendButton.addEventListener('click', function() {
    const message = messageInput.value;
    if (message.trim() !== '') {
      const messageElement = document.createElement('div');
      messageElement.classList.add('message');
      messageElement.textContent = "<?php echo $_SESSION['username']; ?>: " + message;
      chatMessages.appendChild(messageElement);
      messageInput.value = '';
      messageInput.focus();
      // 滚动到最新消息
      chatMessages.scrollTop = chatMessages.scrollHeight;

      // 将消息保存到数据库
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'save_message.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
        }
      };
      xhr.send('username=' + encodeURIComponent("<?php echo $_SESSION['username']; ?>") + '&message=' + encodeURIComponent(message));
    }
  });

  // 按下 Enter 键发送消息
  messageInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault();
      sendButton.click();
    }
  });
</script>

</body>
</html>
