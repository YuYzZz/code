<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Ter5AGRsmhbONk3of4wQFrBABsYRNXkx"></script>
    </head>
    
    <body>
        <div id="allmap" style="height: 400px; width: 80%;margin: 0 auto;margin-bottom: 50px;"></div>
    </body>
    
<script type="text/javascript">
    var map = new BMap.Map("allmap");          // 创建地图实例  
    var myGeo = new BMap.Geocoder();
    //将地址解析结果显示在地图上，并调整地图视野
    myGeo.getPoint("河北软件职业技术学院东校区",function(point){
        if(point){
            map.centerAndZoom(point,16);
            var mark = new BMap.Marker(point);
            var opts = {
                width:200,
                height:100,
                title:"河北软件职业技术学院东校区"
            };
            var infoWindow = new BMap.InfoWindow("", opts);  // 创建信息窗口对象    
            //map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口
            //map.addOverlay(new BMap.Marker(point)); //标注
            mark.addEventListener("click",function(){
                map.openInfoWindow(infoWindow,point); 
            });
            map.addOverlay(mark);
        }else{
            aler("您选择地址没有解析到结果！")
        }
    },"保定市");
    
    
//    var point = new BMap.Point(116.404, 39.915);  // 创建点坐标  
//    map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
</html>
