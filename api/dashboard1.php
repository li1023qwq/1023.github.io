<?php
session_start();

// 检查用户是否已登录
if (!isset($_SESSION["username"])) {
    header("Location: login.html"); // 重定向到登录页面
    exit();
}

// 添加数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $views = $_POST["views"];
    $clicks = $_POST["clicks"];

    // 连接数据库
    $connection = mysqli_connect('mysql.sqlpub.com:3306', 'li1023qwq', '81fbc8ed084fb42f', 'li1023qwq');

    // 插入数据
    $query = "INSERT INTO website_stats (date, views, clicks) VALUES ('$date', $views, $clicks)";
    mysqli_query($connection, $query);

    // 关闭数据库连接
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>仪表盘</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>欢迎 <?php echo $_SESSION['username']; ?></h2>
  <canvas id="myChart"></canvas>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="date">日期：</label>
    <input type="date" name="date"><br><br>
    <label for="views">浏览量：</label>
    <input type="number" name="views"><br><br>
    <label for="clicks">点击量：</label>
    <input type="number" name="clicks"><br><br>
    <input type="submit" value="添加数据">
  </form>

  <script>
    // 获取数据
    <?php
    $connection = mysqli_connect('localhost', 'root', 'password', 'data_visualization');
    $query = "SELECT date, views, clicks FROM website_stats";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connection);
    ?>

    // 处理数据
    var dates = [];
    var views = [];
    var clicks = [];
    <?php foreach ($data as $row): ?>
      dates.push('<?php echo $row['date']; ?>');
      views.push(<?php echo $row['views']; ?>);
      clicks.push(<?php echo $row['clicks']; ?>);
    <?php endforeach; ?>

    // 创建折线图
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: dates,
        datasets: [{
          label: '浏览量',
          data: views,
          borderColor: 'blue',
          fill: false
        }, {
          label: '点击量',
          data: clicks,
          borderColor: 'green',
          fill: false
        }]
      }
    });
  </script>
</body>
</html>
