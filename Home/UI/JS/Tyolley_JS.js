//隐藏表格。
function displayTable()
{
    var result = document.getElementsByName("result")[0].value;    //获取提示。
	//判断Cookie值是否为空。
    if (result == "购物车中没有商品！")    
    {
        document.getElementById("tyolley").style.display = "none";    //隐藏表格。
    }
}

//计算总价。
function sumTotal(index)
{
	var price = document.getElementsByName("price[]")[index].value.replace("￥", "");    //获取单价。
	var num = parseInt(document.getElementsByName("number[]")[index].value);    //获取数量。
	document.getElementsByName("total[]")[index].value = "￥" + (price * num).toFixed(2);    //计算总价。
	sumAccount();
}

//数量减。
function reduceNumber(row)
{
	var index = row.rowIndex - 3;    //获取行号。
	var num = parseInt(document.getElementsByName("number[]")[index].value);    //获取数量。
    if (num > 1)    //判断数量。
    {
        document.getElementsByName("number[]")[index].value = num - 1;    //数量减。
        sumTotal(index);    //重新计算总价。
    }	
}

//数量加。
function plusNumber(row)
{
	var index = row.rowIndex - 3;    //获取行号。
	var num = parseInt(document.getElementsByName("number[]")[index].value);    //获取数量。
	var stock = parseInt(document.getElementsByName("stock[]")[index].value);    //获取库存。
    if (num < stock)    //判断数量。
    {
        document.getElementsByName("number[]")[index].value = num + 1;    //数量加。 
        sumTotal(index);    //重新计算总价。
    }
}

//删除确认。
function confirmDelete(row)
{
	var index = row.rowIndex - 3;    //获取行号。
	document.getElementsByName("row_index")[0].value = index;    //获取行号。
	var msg = "是否确定删除“" + document.getElementsByName("name[]")[index].value + "”？";    //提示信息。
	//判断用户选择。
	if (confirm(msg) == true)
	{
		return true;    //用户确认，提交信息。
	}
	else
	{
		return false;    //用户取消，无法提交。
	}
}

//计算合计。
function sumAccount()
{
	var count = document.getElementsByName("select[]").length;    //获取复选控件个数。
	var sum = 0;    //初始化合计。
	//遍历复选控件。
	for (var i = 0; i < count; i++)
    {
        var checkbox = document.getElementsByName("select[]")[i];    //获取复选控件。
        //判断是否被选中。
        if (checkbox.checked)    
        {
            var total = parseFloat(document.getElementsByName("total[]")[i].value.replace("￥", ""));    //获取单价信息。
            sum = sum + total;    //合计。
        }
    }
	document.getElementsByName("account")[0].value = "￥" + sum.toFixed(2);    //更新合计。
}

//结算确认。
function confirmSettlement()
{
	var count = document.getElementsByName("select[]").length;    //获取复选控件个数。
	for (var i = 0; i < count; i++)
    {
        var checkbox = document.getElementsByName("select[]")[i];    //获取复选控件。
        //判断是否被选中。
        if (checkbox.checked)    
        {
        	//判断所选商品是否为空。
        	if (document.getElementsByName("check_id")[0].value == "")
        	{
        		document.getElementsByName("check_id")[0].value = document.getElementsByName("id[]")[i].value + '&' + document.getElementsByName("number[]")[i].value;    //加入所选商品。
        	}
        	else
        	{
        		document.getElementsByName("check_id")[0].value += '@' + document.getElementsByName("id[]")[i].value + '&' + document.getElementsByName("number[]")[i].value;    //加入所选商品。
        	}
        }
    }
	//判断是否选择了商品。
	if (document.getElementsByName("check_id")[0].value == "")
	{
		document.getElementsByName("result")[0].value = "没有选中商品！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	var msg = "是否进行结算？";    //提示信息。
	//判断用户选择。
	if (confirm(msg) == true)
	{
		return true;    //用户确认，提交信息。
	}
	else
	{
		return false;    //用户取消，无法提交。
	}
}