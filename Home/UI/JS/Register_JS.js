//验证注册信息。
function checkInfo()
{
	var realname = document.getElementsByName("realname")[0].value;    //获取姓名。
	var cellphone = document.getElementsByName("cellphone")[0].value;    //获取手机号。
	var mail = document.getElementsByName("mail")[0].value;    //获取邮箱。
	var username = document.getElementsByName("username")[0].value;    //获取登录名。
	var password = document.getElementsByName("password")[0].value;    //获取密码。
	var password_confirm = document.getElementsByName("password_confirm")[0].value;    //获取确认密码。
	var verification = document.getElementsByName("verification")[0].value.toUpperCase();    //获取验证码。
	
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
	//判断登录名是否为空。
	if (username == "")
	{
		document.getElementsByName("result")[0].value = "登录名不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断密码是否为空。
	if (password == "")
	{
		document.getElementsByName("result")[0].value = "密码不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断确认密码是否为空。
	if (password_confirm == "")
	{
		document.getElementsByName("result")[0].value = "确认密码不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断验证码是否为空。
	if (verification == "")
	{
		document.getElementsByName("result")[0].value = "验证码不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断验证码是否正确。
	if (verification != code)
	{
		document.getElementsByName("result")[0].value = "验证码不正确！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断两次输入的密码是否一致。
	if (password != password_confirm)
	{
		document.getElementsByName("result")[0].value = "两次输入的密码不一致！";    //返回错误提示。
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
	//判断登录名格式是否正确。
    if ((/^[a-zA-Z0-9][a-zA-Z0-9_]{4,10}[a-zA-Z0-9]$/.test(username)) == false)
    {
        document.getElementsByName("result")[0].value = "登录名格式不正确！";    //返回错误提示。
        return false;    //验证不通过，无法提交。
    }
	//判断密码格式是否正确。
    if ((/^[a-zA-Z0-9]{8,16}$/.test(password)) == false)
    {  
        document.getElementsByName("result")[0].value = "密码格式不正确！";    //返回错误提示。
        return false;    //验证不通过，无法提交。
    }
	//判断密码格式是否正确。
    if ((/[a-z]/.test(password)) == false)
    {  
        document.getElementsByName("result")[0].value = "密码格式不正确！";    //返回错误提示。
        return false;    //验证不通过，无法提交。
    }
	//判断密码格式是否正确。
    if ((/[A-Z]/.test(password)) == false)
    {  
        document.getElementsByName("result")[0].value = "密码格式不正确！";    //返回错误提示。
        return false;    //验证不通过，无法提交。
    }
	//判断密码格式是否正确。
    if ((/[0-9]/.test(password)) == false)
    {  
        document.getElementsByName("result")[0].value = "密码格式不正确！";    //返回错误提示。
        return false;    //验证不通过，无法提交。
    }    
	return true;    //验证通过，提交信息。
}