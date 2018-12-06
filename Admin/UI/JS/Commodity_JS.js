//获取编号。
function getID(row)
{
	var index = row.rowIndex - 3;    //获取行号。
	document.getElementsByName("row_index")[0].value = index;    //获取行号。
	return index;    //返回行号。
}

//显示图片。
function showImage1(row)
{
    var index = row.rowIndex - 3;    //获取行号。
    var source = document.getElementsByName("upload[]")[index];    //获取文件域控件。
    var upload = source.value;    //获取图片路径。
    //判断图片路径是否正确。
    if((upload.substr(upload.lastIndexOf(".")).toLowerCase()) != ".jpg")
    {
        document.getElementsByName("result")[0].value = "图片格式不正确！";    //返回错误提示。
    }
    else
    {
        var reader = new FileReader();    //读取图片文件。
        reader.readAsDataURL(source.files[0]);    //获取图片文件路径。
        //加载图片文件。
        reader.onloadend = function ()
        {
            document.getElementsByName("image[]")[index].src = reader.result;    //设置图片文件路径。
        }
    }
}

//修改确认。
function confirmAlter(row)
{    
	var index = getID(row);    //获取行号。
	var name = document.getElementsByName("name[]")[index].value;    //获取名称。
	var price = document.getElementsByName("price[]")[index].value;    //获取价格。
	var stock = document.getElementsByName("stock[]")[index].value;    //获取库存。
	var image = document.getElementsByName("image[]")[index].src;    //获取图片。
	var msg = "是否确定修改“" + name +"”的信息？";    //提示信息。
	//判断用户选择。
	if (confirm(msg) == true)
	{
		//判断名称是否为空。
		if (name == "")
		{
			document.getElementsByName("result")[0].value = "名称不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断价格是否为空。
		if (price == "")
		{
			document.getElementsByName("result")[0].value = "价格不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断库存是否为空。
		if (stock == "")
		{
			document.getElementsByName("result")[0].value = "库存不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
		}
		//判断图片是否为空。
		if (image == "")
		{
			document.getElementsByName("result")[0].value = "图片不能为空！";    //返回错误提示。
			return false;    //验证不能通过，无法提交。
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

//显示图片。
function showImage2()
{
    var source = document.getElementsByName("add_upload")[0];    //获取文件域控件。
    var upload = source.value;    //获取图片路径。
    //判断图片路径是否正确。
    if((upload.substr(upload.lastIndexOf(".")).toLowerCase()) != ".jpg")
    {
        document.getElementsByName("result")[0].value = "图片格式不正确！";    //返回错误提示。
    }
    else
    {
        var reader = new FileReader();    //读取图片文件。
        reader.readAsDataURL(source.files[0]);    //获取图片文件路径。
        //加载图片文件。
        reader.onloadend = function ()
        {
            document.getElementsByName("add_image")[0].src = reader.result;    //设置图片文件路径。
        }
    }
}

//验证商品信息。
function checkInfo()
{    
	var name = document.getElementsByName("add_name")[0].value;    //获取名称。
	var price = document.getElementsByName("add_price")[0].value;    //获取价格。
	var stock = document.getElementsByName("add_stock")[0].value;    //获取库存。
	var image = document.getElementsByName("add_image")[0].src;    //获取图片。
	//判断名称是否为空。
	if (name == "")
	{
		document.getElementsByName("result")[0].value = "名称不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断价格是否为空。
	if (price == "")
	{
		document.getElementsByName("result")[0].value = "价格不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断库存是否为空。
	if (stock == "")
	{
		document.getElementsByName("result")[0].value = "库存不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	//判断图片是否为空。
	if (image == "")
	{
		document.getElementsByName("result")[0].value = "图片不能为空！";    //返回错误提示。
		return false;    //验证不能通过，无法提交。
	}
	return true;    //验证通过，提交信息。
}