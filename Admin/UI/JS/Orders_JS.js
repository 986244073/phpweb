//获取控件。
function getElements(name)
{
    var returns = document.getElementsByName(name);    //获取控件。
    //判断控件数量。
    if (returns.length > 0)
    {
    	return returns;    //返回控件。
    }
    returns = new Array();    //定义空数组。
    var e = document.getElementsByTagName('span');    //获取行元素。
    //遍历行元素。
    for (var i = 0; i < e.length; i++)
    {
    	//判断控件名。
        if(e[i].getAttribute("name") == name)
        {
            returns[returns.length] = e[i];    //获取控件。
        }
    }
    return returns;    //返回控件。
}

//隐藏按钮。
function displayButton()
{
	var count = document.getElementsByName("state[]").length;    //获取控件个数。
	//遍历订单。
	for (var i = 0; i < count; i++)
	{
		var state =  document.getElementsByName("state[]")[i].value;    //获取状态。
		//判断状态。
		if (state != '已支付')
		{
			getElements("submit")[i].style.display = "none";    //隐藏按钮。
		}
	}
}

//发货确认。
function confirmDeliver(submit)
{
	document.getElementsByName("index")[0].value = submit.id;    //获取控件号。
	var msg = "是否确定发货？";    //提示信息。
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