<?php
    //���ء�PDO���ݲ����ࡱ���ļ���
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //���塰���������ݷ��ʲ㡣
    class OrdersDAL
    {
        //���塰��ӡ���Ա������
        public function Add($Orders)
        {
            //���SQL��䡣
            $sql = "insert into tb_orders(consumers_id, time, state, content, total, receiving) values('$Orders->consumers_id', '$Orders->time', '0', '$Orders->content', '$Orders->total', '$Orders->receiving')";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰��ѯ����Ա������
        public function Query($Orders)
        {
            //��ѯSQL��䡣
            $sql = "select * from tb_orders where consumers_id = '$Orders->consumers_id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql);
        }

        //���塰�޸ġ���Ա������
        public function Alter1($Orders)
        {
            //�޸�SQL��䡣
            $sql = "update tb_orders set state = '1' where id = '$Orders->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰�޸ġ���Ա������
        public function Alter2($Orders)
        {
            //�޸�SQL��䡣
            $sql = "update tb_orders set state = '3' where id = '$Orders->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }
    }
?>