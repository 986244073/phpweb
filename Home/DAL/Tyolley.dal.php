<?php
    //加载“PDO数据操作类”类文件。
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //定义“购物车”数据访问层。
    class TyolleyDAL
    {
        //定义“添加购物车”成员方法。
        public function addTyolley($Tyolley)
        {
            //添加SQL语句。
            $sql = "insert into tb_tyolley(id) values('$Tyolley->id')";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“查询”成员方法。
        public function Query($Tyolley)
        {
            //查询SQL语句。
            $sql = "select content from tb_tyolley where id = '$Tyolley->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql)[0]['content'];
        }

        //定义“修改”成员方法。
        public function Alter($Tyolley)
        {
            //修改SQL语句。
            $sql = "update tb_tyolley set content = '$Tyolley->content' where id = '$Tyolley->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }
    }
?>