<html>
    <head>
        <title>��Ʒ����</title>
        <link rel="stylesheet" href="CSS/Details_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Details_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Details.bll.php';    //���ء�����ҵ���߼��㡱�ļ���
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
    			<img name="image" src="<?php echo $Commodity->image; ?>" class="image"/>
    			<div class="textbox1">
    				<font class="title">��Ʒ���ƣ�</font>
    				<input name="name" type="text" readonly="readonly" value="<?php echo $Commodity->name; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;��</font>
    				<input name="price" type="text" readonly="readonly" value="<?php echo $Commodity->price; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�棺</font>
    				<input name="stock" type="text" readonly="readonly" value="<?php echo $Commodity->stock; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;����</font>
    				<input name="sales" type="text" readonly="readonly" value="<?php echo $Commodity->sales; ?>" class="text1"/>
					<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">����������</font>
    				<input name="reduce" type="button" value="-" onclick="reduceNumber();" class="button1"/>
                    <input name="number" type="text" readonly="readonly" value="1" class="text2"/>
                    <input name="plus" type="button" value="+" onclick="plusNumber();" class="button1"/>
                    <input id="submit" name="submit" type="submit" value="���빺�ﳵ" class="button2"/>
                    <br/>
                    <br/>
                    <input name="result" type="text" readonly="readonly" value="<?php echo $result;?>" class="result"/>
    			</div>
    			<div class="textbox2">
    				<textarea name="details" readonly="readonly" class="details"><?php echo $Commodity->details; ?></textarea>
    			</div>
    		</div>
    	</form>
    </body>
</html>