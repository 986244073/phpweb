<html>
    <head>
        <title>��¼</title>
        <link rel="stylesheet" href="CSS/Consumers_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Verification_Code.js"></script>
        <script type="text/javascript" charset="utf-8" src="JS/Login_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
            header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Login.bll.php';    //���ء���¼ҵ���߼��㡱�ļ���
        ?>
    </head>
    <body onload="createCode();" class="body">
        <form name="form" method="post" class="form">
            <div class="menu">
                <a href="Login.php" class="href">��¼</a>
                <a href="Register.php" class="href">ע��</a>
                <a href="Commodity.php" class="href">��Ʒչʾ</a>
            </div>
            <div class="head">
            </div>
            <div class="subject">
                <div class="textbox">
                    <input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">��&nbsp;¼&nbsp;����</font>
                    <input name="username" type="text" class="text"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�룺</font>
                    <input name="password" type="password" class="text"/>
                </div>
                <br/>
                <div class="textbox">
                    <font class="title">��&nbsp;֤&nbsp;�룺</font>
                    <input name="verification" type="text" class="verification"/>
                    <input name="code" type="button" onclick="createCode();" class="code"/>
                </div>
                <br/>
                <div class="buttonbox">
                    <input name="submit" type="submit" value="��¼" onclick="return checkInfo();" class="button"/>
                    <input name="submit" type="button" value="ȡ��" onclick="window.location.href='Commodity.php'" class="button"/>
                </div>
            </div>
        </form>
    </body>
</html>