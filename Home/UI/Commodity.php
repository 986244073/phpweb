<html>
<head>
    <title>��Ʒ�б�</title>
    <link rel="stylesheet" href="CSS/Commodity_CSS.css"/>
    <script type="text/javascript" charset="utf-8" src="JS/Commodity_JS.js"></script>
    <?php //��HTML��������PHP�ű���
    header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
    include_once '../BLL/Commodity.bll.php';    //���ء���Ʒҵ���߼��㡱�ļ���
    ?>
</head>
<body onload="displayMenu();" class="body">
<form name="form" method="post" class="form">
    <div id="menu1" class="menu">
        <a href="Commodity.php" class="href">��Ʒչʾ</a>
        <a href="Tyolley.php" class="href">���ﳵ</a>
        <a href="Orders.php" class="href">������ѯ</a>
        <a href="Information.php" class="href">������Ϣ</a>
    </div>
    <div id="menu2" class="menu">
        <a href="Login.php" class="href">��¼</a>
        <a href="Register.php" class="href">ע��</a>
        <a href="Commodity.php" class="href">��Ʒչʾ</a>
    </div>
    <div class="head">
    </div>
    <div class="subject">
        <div class="textbox">
            <font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�ң�</font>
            <input name="search" type="text" class="text1"/>
            <input name="submit" type="submit" value="����" class="button1"/>
        </div>
        <br/>
        <div class="textbox">
            <input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
        </div>
        <br/>
        <table class="table">
            <?php
            $row = ceil($Commodity->count / 6);    //����������
            //��������Ʒ���С�
            for ($i = 0; $i < $row; $i++) {
                $num = $Commodity->count - $i * 6;    //����ʣ����Ʒ������
                //�ж�ʣ����Ʒ������
                if ($num > 6) {
                    $column = 6;    //����������
                } else {
                    $column = $num;    //����������
                }
                ?>
                <tr class="tr">
                    <?php
                    //��������Ʒ���С�
                    for ($j = 0; $j < $column; $j++) {
                        $n = $i * 6 + $j;    //������Ʒ������
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
                    //�������հס��С�
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