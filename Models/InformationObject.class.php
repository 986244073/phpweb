<?php
    //���塰������Ϣ���ࡣ
    class InformationObject
    {
        private $id;    //���塰��š���Ա������
        private $time;    //���塰ע��ʱ�䡱��Ա������
        private $realname;    //���塰��������Ա������
        private $cellphone;    //���塰�ֻ��š���Ա������
        private $mail;    //���塰���䡱��Ա������
        private $receiving;    //���塰�ջ���Ϣ����Ա������
        private $receiving_count;    //���塰��Ϣ��������Ա������
        private $receiving_name;    //���塰�ռ��ˡ���Ա������
        private $receiving_contact;    //���塰�绰����Ա������
        private $receiving_address;    //���塰��ַ����Ա������
        private $count;    //���塰��������������Ա������

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