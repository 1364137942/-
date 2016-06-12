<!DOCTYPE html>
<?php
session_start();
if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
    header('location:login.html');
    exit;
}else{
    include "../Mysql.class.php";
    $Mysql = new Mysql();
}

?>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <title>课室管理系统后台管理</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/management.css"/>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .nav .user{
            line-height: 40px;
            float: right;
        }
        .nav .user span{
            cursor: pointer;
        }
        .nav .user span:hover{
            text-decoration: underline;
        }
        .page {
            text-align: center;
        }
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
            height: 80%;
            top: 0;
            left: 0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="management.php">审核列表</a></li>
            <li role="presentation"><a href="classList.php">导入课室列表</a></li>
            <li role="presentation"><a href="course.php">导入课表</a></li>
            <li class="user">
                <?php echo $_SESSION['user']; ?>|<span><a href="loginout.php">注销</a></span>
            </li>
        </ul>

    </div>

    <div class="modal-body">
        <button type="button" class="btn btn-default"><a href="management.php?flag=1">待审核</a></button>
        <button type="button" class="btn btn-success"><a href="management.php?flag=2">通过</a></button>
        <button type="button" class="btn btn-danger"><a href="management.php?flag=3">不通过</a></button>
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
                <td width="10%">操作</td>
            </tr>
            <?php
            include "../Page.class.php";
            if(isset($_GET['flag']) && !empty($_GET['flag'])){
                $flag = $_GET['flag'];
            }else{
                $flag = 1;
            }
            $all = "select count(id) as total_num from `order` where `check` = ".$flag;
            $perpage = 10;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $curPage = $_GET['page'];
                $page = ($_GET['page'] - 1) * $perpage;
            } else {
                $page = $curPage = 0;
            }
            $eachPage = "select *,order.id as order_id from `order` join class on class.id = order.class_id where `check` = ".$flag." order by date,time desc limit " . $page . "," . $perpage;
            $Page = new Page($Mysql,$all,$perpage,$eachPage);

            $pageList = $Page->getPage();

            $i = 1;
            foreach ($pageList['result'] as $v) {
                echo "<tr>";
                echo "<td width='5%'>" . $i++ . "<input type='text' hidden='hidden' class='id' name='id' value='".$v['order_id']."'></td>";
                echo "<td width='10%'>";
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
                echo "<td><select name='check'>";
                switch($v['check']){
                    case 1 : echo "<option value='1' selected>待审核</option><option value='2'>通过</option><option value='3'>不通过</option>";
                                break;
                    case 2 : echo "<option value='1'>待审核</option><option value='2' selected>通过</option><option value='3'>不通过</option>";
                        break;
                    case 3 : echo "<option value='1'>待审核</option><option value='2'>通过</option><option value='3' selected>不通过</option>";
                        break;
                }
                echo "</select></td>";
                echo "</tr>";
            }

            ?>
        </table>

        <?php
        echo "<div class='page'>";
        echo "<a href='management.php?page=1'>首页</a>";
        if ($curPage != 1) {
            echo "<a href='management.php?page=" . ($curPage - 1) . "'>上一页</a>";
        }
        for ($i = ($curPage - 3) <= 0 ? 1 : ($curPage - 3); $i <= ($pageList['pageNum'] < 6 ? $pageList['pageNum'] : 6); $i++) {
            echo "<a href='management.php?page=" . $i . "'>" . $i . "</a>";
        }
        if ($curPage != $pageList['pageNum']) {
            echo "<a href='management.php?page=" . ($curPage + 1) . "'>下一页</a>";
        }
        echo "<a href='management.php?page=" . $pageList['pageNum'] . "'>尾页</a>";
        echo "</div>";
            ?>
    </div>



</div>
</body>
<script>
    $('select').change(function () {
        if(confirm('确定更改审核信息？这会给申请人发送邮件提示')){
            var check = $(this).children('option:selected').val(),
                parent = $(this).parent().parent(),
                order_id = parent.find('input.id')[0].value,
                building = parent.find('td.building').text(),
                room = parent.find('td.room').text(),
                name = parent.find('td.name').text(),
                date = parent.find('td.date').text(),
                time = parent.find('td.time').text(),
                email = parent.find('td.email').text();

            $.ajax({
                type: 'POST',
                url: 'update.php',
                data: {
                    'order_id' : order_id,
                    'check' : check,
                    'email' : email,
                    'building' : building,
                    'room' : room,
                    'name' : name,
                    'date' : date,
                    'time' : time
                },
                dataType: 'json',
                success: function (data){
                    if(data){
                        location.replace(location.href);
                    }else{
                        alert('更新失败');
                    }

                }
            });
        }

    });
    function showReason(obj,event){
        var e = event || window.event;
        var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
        var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
        var x = e.pageX || e.clientX + scrollX;
        var y = e.pageY || e.clientY + scrollY;
//        console.log(x);
        x -= document.getElementsByClassName('modal-body')[0].offsetLeft;
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