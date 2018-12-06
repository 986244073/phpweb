<?php
    //加载“商品数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';

    //定义“显示商品”函数。
    function showCommodity($Commodity)
    {
        //声明“商品”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //获取查询结果。
        $query = $Commodity_DAL->Query();
        //调用“获取商品”函数。
        return getCommodity($Commodity, $query);
    }

    //定义“搜索商品”函数。
    function searchCommodity($Commodity)
    {
        //声明“商品”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //获取查询结果。
        $query = $Commodity_DAL->Search($Commodity);
        //调用“获取商品”函数。
        return getCommodity($Commodity, $query);
    }

    //定义“获取商品”函数。
    function getCommodity($Commodity, $query)
    {
        //为“商品数量”属性赋值。
        $Commodity->count = count($query);
        //遍历“商品”。
        for ($i = 0; $i < $Commodity->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //获取“编号”数组。
            //获取“名称”数组。
            $name[$i] = $query[$i]['name'];
            //获取“价格”数组。
            $price[$i] = '￥'.$query[$i]['price'];
            //获取“图片”数组。
            $image[$i] = '../../Files//'.$query[$i]['image'];
        }
        $Commodity->id = $id;    //为“编号”属性赋值。
        $Commodity->name = $name;    //为“名称”属性赋值。
        $Commodity->price = $price;    //为“价格”属性赋值。
        $Commodity->image = $image;    //为“图片”属性赋值。
        return $Commodity;    //返回“个人信息”对象。
    }

    //声明“商品”对象。
    $Commodity = new CommodityObject();
    showCommodity($Commodity);    //调用“显示商品”函数。

    //判断用户是否点击的是“搜索”按钮。
    if ($_POST['submit'] == '搜索')
    {
        //为“名称”属性赋值。
        $Commodity->name = $_POST['search'];
        //调用“搜索商品”函数。
        searchCommodity($Commodity);
    }

    //判断“商品数量”是否为零。
    if ($Commodity->count == 0)
    {
        $result = '没有商品！';    //返回结果。
    }
?>