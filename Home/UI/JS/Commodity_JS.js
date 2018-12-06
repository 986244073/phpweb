//点击跳转。
function jumpPage(row)
{
    var row_index = row.parentNode.rowIndex;    //获取行号。
    var cell_index = row.cellIndex;    //获取列号。
    var index = row_index * 6 + cell_index;    //获取控件序号。
    var id = document.getElementsByName("id[]")[index].value;    //获取编号。
    window.location.href = "Details.php?id=" + id;     //页面跳转。
    return false;    //执行跳转，不刷新显示本页面。
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
    }
    else
    {
        document.getElementById("menu2").style.display = "none";    //隐藏导航栏二。
    }
}