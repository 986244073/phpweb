<?php
    //���ء����������ݷ��ʲ㡱�ļ���
    include_once '../DAL/Consumers.dal.php';
    //���ء�������Ϣ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Information.dal.php';
    //���ء����ﳵ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Tyolley.dal.php';
    //���ء��������ࡱ���ļ���
    include_once '../../Models/ConsumersObject.class.php';
    //���ء�������Ϣ�ࡱ���ļ���
    include_once '../../Models/InformationObject.class.php';
    //���ء����ﳵ�ࡱ���ļ���
    include_once '../../Models/TyolleyObject.class.php';

    //�ж��û��Ƿ������ǡ�ע�ᡱ��ť��
    if ($_POST['submit'] == 'ע��')
    {
        //�����������ߡ�����
        $Consumers = new ConsumersObject();
        //Ϊ����¼�������Ը�ֵ��
        $Consumers->username = md5($_POST['username']);
        //Ϊ�����롱���Ը�ֵ��
        $Consumers->password = md5($_POST['password']);
        //�����������ߡ����ݷ��ʲ㡣
        $Consumers_DAL = new ConsumersDAL();
        //�жϡ���¼�����Ƿ��ظ���
        if ($Consumers_DAL->checkUsername($Consumers) == 0)
        {
            //�ж��Ƿ�ע�ᡱ�ɹ���
            if ($Consumers_DAL->Register($Consumers) == 1)
            {
                //��ȡ��������->��š���
                $Consumers->id = $Consumers_DAL->Login($Consumers);
                //������������Ϣ������
                $Information = new InformationObject();
                //Ϊ��������Ϣ->��š����Ը�ֵ��
                $Information->id = $Consumers->id;
                //Ϊ��ע��ʱ�䡱���Ը�ֵ��
                $Information->time = date('Y-m-d H:i:s');
                //Ϊ�����������Ը�ֵ��
                $Information->realname = $_POST['realname'];
                //Ϊ���ֻ��š����Ը�ֵ��
                $Information->cellphone = $_POST['cellphone'];
                //Ϊ�����䡱���Ը�ֵ��
                $Information->mail = $_POST['mail'];
                //���������ﳵ������
                $Tyolley = new TyolleyObject();
                //Ϊ�����ﳵ->��š����Ը�ֵ��
                $Tyolley->id = $Consumers->id;
                //������������Ϣ�����ݷ��ʲ㡣
                $Information_DAL = new InformationDAL();
                //���������ﳵ�����ݷ��ʲ㡣
                $Tyolley_DAL = new TyolleyDAL();
                //�жϡ���Ӹ�����Ϣ���͡���ӹ��ﳵ���Ƿ�ɹ���
                if($Information_DAL->addInformation($Information) == 1 && $Tyolley_DAL->addTyolley($Tyolley) == 1)
                {
                    //���ؽ����
                    $result = 'ע��ɹ���ҳ�潫�Զ���ת��';
                    //COOKIE�洢����š���
                    setcookie('consumers_id', $Consumers->id);
                    //ҳ����ʱ��ת��
                    header('Refresh:5;url=Commodity.php');
                }
                else
                {
                    $result = 'ע��ʧ�ܣ�';    //���ؽ����
                }
            }
            else
            {
                $result = 'ע��ʧ�ܣ�';    //���ؽ����
            }
        }
        else
        {
            $result = '��¼���Ѵ��ڣ�';    //���ؽ����
        }
    }
?>