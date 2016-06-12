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
            <li role="presentation"   class="active"><a href="classList.php">导入课室列表</a></li>
            <li role="presentation"><a href="course.php">导入课表</a></li>
            <li class="user">
                <?php echo $_SESSION['user']; ?>|<span><a href="loginout.php">注销</a></span>
            </li>
        </ul>

    </div>

    <div class="modal-body">
        <form action="do.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputFile">上传excel</label>
                <input type="file" name="file" id="exampleInputFile">

            </div>
            <button type="submit" class="btn btn-default">导入</button>
        </form>
        <table class="table table-hover table-striped">
            <tr>
                <td>序号</td>
                <td>类型</td>
                <td>教室号</td>
                <td>可容纳人数</td>
                <td>教室类型</td>
                <td>用途推荐</td>
            </tr>

            <?php
            include "../Page.class.php";
            $all = "select count(id) as total_num from class";
            $perpage = 10;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $curPage = $_GET['page'];
                $page = ($_GET['page'] - 1) * $perpage;
            } else {
                $page = $curPage = 0;
            }
            $eachPage = "select * from class order by building,room asc limit " . $page . "," . $perpage;
            $Page = new Page($Mysql,$all,$perpage,$eachPage);

            $pageList = $Page->getPage();

            $i = 1;
            foreach ($pageList['result'] as $v) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $v['building'] . "</td>";
                echo "<td>" . $v['room'] . "</td>";
                echo "<td>";
                switch($v['size']){
                    case 1: echo "50人";break;
                    case 2: echo "100人";break;
                    case 3: echo "150人";break;
                }
                echo "</td>";
                echo "<td>";
                switch($v['type']){
                    case 1: echo "教室";break;
                    case 2: echo "实验室";break;
                }
                echo "</td>";
                echo "<td>".$v['usage']."</td>";
                echo "</tr>";
            }

            ?>
        </table>
        <?php
        echo "<div class='page'>";
        echo "<a href='classList.php?page=1'>首页</a>";
        if ($curPage != 1 && $curPage != 0) {
            echo "<a href='classList.php?page=" . ($curPage - 1) . "'>上一页</a>";
        }
        for ($i = ($curPage - 2) <= 0 ? 1 : ($curPage - 2); $i <= (($curPage+2) >= $pageList['pageNum'] ? $pageList['pageNum'] : ($curPage+2)); $i++) {
            echo "<a href='classList.php?page=" . $i . "'>" . $i . "</a>";
        }
        if ($curPage != $pageList['pageNum']) {
            echo "<a href='classList.php?page=" . ($curPage + 1) . "'>下一页</a>";
        }
        echo "<a href='classList.php?page=" . $pageList['pageNum'] . "'>尾页</a>";
        echo "</div>";

        ?>

    </div>



</div>
</body>
<script>

</script>
<?php $Mysql->close(); ?>
</html>