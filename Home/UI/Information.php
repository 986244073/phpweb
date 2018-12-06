<html>
    <head>
        <title>个人信息</title>
        <link rel="stylesheet" href="CSS/Information_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Control_Rows.js"></script>
        <script type="text/javascript" charset="utf-8" src="JS/Information_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
            header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Information.bll.php';    //加载“个人信息业务逻辑层”文件。
        ?>
    </head>
    <body onload="tdVisibility();" class="body">
        <form name="form" method="post" class="form">
            <div class="menu">
                <a href="Commodity.php" class="href">商品展示</a>
                <a href="Tyolley.php" class="href">购物车</a>
                <a href="Orders.php" class="href">订单查询</a>
                <a href="Information.php" class="href">个人信息</a>
            </div>
            <div class="head">
            </div>
            <div class="subject">
                <table class="table">
                    <tr class="tr">
                        <td colspan="5" class="result_tb" align="center">
                            <input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td colspan="5" class="result_tb" align="center">
                        </td>
                    </tr>
                    <tr class="tr">
                        <td class="text_tb" align="center">
                            <font class="title">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</font>
                            <input name="realname" type="text" value="<?php echo $Information->realname; ?>" class="text"/>
                        </td>
                        <td class="text_tb" align="center">
                            <font class="title">手&nbsp;机&nbsp;号：</font>
                            <input name="cellphone" type="text" value="<?php echo $Information->cellphone; ?>" class="text"/>
                        </td>
                        <td class="text_tb" align="center">
                            <font class="title">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</font>
                            <input name="mail" type="text" value="<?php echo $Information->mail; ?>" class="text"/>
                        </td>
                    </tr>
                    <tbody id="receiving">
                        <?php
                            //遍历“收货信息”。
                            for ($i = 0; $i < $Information->receiving_count; $i++)
                            {
                        ?>
                            <tr class="tr">
                                <td colspan="5" class="result_tb" align="center">
                                </td>
                            </tr>
                            <tr class="tr">
                                <td class="text_tb" align="center">
                                    <font class="title">收&nbsp;件&nbsp;人：</font>
                                    <input name="receiving_name[]" type="text" value="<?php echo $Information->receiving_name[$i]; ?>" class="text"/>
                                </td>
                                <td class="text_tb" align="center">
                                    <font class="title">电&nbsp;&nbsp;&nbsp;&nbsp;话：</font>
                                    <input name="receiving_contact[]" type="text" value="<?php echo $Information->receiving_contact[$i]; ?>" class="text"/>
                                </td>
                                <td class="text_tb" align="center">
                                    <font class="title">地&nbsp;&nbsp;&nbsp;&nbsp;址：</font>
                                    <input name="receiving_address[]" type="text" value="<?php echo $Information->receiving_address[$i]; ?>" class="text"/>
                                </td>
                                <td class="button_tb" align="center">
                                    <input name="plus" type="button" value="+" onclick="plusRow();" class="button1"/>
                                </td>
                                <td class="button_tb" align="center">
                                    <input name="reduce" type="button" value="-" onclick="reduceRow(this.parentNode.parentNode);" class="button1"/>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <br/>
                <div class="buttonbox">
                    <input name="submit" type="submit" value="保存" onclick="return checkInfo();" class="button2"/>
                    <input name="submit" type="button" value="取消" onclick="window.location.href='Commodity.php'" class="button2"/>
                </div>
            </div>
        </form>
    </body>
</html>