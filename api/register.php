<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <link rel="stylesheet" href="register.css">
    <meta name="content-type"; charset="UTF-8">
	<style>
	body
	{
	    margin: 0;
	    padding: 0;
	    background-image: url("https://www.toopic.cn/public/uploads/small/1637562996238163756299635.png");	/* 背景图片 */
	    background-repeat: no-repeat;	/* 背景图片不重复 */
	}
	#bigBox
	{
	    margin: 0 auto;	/* login框剧中 */
	    margin-top: 90px; /* login框与顶部的距离 */
	    padding: 20px 50px;	/* login框内部的距离(内部与输入框和按钮的距离) */
	    background-color: #00000090;	/* login框背景颜色和透明度 */
	    width: 500px;
	    height: 500px;
	    border-radius: 10px;	/* 圆角边 */
	    text-align: center;	/* 框内所有内容剧中 */
	}
	#bigBox h1
	{
	    color: white;	/* LOGIN字体颜色 */
	    font-family: "Comic Sans MS";
	}
	#bigBox .inputBox
	{
	    margin-top: 15px;	/* 输入框顶部与LOGIN标题的间距 */
	}
	#bigBox .inputBox .inputText
	{
	    margin-top: 6px;	/* 输入框之间的距离 */
	}
	#bigBox .inputBox .inputText input
	{
	    border: 0;	/* 删除输入框边框 */
	    padding: 10px 10px;	/* 输入框内的间距 */
	    border-bottom: 1px solid white;	/* 输入框白色下划线 */
	    background-color: #00000000;	/* 输入框透明 */
	    color: white;	/* 输入字体的颜色 */
	}
	#bigBox .loginButton
	{
	
	    margin-right: 30px;
	    margin-top: 14px;	/* 按钮顶部与输入框的距离 */
	    width: 100px;
	    height: 25px;
	    color: white;	/* 按钮字体颜色 */
	    border: 0; /* 删除按钮边框 */
	    border-radius: 20px;	/* 按钮圆角边 */
	    background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);	/* 按钮颜色 */
	}
	.m-left{
	    margin-left: 40px;
	
	}
	.m-plc{
	    margin-right: 30px;
	    margin-top: 30px;
	}
	.register{
	    position: absolute;
	    /*margin-bottom: 1000px;*/
	    right: 10px;
	    color: #ffffff;
	    /*left:  calc(5% - 200px);*/
	    margin-right:700px;
	    /*bottom: 240px;*/
	    font-size: 13px;
	    color: white;
	    bottom: 70px;
	
	}
	
	</style>
</head>
<body>
<div id="bigBox">
        <h1>注册页面</h1>


        <form action="registeraction.php" method="post">
            <div class="inputBox">

                <div class="inputText">
                <input type="text" id="id_name" name="username" required="required" placeholder="Username">
                </div>
                <div class="inputText">
                <input type="password" id="password" name="password" required="required" placeholder="Password">
                </div>
                <div class="inputText">
                <input type="password" id="re_password" name="re_password" required="required" placeholder="PasswordAgain">
                </div>
                <div class="inputText m-plc" style="color: white;opacity: 70%">
                    Sex：
                <input type="radio" id="sex" name="sex" value="mam" style="color: white">男
                <input type="radio" id="sex" name="sex" value="woman" style="color: white">女
                </div>
                <div class="inputText">
                <input type="text" id="qq" name="qq" required="required" placeholder="QQ">
                </div>
                <div class="inputText">
                <input type="email" id="email" name="email" required="required" placeholder="Email">
                </div>
                <div class="inputText">
                <input type="text" id="phone" name="phone" required="required" placeholder="Phone">
                </div>
                <div class="inputText">
                <input type="text" id="address" name="address" required="required" placeholder="Address">
                </div>
                <br>
                <div style="color: white;font-size: 12px" >
                <!--提示信息-->
                <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "用户名已存在！";
                        break;

                    case 2:
                        echo "密码与重复密码不一致！";
                        break;

                    case 3:
                        echo "注册成功！";
                        break;
                }
                ?>
                </div>
            </div>
            <div>
                <input type="submit" id="register" name="register" value="注册" class="loginButton m-left">
                <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
            </div>

            <div class="register">
            <a href="login.php" style="color: white">已有账号，去登录</a>
            </div>
        </form>
</div>
</body>
</html>
