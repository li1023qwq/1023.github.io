<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  
	<title>晚夜深秋-博客</title>
	<link rel="stylesheet" href="lib/css/index.css">
</head>
<body>
	
	
  <div class="container">
	  
    <!-- <div class="header">
      <h1>Header</h1>
    </div> -->
    
	<div class="nav">
		<ul class="menu">
			
			
			<li><a href="index.php" class="mycss">首页</a></li>
			<li><a href="gaming.html" class="mycss">小游戏</a></li>
			<li><a href="music.html" class="mycss">音乐</a></li>
			<li><a href="movies.html" class="mycss">看电影</a></li>
			<li><a href="ck.php" class="mycss">仓库</a></li>
			<li><a href="blog.php" class="mycss">博客</a></li>
			<li><a href="updates.php" class="mycss">更新日志</a></li>
			<li><a href="about.html" class="mycss">关于我们</a></li>
			<li><a href="chat.php" class="mycss">在线聊天</a></li>
			
			<li><a href="dologout.php" class="mycss">登出</a></li>
			<li><a href="admin.php" class="mycss">后台</a></li>
		</ul>
	</div>
		
	<div class="content">
		
		<header>
			<h1>个人博客</h1>
			
			<h2>发布博客</h2>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			    <input type="text" name="title" placeholder="标题" required><br>
			    <textarea name="content" placeholder="内容" required></textarea><br>
				<input type="text" name="created_at" placeholder="时间" required><br>
			    <input type="submit" value="发布">
			</form>
		</header>
    </div>
    
	
	
	
	
	<h2>博客列表</h2>
	<?php
	// 连接数据库
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "my";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("数据库连接失败：" . $conn->connect_error);
	}
	
	// 处理发布博客请求
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $title = $_POST["title"];
	    $content = $_POST["content"];
		$created_at = $_POST["created_at"];
	    $sql = "INSERT INTO posts (title, content ,created_at) VALUES ('$title', '$content', '$created_at')";
	
	    if ($conn->query($sql) === TRUE) {
	        echo "博客发布成功";
	    } else {
	        echo "博客发布失败：" . $conn->error;
	    }
	}
	
	// 处理删除博客请求
	if (isset($_GET["id"])) {
	    $id = $_GET["id"];
	
	    $sql = "DELETE FROM posts WHERE id=$id";
	
	    if ($conn->query($sql) === TRUE) {
	        echo "博客删除成功";
	    } else {
	        echo "博客删除失败：" . $conn->error;
	    }
	}
	
	// 获取博客列表
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo '<div class="post">';
	        echo "<h3>标题：" . $row["title"] . "</h3>";
	        echo "<p>内容：" . $row["content"] . "</p>";
	        echo '<p class="timestamp">' . $row["created_at"] . "</p>";
	        // echo '<button class="delete-btn" onclick="deletePost(' . $row["id"] . ')">删除</button>';
	        echo '</div>';
	    }
	} else {
	    echo "暂无博客";
	}
	
	$conn->close();
	?>
	
	<script>
	    function deletePost(id) {
	        if (confirm("确定要删除这篇博客吗？")) {
	            window.location.href = "blog.php?id=" + id;
	        }
	    }
	</script>
	
	
	
	<div class="footer">
		<p>Footer</p>
    </div>
	</div>


	<script src="js/zt.js"></script>
	<script type="text/javascript">
	        // 开关状态
	    var open = false;
	    $('#nav-btn').click(function (){
	                // 按钮状态
	        $(this).css("background-color", open ? '#333' : '#222');
	        var navBar = $('.nav-bar');
	                // 设置header的高度，将导航列表显示出来
	        var height = navBar.offset().top + navBar.height();
	        $('#header').animate({
	            height: open ? 50 : height
	        });
	                // 修改开关状态
	        open = !open;
	    });
	
	</script>
</body>
</html>