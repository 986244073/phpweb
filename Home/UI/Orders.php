<html>
    <head>
        <title>������ѯ</title>
        <link rel="stylesheet" href="CSS/Orders_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Orders_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Orders.bll.php';    //���ء�����ҵ���߼��㡱�ļ���
        ?>
    </head>
    <body onload="displayButton();" class="body">
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
    			<input name="index" type="hidden" readonly="readonly"/>
		    	<?php
		    		//��������������
		    		for ($i = 0; $i < $Orders->count; $i++)
		    		{
		    	?>
		    		<div class="textbox">
		    			<font class="title">��&nbsp;��&nbsp;�ţ�</font>
		    			<input name="id[]" type="text" readonly="readonly" value="<?php echo $Orders->id[$i]; ?>" class="text1"/>
		    			<font class="title">����ʱ�䣺</font>
		    			<input name="time[]" type="text" readonly="readonly" value="<?php echo $Orders->time[$i]; ?>" class="text1"/>
		    			<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�ƣ�</font>
		    			<input name="total[]" type="text" readonly="readonly" value="<?php echo $Orders->total[$i]; ?>" class="text1"/>
		    		</div>
		    		<div class="textbox">
		    			<font class="title">��&nbsp;��&nbsp;�ˣ�</font>
		    			<input name="receiving_name[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_name[$i]; ?>" class="text1"/>
		    			<font class="title">��ϵ��ʽ��</font>
		    			<input name="receiving_contact[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_contact[$i]; ?>" class="text1"/>
		    			<font class="title">�ռ���ַ��</font>
		    			<input name="receiving_address[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_address[$i]; ?>" class="text1"/>
		    		</div>
					<table id="orders" class="table">
						<tr class="tr">
							<th class="th1">����</th>
							<th class="th2">ͼƬ</th>
							<th class="th1">����</th>
							<th class="th1">����</th>
							<th class="th1">�ܼ�</th>
						</tr>
						<?php
							//��������Ʒ��Ϣ����
							for ($j = 0; $j < $Orders->commodity_count[$i]; $j++)
							{
						?>
							<tr class="tr">
			    				<td class="text_tb" align="center">
			    					<input name="commodity_name[]" type="text" readonly="readonly"  value="<?php echo $Orders->commodity_name[$i][$j]; ?>" class="text2"/>
			    				</td>
			    				<td class="image_tb" align="center">
			    					<img name="commodity_image[]" src="<?php echo $Orders->commodity_image[$i][$j]; ?>" class="image"/>
			    				</td>
			    				<td class="text_tb" align="center">
			    					<input name="commodity_price[]" type="text" readonly="readonly"  value="<?php echo $Orders->commodity_price[$i][$j]; ?>" class="text2"/>
			    				</td>
			    				<td class="text_tb" align="center">
			    					<input name="commodity_num[]" type="text" readonly="readonly"  value="<?php echo $Orders->commodity_num[$i][$j]; ?>" class="text2"/>
			    				</td>
			    				<td class="text_tb" align="center">
			    					<input name="commodity_total[]" type="text" readonly="readonly"  value="<?php echo $Orders->commodity_total[$i][$j]; ?>" class="text2"/>
			    				</td>
			    			</tr>
		    			<?php
							}
						?>
					</table>
					<div class="textbox">
		    			<font class="title">״&nbsp;&nbsp;&nbsp;&nbsp;̬��</font>
		    			<input name="state[]" type="text" readonly="readonly" value="<?php echo $Orders->state[$i]; ?>" class="text1"/>
		    			<input id="<?php echo $i; ?>" name="submit" type="submit" value="֧��" onclick="return confirmPayment(this);" class="button"/>
		    			<input id="<?php echo $i; ?>" name="submit" type="submit" value="ȷ���ջ�" onclick="return confirmReceipt(this);" class="button"/>
		    		</div>
					<br/>
					<br/>
				<?php
		    		}
		    	?>
    		</div>
    	</form>
    </body>
</html>