<?php
    //���ء�������Ϣ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Information.dal.php';
    //���ء�������Ϣ�ࡱ���ļ���
    include_once '../../Models/InformationObject.class.php';

    //���塰��ȡ������Ϣ��������
    function getInformation($Information)
    {
        //������������Ϣ�����ݷ��ʲ㡣
        $Information_DAL = new InformationDAL();
        //��ȡ��ѯ�����
        $query = $Information_DAL->Query($Information);
        //Ϊ�����������Ը�ֵ��
        $Information->realname = $query['realname'];
        //Ϊ���ֻ������Ը�ֵ��
        $Information->cellphone = $query['cellphone'];
        //Ϊ�����䡱���Ը�ֵ��
        $Information->mail = $query['mail'];
        //Ϊ���ջ���Ϣ�����Ը�ֵ��
        $Information->receiving = $query['receiving'];
        //��ȡ�������ջ���Ϣ����
        $receiving_arr = explode('@', $Information->receiving);
        //Ϊ����Ϣ���������Ը�ֵ��
        $Information->receiving_count = count($receiving_arr);
        //�жϡ���Ϣ������
        if ($Information->receiving_count == 0)
        {
            //Ϊ����Ϣ���������Ը�ֵ��
            $Information->receiving_count == 1;
        }
        else
        {
            //�������ջ���Ϣ����
            for ($i = 0; $i < $Information->receiving_count; $i++)
            {
                //��ȡ���ջ���Ϣ���ĸ�����Ϣ��
                $receiving = explode('&', $receiving_arr[$i]);
                //��ȡ���ռ��ˡ����顣
                $receiving_name[$i] = $receiving[0];
                //��ȡ���绰�����顣
                $receiving_contact[$i] = $receiving[1];
                //��ȡ����ַ�����顣
                $receiving_address[$i] = $receiving[2];
            }
            //Ϊ���ռ��ˡ����Ը�ֵ��
            $Information->receiving_name = $receiving_name;
            //Ϊ���绰�����Ը�ֵ��
            $Information->receiving_contact = $receiving_contact;
            //Ϊ����ַ�����Ը�ֵ��
            $Information->receiving_address = $receiving_address;
        }
        return $Information;    //���ء�������Ϣ������
    }

    //���塰���������Ϣ��������
    function setInformation($Information)
    {
        //Ϊ�����������Ը�ֵ��
        $Information->realname = $_POST['realname'];
        //Ϊ���ֻ������Ը�ֵ��
        $Information->cellphone = $_POST['cellphone'];
        //Ϊ�����䡱���Ը�ֵ��
        $Information->mail = $_POST['mail'];
        //Ϊ���ռ��ˡ����Ը�ֵ��
        $Information->receiving_name = $_POST['receiving_name'];
        //Ϊ���绰�����Ը�ֵ��
        $Information->receiving_contact = $_POST['receiving_contact'];
        //Ϊ����ַ�����Ը�ֵ��
        $Information->receiving_address = $_POST['receiving_address'];
        //��ȡ���ջ���Ϣ��������
        $Information->receiving_count = count($Information->receiving_name);
        //�������ջ���Ϣ����
        for ($i = 0; $i < $Information->receiving_count; $i++)
        {
            //��ȡ���ռ��ˡ���
            $receiving[0] = $Information->receiving_name[$i];
            //��ȡ���绰����
            $receiving[1] = $Information->receiving_contact[$i];
            //��ȡ����ַ����
            $receiving[2] = $Information->receiving_address[$i];
            //�ϳɸ������ջ���Ϣ����
            $receiving_arr[$i] = implode('&', $receiving);
        }
        //Ϊ���ջ���Ϣ�����Ը�ֵ��
        $Information->receiving = implode('@', $receiving_arr);
        //������������Ϣ�����ݷ��ʲ㡣
        $Information_DAL = new InformationDAL();
        //�ж��Ƿ��޸ġ��ɹ���
        if ($Information_DAL->Alter($Information))
        {
            return '����ɹ���';    //���ؽ����
        }
        else
        {
            return '����ʧ�ܣ�';    //���ؽ����
        }
    }

    //������������Ϣ������
    $Information = new InformationObject();
    //Ϊ����š���ֵ��
    $Information->id = $_COOKIE['consumers_id'];
    getInformation($Information);    //���á���ȡ������Ϣ��������

    //�ж��û��Ƿ������ǡ����桱��ť��
    if ($_POST['submit'] == '����')
    {
        //���á����������Ϣ��������
        $result = setInformation($Information);
        //���á���ȡ������Ϣ��������
        getInformation($Information);
    }
?>