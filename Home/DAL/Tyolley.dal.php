<?php
    //���ء�PDO���ݲ����ࡱ���ļ���
//    include_once 'PDO.db.php';
include_once '../PDO_DBObject.PHP';

    //���塰���ﳵ�����ݷ��ʲ㡣
    class TyolleyDAL
    {
        //���塰��ӹ��ﳵ����Ա������
        public function addTyolley($Tyolley)
        {
            //���SQL��䡣
            $sql = "insert into tb_tyolley(id) values('$Tyolley->id')";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }

        //���塰��ѯ����Ա������
        public function Query($Tyolley)
        {
            //��ѯSQL��䡣
            $sql = "select content from tb_tyolley where id = '$Tyolley->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql)[0]['content'];
        }

        //���塰�޸ġ���Ա������
        public function Alter($Tyolley)
        {
            //�޸�SQL��䡣
            $sql = "update tb_tyolley set content = '$Tyolley->content' where id = '$Tyolley->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }
    }
?>