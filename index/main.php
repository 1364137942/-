<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<script src="../js/classroom.js"></script>
<script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="body">
    <?php
    session_start();
    if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
        header('location:index.php');
        exit;
    }
	if(isset($_GET['value']) && $_GET['value'] == 1){
        unlink('../cookies/'.$_SESSION['num'].'.txt');
        session_destroy();
	    header('location:index.php');
	    exit;
	}
    include("header.html");
    ?>
	<div id="main">
		<div id="sel">
		<form method="post" action="javascript:void(0);">
		  <input id="date" type="date" value="2016-06-06" />
		  <select name="time" id="time">
		   <option value="0">请选择时间段</option>
		   <option value="上午" selected>上午</option>
		   <option value="下午">下午</option>
		   <option value="晚上">晚上</option>
		  </select>
		   <select name="type" id="type" onchange="check()">
		   <option value="0">请选择区域</option>
		   <option value="1" >教学楼</option>
		   <option value="2" selected>实验楼</option>
		  </select>
		   <select name="building" id="building">
             <option value="0">请选择栋数</option>
             <option value="A" selected>A栋</option>
             <option value="B">B栋</option>
             <option value="C">C栋</option>
             <option value="D">D栋</option>
             <option value="E">E栋</option>
             <option value="F">F栋</option>
             <option value="G">G栋</option>
           </select>
		   <select name="floor" id="floor">
		   <option value="0">请选择层数</option>
		   <option value="1">1</option>
		   <option value="2" selected>2</option>
		   <option value="3">3</option>
		   <option value="4">4</option>
		   <option value="5">5</option>
		  </select>
		  <input name="sub"  id="search" type="button" value="搜索" />
		   <a href="main.php?value=1">注销</a>
		 </form>
		
		</div>
<!--        <div id="lab">-->
<!--            <div>-->
<!--                <div class="normal floatl busy"><p>03</p>-->
<!--                </div>-->
<!--                <div class="normal floatl chosen"><a href="">04</a></div>-->
<!--                <div class="normal floatl free"><a href="">05</a></div>-->
<!--            </div>-->
<!--            <div>-->
<!--                <div class="large floatr busy"><p>07</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
		<div id="room">
<!--				<div class="normal floatl busy"><p>01</p>-->
<!--				</div>-->
<!--				<div class="normal floatl busy"><p>02</p>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen" onmouseover=""><a href="">03</a>-->
<!--				</div>-->
<!--				<div class="normal floatl free" onmouseover=""><a href="#">04</a>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen" onmouseover=""><p>05</p>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen" onmouseover=""><p>06</p>-->
<!--				</div>-->
<!--				<div class="medium floatl busy"><p>07</p>-->
<!--				</div>-->
<!--				<div class="medium floatl free" onmouseover=""><a href="">08</a>-->
<!--				</div>-->
<!--				<div class="normal floatl busy"><p>09</p>-->
<!--				</div>-->
<!--				<div class="normal floatl busy"><p>10</p>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen" onmouseover=""><p>11</p>-->
<!--				</div>-->
<!--				<div class="normal floatl free" onmouseover=""><a href="">12</a>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen" onmouseover=""><p>13</p>-->
<!--				</div>-->
<!--				<div class="normal floatl chosen"><a href="">14</a></div>-->
<!--            <div class="large floatl busy"><a href="">15</a></div>-->
<!--            <div id="lab">-->
<!--                <div class="normal floatl busy"><p>03</p></div>-->
<!--                <div class="normal floatl chosen"><a href="">04</a></div>-->
<!--                <div class="normal floatl free"><a href="">05</a></div>-->
<!--                <div class="large floatr busy"><p>07</p></div>-->
<!--            </div>-->

		</div>
        <div class="tipBox">
            <div>
                <div class="free tips"></div>
                <p class="tip">空闲</p>
            </div>
            <div>
                <div class="chosen tips"></div>
                <p class="tip">审核中</p>
            </div>
            <div>
                <div class="busy tips"></div>
                <p class="tip">预约成功</p>
            </div>
        </div>
		<div id="info">

		</div>
	</div>
    <div id="order">
        <div id="apply">
            <img id="close" src="../photo/close.png"/>
            <form method="post" action="insertOrder.php">
                <p>本宝宝的名字：<?php echo $_SESSION['user']; ?></p>
                <p id="classroom">本宝宝所申请的教室：</p>
                <p>电话：<input type="text" class="inp" name="phone" placeholder=""/></p>
                <p>邮箱：<input type="text" class="inp" name="email" placeholder="" /></p>
                <input type="text" class="inp" name="date" hidden="hidden" value=""/>
                <input type="text" class="inp" name="time" hidden="hidden" value=""/>
                <input type="text" class="inp" name="id" hidden="hidden" value=""/>

                用途及申请理由：<textarea name="reason" id="reason"  placeholder="" ></textarea>

                <div id="protocol">
                    <h3>《课室使用协议》</h3>
                    <p>1.正确并安全使用教室内一切设备，不破坏教室内一切公物。</p>
                    <p>2.活动期间保持课室整洁，活动结束后主动清理及带走活动所产生的杂物垃圾。</p>
                    <p>3.活动结束后保证关闭一切电源。</p>
                    <p>4.若活动期间损坏公物，请及时上报，并作出相应赔偿。</p>
                    <p>5.若有违反以上规定之一或以上者，将处以公告批评，而且本学期内不得再申请课室。</p>
                </div>

                <input name="agree" id ="check" type="checkbox" value="" /><span>宝宝已阅读并同意以上协议</span>
                <br>
                <input name="sub" type="submit" id="sub"  onmouseover="cover()" onmouseout="out()" value="提交本宝宝的申请" />

            </form>

        </div>

    </div>
    <?php
    include("footer.html");
    ?>
