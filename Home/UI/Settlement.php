<html>
    <head>
        <title>����</title>
        <link rel="stylesheet" href="CSS/Settlement_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Settlement_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Settlement.bll.php';    //���ء����ﳵҵ���߼��㡱�ļ���
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
    					<td colspan="5" class="result_tb" align="center">
    						<font class="title">��&nbsp;��&nbsp;�ˣ�</font>
    						<select name="receiving_name" onchange="getReceiving();" class="text1">
    							<?php
    								//�������ջ��ˡ���
    								for ($i = 0; $i < $Information->receiving_count; $i++)
    								{
    							?>
    								<option value="<?php echo $Information->receiving_name[$i]; ?>"><?php echo $Information->receiving_name[$i]; ?></option>
    							<?php
    								}
    							?>
    						</select>
    						<font class="title">��ϵ��ʽ��</font>
    						<input name="receiving_contact" type="text" value="<?php echo $Information->receiving_contact[0]; ?>" class="text1"/>
    						<font class="title">�ռ���ַ��</font>
    						<input name="receiving_address" type="text" value="<?php echo $Information->receiving_address[0]; ?>" class="text1"/>
    						<?php
    							//�������ջ���Ϣ����
    							for ($i = 0; $i < $Information->receiving_count; $i++)
    							{
    						?>
    							<input name="contact" type="hidden" readonly="readonly" value="<?php echo $Information->receiving_contact[$i]; ?>"/>
    							<input name="address" type="hidden" readonly="readonly" value="<?php echo $Information->receiving_address[$i]; ?>"/>
    						<?php
    							}
    						?>
    					</td>
    				</tr>
    				<tr class="tr">
    					<td colspan="5" class="result_tb" align="center">
    					</td>
    				</tr>
    				<tr class="tr">
    					<th class="th1">����</th>
    					<th class="th2">ͼƬ</th>
    					<th class="th1">����</th>
    					<th class="th1">����</th>
    					<th class="th1">�ܼ�</th>
    				</tr>
	    			<?php
	    				//���������ﳵ����
	    				for ($i = 0; $i < $Tyolley->count; $i++)
	    				{
	    			?>
	    				<tr class="tr">
	    					<td class="text_tb1" align="center">
	    						<input name="name[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_name[$i]; ?>" class="text2"/>
	    						<input name="id[]" type="hidden" readonly="readonly" value="<?php echo $Tyolley->commodity_id[$i]; ?>"/>
	    					</td>
	    					<td class="text_tb2" align="center">
	    						<img name="image[]" src="<?php echo $Tyolley->commodity_image[$i]; ?>" class="image"/>
	    					</td>
	    					<td class="text_tb1" align="center">
	    						<input name="price[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_price[$i]; ?>" class="text2"/>
	    					</td>
	    					<td class="text_tb1" align="center">
	    						<input name="number[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_num[$i]; ?>" class="text2"/>
	    					</td>
	    					<td class="text_tb1" align="center">
	    						<input name="total[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_total[$i]; ?>" class="text2"/>
	    					</td>
	    				</tr>
	    			<?php
	    				}
	    			?>
	    			<tr class="tr">
    					<td colspan="5" class="result_tb">
    						<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�ƣ�</font>
    						<input name="account" type="text" readonly="readonly" class="text3"/>
    						<input name="submit" type="submit" value="ȡ��" onclick="return confirmCancel();" class="button"/>
    						<input id="submit" name="submit" type="submit" onclick="return confirmSubmit();" value="�ύ" class="button"/>
    					</td>
    				</tr>
    			</table>
    		</div>
    	</form>
    </body>
</html>