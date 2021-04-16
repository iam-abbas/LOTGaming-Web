

$(window).scroll(function () {
    var backTop = $('.back-top');

    if ($(window).scrollTop() > 800) {
        backTop.show()
    } else {
        backTop.hide()
    }
});