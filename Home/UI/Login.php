<html>
    <head>
        <title>登录</title>
        <link rel="stylesheet" href="CSS/Consumers_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Verification_Code.js"></script>
        <script type="text/javascript" charset="utf-8" src="JS/Login_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
            header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Login.bll.php';    //加载“登录业务逻辑层”文件。
        ?>
    </head>
    <body onload="createCode();" class="body">
        <form name="form" method="post" class="form">
            <div class="menu">
                <a href="Login.php" class="href">登录</a>
                <a href="Register.php" class="href">注册</a>
                <a href="Commodity.php" class="href">商品展示</a>
            </div>
            <div class="head">
            </div>
            <div class="subject">
                <div class="textbox">
                    <input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">登&nbsp;录&nbsp;名：</font>
                    <input name="username" type="text" class="text"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">密&nbsp;&nbsp;&nbsp;&nbsp;码：</font>
                    <input name="password" type="password" class="text"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">验&nbsp;证&nbsp;码：</font>
                    <input name="verification" type="text" class="verification"/>
                    <input name="code" type="button" onclick="createCode();" class="code"/>
                </div>
                <br/>
                <div class="buttonbox">
                    <input name="submit" type="submit" value="登录" onclick="return checkInfo();" class="button"/>
                    <input name="submit" type="button" value="取消" onclick="window.location.href='Commodity.php'" class="button"/>
                </div>
            </div>
        </form>
    </body>
</html>