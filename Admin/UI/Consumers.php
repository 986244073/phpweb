<html>
    <head>
        <title>消费者管理</title>
        <link rel="stylesheet" href="CSS/Consumers_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Consumers_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
			header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Consumers.bll.php';    //加载“消费者管理业务逻辑层”文件。
        ?>
    </head>
    <body class="body">
    	<form name="form" method="post" class="form">
    		<div class="head">
    		</div>
    		<div class="menubox">
    			<div class="menu">
    				<a href="Consumers.php" class="href">消费者管理</a>
    			</div>
    			<div class="menu">
    				<a href="Commodity.php" class="href">商品管理</a>
    			</div>
    			<div class="menu">
    				<a href="Orders.php" class="href">订单管理</a>
    			</div>
    			<div class="menu">
    				<a href="Statistics.php" class="href">数据统计</a>
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
    					<th class="th1">编号</th>
    					<th class="th2">姓名</th>
    					<th class="th3">手机号</th>
    					<th class="th3">邮箱地址</th>
    					<th class="th3">注册时间</th>
    					<th class="th4">编辑</th>
    				</tr>
		    		<?php
		    			//遍历“消费者”。
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
	    						<input name="submit" type="submit" value="修改" onclick="return confirmAlter(this.parentNode.parentNode);" class="button"/>
	    						<input name="submit" type="submit" value="删除" onclick="return confirmDelete(this.parentNode.parentNode);" class="button"/>
		    					<input name="submit" type="submit" value="重置" onclick="return confirmReset(this.parentNode.parentNode);" class="button"/>
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