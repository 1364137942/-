<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课室预约系统</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../js/classroom.js"></script>
<script src="../js/jquery.min.js"></script>
    <style type="text/css">
        .reason {
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            cursor: default;
            /*z-index: 1;*/
        }
        .reason_de{
            position: absolute;
            width: 150px;
            background: lightgoldenrodyellow;
            display: none;
            overflow: auto;
            border: solid 2px gainsboro;
            height: 150px;
            top: 0;
            left: 0;
            border-radius: 10px;
            resize:none;
        }
        table {
            background: #fff;
        }
        #re input{width: 100px; height: 30px; float: right; background-color: #ffffff; border:0;}
    </style>
</head>

<body>
<div id="body">
    <?php
    session_start();
    if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
        header('location:index.php');
        exit;
    }else{
        include "../Mysql.class.php";
        $Mysql = new Mysql();
    }
	if(isset($_GET['value']) && $_GET['value'] == 1){
        unlink('../cookies/'.$_SESSION['num'].'.txt');
        unset($_SESSION['user']);
        unset($_SESSION['num']);
	    header('location:index.php');
	    exit;
	}
    include("header.html");
    ?>
	<div id="main">
        <div id="logout">
            <p><a href="order.php"><?php echo $_SESSION['user']."(".$_SESSION['num'].")";?></a><a href="main.php?value=1"><img src="../photo/logout.png" width="25"  height="25"/></a></p>
        </div>
        <table class="table table-hover table-striped" style="table-layout:fixed;text-align: center">
            <tr>
                <td width="5%">序号</td>
                <td width="8%">类型</td>
                <td width="10%">教室栋号</td>
                <td width="8%">教室号</td>
                <td width="10%">申请日期</td>
                <td width="5%">时间</td>
                <td width="8%">申请人</td>
                <td width="12%">学生号</td>
                <td width="12%">电话</td>
                <td width="15%">邮箱</td>
                <td width="10%">申请理由</td>
                <td width="10%">状态</td>
            </tr>
            <?php
            $query = "select * from `order` join class on class.id = order.class_id where name = '".$_SESSION['user']."' "." and num = '".$_SESSION['num']."' order by date,time desc";
            $order = $Mysql->getAll($query);
            $i = 1;
            foreach ($order as $v) {
                echo "<tr>";
                echo "<td width='5%'>" . $i++ . "</td>";
                echo "<td width='10%' class='type'>";
                switch($v['type']){
                    case 1: echo "教室";break;
                    case 2: echo "实验室";break;
                }
                echo "</td>";
                echo "<td class='building'>" . $v['building'] . "</td>";
                echo "<td class='room'>" . $v['room'] . "</td>";
                echo "<td class='date'>" . $v['date'] . "</td>";
                echo "<td class='time'>" . $v['time'] . "</td>";
                echo "<td class='name'>" . $v['name'] . "</td>";
                echo "<td>" . $v['num'] . "</td>";
                echo "<td>" . $v['phone'] . "</td>";
                echo "<td class='email'>" . $v['email'] . "</td>";
                echo "<td class='reason' onmouseover='showReason(this,event)' onmouseout='hideReason(this)'>" . $v['reason'] . "<textarea class='reason_de'>".$v['reason']."</textarea></td>";
                echo "<td>";
                switch($v['check']){
                    case 1 : echo "待审核";
                        break;
                    case 2 : echo "通过";
                        break;
                    case 3 : echo "不通过";
                        break;
                }
                echo "</td>";
                echo "</tr>";
            }

            ?>
        </table>
        <div id="re"><a href="main.php"><input type="button" value="返回"/></a></div>
    </div>
    <?php
    include("footer.html");
    ?>
</div>
</body>

<script>
    function showReason(obj,event){
        var e = event || window.event;
        var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
        var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
        var x = e.pageX || e.clientX + scrollX;
        var y = e.pageY || e.clientY + scrollY;
//        console.log(x);
//        x -= document.getElementsByClassName('modal-body')[0].offsetLeft;
        obj.children[0].style.top = y - 40 + 'px';
        obj.children[0].style.left = x + 'px';
        obj.children[0].style.display = 'block';
    }
    function hideReason(obj){
//        console.log(obj);
        obj.children[0].style.display = 'none';
    }
</script>
<?php $Mysql->close(); ?>
</html>
