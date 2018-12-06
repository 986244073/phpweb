<?php
    //加载“个人信息数据访问层”文件。
    include_once '../DAL/Information.dal.php';
    //加载“个人信息类”类文件。
    include_once '../../Models/InformationObject.class.php';

    //定义“获取个人信息”函数。
    function getInformation($Information)
    {
        //声明“个人信息”数据访问层。
        $Information_DAL = new InformationDAL();
        //获取查询结果。
        $query = $Information_DAL->Query($Information);
        //为“姓名”属性赋值。
        $Information->realname = $query['realname'];
        //为“手机”属性赋值。
        $Information->cellphone = $query['cellphone'];
        //为“邮箱”属性赋值。
        $Information->mail = $query['mail'];
        //为“收货信息”属性赋值。
        $Information->receiving = $query['receiving'];
        //获取各条“收货信息”。
        $receiving_arr = explode('@', $Information->receiving);
        //为“信息数量”属性赋值。
        $Information->receiving_count = count($receiving_arr);
        //判断“信息数量”
        if ($Information->receiving_count == 0)
        {
            //为“信息数量”属性赋值。
            $Information->receiving_count == 1;
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

    //定义“保存个人信息”函数。
    function setInformation($Information)
    {
        //为“姓名”属性赋值。
        $Information->realname = $_POST['realname'];
        //为“手机”属性赋值。
        $Information->cellphone = $_POST['cellphone'];
        //为“邮箱”属性赋值。
        $Information->mail = $_POST['mail'];
        //为“收件人”属性赋值。
        $Information->receiving_name = $_POST['receiving_name'];
        //为“电话”属性赋值。
        $Information->receiving_contact = $_POST['receiving_contact'];
        //为“地址”属性赋值。
        $Information->receiving_address = $_POST['receiving_address'];
        //获取“收货信息”数量。
        $Information->receiving_count = count($Information->receiving_name);
        //遍历“收货信息”。
        for ($i = 0; $i < $Information->receiving_count; $i++)
        {
            //获取“收件人”。
            $receiving[0] = $Information->receiving_name[$i];
            //获取“电话”。
            $receiving[1] = $Information->receiving_contact[$i];
            //获取“地址”。
            $receiving[2] = $Information->receiving_address[$i];
            //合成各条“收货信息”。
            $receiving_arr[$i] = implode('&', $receiving);
        }
        //为“收货信息”属性赋值。
        $Information->receiving = implode('@', $receiving_arr);
        //声明“个人信息”数据访问层。
        $Information_DAL = new InformationDAL();
        //判断是否“修改”成功。
        if ($Information_DAL->Alter($Information))
        {
            return '保存成功！';    //返回结果。
        }
        else
        {
            return '保存失败！';    //返回结果。
        }
    }

    //声明“个人信息”对象。
    $Information = new InformationObject();
    //为“编号”赋值。
    $Information->id = $_COOKIE['consumers_id'];
    getInformation($Information);    //调用“获取个人信息”函数。

    //判断用户是否点击的是“保存”按钮。
    if ($_POST['submit'] == '保存')
    {
        //调用“保存个人信息”函数。
        $result = setInformation($Information);
        //调用“获取个人信息”函数。
        getInformation($Information);
    }
?>