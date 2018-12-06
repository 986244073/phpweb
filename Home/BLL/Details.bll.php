<?php
    //加载“商品数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“购物车访问层”文件。
    include_once '../DAL/Tyolley.dal.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';
    //加载“购物车类”类文件。
    include_once '../../Models/TyolleyObject.class.php';

    //定义“获取商品信息”函数。
    function getCommodity($Commodity)
    {
        //声明“商品”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //获取查询结果。
        $query = $Commodity_DAL->queryCommodity($Commodity);
        //为“名称”属性赋值。
        $Commodity->name = $query['name'];
        //为“价格”属性赋值。
        $Commodity->price = $query['price'];
        //为“图片”属性赋值。
        $Commodity->image = '../../Files//'.$query['image'];
        //为“库存”属性赋值。
        $Commodity->stock = $query['stock'];
        //为“销量”属性赋值。
        $Commodity->sales = $query['sales'];
        //为“详情”属性赋值。
        $Commodity->details = $query['details'];
        return $Commodity;    //返回“个人信息”对象。
    }

    //定义“加入购物车”函数。
    function alterTyolley($Commodity)
    {
        $Tyolley = new TyolleyObject();    //声明“购物车”对象。
        //为“编号”属性赋值。
        $Tyolley->id = $_COOKIE['consumers_id'];
        //为“商品编号”属性赋值。
        $Tyolley->commodity_id = $Commodity->id;
        //为“购买数量”属性赋值。
        $Tyolley->commodity_num = $_POST['number'];
        //声明“购物车”数据访问层。
        $Tyolley_DAL = new TyolleyDAL();
        //为“商品信息”属性赋值。
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //判断“商品信息”是否为空。
        if ($Tyolley->content == "")
        {
            //为“商品信息”属性赋值。
            $Tyolley->content = $Tyolley->commodity_id.'&'.$Tyolley->commodity_num;
        }
        else
        {
            //调用“检查重复购买”函数。
            $Tyolley->content = checkRepeat($Tyolley);
        }
        //判断是否“加入购物车”成功。
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            return '加入购物车成功！';    //返回结果。
        }
        else
        {
            return '加入购物车失败！';    //返回结果。
        }
    }

    //定义“检查重复购买”函数。
    function checkRepeat($Tyolley)
    {
        //获取各条“商品信息”。
        $commodity_arr = explode('@', $Tyolley->content);
        $count = count($commodity_arr);    //获取“商品数量”。
        //遍历“商品信息”。
        for ($i = 0; $i < $count; $i++)
        {
            //获取“收货信息”的各项信息。
            $commodity = explode('&', $commodity_arr[$i]);
            //获取“商品编号”数组。
            $commodity_id[$i] = $commodity[0];
            //获取“购买数量”数组。
            $commodity_num[$i] = $commodity[1];
        }
        //获取重复的“商品编号”。
        $key = array_search($Tyolley->commodity_id, $commodity_id);
        //判断是否重复购买。
        if (is_numeric($key))
        {
            //重新计算“购买数量”。
            $commodity_num[$key] += $Tyolley->commodity_num;
        }
        else
        {
            //加入新的“商品编号”。
            $commodity_id[$count] = $Tyolley->commodity_id;
            //加入新的“购买数量”。
            $commodity_num[$count] = $Tyolley->commodity_num;
        }
        //获取“商品数量”。
        $new_count = count($commodity_id);
        //遍历“商品信息”。
        for ($k = 0; $k < $new_count; $k++)
        {
            //生成“商品信息”。
            $new_commodity_arr[$k] = $commodity_id[$k].'&'.$commodity_num[$k];
        }
        //返回“商品信息”。
        return implode('@', $new_commodity_arr);
    }

    //声明“商品”对象。
    $Commodity = new CommodityObject();
    $Commodity->id = $_GET['id'];    //为“编号”属性赋值。
    //调用“获取商品信息”函数。
    getCommodity($Commodity);

    //判断用户是否点击的是“加入购物车”按钮。
    if ($_POST['submit'] == '加入购物车')
    {
        //调用“加入购物车”函数。
        $result = alterTyolley($Commodity);
    }
?>