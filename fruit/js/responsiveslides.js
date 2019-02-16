$(function() {


    var ul = $('#slider3'); // 获取ul 
    var li = $('#slider3>li'); //获取所有的图片li
    var l = li.length;
    var a = $('.callbacks_tabs > li > a');
    var interval = 3; //自动运行间隔 
    var index = 0; //开始运行的图片序号（从0开始） 
    var cur, z;
    cur = z = 0; //当前显示的图片序号&&z-index变量 

    function start() {
        pos(index);
        li.timer = setInterval(function() {
            move(1);
        }, interval * 1000);
    }

    function pos(i) {
        z++; //设置图片显示的顺序z-index
        // li.css({
        //     display: none,
        //     float: none,
        //     position: absolute,
        //     opacity: 0,
        //     z - index: 1,
        //     transition: opacity 500 ms ease - in -out
        // });

        li.each(function(index) {
            console.log(a.length);
            if (index == i) {
                $(a[index]).addClass('active');
                $(this).css({ 'display': 'block', 'float': 'left','position': 'relative', 'opacity': 1, 'z-index': 2 });
            } else {
                $(a[index]).removeClass('active');
                $(this).css({  'display': 'block', 'float': 'none','position': 'absolute', 'opacity': 0, 'z-index': 1 });
            }
        });
        // li.removeClass('active');
        // $(li[i]).addClass("active"); //每次让下一张图片z-index加一

        cur = i; //绑定当前显示图片的正确序号

    }


    function move(i) {
        var n = cur + i;
        var m = i == 1 ? (n == l ? 0 : n) : (n < 0 ? l - 1 : n); //下一张或上一张的序号（注意三元选择符的运用） 
        pos(m); //变换到上一张或下一张 
    }
    start();
});
