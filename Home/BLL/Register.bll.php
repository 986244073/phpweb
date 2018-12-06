<?php
    //加载“消费者数据访问层”文件。
    include_once '../DAL/Consumers.dal.php';
    //加载“个人信息数据访问层”文件。
    include_once '../DAL/Information.dal.php';
    //加载“购物车数据访问层”文件。
    include_once '../DAL/Tyolley.dal.php';
    //加载“消费者类”类文件。
    include_once '../../Models/ConsumersObject.class.php';
    //加载“个人信息类”类文件。
    include_once '../../Models/InformationObject.class.php';
    //加载“购物车类”类文件。
    include_once '../../Models/TyolleyObject.class.php';

    //判断用户是否点击的是“注册”按钮。
    if ($_POST['submit'] == '注册')
    {
        //声明“消费者”对象。
        $Consumers = new ConsumersObject();
        //为“登录名”属性赋值。
        $Consumers->username = md5($_POST['username']);
        //为“密码”属性赋值。
        $Consumers->password = md5($_POST['password']);
        //声明“消费者”数据访问层。
        $Consumers_DAL = new ConsumersDAL();
        //判断“登录名”是否重复。
        if ($Consumers_DAL->checkUsername($Consumers) == 0)
        {
            //判断是否“注册”成功。
            if ($Consumers_DAL->Register($Consumers) == 1)
            {
                //获取“消费者->编号”。
                $Consumers->id = $Consumers_DAL->Login($Consumers);
                //声明“个人信息”对象。
                $Information = new InformationObject();
                //为“个人信息->编号”属性赋值。
                $Information->id = $Consumers->id;
                //为“注册时间”属性赋值。
                $Information->time = date('Y-m-d H:i:s');
                //为“姓名”属性赋值。
                $Information->realname = $_POST['realname'];
                //为“手机号”属性赋值。
                $Information->cellphone = $_POST['cellphone'];
                //为“邮箱”属性赋值。
                $Information->mail = $_POST['mail'];
                //声明“购物车”对象。
                $Tyolley = new TyolleyObject();
                //为“购物车->编号”属性赋值。
                $Tyolley->id = $Consumers->id;
                //声明“个人信息”数据访问层。
                $Information_DAL = new InformationDAL();
                //声明“购物车”数据访问层。
                $Tyolley_DAL = new TyolleyDAL();
                //判断“添加个人信息”和“添加购物车”是否成功。
                if($Information_DAL->addInformation($Information) == 1 && $Tyolley_DAL->addTyolley($Tyolley) == 1)
                {
                    //返回结果。
                    $result = '注册成功！页面将自动跳转！';
                    //COOKIE存储“编号”。
                    setcookie('consumers_id', $Consumers->id);
                    //页面延时跳转。
                    header('Refresh:5;url=Commodity.php');
                }
                else
                {
                    $result = '注册失败！';    //返回结果。
                }
            }
            else
            {
                $result = '注册失败！';    //返回结果。
            }
        }
        else
        {
            $result = '登录名已存在！';    //返回结果。
        }
    }
?>