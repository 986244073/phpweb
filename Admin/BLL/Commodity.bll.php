<?php
    //加载“商品管理数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';

    //定义“获取商品信息”函数。
    function getCommodity($Commodity)
    {
        //声明“商品管理”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //获取查询结果。
        $query = $Commodity_DAL->Query();
        //为“商品数量”属性赋值。
        $Commodity->count = count($query);
        //遍历“商品”。
        for ($i = 0; $i < $Commodity->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //获取“编号”数组。
            //获取“名称”数组。
            $name[$i] = $query[$i]['name'];
            //获取“价格”数组。
            $price[$i] = $query[$i]['price'];
            //获取“图片”数组。
            $image[$i] = '../../Files//'.$query[$i]['image'];
            //获取“库存”数组。
            $stock[$i] = $query[$i]['stock'];
            //获取“销量”数组。
            $sales[$i] = $query[$i]['sales'];
            //获取“详情”数组。
            $details[$i] = $query[$i]['details'];
        }
        $Commodity->id = $id;    //为“编号”属性赋值。
        $Commodity->name = $name;    //为“名称”属性赋值。
        $Commodity->price = $price;    //为“价格”属性赋值。
        $Commodity->image = $image;    //为“图片”属性赋值。
        $Commodity->stock = $stock;    //为“库存”属性赋值。
        $Commodity->sales = $sales;    //为“销量”属性赋值。
        $Commodity->details = $details;    //为“详情”属性赋值。
        return $Commodity;    //返回“商品”对象。
    }

    //定义“修改商品信息”函数。
    function alterCommodity()
    {
        //声明“商品”对象。
        $Commodity = new CommodityObject();
        //声明“商品管理”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        $row_index = $_POST['row_index'];    //获取“行号”。
        //为“编号”属性赋值。
        $Commodity->id = $_POST['id'][$row_index];
        //为“名称”属性赋值。
        $Commodity->name = $_POST['name'][$row_index];
        //为“价格”属性赋值。
        $Commodity->price = $_POST['price'][$row_index];
        //为“库存”属性赋值。
        $Commodity->stock = $_POST['stock'][$row_index];
        //为“详情”属性赋值。
        $Commodity->details = $_POST['details'][$row_index];
        //判断是否上传文件。
        if (!empty($_FILES['upload']['name'][$row_index]))
        {
            //获取临时文件名和路径。
            $filename = $_FILES['upload']['tmp_name'][$row_index];
            //为“图片”属性赋值。
            $Commodity->image = $_FILES['upload']['name'][$row_index];
            //判断文件是否上传成功。
            if (move_uploaded_file($filename, '../../Files//'.$Commodity->image))
            {
                //判断是否“修改”成功。
                if ($Commodity_DAL->Alter1($Commodity) == 1)
                {
                    return '修改成功！';    //返回结果。
                }
                else
                {
                    return '修改失败！';    //返回结果。
                }
            }
            else
            {
                return '文件上传失败！';    //返回结果。
            }
        }
        else
        {
            //判断是否“修改”成功。
            if ($Commodity_DAL->Alter2($Commodity) == 1)
            {
                return '修改成功！';    //返回结果。
            }
            else
            {
                return '修改失败！';    //返回结果。
            }
        }
    }

    //定义“删除商品”函数。
    function deleteCommodity()
    {
        //声明“商品”对象。
        $Commodity = new CommodityObject();
        $row_index = $_POST['row_index'];    //获取“行号”。
        //为“编号”属性赋值。
        $Commodity->id = $_POST['id'][$row_index];
        //声明“商品管理”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //判断是否“删除”成功。
        if ($Commodity_DAL->Delete($Commodity) == 1)
        {
            return '删除成功！';    //返回结果。
        }
        else
        {
            return '删除失败！';    //返回结果。
        }
    }

    //定义“添加商品”函数。
    function addCommodity()
    {
        //声明“商品”对象。
        $Commodity = new CommodityObject();
        //为“编号”属性赋值。
        $Commodity->id = $_POST['add_id'];
        //为“名称”属性赋值。
        $Commodity->name = $_POST['add_name'];
        //为“价格”属性赋值。
        $Commodity->price = $_POST['add_price'];
        //为“库存”属性赋值。
        $Commodity->stock = $_POST['add_stock'];
        //为“详情”属性赋值。
        $Commodity->details = $_POST['add_details'];
        //获取临时文件名和路径。
        $filename = $_FILES['add_upload']['tmp_name'];
        //为“图片”属性赋值。
        $Commodity->image = $_FILES['add_upload']['name'];
        //判断文件是否上传成功。
        if (move_uploaded_file($filename, '../../Files//'.$Commodity->image))
        {
            //声明“商品管理”数据访问层。
            $Commodity_DAL = new CommodityDAL();
            //判断是否“添加”成功。
            if ($Commodity_DAL->Add($Commodity) == 1)
            {
                return '添加成功！';    //返回结果。
            }
            else
            {
                return '添加失败！';    //返回结果。
            }
        }
        else
        {
            return '文件上传失败！';    //返回结果。
        }
    }

    //声明“商品”对象。
    $Commodity = new CommodityObject();
    //调用“获取商品信息”函数。
    getCommodity($Commodity);
    //判断“商品数量”是否为零。
    if ($Commodity->count == 0)
    {
        $result = '尚无商品！';    //返回结果。
    }

    //判断用户是否点击的是“修改”按钮。
    if ($_POST['submit'] == '修改')
    {
        //调用“修改商品信息”函数。
        $result = alterCommodity();
        //调用“获取商品信息”函数。
        getCommodity($Commodity);
    }

    //判断用户是否点击的是“删除”按钮。
    if ($_POST['submit'] == '删除')
    {
        $result = deleteCommodity();    //调用“删除商品”函数。
        //调用“获取商品信息”函数。
        getCommodity($Commodity);
        header('Location:Commodity.php');    //页面刷新。
    }

    //判断用户是否点击的是“添加”按钮。
    if ($_POST['submit'] == '添加')
    {
        $result = addCommodity();    //调用“添加商品”函数。
        //调用“获取商品信息”函数。
        getCommodity($Commodity);
    }
?>