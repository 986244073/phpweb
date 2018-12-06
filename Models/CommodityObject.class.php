<?php
    //定义“商品”类。
    class CommodityObject
    {
        private $id;    //定义“编号”成员变量。
        private $name;    //定义“商品名称”成员变量。
        private $price;    //定义“价格”成员变量。
        private $image;    //定义“图片”成员变量。
        private $stock;    //定义“库存”成员变量。
        private $sales;    //定义“销量”成员变量。
        private $details;    //定义“详情”成员变量。
        private $count;    //定义“商品数量”成员变量。

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