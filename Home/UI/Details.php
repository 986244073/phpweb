<html>
    <head>
        <title>商品详情</title>
        <link rel="stylesheet" href="CSS/Details_CSS.css" />
        <script type="text/javascript" charset="utf-8" src="JS/Details_JS.js"></script>
        <?php    //在HTML标记中添加PHP脚本。
			header("content-Type: text/html; charset=gb2312");    //设置编码格式，正确显示中文。
            include_once '../BLL/Details.bll.php';    //加载“详情业务逻辑层”文件。
        ?>
    </head>
    <body onload="displayMenu();" class="body">
    	<form name="form" method="post" class="form">
    		<div id="menu1" class="menu">
    			<a href="Commodity.php" class="href">商品展示</a>
    			<a href="Tyolley.php" class="href">购物车</a>
    			<a href="Orders.php" class="href">订单查询</a>
    			<a href="Information.php" class="href">个人信息</a>
    		</div>
    		<div id="menu2" class="menu">
    			<a href="Login.php" class="href">登录</a>
    			<a href="Register.php" class="href">注册</a>
    			<a href="Commodity.php" class="href">商品展示</a>
    		</div>
    		<div class="head">
    		</div>
    		<div class="subject">
    			<img name="image" src="<?php echo $Commodity->image; ?>" class="image"/>
    			<div class="textbox1">
    				<font class="title">商品名称：</font>
    				<input name="name" type="text" readonly="readonly" value="<?php echo $Commodity->name; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">价&nbsp;&nbsp;&nbsp;&nbsp;格：</font>
    				<input name="price" type="text" readonly="readonly" value="<?php echo $Commodity->price; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">库&nbsp;&nbsp;&nbsp;&nbsp;存：</font>
    				<input name="stock" type="text" readonly="readonly" value="<?php echo $Commodity->stock; ?>" class="text1"/>
    				<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">销&nbsp;&nbsp;&nbsp;&nbsp;量：</font>
    				<input name="sales" type="text" readonly="readonly" value="<?php echo $Commodity->sales; ?>" class="text1"/>
					<br/>
    				<br/>
    				<br/>
    				<br/>
    				<font class="title">购买数量：</font>
    				<input name="reduce" type="button" value="-" onclick="reduceNumber();" class="button1"/>
                    <input name="number" type="text" readonly="readonly" value="1" class="text2"/>
                    <input name="plus" type="button" value="+" onclick="plusNumber();" class="button1"/>
                    <input id="submit" name="submit" type="submit" value="加入购物车" class="button2"/>
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