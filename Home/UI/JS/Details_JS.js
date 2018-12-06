//数量减。
function reduceNumber()
{
    var num = parseInt(document.getElementsByName("number")[0].value);    //获取数量。
    if (num > 1)    //判断数量。
    {
        document.getElementsByName("number")[0].value = num - 1;    //数量减。
    }		
}

//数量加。
function plusNumber()    
{
    var num = parseInt(document.getElementsByName("number")[0].value);    //获取数量。
    var stock = parseInt(document.getElementsByName("stock")[0].value);    //获取库存。
    if (num < stock)    //判断数量。
    {
        document.getElementsByName("number")[0].value = num + 1;    //数量加。 
    }		
}

//获取Cookie。
function getCookie(c_name)
{
	//判断Cookie是否存在。
    if (document.cookie.length > 0)
    {
        c_start = document.cookie.indexOf(c_name + "=")    //获取Cookie索引。
        //判断Cookie是否存在。
        if (c_start != -1)
        { 
            c_start = c_start + c_name.length + 1;    //获取起始位置。
            c_end = document.cookie.indexOf(";",c_start);    //获取结束位置。
            if (c_end == -1)    //判断结束位置。
                c_end = document.cookie.length;    //获取结束位置。
            return unescape(document.cookie.substring(c_start,c_end));    //返回Cookie值。
        } 
    }
    return "";    //返回空值。
}

//隐藏导航栏。
function displayMenu()
{
    var name = getCookie("consumers_id");    //获取Cookie值。
	//判断Cookie值是否为空。
    if (name == "")    
    {
    	document.getElementById("menu1").style.display = "none";    //隐藏导航栏一。
        document.getElementById("submit").style.display = "none";    //隐藏按钮。
    }
    else
    {
        document.getElementById("menu2").style.display = "none";    //隐藏导航栏二。
    }
    
    var stock = parseInt(document.getElementsByName("stock")[0].value);    //获取库存。
    //判断库存是否为零。
    if (stock == 0)
    {
    	document.getElementsByName("result")[0].value = "该商品已售罄！";    //返回信息。
    	document.getElementById("submit").style.display = "none";    //隐藏按钮。
    }
}