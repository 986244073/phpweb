<html>
    <head>
        <title>���ﳵ</title>
        <link rel="stylesheet" href="CSS/Tyolley_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Tyolley_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Tyolley.bll.php';    //���ء����ﳵҵ���߼��㡱�ļ���
        ?>
    </head>
    <body onload="displayTable();" class="body">
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
    			<div class="textbox">
    				<input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
    				<input name="row_index" type="hidden" readonly="readonly"/>
    				<input name="check_id" type="hidden" readonly="readonly"/>
    			</div>
    			<br/>
    			<table id="tyolley" class="table">
    				<tr class="tr">
    					<th class="th1">ѡ��</th>
    					<th class="th2">��Ʒ</th>
    					<th class="th3">����</th>
    					<th class="th2">����</th>
    					<th class="th3">�ܼ�</th>
    					<th class="th1">�༭</th>
    				</tr>
	    			<?php
	    				//���������ﳵ����
	    				for ($i = 0; $i < $Tyolley->count; $i++)
	    				{
	    			?>
	    				<tr class="tr">
	    					<td class="select_tb" align="center">
	    						<input name="select[]" type="checkbox" onclick="sumAccount();" class="checkbox"/>
	    						<input name="id[]" type="hidden" readonly="readonly" value="<?php echo $Tyolley->commodity_id[$i]; ?>"/>
	    					</td>
	    					<td class="text_tb1" align="center">
	    						<img name="image[]" src="<?php echo $Tyolley->commodity_image[$i]; ?>" class="image"/>
	    						<input name="name[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_name[$i]; ?>" class="text1"/>
	    					</td>
	    					<td class="text_tb2" align="center">
	    						<input name="price[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_price[$i]; ?>" class="text2"/>
	    					</td>
	    					<td class="text_tb1" align="center">
	    						<input name="reduce" type="button" value="-" onclick="reduceNumber(this.parentNode.parentNode);" class="button1"/>
	    						<input name="number[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_num[$i]; ?>" class="text3"/>
	    						<input name="plus" type="button" value="+" onclick="plusNumber(this.parentNode.parentNode);" class="button1"/>
	    						<input name="stock[]" type="hidden" readonly="readonly" value="<?php echo $Tyolley->commodity_stock[$i]; ?>"/>
	    					</td>
	    					<td class="text_tb2" align="center">
	    						<input name="total[]" type="text" readonly="readonly" value="<?php echo $Tyolley->commodity_total[$i]; ?>" class="text2"/>
	    					</td>
	    					<td class="button_td" align="center">
	    						<input name="submit" type="submit" value="ɾ��" onclick="return confirmDelete(this.parentNode.parentNode);" class="button2"/>
	    					</td>
	    				</tr>
	    			<?php
	    				}
	    			?>
	    			<tr class="tr">
    					<td colspan="6" class="result_tb" align="center">
    					</td>
    				</tr>
	    			<tr class="tr">
    					<td colspan="6" class="result_tb">
    						<font class="title">��&nbsp;&nbsp;&nbsp;&nbsp;�ƣ�</font>
    						<input name="account" type="text" readonly="readonly" class="text4"/>
    						<input name="submit" type="button" value="����" onclick="window.location.href='Commodity.php'" class="button3"/>
    						<input name="submit" type="submit" value="����" onclick="return confirmSettlement();" class="button3"/>
    					</td>
    				</tr>
    			</table>
    		</div>
    	</form>
    </body>
</html>