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


<style>
	  body {
	    margin: 0;
	    padding: 0;
	    font-family: Arial, sans-serif;
	  }
	  
	  .container {
	    width: 100%;
	    max-width: 1200px;
	    margin: 0 auto;
	    padding: 20px;
	  }
	  
	  .header {
	    background-color: rgba(159, 159, 159, 0.4);
	    
	    padding: 20px;
	    text-align: center;
	  }
	  
	  .nav {
	    background-color: rgba(255, 255, 255, 0.4);
		  box-shadow: 0 5px 15px rgba(182, 182, 182, 0.8);
	    padding: 10px;
	    text-align: center;
	  }
	  
	  .nav ul {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    display: flex;
	    justify-content: center;
	  }
	  
	  .nav ul li {
	    margin: 0 10px;
	  }
	  
	  .nav ul li a {
	    color: #000000;
	    text-decoration: none;
		  /* font-size: 30px; */
		    
		    text-shadow:0px 1px 0px #c0c0c0,
		  	 0px 2px 0px #b0b0b0,
		  	 0px 3px 0px #a0a0a0,
		  	 0px 4px 0px #909090,
		  	 0px 5px 10px rgba(161, 161, 161, 0.9);
	  }
	  
	  .content {
	    padding: 20px;
	    text-align: center;
	  }
	  
	  .footer {
	    background-color: rgba(255, 255, 255, 0.4);
	    box-shadow: 0 5px 15px rgba(165, 165, 165, 0.8);
	    padding: 20px;
	    text-align: center;
	  }
	  
	  @media only screen and (max-width: 600px) {
	    .container {
			  
	      padding: 10px;
	    }
	    
	    .header, .footer {
	      padding: 10px;
	    }
	    
	    .nav ul {
	      flex-direction: column;
	    }
	    
	    .nav ul li {
	      margin: 10px 0;
	    }
	  }
	</style>
</head>
<body>

	<div class="sidebar">
		<a href="../admin.php">首页</a>
		<a href="../admin/users.php">用户</a>
		<a class="active" href="../admin/app.php">应用</a>
		<a href="../admin/updates.php">日志</a>
		<a href="../admin/gn.php">功能</a>
		<a href="../dologout.php" class="mycss">退出</a>
		
	</div>

<div class="content">
  <div class="content">
  	
  	<header>
  		<h1>文件</h1>
  		
  		<h2>更新文件</h2>
  		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  		    <input type="text" name="title" placeholder="标题" required><br>
  			
  			<textarea name="content" placeholder="内容" required></textarea><br>
  		    <input type="text" name="link" placeholder="链接" required><br>
  			<input type="text" name="password" placeholder="密码" required><br>
  			
  			<input type="text" name="created_at" placeholder="时间" required><br>
  			
  		    <input type="submit" value="发布">
  		</form>
  		
  	</header>
  	
  </div>
  
  <h2>文件列表</h2>
  <?php
  // 连接数据库
  $servername = "mysql.sqlpub.com:3306";
  $username = "li1023";
  $password = "56a1568713d16dba";
  $dbname = "li1023";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("数据库连接失败：" . $conn->connect_error);
  }
  
  // 处理发布文件请求
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $title = $_POST["title"];
  	$content = $_POST["content"];
  	$link = $_POST["link"];
  	$password = $_POST["password"];
  	$cerated_at = $_POST["cerated_at"];//创建时间
  	$update_at = $_POST["update_at"];
  	
      $sql = "INSERT INTO items (title, content, link, password, update_at, cerated_at) VALUES ('$title', '$content', '$link', '$password', '$update_at', '$cerated_at')";
  
      if ($conn->query($sql) === TRUE) {
          echo "文件发布成功";
      } else {
          echo "文件发布失败：" . $conn->error;
      }
  }
  
  // 处理删除文件请求
  if (isset($_GET["id"])) {
      $id = $_GET["id"];
  
      $sql = "DELETE FROM items WHERE id=$id";
  
      if ($conn->query($sql) === TRUE) {
          echo "文件删除成功";
      } else {
          echo "文件删除失败：" . $conn->error;
      }
  }
  
  // 获取文件列表
  $sql = "SELECT * FROM items ORDER BY id DESC";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo '<div class="post">';
          echo "<h3>标题：" . $row["title"] . "</h3>";
          echo "<p>内容：" . $row["content"] . "</p>";
  		echo "<div class='item'>链接：<a href='" . $row["link"] . "' target='_blank'>" . $row["title"] . "</a></div>";
  		echo "<p>密码：" . $row["password"] . "</p>";
  		echo "<h6>创建时间：" . $row["cerated_at"] . "</h6>";
          // echo "<h6>更新时间：" . $row["update_at"] . "</h6>";
          // echo '<button class="delete-btn" onclick="deletePost(' . $row["id"] . ')">删除</button>';
          echo '</div>';
      }
  } else {
      echo "暂无文件";
  }
  
  $conn->close();
  ?>
  
  <script>
      function deletePost(id) {
          if (confirm("确定要删除这篇文件吗？")) {
              window.location.href = "items.php?id=" + id;
          }
      }
  </script>
</div>

</body>
</html>

