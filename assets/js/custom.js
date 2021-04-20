

$(window).scroll(function () {
    var backTop = $('.back-top');

    if ($(window).scrollTop() > 800) {
        backTop.show()
    } else {
        backTop.hide()
    }
});


function copyConnect(ip) {
    const el = document.createElement('textarea');
    el.value = `connect ${ip}`;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
    alert("Copied to clipboard");

}

$(document).ready(function () {
    $("#serverscontent").load("servers.php");
});