<?php
    //定义“订单”类。
    class OrdersObject
    {
        private $id;    //定义“编号”成员变量。
        //定义“消费者编号”成员变量。
        private $consumers_id;
        private $time;    //定义“订单时间”成员变量。
        private $state;    //定义“状态”成员变量。
        private $content;    //定义“商品信息”成员变量。
        //定义“商品数量”成员变量。
        private $commodity_count;
        //定义“商品名称”成员变量。
        private $commodity_name;
        //定义“商品图片”成员变量。
        private $commodity_image;
        //定义“商品单价”成员变量。
        private $commodity_price;
        //定义“购买数量”成员变量。
        private $commodity_num;
        //定义“商品总价”成员变量。
        private $commodity_total;
        private $total;    //定义“合计”成员变量。
        private $receiving;    //定义“收货信息”成员变量。
        private $receiving_name;    //定义“收件人”成员变量。
        private $receiving_contact;    //定义“电话”成员变量。
        private $receiving_address;    //定义“地址”成员变量。
        private $count;    //定义“订单数量”成员变量。

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