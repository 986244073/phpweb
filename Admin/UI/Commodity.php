<html>
    <head>
        <title>��Ʒ����</title>
        <link rel="stylesheet" href="CSS/Commodity_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Commodity_JS.js"></script>
        <?php    //��HTML��������PHP�ű���
			header("content-Type: text/html; charset=gb2312");    //���ñ����ʽ����ȷ��ʾ���ġ�
            include_once '../BLL/Commodity.bll.php';    //���ء���Ʒ����ҵ���߼��㡱�ļ���
        ?>
    </head>
    <body class="body">
    	<form name="form" method="post" enctype="multipart/form-data" class="form">
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
    					<td colspan="8" class="result_tb" align="center">
    						<input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
    						<input name="row_index" type="hidden" readonly="readonly"/>
    					</td>
    				</tr>
    				<tr class="tr">
    					<td colspan="8" class="result_tb" align="center">
    					</td>
    				</tr>
    				<tr class="tr">
    					<th class="th1">���</th>
    					<th class="th2">����</th>
    					<th class="th2">�۸�</th>
    					<th class="th2">���</th>
    					<th class="th2">����</th>
    					<th class="th3">ͼƬ</th>
    					<th class="th3">����</th>
    					<th class="th1">�༭</th>
    				</tr>
		    		<?php
		    			//��������Ʒ����
		    			for ($i = 0; $i < $Commodity->count; $i++)
		    			{
		    		?>
		    			<tr class="tr">
		    				<td class="text_tb1" align="center">
		    					<input name="id[]" type="text" readonly="readonly" value="<?php echo $Commodity->id[$i]; ?>" class="text1"/>
		    				</td>
		    				<td class="text_tb2" align="center">
		    					<input name="name[]" type="text" value="<?php echo $Commodity->name[$i]; ?>" class="text2"/>
		    				</td>
		    				<td class="text_tb2" align="center">
		    					<input name="price[]" type="text" value="<?php echo $Commodity->price[$i]; ?>" class="text2"/>
		    				</td>
		    				<td class="text_tb2" align="center">
		    					<input name="stock[]" type="text" value="<?php echo $Commodity->stock[$i]; ?>" class="text2"/>
		    				</td>
		    				<td class="text_tb2" align="center">
		    					<input name="sales[]" type="text" readonly="readonly" value="<?php echo $Commodity->sales[$i]; ?>" class="text2"/>
		    				</td>
		    				<td class="text_tb3" align="center">
		    					<img name="image[]" src="<?php echo $Commodity->image[$i]; ?>" class="image"/>
								<input name="upload[]" type="file" onchange="showImage1(this.parentNode.parentNode);" class="file"/>
		    				</td>
		    				<td class="text_tb3" align="center">
		    					<textarea name="details[]" class="textarea"><?php echo $Commodity->details[$i]; ?></textarea>
		    				</td>
		    				<td class="button_tb" align="center">
		    					<input name="submit" type="submit" value="�޸�" onclick="return confirmAlter(this.parentNode.parentNode);" class="button"/>
		    					<input name="submit" type="submit" value="ɾ��" onclick="return confirmDelete(this.parentNode.parentNode);" class="button"/>
		    				</td>
		    			</tr>
		    		<?php
		    			}
		    		?>
	    			<tr class="tr">
		    			<td class="text_tb1" align="center">
		    				<input name="add_id" type="text" readonly="readonly" class="text1"/>
		    			</td>
		    			<td class="text_tb2" align="center">
		    				<input name="add_name" type="text" class="text2"/>
		    			</td>
		    			<td class="text_tb2" align="center">
		    				<input name="add_price" type="text" class="text2"/>
		    			</td>
		    			<td class="text_tb2" align="center">
		    				<input name="add_stock" type="text" class="text2"/>
		    			</td>
		    			<td class="text_tb2" align="center">
		    				<input name="add_sales" type="text" readonly="readonly" class="text2"/>
		    			</td>
		    			<td class="text_tb3" align="center">
		    				<img name="add_image" class="image"/>
							<input name="add_upload" type="file" onchange="showImage2();" class="file"/>
		    			</td>
		    			<td class="text_tb3" align="center">
		    				<textarea name="add_details" class="textarea"></textarea>
		    			</td>
		    			<td colspan="2" class="button_tb" align="center">
		    				<input name="submit" type="submit" value="���" onclick="return checkInfo();" class="button"/>
		    			</td>
					</tr>
    			</table>
    		</div>
    	</form>
    </body>
</html>