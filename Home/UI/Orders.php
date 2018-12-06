<html>
    <head>
        <title>订单查询</title>
        <link rel="stylesheet" href="CSS/Orders_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Orders_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
			header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Orders.bll.php';    //加载“订单业务逻辑层”文件。
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
    			<input name="index" type="hidden" readonly="readonly"/>
		    	<?php
		    		//遍历“订单”。
		    		for ($i = 0; $i < $Orders->count; $i++)
		    		{
		    	?>
		    		<div class="textbox">
		    			<font class="title">订&nbsp;单&nbsp;号：</font>
		    			<input name="id[]" type="text" readonly="readonly" value="<?php echo $Orders->id[$i]; ?>" class="text1"/>
		    			<font class="title">订单时间：</font>
		    			<input name="time[]" type="text" readonly="readonly" value="<?php echo $Orders->time[$i]; ?>" class="text1"/>
		    			<font class="title">合&nbsp;&nbsp;&nbsp;&nbsp;计：</font>
		    			<input name="total[]" type="text" readonly="readonly" value="<?php echo $Orders->total[$i]; ?>" class="text1"/>
		    		</div>
		    		<div class="textbox">
		    			<font class="title">收&nbsp;件&nbsp;人：</font>
		    			<input name="receiving_name[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_name[$i]; ?>" class="text1"/>
		    			<font class="title">联系方式：</font>
		    			<input name="receiving_contact[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_contact[$i]; ?>" class="text1"/>
		    			<font class="title">收件地址：</font>
		    			<input name="receiving_address[]" type="text" readonly="readonly" value="<?php echo $Orders->receiving_address[$i]; ?>" class="text1"/>
		    		</div>
					<table id="orders" class="table">
						<tr class="tr">
							<th class="th1">名称</th>
							<th class="th2">图片</th>
							<th class="th1">单价</th>
							<th class="th1">数量</th>
							<th class="th1">总价</th>
						</tr>
						<?php
							//遍历“商品信息”。
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
		    			<font class="title">状&nbsp;&nbsp;&nbsp;&nbsp;态：</font>
		    			<input name="state[]" type="text" readonly="readonly" value="<?php echo $Orders->state[$i]; ?>" class="text1"/>
		    			<input id="<?php echo $i; ?>" name="submit" type="submit" value="支付" onclick="return confirmPayment(this);" class="button"/>
		    			<input id="<?php echo $i; ?>" name="submit" type="submit" value="确认收货" onclick="return confirmReceipt(this);" class="button"/>
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