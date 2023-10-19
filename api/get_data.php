<?php
// 建立数据库连接
$servername = "mysql.sqlpub.com:3306";
$username = "li1023qwq";
$password = "81fbc8ed084fb42f";
$dbname = "li1023qwq";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 查询数据
$sql = "SELECT * FROM game_online";
$result = $conn->query($sql);

// 处理查询结果并将数据转换为JSON格式
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$jsonData = json_encode($data);

// 关闭数据库连接
$conn->close();

// 设置响应头为JSON格式
header('Content-Type: application/json');

// 将数据返回给前端页面
echo $jsonData;
?>
