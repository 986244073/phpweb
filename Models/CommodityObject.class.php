<?php
    //���塰��Ʒ���ࡣ
    class CommodityObject
    {
        private $id;    //���塰��š���Ա������
        private $name;    //���塰��Ʒ���ơ���Ա������
        private $price;    //���塰�۸񡱳�Ա������
        private $image;    //���塰ͼƬ����Ա������
        private $stock;    //���塰��桱��Ա������
        private $sales;    //���塰��������Ա������
        private $details;    //���塰���顱��Ա������
        private $count;    //���塰��Ʒ��������Ա������

        //���帳ֵ������
        public function __set($name, $value)
        {
            $this->$name = $value;    //Ϊ��Ա������ֵ��
        }

        //�����ȡ������
        public function __get($name)
        {
            return $this->$name;    //��ȡ��Ա����ֵ��
        }
    }
?>