
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
  
	<title>晚夜深秋-首页</title>
	<link rel="stylesheet" href="lib/css/index.css">
	
	
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            color: #333;
            text-decoration: none;
            display: inline-block;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            transition: box-shadow 0.3s;
        }
        a:hover {
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            transform: translateY(2px);
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .nav-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }
        .nav-link {
            width: 200px;
            text-align: center;
            margin: 0 10px;
            margin-bottom: 10px;
        }
        .nav-link a {
            display: inline-block;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            transition: box-shadow 0.3s;
            text-decoration: none;
            color: #333;
        }
        .nav-link a:hover {
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            transform: translateY(2px);
        }
    </style>
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
    		<li><a href="https://zpwouskozt.fastgpt.me/#/chat" class="mycss">GPT</a></li>
    		<li><a href="dologout.php" class="mycss">登出</a></li>
			<li><a href="admin.php" class="mycss">后台</a></li>
    	</ul>
    </div>
		

    

    <h1>网站搜索导航</h1>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="在搜索引擎中搜索">
        <select id="searchEngine">
            <option value="google">Google</option>
            <option value="baidu">百度</option>
            <option value="bing">Bing</option>
        </select>
        <button onclick="search()">搜索</button>
    </div>


		
    <h2>常用</h2>
    <div class="nav-container">
        <?php
			$conn = mysqli_connect("localhost", "root", "", "my");
			
            // 从数据库中获取链接
            $sql = "SELECT * FROM link1";
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

        <?php
			$conn = mysqli_connect("localhost", "root", "", "my");
			
            // 从数据库中获取链接
            $sql = "SELECT * FROM link2";
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
    </ul>
    </div>

    <script>
        function search() {
            var query = document.getElementById("searchInput").value;
            var searchEngine = document.getElementById("searchEngine").value;

            var url;
            if (searchEngine === "google") {
                url = "https://www.google.com/search?q=" + encodeURIComponent(query);
            } else if (searchEngine === "baidu") {
                url = "https://www.baidu.com/s?wd=" + encodeURIComponent(query);
            } else if (searchEngine === "bing") {
                url = "https://www.bing.com/search?q=" + encodeURIComponent(query);
            }

            window.open(url, "_blank");
        }
    </script>
</body>
</html>