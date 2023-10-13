<?php
  /* 
  登录成功后会自动跳转到这个页面
  */
  header("content-type:text/html;charset=utf-8");
  // 开启session
  session_start();
  if(!isset($_SESSION['info'])){
    // 打回登录页面
    header('location:./admin/login.html');
    return false;
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">
		<a class="active" href="./admin.php">首页</a>
		<a href="./admin/users.php">用户</a>
		<a href="./admin/app.php">应用</a>
		<a href="./admin/updates.php">日志</a>
		<a href="./admin/gn.php">功能</a>
		<a href="./dologout.php" class="mycss">退出</a>
		
	</div>

<div class="content">
  <?php
  	$conn = mysqli_connect("mysql.sqlpub.com:3306", "li1023", "56a1568713d16dba", "li1023");
  	
      // 从数据库中获取链接
      $sql = "SELECT * FROM link3";
      $result = mysqli_query($conn, $sql);
  
      // 输出链接
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="nav-link">';
          echo '<a href="' . $row["url"] . '">' . $row["name"] . '</a>';
          echo '</div>';
      }
  
      // 关闭数据库连接
      mysqli_close($conn);
  ?>

</div>

</body>
</html>

