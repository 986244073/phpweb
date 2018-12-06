<?php
    //加载“PDO数据操作类”类文件。
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //定义“消费者”数据访问层。
    class ConsumersDAL
    {	
        //定义“检查登录名”成员方法。
        public function checkUsername($Consumers)
        {
            //查询SQL语句。
            $sql = "select count(id) from tb_consumers where username = '$Consumers->username'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“注册”成员方法。
        public function Register($Consumers)
        {
            //添加SQL语句。
            $sql = "insert into tb_consumers(username, password) values('$Consumers->username', '$Consumers->password')";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //执行SQL语句。
        }

        //定义“登录”成员方法。
        public function Login($Consumers)
        {
            //查询SQL语句。
            $sql = "select id from tb_consumers where username = '$Consumers->username' and password = '$Consumers->password'";
            //声明“PDO数据库操作”对象。
            $DBObject = new PDO_DB();
            //执行SQL语句。
            return $DBObject->getInfo($sql)[0]['id'];
        }
    }
?>