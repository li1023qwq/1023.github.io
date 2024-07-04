// script.js

// 当DOM内容加载完毕后执行
document.addEventListener('DOMContentLoaded', () => {
    // 使用fetch API加载JSON数据
    fetch('index.json')
        .then(response => response.json())  // 将响应转换为JSON
        .then(data => {
            const addressList = document.getElementById('address-list');
            // 遍历JSON数据中的每个地址对象
            data.addresses.forEach(address => {
                const listItem = document.createElement('li');
                const link = document.createElement('a');
                link.href = address.url;
                link.textContent = address.name;
                listItem.appendChild(link);
                addressList.appendChild(listItem);
            });
        })
        .catch(error => console.error('加载JSON数据时出错:', error));  // 处理错误
});
