//获取编号。
function getID(row)
{
	var index = row.rowIndex - 3;    //获取行号。
	document.getElementsByName("row_index")[0].value = index;    //获取行号。
	return index;    //返回行号。
}

//修改确认。
function confirmAlter(row)
{    
	var index = getID(row);    //获取行号。
	var realname = document.getElementsByName("realname[]")[index].value;    //获取姓名。
	var cellphone = document.getElementsByName("cellphone[]")[index].value;    //获取手机号。
	var mail = document.getElementsByName("mail[]")[index].value;    //获取邮箱。
	var msg = "是否确定修改“" + realname +"”的信息？";    //提示信息。
	//判断用户选择。
	if (confirm(msg) == true)
	{
		//判断联系人是否为空。
		if (realname == "")
		{
			document.getElementsByName("result")[0].value = "姓名不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断电话是否为空。
		if (cellphone == "")
		{
			document.getElementsByName("result")[0].value = "手机号不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断地址是否为空。
		if (mail == "")
		{
			document.getElementsByName("result")[0].value = "邮箱不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断姓名格式是否正确。
	    if ((/^[^\u0000-\u00FF]{2,4}$/.test(realname)) == false)
	    {
	        document.getElementsByName("result")[0].value = "姓名格式不正确！";    //返回错误提示。
	        return false;    //验证不通过，无法提交。
	    }
	    //判断手机号格式是否正确。
	    if ((/^1(3[0-9]|4[579]|5[0-35-9]|7[0135678]|8[0-9])[0-9]{8}$/.test(cellphone)) == false)
	    {
	    	document.getElementsByName("result")[0].value = "手机号格式不正确！";    //返回错误提示。
	        return false;    //验证不通过，无法提交。
	    }
	    //判断邮箱格式是否正确。
	    if ((/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.([a-zA-Z0-9_-]){2,3})+$/.test(mail)) == false)
	    {
	    	document.getElementsByName("result")[0].value = "邮箱格式不正确！";    //返回错误提示。
	        return false;    //验证不通过，无法提交。
	    }
	    return true;    //验证通过，提交信息。
	}
	else
	{
		return false;    //用户取消，无法提交。
	}
}

//删除确认。
function confirmDelete(row)
{
	var index = getID(row);    //获取行号。
	var msg = "是否确定删除“" + document.getElementsByName("realname[]")[index].value + "”？";    //提示信息。
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

//重置确认。
function confirmReset(row)
{
	var index = getID(row);    //获取行号。
	var msg = "是否确定重置“" + document.getElementsByName("realname[]")[index].value +"”的密码？";    //提示信息。
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