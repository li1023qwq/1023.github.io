<?php
  /* 
  登录成功后会自动跳转到这个页面
  */
  header("content-type:text/html;charset=utf-8");
  // 开启session
  session_start();
  if(!isset($_SESSION['info'])){
    // 打回登录页面
    header('location:./login.html');
    return false;
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="lib/css/index.css">
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
	
	
	
	<style>
	  
	
	
	
	//   html,
	//   body {
	//     height: 100%;
	//     box-sizing: border-box;
	//   }
	
	//   body {
	//     padding: 10px;
	//     margin: 0;
	//     /* padding: 20px; */
	//     background-color: #e7e7e7;
	//     display: flex;
	//     flex-direction: column;
	//   }
	
	  .clearfix::before,
	  .clearfix::after {
	    content: '';
	    visibility: hidden;
	    clear: both;
	    line-height: 0;
	    height: 0;
	    display: block;
	  }
	
	  .clearfix {
	    zoom: 1;
	  }
	
	  .f_l {
	    float: left;
	  }
	
	  .f_r {
	    float: right;
	  }
	
	  // .container {
	  //   margin: 20px auto 0;
	  //   width: 100%;
	  //   min-width: 600px;
	  //   flex: 1;
	  //   display: flex;
	  //   flex-direction: column;
	  //   background-color: white;
	  //   border: 1px solid skyblue;
	  //   border-radius: 10px;
	  // }
	
	  .message {
	    border-bottom: 1px solid skyblue;
	    /* height: 400px; */
	    flex: 1;
	    overflow-y: scroll;
	    padding: 20px;
	    box-sizing: border-box;
	    transition: all 2s;
	  }
	
	  .control {
	    height: 100px;
	    display: flex;
	    padding-left: 50px;
	    padding-right: 50px;
	  }
	
	  .inputBox {
	    height: 60px;
	    margin-top: 20px;
	    border-radius: 6px;
	    outline: none;
	    padding: 0;
	    box-sizing: border-box;
	    /* width: 500px; */
	    flex: 1;
	    font-size: 30px;
	    box-shadow: 0 0 3px gray;
	    border: 1px solid #ccc;
	    transition: all .2s;
	    padding-left: 10px;
	  }
	
	  .inputBox:focus {
	    border-color: skyblue;
	    box-shadow: 0 0 3px skyblue;
	  }
	
	  .sendButton {
	    height: 70px;
	    margin-top: 15px;
	    margin-left: 20px;
	    background-color: yellowgreen;
	    width: 150px;
	    border: none;
	    outline: none;
	    border-radius: 10px;
	    color: white;
	    font-size: 40px;
	    font-family: '微软雅黑';
	    cursor: pointer;
	  }
	
	  .message>div>a {
	    text-decoration: none;
	    width: 50px;
	    height: 50px;
	    border-radius: 50%;
	    background-color: skyblue;
	    text-align: center;
	    line-height: 50px;
	    color: white;
	    font-size: 25px;
	    font-weight: 700;
	    font-family: '微软雅黑';
	  }
	
	  .message>.left>a {
	    background-color: hotpink;
	  }
	
	  a>img {
	    width: 100%;
	    height: 100%;
	  }
	
	  .message>.right>a {
	    background-color: yellowgreen;
	  }
	
	  .message>div {
	    padding: 10px 0;
	  }
	
	  .message>div>p {
	    max-width: 600px;
	    min-height: 28px;
	    margin: 0 10px;
	    padding: 10px 10px;
	    background-color: #ccc;
	    border-radius: 10px;
	    word-break: break-all;
	    position: relative;
	    line-height: 28px;
	    font-weight: 400;
	    font-family: '微软雅黑';
	    color: white;
	    font-size: 20px;
	  }
	
	  .message>.left>p {
	    background-color: skyblue;
	  }
	
	  .message>.left>p::before {
	    content: '';
	    position: absolute;
	    border-top: 6px solid transparent;
	    border-bottom: 6px solid transparent;
	    border-right: 6px solid skyblue;
	    left: -5px;
	    top: 15px;
	  }
	
	  .message>.right>p {
	    color: black;
	  }
	
	  .message>.right>p::before {
	    content: '';
	    position: absolute;
	    border-top: 6px solid transparent;
	    border-bottom: 6px solid transparent;
	    border-left: 6px solid #ccc;
	    right: -6px;
	    top: 15px;
	  }
	
	  h2 {
	    margin: 0;
	    padding-bottom: 5px;
	    font-family: '微软雅黑';
	  }
	
	  .right h2 {
	    text-align: right;
	  }
	
	  .user a {
	    font-weight: 700;
	    color: black;
	  }
	
	  .f_r a {
	    font-size: 12px;
	    text-decoration: none;
	    border-radius: 5px;
	    padding: 3px;
	    background-image: linear-gradient(to bottom, #d9534f 0, #c12e2a 100%);
	    color: white;
	  }
	
	  .f_l a{
	    text-decoration:none;
	    font-size:14px;
	    color:black;
	    margin-left:20px;
	  }
	  
	</style>
	
	<style>
	.img{
	  width:72px;
	  height:72px;
	}
	</style>
	<title>晚夜深秋-在线聊天</title>
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
		
		<div class="container">
		  <!-- 聊天框 分为左右 左边是别人说的 右边是登录的人说的话 -->
		  <div class="message">
		    <?php
		      // 1.引入工具
		      include_once "./Tools/phpTools.php";
		      // 2.准备sql语句
		      $sql = "select m.Id,m.user_id,m.content,u.userName,u.userIcon  from  chat_message m inner join  chat_user u on m.user_id = u.Id where isDelete = 'no' order by m.Id asc";
		      $arr = mysqli_excute_select($sql);
		      // var_dump($arr);
		      // session_start();
		      // var_dump($_SESSION['info']);
		      // 3.这时候要判断左右两个聊天框的内容 如何判断
		      for($i=0;$i<count($arr);$i++):
		        // 判断当前这个遍历出来得userName是不是这个登录的人
		        // 这部分div 使用 for 循环生成多个 div
		        if($arr[$i]['userName'] != $_SESSION['info']['userName']):
		    ?>
		        <div class="left clearfix">
		          <h2><?php echo $arr[$i]['userName']?></h2>
		          <a href="#" class='f_l'>
		            <img src="./images/icon/<?php echo $arr[$i]['userIcon']?>" alt="">
		          </a>
		          <p class='f_l'><?php echo $arr[$i]['content']?>
		          </p>
		        </div>
		      <?php else:?>
		        <div class="right clearfix">
		          <h2><?php echo $_SESSION['info']['userName']?></h2>
		          <a href="#" class='f_r'>
		            <img src="./images/icon/<?php echo $_SESSION['info']['userIcon']?>" alt="">
		          </a>
		          <p class='f_r'><?php echo $arr[$i]['content']?>
		          <a class="btn btn-default" href="./doCallback.php?msgId=<?php echo $arr[$i]['Id']?>">撤回</a>
		          </p>
		        </div>
		      <?php endif;?>
		    <?php endfor;?>
		  </div>
		  
		</div>
		
    </div>
    
	
	
	
	
	
	
	
	<div class="footer">
		<form action="./doSendMessage.php" method="POST">
		  <div class="control">
		    <input type="text" name="messageContent" class='inputBox f_l'>
		    <input type="submit"  class='sendButton f_r' value='发 送'>
		  </div>
		</form>
    </div>
	</div>


	<script src="js/zt.js"></script>

</body>
</html>