// index.php - 主页

session_start();   // 启动会话

if (!isset($_SESSION["username"])) {
    header("Location: login.php");   // 未登录时跳转到登录页面
    exit();
}

include "dbconfig.php";   // 引入数据库配置文件

// 查询用户数据
$query = "SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);   // 关闭数据库连接
?>

<h1>欢迎 <?php echo $user["username"]; ?></h1>
<p>您的邮箱是 <?php echo $user["email"]; ?></p>
<a href="logout.php">退出登录</a>