<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script type="text/javascript">
        var fil1=1.0;
        var	fil2=0;
        var	fil3=0;
        var img=1;
        function show_photo(){
            if(img==1){
                fil1=fil1-0.01;
                fil2=fil2+0.01;
                if(fil1<0) img=2;
            }else if(img==2){
                fil2=fil2-0.01;
                fil3=fil3+0.01;
                if(fil2<0) img=3;
            }else{
                fil1=fil1+0.01;
                fil3=fil3-0.01;
                if(fil3<0) img=1;
            }
            document.getElementById("img1").style.opacity=fil1;
            document.getElementById("img2").style.opacity=fil2;
            document.getElementById("img3").style.opacity=fil3;
            setTimeout("show_photo()",50);
        }
    </script>
</head>
<body>
<div id="body">
    <?php
    include("header.html");
    ?>
    <div id="main">
        <div id="photo">
            <div id="p1">
                <img src="../photo/img/1.jpg" width="720" height="540" id="img1" class="filter">
            </div>
            <div id="p2">
                <img src="../photo/img/2.jpg" width="720" height="540" id="img2" class="filter">        	</div>
            <div id="p3">
                <img src="../photo/img/3.jpg" width="720" height="540" id="img3" class="filter">        	</div>
        </div>
        <div id="login">
            <div id="f">
                <form method="post" action="checkLogin.php">
                    <div id="user">
                        <input class="input" type="text" name="user" placeholder="请输入用户名">
                    </div>
                    <div id="pwd">
                        <input class="input" type="password" name="password" placeholder="请输入密码">
                    </div>
                    <div>
                        <input class="sub" type="submit" value="登录" name="sub">
                    </div>
                </form>
                <div id="admin"><a href="../admin/login.html">管理员登录</a></div>
            </div>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</div>
<script language="JavaScript"> show_photo();</script>
</body>
</html>