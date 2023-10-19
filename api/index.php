<!DOCTYPE html>
<html>
<head>
    <title>数据可视化大屏</title>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>
<body>
    <div id="chartContainer" style="width: 800px; height: 600px;"></div>
    <div id="lineChartContainer" style="width: 800px; height: 600px;"></div>
    <div id="dataContainer"></div>

    <button onclick="getData()">获取数据</button>

    <script>
        // 使用JavaScript代码来创建和配置图表
        var chartContainer = document.getElementById('chartContainer');
        var chart = echarts.init(chartContainer);

        var lineChartContainer = document.getElementById('lineChartContainer');
        var lineChart = echarts.init(lineChartContainer);

        // 获取数据的函数
        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // 处理从服务器获取的数据
                    var data = JSON.parse(xhr.responseText);

                    // 配置柱状图的选项和数据
                    var options = {
                        title: {
                            text: '每日游戏在线人数'
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
                            name: '在线人数',
                            data: data.map(function(item) {
                                return item.online_players;
                            }),
                            type: 'bar'
                        }]
                    };

                    // 使用配置项来生成柱状图
                    chart.setOption(options);

                    // 配置折线图的选项和数据
                    var lineOptions = {
                        title: {
                            text: '每日游戏平均在线时长'
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
                            name: '平均在线时长',
                            data: data.map(function(item) {
                                return item.average_duration;
                            }),
                            type: 'line'
                        }]
                    };

                    // 使用配置项来生成折线图
                    lineChart.setOption(lineOptions);

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
