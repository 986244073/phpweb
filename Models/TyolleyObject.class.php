<?php
    //���塰���ﳵ���ࡣ
    class TyolleyObject
    {
        private $id;    //���塰��š���Ա������
        private $content;    //���塰��Ʒ��Ϣ����Ա������
        private $count;    //���塰��Ʒ��������Ա������
        private $commodity_id;    //���塰��Ʒ��š���Ա������
        //���塰��Ʒ���ơ���Ա������
        private $commodity_name;
        //���塰��Ʒ���ۡ���Ա������
        private $commodity_price;
        //���塰��ƷͼƬ����Ա������
        private $commodity_image;
        //���塰��Ʒ��桱��Ա������
        private $commodity_stock;
        //���塰������������Ա������
        private $commodity_num;
        //���塰��Ʒ�ܼۡ���Ա������
        private $commodity_total;

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