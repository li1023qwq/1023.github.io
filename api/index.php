<!DOCTYPE html>
<html>
<head>
    <title>数据可视化大屏</title>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>
<body>
    <div id="chartContainer" style="width: 800px; height: 600px;"></div>
    <div id="dataContainer"></div>

    <button onclick="getData()">获取数据</button>

    <script>
        // 使用JavaScript代码来创建和配置图表
        var chartContainer = document.getElementById('chartContainer');
        var chart = echarts.init(chartContainer);

        // 获取数据的函数
        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // 处理从服务器获取的数据
                    var data = JSON.parse(xhr.responseText);

                    // 配置图表的选项和数据
                    var options = {
                        // 根据你的需求配置图表的类型、样式和数据
                        // 例如：柱状图
                        title: {
                            text: '数据可视化大屏'
                        },
                        xAxis: {
                            type: 'category',
                            data: data.map(function(item) {
                                return item.date;
                            })
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                            data: data.map(function(item) {
                                return item.online_players;
                            }),
                            type: 'bar'
                        }]
                    };

                    // 使用配置项来生成图表
                    chart.setOption(options);

                    // 在数据容器中展示数据
                    var dataContainer = document.getElementById('dataContainer');
                    dataContainer.innerHTML = JSON.stringify(data);
                }
            };
            xhr.open("GET", "get_data.php", true);
            xhr.send();
        }
    </script>
</body>
</html>
