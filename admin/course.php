<!DOCTYPE html>
<?php
session_start();
if(!(isset($_SESSION['admin']) && !empty($_SESSION['admin']))){
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

    <title>课室预约系统后台管理</title>
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
    </style>
</head>
<body>
<div class="container">
    <div>
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="management.php">待审核</a></li>
            <li role="presentation" ><a href="classList.php">导入课室列表</a></li>
            <li role="presentation"  class="active"><a href="course.php">导入课表</a></li>
            <li class="user">
                <?php echo $_SESSION['admin']; ?>|<span><a href="loginout.php">注销</a></span>
            </li>
        </ul>

    </div>

    <div class="modal-body">
        <form action="doCourse.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputFile">上传excel</label>
                <input type="file" name="file" id="exampleInputFile">

            </div>
            <button type="submit" class="btn btn-default">导入</button>
        </form>
        <table class="table table-hover table-striped">
            <tr>
                <td>序号</td>
                <td>教书栋号</td>
                <td>教室号</td>
                <td>上课日期</td>
                <td>上课时间</td>
            </tr>

            <?php
            include "../Page.class.php";
            $all = "select count(class_id) as total_num from course";
            $perpage = 10;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $curPage = $_GET['page'];
                $page = ($_GET['page'] - 1) * $perpage;
            } else {
                $page = $curPage = 0;
            }
            $eachPage = "select * from course join class on course.class_id = class.id order by class_id asc limit " . $page . "," . $perpage;
            $Page = new Page($Mysql,$all,$perpage,$eachPage);
            $pageList = $Page->getPage();

            $i = 1;
            foreach ($pageList['result'] as $v) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $v['building'] . "</td>";
                echo "<td>" . $v['room'] . "</td>";
                echo "<td>";
                    switch($v['week']){
                        case 0: echo "星期天";break;
                        case 1: echo "星期一";break;
                        case 2: echo "星期二";break;
                        case 3: echo "星期三";break;
                        case 4: echo "星期四";break;
                        case 5: echo "星期五";break;
                        case 6: echo "星期六";break;
                    }
                echo "</td>";
                echo "<td>" . $v['time'] . "</td>";
                echo "</tr>";
            }

            ?>
        </table>
        <?php
        echo "<div class='page'>";
        echo "<a href='course.php?page=1'>首页</a>";
        if ($curPage != 1 && $curPage != 0) {
            echo "<a href='course.php?page=" . ($curPage - 1) . "'>上一页</a>";
        }
        for ($i = ($curPage - 2) <= 0 ? 1 : ($curPage - 2); $i <= (($curPage+2) >= $pageList['pageNum'] ? $pageList['pageNum'] : ($curPage+2)); $i++) {
            echo "<a href='course.php?page=" . $i . "'>" . $i . "</a>";
        }
        if ($curPage != $pageList['pageNum']) {
            echo "<a href='course.php?page=" . ($curPage + 1) . "'>下一页</a>";
        }
        echo "<a href='course.php?page=" . $pageList['pageNum'] . "'>尾页</a>";
        echo "</div>";

        ?>

    </div>



</div>
</body>
<script>

</script>
<?php $Mysql->close(); ?>
</html>