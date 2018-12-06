<html>
    <head>
        <title>购物车</title>
        <link rel="stylesheet" href="CSS/Tyolley_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Tyolley_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
			header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Tyolley.bll.php';    //加载“购物车业务逻辑层”文件。
        ?>
    </head>
    <body onload="displayTable();" class="body">
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
    			<div class="textbox">
    				<input name="result" type="text" readonly="readonly" value="<?php echo $result; ?>" class="result"/>
    				<input name="row_index" type="hidden" readonly="readonly"/>
    				<input name="check_id" type="hidden" readonly="readonly"/>
    			</div>
    			<br/>
    			<table id="tyolley" class="table">
    				<tr class="tr">
    					<th class="th1">选择</th>
    					<th class="th2">商品</th>
    					<th class="th3">单价</th>
    					<th class="th2">数量</th>
    					<th class="th3">总价</th>
    					<th class="th1">编辑</th>
    				</tr>
	    			<?php
	    				//遍历“购物车”。
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
	    						<input name="submit" type="submit" value="删除" onclick="return confirmDelete(this.parentNode.parentNode);" class="button2"/>
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
    						<font class="title">合&nbsp;&nbsp;&nbsp;&nbsp;计：</font>
    						<input name="account" type="text" readonly="readonly" class="text4"/>
    						<input name="submit" type="button" value="返回" onclick="window.location.href='Commodity.php'" class="button3"/>
    						<input name="submit" type="submit" value="结算" onclick="return confirmSettlement();" class="button3"/>
    					</td>
    				</tr>
    			</table>
    		</div>
    	</form>
    </body>
</html>