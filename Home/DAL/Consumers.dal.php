<?php
    //���ء�PDO���ݲ����ࡱ���ļ���
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //���塰�����ߡ����ݷ��ʲ㡣
    class ConsumersDAL
    {	
        //���塰����¼������Ա������
        public function checkUsername($Consumers)
        {
            //��ѯSQL��䡣
            $sql = "select count(id) from tb_consumers where username = '$Consumers->username'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰ע�ᡱ��Ա������
        public function Register($Consumers)
        {
            //���SQL��䡣
            $sql = "insert into tb_consumers(username, password) values('$Consumers->username', '$Consumers->password')";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰��¼����Ա������
        public function Login($Consumers)
        {
            //��ѯSQL��䡣
            $sql = "select id from tb_consumers where username = '$Consumers->username' and password = '$Consumers->password'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql)[0]['id'];
        }
    }
?>