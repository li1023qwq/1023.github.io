// dbconfig.php - 数据库配置文件

// 连接MySQL数据库
$host = "mysql.sqlpub.com:3306";         	// 数据库主机名
$user = "li1023";         					// 数据库用户名
$password = "56a1568713d16dba";    			// 数据库密码
$dbname = "li1023";      					// 数据库名



$conn = mysqli_connect($host, $user, $password, $dbname);   // 连接数据库
if (!$conn) {
    die("连接数据库失败：" . mysqli_connect_error());   // 连接失败时输出错误信息
}