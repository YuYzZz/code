<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>联系</title>
        <link rel="stylesheet" href="css/css.css" />
        <link rel="stylesheet" href="css/contact.css" />
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
        
<!--        内容-->
        <div class="contact">
            <span>联系我们</span>
<!--             左div-->
            <div class="contact-left">
                <p>你的名字</p>
                <input type="text">
                <p>你的电子邮箱</p>
                <input  type="text">
                <p>你的意见</p>
                <input  type="text">
                <input type="button" name="" value="提交">
            </div>
<!--             右div-->
            <div class="contact-right">
                <p>我们的位置</p>
                <div>
                    我们位于保定市军校广场，保定有“京畿重地”之称，是京津冀地区中心城市之一，北邻北京市和张家口市，东接廊坊市和沧州市，南与石家庄市和衡水市相连，西部与山西省接壤。
	保定以“保卫大都，安定天下”得名，素有“北控三关南达九省畿辅重地，都南屏翰”之称。清代，保定为直隶省省会，是直隶总督驻地，在此后200多年间为中国近代史上的区域性政治中心新中国成立后曾两度为河北省省会保定也是传说中尧帝的故乡，有着3000多年的历史是历史上燕国、中山国、后燕立都之地境内文物古迹众多，如大慈阁、直隶总督署、清西陵等
                </div>
                <div class="contact-right-b">
                    <div>
                        保定市 莲池区<br>
                        东风东路<br>
                        999号<br>
                    </div>
                    <div>
                        Tel: +1 234-567-890<br>
                        Fax: +1 646-216-9789<br>
                        Email: info@yourdomain.com<br>
                    </div>
                </div>
            </div>
        </div>
        
<!--地图-->
        <?php
        include 'ditudemo.php';
        ?>
        
         <!--        底部-->
        <?php
            include 'bottom.php';
        ?> 
    </body>
</html>
