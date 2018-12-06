<?php
    //定义“消费者”类。
    class ConsumersObject
    {
        private $id;    //定义“编号”成员变量。
        private $username;    //定义“登录名”成员变量。
        private $password;    //定义“密码”成员变量。

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