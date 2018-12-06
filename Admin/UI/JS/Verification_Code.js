var code;    //验证码。

//生成验证码。
function createCode()
{
	code = "";    //为验证码赋空值。
	var random = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');    //验证码字符表。
	//生成随机字符串。
	for (var i = 0; i < 4; i++)
	{
		var index = Math.floor(Math.random() * 36);    //获取随机字符。
		code += random[index];    //将字符加入验证码。
	}
	document.getElementsByName("code")[0].value = code;    //显示验证码。
}