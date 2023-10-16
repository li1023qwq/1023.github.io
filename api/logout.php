// logout.php - 退出登录

session_start();   // 启动会话

session_unset();   // 清除会话变量
session_destroy(); // 销毁会话

header("Location: login.php");   // 跳转到登录页面
exit();