</div>
</body>
<script>
    document.getElementById('search').addEventListener('click',function(){
        var date = document.getElementById('date').value,
            time = document.getElementById('time').value,
            building = document.getElementById('building').value,
            type = document.getElementById('type').value,
            floor = document.getElementById('floor').value;
        info = '';
        document.getElementById('room').innerHTML = '';
        document.getElementById('info').innerHTML = '';
        $.ajax({
            type: "post",
            url: 'getClass.php',
            data: {
                "date": date,
                "time": time,
                "type": type,
                "building": building,
                "floor": floor
            },
            dataType: 'json',
            success: function (data){
//                console.log(data);
                if(data){
                        info = data;
                        var div = "";
                        var area = '';
                    if(type == 1){
                        var i = 1;
                        area = "教学楼";
                    }else if(type == 2){
                        var i = 3;
                        area = "实验楼";
                    }

                    for(var item in data){
                        var className = "floatl";
                        var classroom = area;
                        switch (data[item].size){
                            case '1': className += " normal";break;
                            case '2': className += " medium";break;
                            case '3': className += " large";break;
                        }
                        if(data[item].week != null){
                            className += ' busy';
                        }else {
                            switch (data[item].check){
                                case '1': className += " chosen";break;
                                case '2': className += " busy";break;
                                default : className += " free";break;
                            }
                        }
                        classroom += data[item].building;
                        classroom += data[item].room;
                        div += '<div class="'+className+'" onmouseover="getInfo(this)"><a href="javascript:void(0)" onclick="order('+data[item].id+",'"+classroom+'\')">'+(i++)+'</a></div>';
                        classroom = "";
                    }
                    if(type == 1){
                        document.getElementById('room').innerHTML = div;
                    }else if(type == 2){
                        document.getElementById('room').innerHTML = "<div id='lab'>"+div+"</div>";
                    }



                }
            }
        })
    },false);

    function getInfo(obj){
        var num = obj.children[0].innerHTML-1;
        var type = document.getElementById('type').value;
        if(type == 2){
            num -= 2;
        }
        var infoDetail = eval(info)[num];
        switch (infoDetail.size){
            case '1': infoDetail.size = '50人';break;
            case '2': infoDetail.size = '100人';break;
            case '3': infoDetail.size = '150人';break;
        }
        switch (infoDetail.type){
            case '1': infoDetail.type = '教学楼';break;
            case '2': infoDetail.type = '实验室';break;
        }
        var infoDiv = '';
        infoDiv = '<p><span>教室名称：</span>'+infoDetail.type+infoDetail.building+infoDetail.room+'</p>' +
                    '<p><span>容纳人数：</span>'+infoDetail.size+'</p>' +
                    '<p><span>推荐用途：</span>'+infoDetail.usage+'</p>';
        document.getElementById('info').innerHTML = infoDiv;
    }
    function order(id,classroom){
        var date = document.getElementById('date').value,
            time = document.getElementById('time').value;
        document.getElementById('classroom').innerHTML += classroom;
        var orderForm = document.forms[1];
        console.log(orderForm);
        orderForm.date.value = date;
        orderForm.time.value = time;
        orderForm.id.value = id;
        show();
    }
    function show(){
        var obj = document.getElementById('order');
        obj.style.display = 'block';
        obj.style.left = (document.body.clientWidth/2 - obj.clientWidth/2) + 'px';
        obj.style.top = (document.body.clientHeight/2 - obj.clientHeight/2) + 'px';
    }
    document.getElementById('close').addEventListener('click', function () {
        var obj = document.getElementById('order');
        obj.style.display = 'none';
    },false);

</script>
</html>
