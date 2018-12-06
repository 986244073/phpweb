<?php
    //加载“商品数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“购物车访问层”文件。
    include_once '../DAL/Tyolley.dal.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';
    //加载“购物车类”类文件。
    include_once '../../Models/TyolleyObject.class.php';

    //定义“获取购物车信息”函数。
    function getTyolley($Tyolley)
    {
        //声明“购物车”数据访问层。
        $Tyolley_DAL = new TyolleyDAL();
        //为“商品信息”属性赋值。
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //判断“商品信息”是否为空。
        if ($Tyolley->content != "")
        {
            //获取各条“商品信息”。
            $commodity_arr = explode('@', $Tyolley->content);
            //获取“商品数量”。
            $Tyolley->count = count($commodity_arr);
            //声明“商品”数据访问层。
            $Commodity_DAL = new CommodityDAL();
            //遍历“商品信息”。
            for ($i = 0; $i < $Tyolley->count; $i++)
            {
                //获取“商品信息”的各项信息。
                $commodity = explode('&', $commodity_arr[$i]);
                //获取“商品编号”数组。
                $commodity_id[$i] = $commodity[0];
                //获取“购买数量”数组。
                $commodity_num[$i] = $commodity[1];
                //声明“商品”对象。
                $Commodity = new CommodityObject();
                //为“编号”属性赋值。
                $Commodity->id = $commodity[0];
                //获取查询结果。
                $query = $Commodity_DAL->queryCommodity($Commodity);
                //获取“商品名称”数组。
                $commodity_name[$i] = $query['name'];
                //获取“商品单价”数组。
                $commodity_price[$i] = '￥'.$query['price'];
                //获取“商品图片”数组。
                $commodity_image[$i] = '../../Files//'.$query['image'];
                //获取“商品库存”数组。
                $commodity_stock[$i] = $query['stock'];
                //获取“商品总价”数组。
                $commodity_total[$i] = '￥'.number_format($query['price'] * $commodity[1], 2);
            }
            //为“商品编号”属性赋值。
            $Tyolley->commodity_id = $commodity_id;
            //为“购买数量”属性赋值。
            $Tyolley->commodity_num = $commodity_num;
            //为“商品名称”属性赋值。
            $Tyolley->commodity_name = $commodity_name;
            //为“商品单价”属性赋值。
            $Tyolley->commodity_price = $commodity_price;
            //为“商品图片”属性赋值。
            $Tyolley->commodity_image = $commodity_image;
            //为“商品库存”属性赋值。
            $Tyolley->commodity_stock = $commodity_stock;
            //为“商品总价”属性赋值。
            $Tyolley->commodity_total = $commodity_total;
            }
        return $Tyolley;    //返回“购物车”对象。
    }

    //定义“删除商品”函数。
    function deleteCommodity($Tyolley)
    {
        $index = $_POST['row_index'];    //获取索引号。
        //获取“商品编号”数组。
        $commodity_id = $Tyolley->commodity_id;
        //获取“购买数量”数组。
        $commodity_num = $Tyolley->commodity_num;
        //删除指定元素。
        array_splice($commodity_id, $index, 1);
        //删除指定元素。
        array_splice($commodity_num, $index, 1);
        $count = count($commodity_id);    //获取“商品数量”。
        //遍历“商品信息”。
        for ($i = 0; $i < $count; $i++)
        {
            //逐条合成“商品信息”。
            $commodity[$i] = $commodity_id[$i].'&'.$commodity_num[$i];
        }
        //判断“商品数量”是否为零。
        if ($count == 0)
        {
            $Tyolley->content = "";    //“商品信息”为空。
        }
        else
        {
            //合成“商品信息”。
            $Tyolley->content = implode('@', $commodity);
        }
        //声明“购物车”数据访问层。
        $Tyolley_DAL = new TyolleyDAL();
        //判断是否“修改”成功。
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            return '删除成功！';    //返回结果。
        }
        else
        {
            return '删除失败！';    //返回结果。
        }
    }

    //定义“结算”函数。
    function getSettlement()
    {
        //获取“结算商品”数组。
        $commodity_select_arr = explode('@', $_POST['check_id']);
        session_start();    //启动Session会话。
        //注册Session会话。
        $_SESSION['commodity_select'] = $commodity_select_arr;
        header('Location:Settlement.php');    //页面跳转。
    }

    $Tyolley = new TyolleyObject();    //声明“购物车”对象。
    //为“购物车->编号”属性赋值。
    $Tyolley->id = $_COOKIE['consumers_id'];
    getTyolley($Tyolley);    //调用“获取购物车信息”函数。
    //判断“商品数量”是否为零
    if ($Tyolley->count == 0)
    {
        $result = '购物车中没有商品！';    //返回结果。
    }

    //判断用户是否点击的是“删除”按钮。
    if ($_POST['submit'] == '删除')
    {
        //调用“删除商品”函数。
        $result = deleteCommodity($Tyolley);
        getTyolley($Tyolley);    //调用“获取购物车信息”函数。
        header('Location:Tyolley.php');    //页面刷新。
    }

    //判断用户是否点击的是“结算”按钮。
    if ($_POST['submit'] == '结算')
    {
        $result = getSettlement();    //调用“结算”函数。
    }
?>