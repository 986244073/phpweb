<html>
    <head>
        <title>�����߹���</title>
        <link rel="stylesheet" href="CSS/Consumers_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Consumers_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Consumers.bll.php';    //���ء������߹���ҵ���߼��㡱�ļ���
        ?>
    </head>
    <body class="body">
    	<form name="form" method="post" class="form">
    		<div class="head">
    		</div>
    		<div class="menubox">
    			<div class="menu">
    				<a href="Consumers.php" class="href">�����߹���</a>
    			</div>
    			<div class="menu">
    				<a href="Commodity.php" class="href">��Ʒ����</a>
    			</div>
    			<div class="menu">
    				<a href="Orders.php" class="href">��������</a>
    			</div>
    			<div class="menu">
    				<a href="Statistics.php" class="href">����ͳ��</a>
    			</div>
    		</div>
    		<div class="subject">
    			<table class="table">
    				<tr class="tr">
    					<td colspan="6" class="result_tb" align="center">
    						<input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
    						<input name="row_index" type="hidden" readonly="readonly"/>
    					</td>
    				</tr>
    				<tr class="tr">
    					<td colspan="6" class="result_tb" align="center">
    					</td>
    				</tr>
    				<tr class="tr">
    					<th class="th1">���</th>
    					<th class="th2">����</th>
    					<th class="th3">�ֻ���</th>
    					<th class="th3">�����ַ</th>
    					<th class="th3">ע��ʱ��</th>
    					<th class="th4">�༭</th>
    				</tr>
		    		<?php
		    			//�����������ߡ���
		    			for ($i = 0; $i < $Information->count; $i++)
		    			{
		    		?>
		    			<tr class="tr">
		    				<td class="text_tb1" align="center">
		    					<input name="id[]" type="text" readonly="readonly" value="<?php echo $Information->id[$i]; ?>" class="text1"/>
		    				</td>
		   					<td class="text_tb2" align="center">
		   						<input name="realname[]" type="text" value="<?php echo $Information->realname[$i]; ?>" class="text2"/>
		   					</td>
		   					<td class="text_tb3" align="center">
	    						<input name="cellphone[]" type="text" value="<?php echo $Information->cellphone[$i]; ?>" class="text3"/>
	    					</td>
		    				<td class="text_tb3" align="center">
		    					<input name="mail[]" type="text" value="<?php echo $Information->mail[$i]; ?>" class="text3"/>
		    				</td>
		   					<td class="text_tb3" align="center">
		   						<input name="time[]" type="text" readonly="readonly" value="<?php echo $Information->time[$i]; ?>" class="text3"/>
		   					</td>
		   					<td class="button_tb" align="center">
	    						<input name="submit" type="submit" value="�޸�" onclick="return confirmAlter(this.parentNode.parentNode);" class="button"/>
	    						<input name="submit" type="submit" value="ɾ��" onclick="return confirmDelete(this.parentNode.parentNode);" class="button"/>
		    					<input name="submit" type="submit" value="����" onclick="return confirmReset(this.parentNode.parentNode);" class="button"/>
		    				</td>
		    			</tr>
		    		<?php
		    			}
		    		?>
    			</table>
    		</div>
    	</form>
    </body>
</html>