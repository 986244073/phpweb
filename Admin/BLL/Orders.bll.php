<?php
    //加载“商品数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“订单访问层”文件。
    include_once '../DAL/Orders.dal.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';
    //加载“订单类”类文件。
    include_once '../../Models/OrdersObject.class.php';

    //定义“获取订单”函数。
    function showOrders($Orders)
    {
        //声明“获取订单”数据访问层。
        $Orders_DAL = new OrdersDAL();
        //获取查询结果。
        $query = $Orders_DAL->Query($Orders);
        //为“订单数量”属性赋值。
        $Orders->count = count($query);
        //遍历“订单”。
        for ($i = 0; $i < $Orders->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //获取“编号”数组。
            //获取“订单时间”数组。
            $time[$i] = $query[$i]['time'];
            //获取“总价”数组。
            $total[$i] = '￥'.$query[$i]['total'];
            //获取各条“收货信息”。
            $receiving_arr = explode('&', $query[$i]['receiving']);
            //获取“收件人”数组。
            $receiving_name[$i] = $receiving_arr[0];
            //获取“电话”数组。
            $receiving_contact[$i] = $receiving_arr[1];
            //获取“地址”数组。
            $receiving_address[$i] = $receiving_arr[2];
            //获取各条“商品信息”。
            $commodity_arr = explode('@', $query[$i]['content']);
            //获取“商品数量”数组。
            $commodity_count[$i] = count($commodity_arr);
            //声明“商品”数据访问层。
            $Commodity_DAL = new CommodityDAL();
            //遍历“商品信息”。
            for ($j = 0; $j < $commodity_count[$i]; $j++)
            {
                //获取“商品信息”的各项信息。
                $commodity = explode('&', $commodity_arr[$j]);
                //获取“购买数量”数组。
                $commodity_num[$i][$j] = $commodity[1];
                //声明“商品”对象。
                $Commodity = new CommodityObject();
                //为“编号”属性赋值。
                $Commodity->id = $commodity[0];
                //获取查询结果。
                $commodity_query = $Commodity_DAL->queryCommodity($Commodity);
                //获取“商品名称”数组。
                $commodity_name[$i][$j] = $commodity_query['name'];
                //获取“商品单价”数组。
                $commodity_price[$i][$j] = '￥'.$commodity_query['price'];
                //获取“商品图片”数组。
                $commodity_image[$i][$j] = '../../Files//'.$commodity_query['image'];
                //获取“商品总价”数组。
                $commodity_total[$i][$j] = '￥'.number_format($commodity_query['price'] * $commodity[1], 2);
            }
            //判断“状态”。
            switch ($query[$i]['state'])
            {
                case 0:    //如果“状态”为“0”。
                    //获取“状态”数组。
                    $state[$i] = '待支付';
                    break;    //跳出。
                case 1:    //如果“状态”为“1”。
                    //获取“状态”数组。
                    $state[$i] = '已支付';
                    break;    //跳出。
                case 2:    //如果“状态”为“2”。
                    //获取“状态”数组。
                    $state[$i] = '待收货';
                    break;    //跳出。
                case 3:    //如果“状态”为“3”。
                    //获取“状态”数组。
                    $state[$i] = '已收货';
                    break;    //跳出。
            }
        }
        $Orders->id = $id;    //为“编号”属性赋值。
        $Orders->time = $time;    //为“订单时间”属性赋值。
        $Orders->total = $total;    //为“合计”属性赋值。
        //为“收件人”属性赋值。
        $Orders->receiving_name = $receiving_name;
        //为“电话”属性赋值。
        $Orders->receiving_contact = $receiving_contact;
        //为“地址”属性赋值。
        $Orders->receiving_address = $receiving_address;
        //为“商品数量”属性赋值。
        $Orders->commodity_count = $commodity_count;
        //为“商品名称”属性赋值。
        $Orders->commodity_name = $commodity_name;
        //为“商品图片”属性赋值。
        $Orders->commodity_image = $commodity_image;
        //为“商品单价”属性赋值。
        $Orders->commodity_price = $commodity_price;
        //为“购买数量”属性赋值。
        $Orders->commodity_num = $commodity_num;
        //为“商品总价”属性赋值。
        $Orders->commodity_total = $commodity_total;
        $Orders->state = $state;    //为“状态”属性赋值。
    }

    //定义“发货”函数。
    function deliverOrders($Orders)
    {
        //声明“获取订单”数据访问层。
        $Orders_DAL = new OrdersDAL();
        $Orders_DAL->Alter($Orders);    //调用“修改”方法。
    }

    $Orders = new OrdersObject();    //声明“订单”对象。
    showOrders($Orders);    //调用“获取订单”函数。

    $index = $_POST['index'];    //获取“控件号”。

    //判断用户是否点击的是“发货”按钮。
    if ($_POST['submit'] == '发货')
    {
        //为“编号”属性赋值。
        $Orders->id = $_POST['id'][$index];
        deliverOrders($Orders);    //调用“支付”函数。
        showOrders($Orders);    //调用“获取订单”函数。
    }
?>