<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

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
	
	@media screen and (max-width: 600px) {
		.sidebar a {
			text-align: center;
			float: none;
		}
	}
	
	img {
	  width: 140px !important;
	}
  </style>
</head>

<body class='bg-success'>
	<div class="sidebar">
		<a href="../admin.php">首页</a>
		<a class="active" href="../admin/users.php">用户</a>
		<a href="../admin/app.php">应用</a>
		<a href="../admin/updates.php">日志</a>
		<a href="../admin/gn.php">功能</a>
		<a href="../dologout.php" class="mycss">退出</a>
		
	</div>


<div class="content">
  <div class="container">

    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
			
			<th width='15%'>序号</th>
			<th width='15%'>账号</th>
			<th width='15%'>密码</th>
			<th width='55%'>头像</th>
        </tr>
      </thead>
        <tbody>
            <?php
                header("contentg-type:text/html;charset=utf-8");
                // 1.引入php操作数据库的代码文件
                include "../Tools/phpTools.php";
                // 2.sql语句
                $sql = "select * from chat_user";
                // 执行sql
                $arr = mysqli_excute_select($sql);
                // var_dump($arr);
                for($i=0;$i<count($arr);$i++):
                ?>
                <tr>
                    <td><?php echo $arr[$i]['Id']?></td>
                    <td><?php echo $arr[$i]['userName']?></td>
                    <td><?php echo $arr[$i]['userPass']?></td>
                    <td>
                        <img src="../images/icon/<?php echo $arr[$i]['userIcon']?>" alt="">
                    </td>
                </tr>
                <?php endfor;?>
        </tbody>
    </table>
  </div>
  </div>
</body>

</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../lib/js/jquery-1.12.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../lib/js/bootstrap.min.js"></script>