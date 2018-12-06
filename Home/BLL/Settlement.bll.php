<?php
    //加载“个人信息访问层”文件。
    include_once '../DAL/Information.dal.php';
    //加载“商品数据访问层”文件。
    include_once '../DAL/Commodity.dal.php';
    //加载“购物车访问层”文件。
    include_once '../DAL/Tyolley.dal.php';
    //加载“订单访问层”文件。
    include_once '../DAL/Orders.dal.php';
    //加载“个人信息类”类文件。
    include_once '../../Models/InformationObject.class.php';
    //加载“商品类”类文件。
    include_once '../../Models/CommodityObject.class.php';
    //加载“购物车类”类文件。
    include_once '../../Models/TyolleyObject.class.php';
    //加载“订单类”类文件。
    include_once '../../Models/OrdersObject.class.php';

    //定义“获取收货信息”函数。
    function getReceiving($Information)
    {
        //声明“个人信息”数据访问层。
        $Information_DAL = new InformationDAL();
        //获取查询结果。
        $query = $Information_DAL->Query($Information);
        //为“收货信息”属性赋值。
        $Information->receiving = $query['receiving'];
        //获取各条“收货信息”。
        $receiving_arr = explode('@', $Information->receiving);
        //为“信息数量”属性赋值。
        $Information->receiving_count = count($receiving_arr);
        //判断“信息数量”
        if ($Information->receiving_count == 0)
        {
            return '没有收件信息！';    //返回结果。
        }
        else
        {
            //遍历“收货信息”。
            for ($i = 0; $i < $Information->receiving_count; $i++)
            {
                //获取“收货信息”的各项信息。
                $receiving = explode('&', $receiving_arr[$i]);
                //获取“收件人”数组。
                $receiving_name[$i] = $receiving[0];
                //获取“电话”数组。
                $receiving_contact[$i] = $receiving[1];
                //获取“地址”数组。
                $receiving_address[$i] = $receiving[2];
            }
            //为“收件人”属性赋值。
            $Information->receiving_name = $receiving_name;
            //为“电话”属性赋值。
            $Information->receiving_contact = $receiving_contact;
            //为“地址”属性赋值。
            $Information->receiving_address = $receiving_address;
        }
        return $Information;    //返回“个人信息”对象。
    }

    //定义“获取结算信息”函数。
    function getSettlement($Tyolley, $commodity_select_arr)
    {
        //获取“结算商品数量”。
        $Tyolley->count = count($commodity_select_arr);
        //声明“商品”数据访问层。
        $Commodity_DAL = new CommodityDAL();
        //遍历“结算商品”。
        for ($i = 0; $i < $Tyolley->count; $i++)
        {
            //获取“商品信息”的各项信息。
            $commodity = explode('&', $commodity_select_arr[$i]);
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
        //为“商品总价”属性赋值。
        $Tyolley->commodity_total = $commodity_total;
        return $Tyolley;    //返回“购物车”对象。
    }

    //定义“生成订单”函数。
    function createOrders($commodity_select_arr)
    {
        $Orders = new OrdersObject();    //声明“订单”对象。
        //为“消费者编号”属性赋值。
        $Orders->consumers_id = $_COOKIE['consumers_id'];
        //为“订单时间”属性赋值。
        $Orders->time = date('Y-m-d H:i:s');
        //为“商品信息”属性赋值。
        $Orders->content = implode('@', $commodity_select_arr);
        //为“总价”属性赋值。
        $Orders->total = ltrim($_POST['account'], '￥');
        //为“收货信息”属性赋值。
        $Orders->receiving = $_POST['receiving_name'].'&'.$_POST['receiving_contact'].'&'.$_POST['receiving_address'];
        //声明“订单”数据访问层。
        $Orders_DAL = new OrdersDAL();
        //判断是否“添加”成功。
        if ($Orders_DAL->Add($Orders) == 1)
        {
            //调用“更新购物车”函数。
            alterTyolley($commodity_select_arr);
            //删除Session会话。
            unset($_SESSION['commodity_select']);
            session_destroy();    //销毁Session会话。
            return '提交成功！';    //返回结果。
        }
        else 
        {
            return '提交失败！';    //返回结果。
        }
    }

    //定义“更新购物车”函数。
    function alterTyolley($commodity_select_arr)
    {
        //获取“结算商品数量”。
        $commodity_select_count = count($commodity_select_arr);
        //遍历“结算商品”。
        for ($i = 0; $i < $commodity_select_count; $i++)
        {
            //获取“结算商品”的各项信息。
            $commodity_select = explode('&', $commodity_select_arr[$i]);
            //获取“结算商品编号”数组。
            $commodity_select_id[$i] = $commodity_select[0];
        }
        $Tyolley = new TyolleyObject();    //声明“购物车”对象。
        //为“编号”属性赋值。
        $Tyolley->id = $_COOKIE['consumers_id'];
        //声明“购物车”数据访问层。
        $Tyolley_DAL = new TyolleyDAL();
        //为“商品信息”属性赋值。
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //获取各条“商品信息”。
        $commodity_arr = explode('@', $Tyolley->content);
        //为“商品数量”属性赋值。
        $Tyolley->count = count($commodity_arr);
        //遍历“商品信息”。
        for ($j = 0; $j < $Tyolley->count; $j++)
        {
            //获取“商品信息”的各项信息。
            $commodity = explode('&', $commodity_arr[$j]);
            //获取“已提交商品编号”的索引。
            $key = array_search($commodity[0], $commodity_select_id);
            //判断“索引”是否存在。
            if (!is_int($key))
            {
                //获取新的“商品信息”。
                $new_commodity_arr[$j] = $commodity_arr[$j];
            }
        }
        //判断商品信息数量。
        if(count($new_commodity_arr) == 0)
        {
            $Tyolley->content = '';    //为“商品数量”属性赋值。
        }
        else
        {
            //为“商品数量”属性赋值。
            $Tyolley->content = implode('@', $new_commodity_arr);
        }
        //判断是否“修改”成功。
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            //调用“更新商品”函数。
            alterCommodity($commodity_select_arr);
        }
    }

    //定义“更新商品”函数。
    function alterCommodity($commodity_select_arr)
    {
        //获取“结算商品数量”。
        $commodity_count = count($commodity_select_arr);
        //遍历“结算商品”。
        for ($i = 0; $i < $commodity_count; $i++)
        {
            //获取“结算商品”的各项信息。
            $commodity_select = explode('&', $commodity_select_arr[$i]);
            //声明“商品”对象。
            $Commodity = new CommodityObject();
            //为“编号”属性赋值。
            $Commodity->id = $commodity_select[0];
            //声明“商品”数据访问层。
            $Commodity_DAL = new CommodityDAL();
            //获取查询结果。
            $query = $Commodity_DAL->queryCommodity($Commodity);
            //为“库存”属性赋值。
            $Commodity->stock = $query['stock'] - $commodity_select[1];
            //为“销量”属性赋值。
            $Commodity->sales = $query['sales'] + $commodity_select[1];
            //修改商品。
            $Commodity_DAL->Alter($Commodity);
        }
    }

    session_start();    //启动Session会话。
    //读取Session会话。
    $commodity_select_arr = $_SESSION['commodity_select'];

    //声明“个人信息”对象。
    $Information = new InformationObject();
    //为“个人信息->编号”赋值。
    $Information->id = $_COOKIE['consumers_id'];
    getReceiving($Information);    //调用“获取收货信息”函数。
    //判断“信息数量”是否为零。
    if ($Information->receiving_count == 0)
    {
        //返回结果。
        $result = '尚无收件人，请先在个人信息中添加收件信息！';
    }

    $Tyolley = new TyolleyObject();    //声明“购物车”对象。
    //调用“获取结算信息”函数。
    getSettlement($Tyolley, $commodity_select_arr);

    //判断用户是否点击的是“提交”按钮。
    if ($_POST['submit'] == '提交')
    {
        //调用“生成订单”函数。
        $result = createOrders($commodity_select_arr);
    }

    //判断用户是否点击的是“取消”按钮。
    if ($_POST['submit'] == '取消')
    {
        //删除Session会话。
        unset($_SESSION['commodity_select']);
        session_destroy();    //销毁Session会话。
        header('Location:Tyolley.php');    //页面跳转。
    }
?>