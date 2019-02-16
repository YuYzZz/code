<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>视频</title>
        <link rel="stylesheet" href="css/css.css" />
        <link rel="stylesheet" href="css/index.css" />
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
        
<!--        中间内容-->

     <div class="video-content">
		<div class="video-v">
			<!--<video src="videoideo.flv" controls="controls"><ideo>-->
                    <iframe src="H5_4_6.php" width="800px" height="600px" style="border:none; overflow: hidden;">
			</iframe>
		</div>
	</div>
<!--        底部-->
<?php
include 'bottom.php';
?>

<div id="return-top" style="display: block;">
		
			<a href="#zhiding">
				<img src="./images/arr.png"/>
			</a>

	</div>

    </body>
</html>
   <script type="text/javascript">
	/*****************************声明变量********************************/
// 得到视频
	var video = document.getElementsByClassName('video')[0];
// 得到播放暂停按钮
	var play = document.getElementsByClassName('play')[0];
// 得到当前播放时间显示 
	var currTime = document.getElementsByClassName('currTime')[0];
// 得到进度条轨道
	var progressTrack = document.getElementsByClassName('progressTrack')[0];
// 得到总播放时间显示
	var duration = document.getElementsByClassName('duration')[0];
// 得到音量按钮
	var volume = document.getElementsByClassName('volume')[0];
// 得到音量显示
	var volumeBar = document.getElementsByClassName('volumeBar')[0];
// 得到音量滑动条
	var volumeTrack = document.getElementsByClassName('volumeTrack')[0];
//得到音量显示小图标
	var Speaker = document.getElementsByClassName('Speaker')[0];
// 得到全屏按钮
	var fullScreen = document.getElementsByClassName('fullScreen')[0];

/*****************************注册事件********************************/
//注册播放暂停事件
	play.addEventListener('click',playChange);
//注册点击滑动条的快进回退事件
	progressTrack.addEventListener('click',progressChange);
// 注册音量点击按钮事件
	volume.addEventListener('click',volumeChange);
// 注册音量显示点击事件
	volumeBar.addEventListener('click',volumeBarChange);
// 注册音量滑动条轨道点击改变音量大小事件
	volumeTrack.addEventListener('click',volumeTrackChange);
// 注册全屏按钮事件
	fullScreen.addEventListener('click',screenChange);
// 注册视频总时长发生变更监听
	video.addEventListener('durationchange',durationChange);
// 注册视频播放实时监听 
	video.addEventListener('timeupdate',timeupdateChange);
// 注册视频播放结束监听
	video.addEventListener('ended',playEnded);

/*****************************方法事件********************************/
/*
说明：根据video.paused判定当前播放状态，true为暂停，false为播放
*/
	function playChange(){
		if(video.paused == true)
		{
			// 如果当前状态暂停则播放，并改变音量按钮图标显示
			video.play();
			// video.currentTime = 200;//测试用例
			this.style.background = 'url(./images/control_01.png) 0px 0px no-repeat';
		}
		else{
			video.pause();
			this.style.background = 'url(./images/control_01.png) 0px -32px no-repeat';
		}

	}
/*
说明：根据event.offsetX获取鼠标点击在进度条这种的当前位置，从0到500；但是由于绘图canvas做了圆角处理，圆角占用5px，所以，范围从5到495。
*/
	function progressChange(event){
		var xPos = event.offsetX;
		// 如果不加判定，xPos=0不会显示圆角，可注释当前if判定运行查看结果
		if(xPos < 5)
			xPos = 5;
		// 进度条
		progressBar.xPos = xPos;
		progressBar.render();
		// 根据当前位置在进度长度中所占的比例来确定当前播放时间在总时间中的比例
		var rate = xPos / 495;
		var time = rate * video.duration;
		video.currentTime = time;
	}
/*
说明：点击显示或隐藏音量显示条
*/
	function volumeChange(event){
		// 如果音量显示条为隐藏状态则显示，反之亦然
		if(volumeBar.style.display == 'none')
		{
			volumeBar.style.display = 'block';
			// 音量显示条出现的时候因为有当前默认音量，所以要根据当前音量绘制音量滑动条，由于volume区间为0-1，所以video.volume * 90 可得当前位置，但由于音量控制实际是从下向上变大，而绘制坐标显示是左上角为（0,0）点，即从上向下变大；所以用1-video.volume，得到相反的结果。
			volBar.yPos = (1-video.volume) * 90;
			// 这里因为圆角处理问题如果volBar.yPos=0，则没有圆角效果
			if(volBar.yPos < 5)
				volBar.yPos = 5;
			volBar.render();
		}
		else
		{
			volumeBar.style.display = 'none';
		}
	}
/*
说明：这个方法的意义主要是阻止事件冒泡到音量图标按钮上，可以注释该方法后点击volumeBar查看效果。
*/
	function volumeBarChange(event){

		// 这里的判定主要是为了设置音量为0，当event.offsetY < 0的之后代表点击到了小三角，event.offsetY > 105代表点击到了音量滑动条之下，小三角之上。
		if(event.offsetY > 105 || event.offsetY < 0)
		{
			video.volume = 0;
			// 根据音量来改变当前音量按钮图片
			changeVolumeImage(video.volume);

			// 设置音量为 0后的滑动条显示结果
			volBar.yPos = 90;
			volBar.render();
		}
		// 停止冒泡,否则会调用音量点击按钮功能，让音量显示消失
		event.stopPropagation();
	}
