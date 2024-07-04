// script.js

document.addEventListener('DOMContentLoaded', () => {
    // 加载地址列表
    loadAddressList();

    // 主题切换按钮事件监听
    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', toggleTheme);

    // 更新当前时间
    setInterval(updateCurrentTime, 1000);

    // 显示网站运行时间
    startTime = new Date(2024, 6, 4, 9, 0, 0); // 假设固定时间是 2024-07-04 09:00:00
    displayUptime();
    setInterval(displayUptime, 1000);

    // 搜索功能
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', filterList);

    // 显示通知公告
    displayNotification();

    // 显示友情推荐
    displayRecommendations();

    // 显示关注我们
    displayFollowUs();
});

function loadAddressList() {
    fetch('index.json')
        .then(response => response.json())
        .then(data => {
            const addressList = document.getElementById('address-list');
            data.addresses.forEach(address => {
                const listItem = document.createElement('li');
                const link = document.createElement('a');
                const icon = document.createElement('i');
                const speed = document.createElement('span');

                icon.className = 'fas fa-link icon'; // 使用 Font Awesome 图标
                link.href = address.url;
                link.textContent = address.name;
                link.prepend(icon);

                speed.className = 'speed';
                listItem.appendChild(link);
                listItem.appendChild(speed);

                // 测试网址速度
                testSpeed(address.url, speed);

                addressList.appendChild(listItem);
            });
        })
        .catch(error => console.error('加载JSON数据时出错:', error));
}

function toggleTheme() {
    const body = document.body;
    body.classList.toggle('dark-theme');
}

function updateCurrentTime() {
    const currentTimeElement = document.getElementById('current-time');
    const now = new Date();
    currentTimeElement.textContent = now.toLocaleTimeString();
}

function displayUptime() {
    const uptimeElement = document.getElementById('uptime');
    const now = new Date();
    const diff = now - startTime;
    const seconds = Math.floor(diff / 1000) % 60;
    const minutes = Math.floor(diff / (1000 * 60)) % 60;
    const hours = Math.floor(diff / (1000 * 60 * 60));
    uptimeElement.textContent = `页面已运行: ${hours}小时 ${minutes}分钟 ${seconds}秒`;
}

function testSpeed(url, element) {
    const start = performance.now();
    fetch(url, { method: 'HEAD', mode: 'no-cors' })
        .then(() => {
            const end = performance.now();
            const duration = end - start;
            element.textContent = `响应时间: ${Math.round(duration)}ms`;
        })
        .catch(() => {
            element.textContent = `测速失败`;
        });
}

function filterList() {
    const searchInput = document.getElementById('search');
    const searchTerm = searchInput.value.trim().toLowerCase();
    const items = document.querySelectorAll('#address-list li');
    items.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
}

function displayNotification() {
    const notificationElement = document.getElementById('notification');
    notificationElement.innerHTML = '<h3>通知公告</h3><p>欢迎访问我们的地址导航网站！最新公告将在这里显示。</p>';
}

function displayRecommendations() {
    const recommendationsElement = document.getElementById('recommendations');
    recommendationsElement.innerHTML = `
        <h3>友情推荐</h3>
        <ul>
            <li><a href="https://admin.microsoft.com/">OFFICE 365 管理中心</a></li>
            <li><a href="https://www.microsoft365.com/">Microsoft 365 商业</a></li>
            <li><a href="https://site-cdn.easygpt.work/">EasyGPT 广告服务</a></li>
        </ul>
    `;
}

function displayFollowUs() {
    const followUsElement = document.getElementById('follow-us');
    followUsElement.innerHTML = `
        <h3>关注我们</h3>
        <ul>
            <li><a href="https://blog.csdn.net/li1023qwq">CSDN 博客</a></li>
            <li><a href="https://github.com/li1023qwq">GitHub 仓库</a></li>
            <li><a href="https://weibo.com/u/7849892498">微博</a></li>
            
            
        </ul>
    `;
}

let startTime;
