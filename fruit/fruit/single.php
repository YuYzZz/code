<?php
    header("Content-Type:text/html;charset=utf-8");
    $con = mysqli_connect("localhost", "root", "root", "huaban");
    mysqli_set_charset($con, "utf8");
    
    $sql ="select * from comment";
    
    $result = mysqli_query($con,$sql);
    
  
    

?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>评论</title>
        <link rel="stylesheet" href="css/css.css" />
        <link rel="stylesheet" href="css/single.css" />
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/responsiveslides.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
    </head>
    <body>
        <?php
        include 'head.php';
        include 'nav.php';
        ?>
        
        <img src="./images/banner1.png" class="images"> 
<!--        左边-->
        <div class="single">
             <span>博客</span>    
             
                <div class="single-left">
                    <img src="./images/5.jpg">
                    <div>对于果汁加香草好喝还是加老干妈好喝的讨论</div>
                    <div><span>发表于</span>2017年4月5日</div>
                    <div>	这是一大段文案我也不知道写啥 百度翻译也没法翻译 反正就是不会写 巴拉巴拉巴拉巴贝拉把巴拉巴拉白萝卜 “一年多以前，和农夫山泉创始人钟睒睒一起去长白山，飞机上他和我说，他要做一款中国国家领导人接待外宾时桌子上放的水今天，他做到了！”钱江晚报记者的朋友圈，前些天有位前辈“大慰平生”发了这一段文字。
               矿泉水，早已经是人们日常生活中最常消费的饮品，即便顶尖规格的会议中也少不了它的身影。一瓶水的方寸之间，能做出什么样的文章？在刚刚过去的G20杭州峰会期间，频频出现在镜头里的农夫山泉给出了这么一个答案：质量、设计、细节的追求，“毫升”之间的匠心独运。连农夫山泉总裁办公室主任钟晓晓也感到意外，在全世界媒体对G20杭州峰会每一处细节都不放过的报道之中，在主会场、茶歇区、新闻中心、各大接待酒店以及国宴餐桌上，都能看到农夫山泉饮品的身影作为G20杭州峰会的工作和厨房用水的农夫山泉倒突然有了几分“网红”的待遇。
               这是一大段文案我也不知道写啥 百度翻译也没法翻译 反正就是不会写 巴拉巴拉巴拉巴贝拉把巴拉巴拉白萝卜 “一年多以前，和农夫山泉创始人钟睒睒一起去长白山，飞机上他和我说，他要做一款中国国家领导人接待外宾时桌子上放的水今天，他做到了！”钱江晚报记者的朋友圈，前些天有位前辈“大慰平生”发了这一段文字。
               矿泉水，早已经是人们日常生活中最常消费的饮品，即便顶尖规格的会议中也少不了它的身影。一瓶水的方寸之间，能做出什么样的文章？在刚刚过去的G20杭州峰会期间，频频出现在镜头里的农夫山泉给出了这么一个答案：质量、设计、细节的追求，“毫升”之间的匠心独运。
       连农夫山泉总裁办公室主任钟晓晓也感到意外，在全世界媒体对G20杭州峰会每一处细节都不放过的报道之中，在主会场、茶歇区、新闻中心、各大接待酒店以及国宴餐桌上，都能看到农夫山泉饮品的身影作为G20杭州峰会的工作和厨房用水的农夫山泉倒突然有了几分“网红”的待遇。</div>
                    <div class="single-kuan">
                        <?php while($arr=mysqli_fetch_assoc($result)){ ?>
                        <div class="single-bottom">
                            <ul>
                                <li><img src="./images/Copy 2.png"></li>
                                <li>Simmy</li>
                                <li><?php echo $arr["conent"]; ?></li>
                            </ul>
                        </div>
                        <?php }?>        
 
                    </div>
                </div>
             <!--        右边-->
            <div class="single-rigth">
                <div>相关文章</div>
                <div class="single-rigth-you">
                    <ul>
                        <li><img src="./images/b1.jpg"></li>
                        <li>我们只生产有中国特色社会……</li>
                        <li>这是一大段文案我也不知道写啥 百度翻译也没法翻译 反正就是不会写巴拉巴拉巴拉巴贝拉把巴拉巴拉白萝卜</li>
                    </ul>
                </div>
                <div class="single-rigth-you">
                    <ul>
                        <li><img src="./images/b1.jpg"></li>
                        <li>我们只生产有中国特色社会……</li>
                        <li>这是一大段文案我也不知道写啥 百度翻译也没法翻译 反正就是不会写巴拉巴拉巴拉巴贝拉把巴拉巴拉白萝卜</li>
                    </ul>
                </div>
                <div class="single-rigth-you">
                    <ul>
                        <li><img src="./images/b1.jpg"></li>
                        <li>我们只生产有中国特色社会……</li>
                        <li>这是一大段文案我也不知道写啥 百度翻译也没法翻译 反正就是不会写巴拉巴拉巴拉巴贝拉把巴拉巴拉白萝卜</li>
                    </ul>
                </div>
            </div>
            
            <!--        文本框-->
            <textarea class="yy" placeholder="请发表您的评论" id="text"></textarea>
                <div class="input">
                    <input type="button" name="" value="提交" id="anniu">
                </div>

        </div>

        
        
        <!--        底部-->
        <?php
            include 'bottom.php';
        ?> 
    </body>
</html>
<script>
    $(function(){
        //当注册按钮点击的时候执行的函数
        $("#anniu").click(function(){
            //ajax==简单理解为发送请求的一个东西
            $.ajax({
                url:"pinglun.php",
                type:"POST",
                data:{text : $("#text").val()},
                success:function(data){
                    
                    if(data==1){
                        alert("评论成功");
                        location.reload();
                    }
                    else{
                        alert("评论失败");
                    }
                }
            })
        })
    })

</script>