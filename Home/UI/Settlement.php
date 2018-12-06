<html>
    <head>
        <title>结算</title>
        <link rel="stylesheet" href="CSS/Settlement_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Settlement_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
			header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Settlement.bll.php';    //加载“购物车业务逻辑层”文件。
        ?>
    </head>
    <body onload="displayButton();" class="body">
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
    					<td colspan="5" class="result_tb" align="center">
    						<font class="title">收&nbsp;件&nbsp;人：</font>
    						<select name="receiving_name" onchange="getReceiving();" class="text1">
    							<?php
    								//遍历“收货人”。
    								for ($i = 0; $i < $Information->receiving_count; $i++)
    								{
    							?>
    								<option value="<?php echo $Information->receiving_name[$i]; ?>"><?php echo $Information->receiving_name[$i]; ?></option>
    							<?php
    								}
    							?>
    						</select>
    						<font class="title">联系方式：</font>
    						<input name="receiving_contact" type="text" value="<?php echo $Information->receiving_contact[0]; ?>" class="text1"/>
    						<font class="title">收件地址：</font>
    						<input name="receiving_address" type="text" value="<?php echo $Information->receiving_address[0]; ?>" class="text1"/>
    						<?php
    							//遍历“收货信息”。
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
    					<th class="th1">名称</th>
    					<th class="th2">图片</th>
    					<th class="th1">单价</th>
    					<th class="th1">数量</th>
    					<th class="th1">总价</th>
    				</tr>
	    			<?php
	    				//遍历“购物车”。
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
    						<font class="title">合&nbsp;&nbsp;&nbsp;&nbsp;计：</font>
    						<input name="account" type="text" readonly="readonly" class="text3"/>
    						<input name="submit" type="submit" value="取消" onclick="return confirmCancel();" class="button"/>
    						<input id="submit" name="submit" type="submit" onclick="return confirmSubmit();" value="提交" class="button"/>
    					</td>
    				</tr>
    			</table>
    		</div>
    	</form>
    </body>
</html>