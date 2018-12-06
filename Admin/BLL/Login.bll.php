<?php
    //加载“管理员数据访问层”文件。
    include_once '../DAL/Administrators.dal.php';
    //加载“管理员类”类文件。
    include_once '../../Models/AdministratorsObject.class.php';

    //判断COOKIE是否存储“编号”。
    if (isset($_COOKIE['administrators_id']))
    {
        $result = '已登录！页面将自动跳转！';    //返回结果。
        //页面延时跳转。
        header('Refresh:5;url=Consumers.php'); 
    }

    //判断用户是否点击的是“登录”按钮。
    if ($_POST['submit'] == '登录')
    {
        //声明“管理员”对象。
        $Administrators = new AdministratorsObject();
        //为“登录名”属性赋值。
        $Administrators->username = md5($_POST['username']);
        //为“密码”属性赋值。
        $Administrators->password = md5($_POST['password']);
        //声明“管理员”数据访问层。
        $Administrators_DAL = new AdministratorsDAL();
        //获取“编号”。
        $Administrators->id = $Administrators_DAL->Login($Administrators);
        //判断是否“登录”成功。
        if ($Administrators->id == null)
        {
            $result = '登录名或密码错误！';    //返回结果。
        }
        else
        {
            //返回结果。
            $result = '登录成功！页面将自动跳转！';
            //COOKIE存储“编号”。
            setcookie('administrators_id', $Administrators->id);
            //页面延时跳转。
            header('Refresh:5;url=Consumers.php');
        }
    }
?>