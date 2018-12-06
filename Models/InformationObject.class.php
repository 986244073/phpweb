<?php
    //定义“个人信息”类。
    class InformationObject
    {
        private $id;    //定义“编号”成员变量。
        private $time;    //定义“注册时间”成员变量。
        private $realname;    //定义“姓名”成员变量。
        private $cellphone;    //定义“手机号”成员变量。
        private $mail;    //定义“邮箱”成员变量。
        private $receiving;    //定义“收货信息”成员变量。
        private $receiving_count;    //定义“信息数量”成员变量。
        private $receiving_name;    //定义“收件人”成员变量。
        private $receiving_contact;    //定义“电话”成员变量。
        private $receiving_address;    //定义“地址”成员变量。
        private $count;    //定义“消费者数量”成员变量。

        //定义赋值方法。
        public function __set($name, $value)
        {
            $this->$name = $value;    //为成员变量赋值。
        }

        //定义获取方法。
        public function __get($name)
        {
            return $this->$name;    //获取成员变量值。
        }
    }
?>