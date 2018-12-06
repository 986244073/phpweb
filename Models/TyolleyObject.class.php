<?php
    //定义“购物车”类。
    class TyolleyObject
    {
        private $id;    //定义“编号”成员变量。
        private $content;    //定义“商品信息”成员变量。
        private $count;    //定义“商品数量”成员变量。
        private $commodity_id;    //定义“商品编号”成员变量。
        //定义“商品名称”成员变量。
        private $commodity_name;
        //定义“商品单价”成员变量。
        private $commodity_price;
        //定义“商品图片”成员变量。
        private $commodity_image;
        //定义“商品库存”成员变量。
        private $commodity_stock;
        //定义“购买数量”成员变量。
        private $commodity_num;
        //定义“商品总价”成员变量。
        private $commodity_total;

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