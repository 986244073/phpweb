<?php
    //���ء������߹������ݷ��ʲ㡱�ļ���
    include_once '../DAL/Consumers.dal.php';
    //���ء�������Ϣ�ࡱ���ļ���
    include_once '../../Models/InformationObject.class.php';

    //���塰��ȡ��������Ϣ��������
    function getInformation($Information)
    {
        //�����������߹������ݷ��ʲ㡣
        $Consumers_DAL = new ConsumersDAL();
        //��ȡ��ѯ�����
        $query = $Consumers_DAL->Query();
        //Ϊ�����������������Ը�ֵ��
        $Information->count = count($query);
        //�����������ߡ���
        for ($i = 0; $i < $Information->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //��ȡ����š����顣
            //��ȡ��ע��ʱ�䡱���顣
            $time[$i] = $query[$i]['time'];
            //��ȡ�����������顣
            $realname[$i] = $query[$i]['realname'];
            //��ȡ���ֻ��š����顣
            $cellphone[$i] = $query[$i]['cellphone'];
            $mail[$i] = $query[$i]['mail'];    //��ȡ�����䡱��
        }
        $Information->id = $id;    //Ϊ����š����Ը�ֵ��
        //Ϊ��ע��ʱ�䡱���Ը�ֵ��
        $Information->time = $time;
        //Ϊ�����������Ը�ֵ��
        $Information->realname = $realname;
        //Ϊ���ֻ��š����Ը�ֵ��
        $Information->cellphone = $cellphone;
        $Information->mail = $mail;    //Ϊ�����䡱���Ը�ֵ��
        return $Information;    //���ء�������Ϣ������
    }

    //���塰�޸���������Ϣ��������
    function alterInformation()
    {
        //������������Ϣ������
        $Information = new InformationObject();
        $row_index = $_POST['row_index'];    //��ȡ���кš���
        //Ϊ����š����Ը�ֵ��
        $Information->id = $_POST['id'][$row_index];
        //Ϊ�����������Ը�ֵ��
        $Information->realname = $_POST['realname'][$row_index];
        //Ϊ���ֻ��š����Ը�ֵ��
        $Information->cellphone = $_POST['cellphone'][$row_index];
        //Ϊ�����䡱���Ը�ֵ��
        $Information->mail = $_POST['mail'][$row_index];
        //�����������߹������ݷ��ʲ㡣
        $Consumers_DAL = new ConsumersDAL();
        //�ж��Ƿ��޸ġ��ɹ���
        if ($Consumers_DAL->Alter($Information) == 1)
        {
            return '�޸ĳɹ���';    //���ؽ����
        }
        else
        {
            return '�޸�ʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰ɾ�������ߡ�������
    function deleteConsumers()
    {
        //������������Ϣ������
        $Information = new InformationObject();
        $row_index = $_POST['row_index'];    //��ȡ���кš���
        //Ϊ����š����Ը�ֵ��
        $Information->id = $_POST['id'][$row_index];
        //�����������߹������ݷ��ʲ㡣
        $Consumers_DAL = new ConsumersDAL();
        //�ж��Ƿ�ɾ�����ɹ���
        if ($Consumers_DAL->deleteInformation($Information) == 1 && $Consumers_DAL->deleteTyolley($Information) == 1 && $Consumers_DAL->deleteConsumers($Information) == 1)
        {
            return 'ɾ���ɹ���';    //���ؽ����
        }
        else
        {
            return 'ɾ��ʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰�������롱������
    function resetPassword()
    {
        $Information = new InformationObject();    //������������Ϣ������
        $row_index = $_POST['row_index'];    //��ȡ���кš���
        $Information->id = $_POST['id'][$row_index];    //Ϊ����š����Ը�ֵ��
        $Consumers_DAL = new ConsumersDAL();    //�����������߹������ݷ��ʲ㡣
        //�ж��Ƿ����á��ɹ���
        if ($Consumers_DAL->Reset($Information) == 1)
        {
            return '���óɹ���';    //���ؽ����
        }
        else
        {
            return '����ʧ�ܣ�';    //���ؽ����
        }
    }

    //������������Ϣ������
    $Information = new InformationObject();
    //���á���ȡ��������Ϣ��������
    getInformation($Information);
    //�жϡ��������������Ƿ�Ϊ�㡣
    if ($Information->count == 0)
    {
        $result = '���������ߣ�';    //���ؽ����
    }

    //�ж��û��Ƿ������ǡ��޸ġ���ť��
    if ($_POST['submit'] == '�޸�')
    {
        //���á��޸���������Ϣ��������
        $result = alterInformation();
        //���á���ȡ��������Ϣ��������
        getInformation($Information);
    }

    //�ж��û��Ƿ������ǡ�ɾ������ť��
    if ($_POST['submit'] == 'ɾ��')
    {
        //���á�ɾ�������ߡ�������
        $result = deleteConsumers();
        //���á���ȡ��������Ϣ��������
        getInformation($Information);
        header('Location:Consumers.php');    //ҳ��ˢ�¡�
    }

    //�ж��û��Ƿ������ǡ����á���ť��
    if ($_POST['submit'] == '����')
    {
        $result = resetPassword();    //���á��������롱������
    }
?>