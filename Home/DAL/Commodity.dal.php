<?php
    //���ء�PDO���ݲ����ࡱ���ļ���
//    include_once 'PDO.db.php';
        include_once '../PDO_DBObject.PHP';
    //���塰��Ʒ�����ݷ��ʲ㡣
    class CommodityDAL
    {	
        //���塰��ѯ��Ʒ�б���Ա������
        public function Query()
        {
            //��ѯSQL��䡣
            $sql = "select id, name, image, price from tb_commodity";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql);
        }

        //���塰������Ʒ����Ա������
        public function Search($Commodity)
        {
            //��ѯSQL��䡣
            $sql = "select id, name, image, price from tb_commodity where name like '%$Commodity->name%'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql);
        }

        //���塰��ѯ��Ʒ��Ϣ����Ա������
        public function queryCommodity($Commodity)
        {
            //��ѯSQL��䡣
            $sql = "select * from tb_commodity where id = '$Commodity->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            //ִ��SQL��䡣
            return $DBObject->getInfo($sql)[0];
        }

        //���塰�޸ġ���Ա������
        public function Alter($Commodity)
        {
            //�޸�SQL��䡣
            $sql = "update tb_commodity set stock = '$Commodity->stock', sales = '$Commodity->sales' where id = '$Commodity->id'";
            //������PDO���ݿ����������
            $DBObject = new PDO_DB();
            return $DBObject->IDU($sql);    //ִ��SQL��䡣
        }
    }
?>
