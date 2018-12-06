//隐藏表格。
function displayButton()
{
    var result = document.getElementsByName("result")[0].value;    //获取提示。
	//判断Cookie值是否为空。
    if (result == "尚无收件人，请先在个人信息中添加收件信息！")    
    {
        document.getElementById("submit").style.display = "none";    //隐藏表格。
    }
    sumAccount();    //计算合计。
}

//收件信息联动。
function getReceiving()
{
    var select = document.getElementsByName("receiving_name")[0];    //获取下拉列表控件。
    var count = select.options.length;    //获取选项数量。
    //遍历选项。
    for (var i = 0; i < count; i++)
    {
    	//判断选项是否被选中。
    	if (select.options[i].selected)
    	{
    		document.getElementsByName("receiving_contact")[0].value = document.getElementsByName("contact")[i].value;    //设置联系方式。
    	    document.getElementsByName("receiving_address")[0].value = document.getElementsByName("address")[i].value;    //设置收件地址。
    	    break;    //终止循环。
    	}
    }
}

//计算合计。
function sumAccount()
{
	var count = document.getElementsByName("total[]").length;    //获取复选控件个数。
	var sum = 0;    //初始化合计。
	//遍历复选控件。
	for (var i = 0; i < count; i++)
    {
            var total = parseFloat(document.getElementsByName("total[]")[i].value.replace("￥", ""));    //获取单价信息。
            sum = sum + total;    //合计。
    }
	document.getElementsByName("account")[0].value = "￥" + sum.toFixed(2);    //更新合计。
}

//提交确认。
function confirmSubmit()
{
	var msg = "是否确定提交？";    //提示信息。
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

//取消确认。
function confirmCancel()
{
	var msg = "是否确定取消？";    //提示信息。
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