<!DOCTYPE html>
<html>
<head>
    <title>数据可视化大屏</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            height: 100vh;
            width: 100vw;
        }
        .grid-item {
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>
<body>
    <div class="grid-container">
        <div id="chart1" class="grid-item"></div>
        <div id="chart2" class="grid-item"></div>
        <div id="chart3" class="grid-item"></div>
        <div id="chart4" class="grid-item"></div>
        <div id="globe" class="grid-item" style="grid-column: span 2; grid-row: span 2;"></div>
    </div>

    <script>
        // 初始化所有的图表和地球仪
        var chart1 = echarts.init(document.getElementById('chart1'));
        var chart2 = echarts.init(document.getElementById('chart2'));
        var chart3 = echarts.init(document.getElementById('chart3'));
        var chart4 = echarts.init(document.getElementById('chart4'));
        var globe = echarts.init(document.getElementById('globe'));

        // 配置地球仪
        globe.setOption({
            globe: {
                baseTexture: 'path/to/your/texture.jpg',
                heightTexture: 'path/to/your/height_texture.jpg',
                displacementScale: 0.04,
                shading: 'realistic',
                environment: 'path/to/your/environment_texture.jpg',
                realisticMaterial: {
                    roughness: 0.9
                },
                postEffect: {
                    enable: true
                },
                light: {
                    main: {
                        intensity: 1,
                        shadow: true
                    },
                    ambientCubemap: {
                        texture: 'path/to/your/cubemap_texture.jpg',
                        diffuseIntensity: 0.2
                    }
                }
            }
        });

        // 在这里添加您的其他图表配置和数据获取代码

    <script>
        // 使用JavaScript代码来创建和配置图表
        var chartContainer = document.getElementById('chartContainer');
        var chart = echarts.init(chartContainer);

        var lineChartContainer = document.getElementById('lineChartContainer');
        var lineChart = echarts.init(lineChartContainer);

        // 页面加载完成后自动获取数据
        window.onload = function() {
            getData();
        };

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
                    dataContainer.innerHTML = JSON.stringify(data, null, 4);
                }
            };
            xhr.open("GET", "get_data.php", true);
            xhr.send();
        }
    </script>
</body>
</html>
