//验证个人信息。
function checkInfo()
{
	var realname = document.getElementsByName("realname")[0].value;    //获取姓名。
	var cellphone = document.getElementsByName("cellphone")[0].value;    //获取手机号。
	var mail = document.getElementsByName("mail")[0].value;    //获取邮箱。
	
	//判断姓名是否为空。
	if (realname == "")
	{
		document.getElementsByName("result")[0].value = "姓名不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断手机号是否为空。
	if (cellphone == "")
	{
		document.getElementsByName("result")[0].value = "手机号不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断邮箱是否为空。
	if (mail == "")
	{
		document.getElementsByName("result")[0].value = "邮箱不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断确认密码是否为空。
	if (password_confirm == "")
	{
		document.getElementsByName("result")[0].value = "确认密码不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断姓名格式是否正确。
    if ((/^[^\u0000-\u00FF]{2,4}$/.test(realname)) == false)
    {
        /document.getElementsByName("result")[0].value = "姓名格式不正确！";    //返回错误提示。
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
    
	var count = document.getElementById("receiving").rows.length / 2;    //获取控件数量。
	//遍历控件。
	for (var i = 0; i < count; i++)
	{
		var receiving_name = document.getElementsByName("receiving_name[]")[i].value;    //获取联系人。
		var receiving_contact = document.getElementsByName("receiving_contact[]")[i].value;    //获取电话。
		var receiving_address = document.getElementsByName("receiving_address[]")[i].value;    //获取地址。
		
		//判断联系人是否为空。
		if (receiving_name == "")
		{
			document.getElementsByName("result")[0].value = "收件人不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断电话是否为空。
		if (receiving_contact == "")
		{
			document.getElementsByName("result")[0].value = "电话不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断地址是否为空。
		if (receiving_address == "")
		{
			document.getElementsByName("result")[0].value = "地址不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断收件人格式是否正确。
	    if ((/^[^\u0000-\u00FF]{2,4}$/.test(receiving_name)) == false)
	    {
	        document.getElementsByName("result")[0].value = "收件人格式不正确！";    //返回错误提示。
	        return false;    //验证不通过，无法提交。
	    }
	    //判断电话格式是否正确。
	    if ((/^1(3[0-9]|4[579]|5[0-35-9]|7[0135678]|8[0-9])[0-9]{8}$/.test(receiving_contact)) == false)
	    {
	    	document.getElementsByName("result")[0].value = "电话格式不正确！";    //返回错误提示。
	        return false;    //验证不通过，无法提交。
	    }
	}
	return true;    //验证通过，提交信息。
}