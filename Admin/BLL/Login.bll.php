<?php
    //���ء�����Ա���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Administrators.dal.php';
    //���ء�����Ա�ࡱ���ļ���
    include_once '../../Models/AdministratorsObject.class.php';

    //�ж�COOKIE�Ƿ�洢����š���
    if (isset($_COOKIE['administrators_id']))
    {
        $result = '�ѵ�¼��ҳ�潫�Զ���ת��';    //���ؽ����
        //ҳ����ʱ��ת��
        header('Refresh:5;url=Consumers.php'); 
    }

    //�ж��û��Ƿ������ǡ���¼����ť��
    if ($_POST['submit'] == '��¼')
    {
        //����������Ա������
        $Administrators = new AdministratorsObject();
        //Ϊ����¼�������Ը�ֵ��
        $Administrators->username = md5($_POST['username']);
        //Ϊ�����롱���Ը�ֵ��
        $Administrators->password = md5($_POST['password']);
        //����������Ա�����ݷ��ʲ㡣
        $Administrators_DAL = new AdministratorsDAL();
        //��ȡ����š���
        $Administrators->id = $Administrators_DAL->Login($Administrators);
        //�ж��Ƿ񡰵�¼���ɹ���
        if ($Administrators->id == null)
        {
            $result = '��¼�����������';    //���ؽ����
        }
        else
        {
            //���ؽ����
            $result = '��¼�ɹ���ҳ�潫�Զ���ת��';
            //COOKIE�洢����š���
            setcookie('administrators_id', $Administrators->id);
            //ҳ����ʱ��ת��
            header('Refresh:5;url=Consumers.php');
        }
    }
?>