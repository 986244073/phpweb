<?php
    //加载“消费者数据访问层”文件。
    include_once '../DAL/Consumers.dal.php';
    //加载“消费者类”类文件。
    include_once '../../Models/ConsumersObject.class.php';

    //判断COOKIE是否存储“编号”。
    if (isset($_COOKIE['consumers_id']))
    {
        //返回结果。
        $result = '已登录！页面将自动跳转！';
        //页面延时跳转。
        header('Refresh:5;url=Commodity.php');
    }

    //判断用户是否点击的是“登录”按钮。
    if ($_POST['submit'] == '登录')
    {
        //声明“消费者”对象。
        $Consumers = new ConsumersObject();
        //为“登录名”属性赋值。
        $Consumers->username = md5($_POST['username']);
        //为“密码”属性赋值。
        $Consumers->password = md5($_POST['password']);
        //声明“消费者”数据访问层。
        $Consumers_DAL = new ConsumersDAL();
        //获取“编号”。
        $Consumers->id = $Consumers_DAL->Login($Consumers);
        //判断是否“登录”成功。
        if ($Consumers->id == null)
        {
            $result = '登录名或密码错误！';    //返回结果。
        }
        else
        {
            //返回结果。
            $result = '登录成功！页面将自动跳转！';
            //COOKIE存储“编号”。
            setcookie('consumers_id', $Consumers->id);
            //页面延时跳转。
            header('Refresh:5;url=Commodity.php');
        }
    }
?>