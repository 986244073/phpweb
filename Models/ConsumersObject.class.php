<?php
    //���塰�����ߡ��ࡣ
    class ConsumersObject
    {
        private $id;    //���塰��š���Ա������
        private $username;    //���塰��¼������Ա������
        private $password;    //���塰���롱��Ա������

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