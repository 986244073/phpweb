<?php
    //加载“消费者管理数据访问层”文件。
    include_once '../DAL/Consumers.dal.php';
    //加载“个人信息类”类文件。
    include_once '../../Models/InformationObject.class.php';

    //定义“获取消费者信息”函数。
    function getInformation($Information)
    {
        //声明“消费者管理”数据访问层。
        $Consumers_DAL = new ConsumersDAL();
        //获取查询结果。
        $query = $Consumers_DAL->Query();
        //为“消费者数量”属性赋值。
        $Information->count = count($query);
        //遍历“消费者”。
        for ($i = 0; $i < $Information->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //获取“编号”数组。
            //获取“注册时间”数组。
            $time[$i] = $query[$i]['time'];
            //获取“姓名”数组。
            $realname[$i] = $query[$i]['realname'];
            //获取“手机号”数组。
            $cellphone[$i] = $query[$i]['cellphone'];
            $mail[$i] = $query[$i]['mail'];    //获取“邮箱”。
        }
        $Information->id = $id;    //为“编号”属性赋值。
        //为“注册时间”属性赋值。
        $Information->time = $time;
        //为“姓名”属性赋值。
        $Information->realname = $realname;
        //为“手机号”属性赋值。
        $Information->cellphone = $cellphone;
        $Information->mail = $mail;    //为“邮箱”属性赋值。
        return $Information;    //返回“个人信息”对象。
    }

    //定义“修改消费者信息”函数。
    function alterInformation()
    {
        //声明“个人信息”对象。
        $Information = new InformationObject();
        $row_index = $_POST['row_index'];    //获取“行号”。
        //为“编号”属性赋值。
        $Information->id = $_POST['id'][$row_index];
        //为“姓名”属性赋值。
        $Information->realname = $_POST['realname'][$row_index];
        //为“手机号”属性赋值。
        $Information->cellphone = $_POST['cellphone'][$row_index];
        //为“邮箱”属性赋值。
        $Information->mail = $_POST['mail'][$row_index];
        //声明“消费者管理”数据访问层。
        $Consumers_DAL = new ConsumersDAL();
        //判断是否“修改”成功。
        if ($Consumers_DAL->Alter($Information) == 1)
        {
            return '修改成功！';    //返回结果。
        }
        else
        {
            return '修改失败！';    //返回结果。
        }
    }

    //定义“删除消费者”函数。
    function deleteConsumers()
    {
        //声明“个人信息”对象。
        $Information = new InformationObject();
        $row_index = $_POST['row_index'];    //获取“行号”。
        //为“编号”属性赋值。
        $Information->id = $_POST['id'][$row_index];
        //声明“消费者管理”数据访问层。
        $Consumers_DAL = new ConsumersDAL();
        //判断是否“删除”成功。
        if ($Consumers_DAL->deleteInformation($Information) == 1 && $Consumers_DAL->deleteTyolley($Information) == 1 && $Consumers_DAL->deleteConsumers($Information) == 1)
        {
            return '删除成功！';    //返回结果。
        }
        else
        {
            return '删除失败！';    //返回结果。
        }
    }

    //定义“重置密码”函数。
    function resetPassword()
    {
        $Information = new InformationObject();    //声明“个人信息”对象。
        $row_index = $_POST['row_index'];    //获取“行号”。
        $Information->id = $_POST['id'][$row_index];    //为“编号”属性赋值。
        $Consumers_DAL = new ConsumersDAL();    //声明“消费者管理”数据访问层。
        //判断是否“重置”成功。
        if ($Consumers_DAL->Reset($Information) == 1)
        {
            return '重置成功！';    //返回结果。
        }
        else
        {
            return '重置失败！';    //返回结果。
        }
    }

    //声明“个人信息”对象。
    $Information = new InformationObject();
    //调用“获取消费者信息”函数。
    getInformation($Information);
    //判断“消费者数量”是否为零。
    if ($Information->count == 0)
    {
        $result = '尚无消费者！';    //返回结果。
    }

    //判断用户是否点击的是“修改”按钮。
    if ($_POST['submit'] == '修改')
    {
        //调用“修改消费者信息”函数。
        $result = alterInformation();
        //调用“获取消费者信息”函数。
        getInformation($Information);
    }

    //判断用户是否点击的是“删除”按钮。
    if ($_POST['submit'] == '删除')
    {
        //调用“删除消费者”函数。
        $result = deleteConsumers();
        //调用“获取消费者信息”函数。
        getInformation($Information);
        header('Location:Consumers.php');    //页面刷新。
    }

    //判断用户是否点击的是“重置”按钮。
    if ($_POST['submit'] == '重置')
    {
        $result = resetPassword();    //调用“重置密码”函数。
    }
?>