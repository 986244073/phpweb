<?php
    //���塰�������ࡣ
    class OrdersObject
    {
        private $id;    //���塰��š���Ա������
        //���塰�����߱�š���Ա������
        private $consumers_id;
        private $time;    //���塰����ʱ�䡱��Ա������
        private $state;    //���塰״̬����Ա������
        private $content;    //���塰��Ʒ��Ϣ����Ա������
        //���塰��Ʒ��������Ա������
        private $commodity_count;
        //���塰��Ʒ���ơ���Ա������
        private $commodity_name;
        //���塰��ƷͼƬ����Ա������
        private $commodity_image;
        //���塰��Ʒ���ۡ���Ա������
        private $commodity_price;
        //���塰������������Ա������
        private $commodity_num;
        //���塰��Ʒ�ܼۡ���Ա������
        private $commodity_total;
        private $total;    //���塰�ϼơ���Ա������
        private $receiving;    //���塰�ջ���Ϣ����Ա������
        private $receiving_name;    //���塰�ռ��ˡ���Ա������
        private $receiving_contact;    //���塰�绰����Ա������
        private $receiving_address;    //���塰��ַ����Ա������
        private $count;    //���塰������������Ա������

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