/*
说明：通过点击滑动条得到offsetY来改变音量滑动条显示和音量大小
*/
	function volumeTrackChange(event){
		
		var temp = 0;
		// 这里由于坐标系是从上向下变大，但是音量控制是从上向下变下，所以做了特殊处理，处理思路于236行代码一致，需要仔细琢磨。
		if(event.offsetY > 0 && event.offsetY <=90)
			temp = Math.abs(event.offsetY - 90);
		// 得到比例设置音量，音量本来就是0-1之间的值，所以可以将比例直接付给音量
		var rate = temp / 90;
		video.volume = rate;
		// 根据当前音量改变音量按钮图片
		changeVolumeImage(video.volume);

		// 改变音量滑动条显示，滑动条区间为0-95，但是由于圆角问题做了一下处理，否则两个顶端不会有圆角效果。
		volBar.yPos = event.offsetY;
		if(event.offsetY < 5)
		{
			volBar.yPos = 5;
		}
		if(event.offsetY > 90)
		{
			volBar.yPos = 90;
		}

		volBar.render();
		// 停止冒泡,否则会调用音量点击按钮功能，让音量显示消失
		event.stopPropagation();
	}
/*
说明：根据当前音量来设定音量显示图标
*/
	function changeVolumeImage(volume){
		if(volume==0){
			// 静音
			Speaker.src = './images/Speaker_mute.png';
		}
		else if(volume < 0.6){
			// 小声
			Speaker.src = './images/Speaker_low.png';
		}
		else{
			// 大声
			Speaker.src = './images/Speaker_louder.png';
		}
	}
/*
说明：全屏处理，思考JS取消全屏如果操作？？？
*/
	function screenChange(){
		if (video.requestFullscreen) {
				video.requestFullscreen();
			} else if (video.mozRequestFullScreen) {
				video.mozRequestFullScreen();
			} else if (video.webkitRequestFullscreen) {
				video.webkitRequestFullscreen();
			} else if (video.msRequestFullscreen) {
				video.msRequestFullscreen();
			}
	}
/*
说明：媒体总时长发生变更,可以理解为是播放准备就绪
*/
	function durationChange(){
		// 初始化音量大小
		video.volume = 0.3;
		// 转换秒后给总时长赋值
		duration.innerText = calcTime(this.duration);
	}
/*
说明：播放进行中监听
*/
	function timeupdateChange(){
		// 转换秒后给总时长赋值
		currTime.innerText = calcTime(this.currentTime); 
		// 根据当前播放时长在总时长中的比例计算播放进度条的当前位置，进度条范围0-500，因为圆角问题做了5-495的处理
		var rate = this.currentTime / this.duration;
		var xPos = rate * 495;
		if(xPos < 5)
			xPos = 5;
		progressBar.xPos = xPos;
		progressBar.render();
		/*
			0~204
			0~500
		*/
	}
/*
说明：视频播放结束监听
*/
	function playEnded(){
		// 还原播放按钮状态
		play.style.background = 'url(./images/control_01.png) 0px -32px no-repeat';
	}
/*
说明：转换秒为小时、分钟、秒，可以用3750秒在计算器中根据下面逻辑自行计算推演。
*/
	function calcTime(time){
		var remaining_time = time;
		var hour = 0;
		var minute = 0;
		var second = 0;
		hour = Math.floor(remaining_time / 3600);
		remaining_time -= hour * 3600;
		minute = Math.floor(remaining_time / 60);
		remaining_time -= minute * 60;
		second = Math.floor(remaining_time);
		if(minute < 10)
			minute = '0' + minute;
		if(second < 10)
			second = '0' + second;
		var rst = hour + ':' + minute + ':' + second;

		return rst;
	}
// 声明进度条
	var progressBar = new drawProgressBar();
	function drawProgressBar(){
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');

		canvas.width = 500;
		canvas.height = 10;
		canvas.style.position = 'absolute';
		progressTrack.appendChild(canvas);

		this.xPos = 5;
		this.render = function(){
			ctx.clearRect(0,0,canvas.width,canvas.height);
			ctx.beginPath();
			ctx.lineWidth = 10;
			var gradient = ctx.createLinearGradient(0,0,500,10);
			gradient.addColorStop(0,'orange');
			gradient.addColorStop(0.5,'blue');
			gradient.addColorStop(1,'red');
			ctx.strokeStyle = gradient;
			ctx.lineCap = 'round';
			ctx.moveTo(5,5);
			ctx.lineTo(this.xPos,5);
			ctx.stroke();
		}
	}
// 声明音量条
	var volBar = new drawVolumeBar();
	volBar.render();
	function drawVolumeBar(){
		var canvas = document.createElement('canvas');

		canvas.width = 10;
		canvas.height = 95;
		canvas.style.position = 'absolute';
		volumeTrack.appendChild(canvas);

		this.yPos = 5;
		this.render = function(){
			var ctx = canvas.getContext('2d');
			ctx.clearRect(0,0,canvas.width,canvas.height);
			ctx.beginPath();
			ctx.lineWidth = 10;
			ctx.strokeStyle = '#D9534F';
			ctx.lineCap = 'round';
			if(this.yPos != 90)
			{
				ctx.moveTo(5,90);
				ctx.lineTo(5,this.yPos);
				ctx.stroke();
			}
		}
	}


</script>


