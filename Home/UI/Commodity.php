<html>
<head>
    <title>商品列表</title>
    <link rel="stylesheet" href="CSS/Commodity_CSS.css"/>
    <script type="text/javascript" charset="utf-8" src="JS/Commodity_JS.js"></script>
    <?php //在HTML标记中添加PHP脚本。
    header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
    include_once '../BLL/Commodity.bll.php';    //加载“商品业务逻辑层”文件。
    ?>
</head>
<body onload="displayMenu();" class="body">
<form name="form" method="post" class="form">
    <div id="menu1" class="menu">
        <a href="Commodity.php" class="href">商品展示</a>
        <a href="Tyolley.php" class="href">购物车</a>
        <a href="Orders.php" class="href">订单查询</a>
        <a href="Information.php" class="href">个人信息</a>
    </div>
    <div id="menu2" class="menu">
        <a href="Login.php" class="href">登录</a>
        <a href="Register.php" class="href">注册</a>
        <a href="Commodity.php" class="href">商品展示</a>
    </div>
    <div class="head">
    </div>
    <div class="subject">
        <div class="textbox">
            <font class="title">查&nbsp;&nbsp;&nbsp;&nbsp;找：</font>
            <input name="search" type="text" class="text1"/>
            <input name="submit" type="submit" value="搜索" class="button1"/>
        </div>
        <br/>
        <div class="textbox">
            <input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
        </div>
        <br/>
        <table class="table">
            <?php
            $row = ceil($Commodity->count / 6);    //计算行数。
            //遍历“商品”行。
            for ($i = 0; $i < $row; $i++) {
                $num = $Commodity->count - $i * 6;    //计算剩余商品数量。
                //判断剩余商品数量。
                if ($num > 6) {
                    $column = 6;    //设置列数。
                } else {
                    $column = $num;    //设置列数。
                }
                ?>
                <tr class="tr">
                    <?php
                    //遍历“商品”列。
                    for ($j = 0; $j < $column; $j++) {
                        $n = $i * 6 + $j;    //计算商品索引。
                        ?>
                        <td class="text_tb" align="center">
                            <input name="id[]" type="hidden" readonly="readonly"
                                   value="<?php echo $Commodity->id[$n]; ?>"/>
                            <input name="image[]" type="image" src="<?php echo $Commodity->image[$n]; ?>"
                                   onclick="return jumpPage(this.parentNode);" class="image"/>
                            <input name="name[]" type="button" value="<?php echo $Commodity->name[$n]; ?>"
                                   onclick="return jumpPage(this.parentNode);" class="button2"/>
                            <input name="price[]" readonly="readonly" type="text"
                                   value="<?php echo $Commodity->price[$n]; ?>" class="text2"/>
                        </td>
                        <?php
                    }
                    //遍历“空白”列。
                    for ($k = 0; $k < 6 - $column; $k++) {
                        ?>
                        <td class="text_tb" align="center">
                            <input name="null" type="text" readonly="readonly" class="null"/>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</form>
</body>
</html>