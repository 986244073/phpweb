<html>
    <head>
        <title>������Ϣ</title>
        <link rel="stylesheet" href="CSS/Information_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Control_Rows.js"></script>
        <script type="text/javascript" charset="utf-8" src="JS/Information_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
            header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Information.bll.php';    //���ء�������Ϣҵ���߼��㡱�ļ���
        ?>
    </head>
    <body onload="tdVisibility();" class="body">
        <form name="form" method="post" class="form">
            <div class="menu">
                <a href="Commodity.php" class="href">��Ʒչʾ</a>
                <a href="Tyolley.php" class="href">���ﳵ</a>
                <a href="Orders.php" class="href">������ѯ</a>
                <a href="Information.php" class="href">������Ϣ</a>
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
                            <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;����</font>
                            <input name="realname" type="text" value="<?php echo $Information->realname; ?>" class="text"/>
                        </td>
                        <td class="text_tb" align="center">
                            <font class="title">��&nbsp;��&nbsp;�ţ�</font>
                            <input name="cellphone" type="text" value="<?php echo $Information->cellphone; ?>" class="text"/>
                        </td>
                        <td class="text_tb" align="center">
                            <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�䣺</font>
                            <input name="mail" type="text" value="<?php echo $Information->mail; ?>" class="text"/>
                        </td>
                    </tr>
                    <tbody id="receiving">
                        <?php
                            //�������ջ���Ϣ����
                            for ($i = 0; $i < $Information->receiving_count; $i++)
                            {
                        ?>
                            <tr class="tr">
                                <td colspan="5" class="result_tb" align="center">
                                </td>
                            </tr>
                            <tr class="tr">
                                <td class="text_tb" align="center">
                                    <font class="title">��&nbsp;��&nbsp;�ˣ�</font>
                                    <input name="receiving_name[]" type="text" value="<?php echo $Information->receiving_name[$i]; ?>" class="text"/>
                                </td>
                                <td class="text_tb" align="center">
                                    <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;����</font>
                                    <input name="receiving_contact[]" type="text" value="<?php echo $Information->receiving_contact[$i]; ?>" class="text"/>
                                </td>
                                <td class="text_tb" align="center">
                                    <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;ַ��</font>
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
                    <input name="submit" type="submit" value="����" onclick="return checkInfo();" class="button2"/>
                    <input name="submit" type="button" value="ȡ��" onclick="window.location.href='Commodity.php'" class="button2"/>
                </div>
            </div>
        </form>
    </body>
</html>