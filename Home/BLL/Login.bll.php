<?php
    //���ء����������ݷ��ʲ㡱�ļ���
    include_once '../DAL/Consumers.dal.php';
    //���ء��������ࡱ���ļ���
    include_once '../../Models/ConsumersObject.class.php';

    //�ж�COOKIE�Ƿ�洢����š���
    if (isset($_COOKIE['consumers_id']))
    {
        //���ؽ����
        $result = '�ѵ�¼��ҳ�潫�Զ���ת��';
        //ҳ����ʱ��ת��
        header('Refresh:5;url=Commodity.php');
    }

    //�ж��û��Ƿ������ǡ���¼����ť��
    if ($_POST['submit'] == '��¼')
    {
        //�����������ߡ�����
        $Consumers = new ConsumersObject();
        //Ϊ����¼�������Ը�ֵ��
        $Consumers->username = md5($_POST['username']);
        //Ϊ�����롱���Ը�ֵ��
        $Consumers->password = md5($_POST['password']);
        //�����������ߡ����ݷ��ʲ㡣
        $Consumers_DAL = new ConsumersDAL();
        //��ȡ����š���
        $Consumers->id = $Consumers_DAL->Login($Consumers);
        //�ж��Ƿ񡰵�¼���ɹ���
        if ($Consumers->id == null)
        {
            $result = '��¼�����������';    //���ؽ����
        }
        else
        {
            //���ؽ����
            $result = '��¼�ɹ���ҳ�潫�Զ���ת��';
            //COOKIE�洢����š���
            setcookie('consumers_id', $Consumers->id);
            //ҳ����ʱ��ת��
            header('Refresh:5;url=Commodity.php');
        }
    }
?>