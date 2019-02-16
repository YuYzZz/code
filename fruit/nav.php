<nav>
    <div class="container">
        <ul class="nav">
            <li><a class="item" href="about.php">关于</a></li>
            <li><a class="item" href="services.php">服务</a></li>
            <li><a class="item" href="blog.php">博客</a></li>
            <li class="logo" ><a  href="index.php"><img src="images/logo.png"></a></li>
            <li><a class="item" href="video.php">视频</a></li>
            <li><a class="item" href="gallery.php">画廊</a></li>
            <li><a class="item" href="contact.php">联系</a></li>
            <li class="menu"><img src="images/menu.png" alt=""></li>
        </ul>
        
        <ul class="r_nav">
            <li><a class="item" href="about.php">关于</a></li>
            <li><a class="item" href="services.php">服务</a></li>
            <li><a class="item" href="blog.php">博客</a></li>
            <li><a class="item" href="video.php">视频</a></li>
            <li><a class="item" href="gallery.php">画廊</a></li>
            <li><a class="item" href="contact.php">联系</a></li>
        </ul>
    </div>
</nav>
<script type="text/javascript">
$(".menu").on ("click",function(){
    //$(".r_nav").slideDown("fast");
    $(".r_nav").slideToggle("fast")
})
</script>