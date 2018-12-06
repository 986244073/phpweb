<?php
    //加载“PDO数据操作类”类文件。
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //定义“个人信息”数据访问层。
    class InformationDAL
    {
        //定义“添加个人信息”成员方法。
        public function addInformation($Information)
        {
            //添加SQL语句。
            $sql = "insert into tb_information(id, time, realname, cellphone, mail) values('$Information->id', '$Information->time', '$Information->realname', '$Information->cellphone', '$Information->mail')";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“查询”成员方法。
        public function Query($Information)
        {
            //查询SQL语句。
            $sql = "select * from tb_information where id = '$Information->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql)[0];
        }

        //定义“修改”成员方法。
        public function Alter($Information)
        {
            //修改SQL语句。
            $sql = "update tb_information set realname = '$Information->realname', cellphone = '$Information->cellphone', mail = '$Information->mail', receiving = '$Information->receiving' where id = '$Information->id'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }
    }
?>