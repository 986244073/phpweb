<?php
    //加载“PDO数据操作类”类文件。
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //定义“订单”数据访问层。
    class OrdersDAL
    {
        //定义“添加”成员方法。
        public function Add($Orders)
        {
            //添加SQL语句。
            $sql = "insert into tb_orders(consumers_id, time, state, content, total, receiving) values('$Orders->consumers_id', '$Orders->time', '0', '$Orders->content', '$Orders->total', '$Orders->receiving')";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“查询”成员方法。
        public function Query($Orders)
        {
            //查询SQL语句。
            $sql = "select * from tb_orders where consumers_id = '$Orders->consumers_id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql);
        }

        //定义“修改”成员方法。
        public function Alter1($Orders)
        {
            //修改SQL语句。
            $sql = "update tb_orders set state = '1' where id = '$Orders->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“修改”成员方法。
        public function Alter2($Orders)
        {
            //修改SQL语句。
            $sql = "update tb_orders set state = '3' where id = '$Orders->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }
    }
?>