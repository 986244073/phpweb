<?php
    //���ء�PDO���ݲ����ࡱ���ļ���
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //���塰������Ϣ�����ݷ��ʲ㡣
    class InformationDAL
    {
        //���塰��Ӹ�����Ϣ����Ա������
        public function addInformation($Information)
        {
            //���SQL��䡣
            $sql = "insert into tb_information(id, time, realname, cellphone, mail) values('$Information->id', '$Information->time', '$Information->realname', '$Information->cellphone', '$Information->mail')";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰��ѯ����Ա������
        public function Query($Information)
        {
            //��ѯSQL��䡣
            $sql = "select * from tb_information where id = '$Information->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql)[0];
        }

        //���塰�޸ġ���Ա������
        public function Alter($Information)
        {
            //�޸�SQL��䡣
            $sql = "update tb_information set realname = '$Information->realname', cellphone = '$Information->cellphone', mail = '$Information->mail', receiving = '$Information->receiving' where id = '$Information->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }
    }
?>