// script.js

$(document).ready(function() {
    // 显示公告弹窗
    $('#announcement-modal').show();

    // 关闭公告弹窗
    $('#announcement-modal .close').on('click', function() {
        $('#announcement-modal').hide();
    });

    // 自动测速
    $('.test-speed').on('click', function() {
        var button = $(this);
        var url = button.data('url');
        var resultSpan = button.next('.speed-result');

        resultSpan.text('测速中...');

        var startTime = new Date().getTime();
        var img = new Image();

        img.onload = function() {
            var endTime = new Date().getTime();
            var duration = endTime - startTime;
            resultSpan.text('响应时间: ' + duration + ' ms');
        };

        img.onerror = function() {
            resultSpan.text('999ms');
        };

        img.src = url + '/favicon.ico?_=' + startTime;
    });

    // 联系方式弹窗
    $('.contact-option').on('click', function() {
        var contactType = $(this).data('contact');
        var modalBody = $('#modal-body');
        modalBody.empty();

        if (contactType === 'wechat') {
            modalBody.html('<img src="images/gzh.jpg" alt="WeChat QR Code">');
        } else if (contactType === 'weibo') {
            modalBody.html('<p>微博链接: <a href="https://weibo.com/u/7849892498" target="_blank">点击这里访问</a></p>');
        } else if (contactType === 'qq') {
            modalBody.html('<p>QQ频道链接: <a href="https://pd.qq.com/s/f4sodfwyf" target="_blank">点击这里访问</a></p>');
        }

        $('#contact-modal').show();
    });

    // 关闭联系方式弹窗
    $('#contact-modal .close').on('click', function() {
        $('#contact-modal').hide();
    });
});
