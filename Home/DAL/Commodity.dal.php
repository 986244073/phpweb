<?php
    //加载“PDO数据操作类”类文件。
//    include_once 'PDO.db.php';
        include_once '../PDO_DBObject.PHP';
    //定义“商品”数据访问层。
    class CommodityDAL
    {	
        //定义“查询商品列表”成员方法。
        public function Query()
        {
            //查询SQL语句。
            $sql = "select id, name, image, price from tb_commodity";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql);
        }

        //定义“查找商品”成员方法。
        public function Search($Commodity)
        {
            //查询SQL语句。
            $sql = "select id, name, image, price from tb_commodity where name like '%$Commodity->name%'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql);
        }

        //定义“查询商品信息”成员方法。
        public function queryCommodity($Commodity)
        {
            //查询SQL语句。
            $sql = "select * from tb_commodity where id = '$Commodity->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql)[0];
        }

        //定义“修改”成员方法。
        public function Alter($Commodity)
        {
            //修改SQL语句。
            $sql = "update tb_commodity set stock = '$Commodity->stock', sales = '$Commodity->sales' where id = '$Commodity->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }
    }
?>
