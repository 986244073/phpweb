//验证登录信息。
function checkInfo()
{
	var username = document.getElementsByName("username")[0].value;    //获取登录名。
	var password = document.getElementsByName("password")[0].value;    //获取密码。
	var verification = document.getElementsByName("verification")[0].value.toUpperCase();    //获取验证码。
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
	return true;    //验证通过，提交信息。
}