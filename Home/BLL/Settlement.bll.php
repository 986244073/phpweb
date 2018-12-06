<?php
    //���ء�������Ϣ���ʲ㡱�ļ���
    include_once '../DAL/Information.dal.php';
    //���ء���Ʒ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء����ﳵ���ʲ㡱�ļ���
    include_once '../DAL/Tyolley.dal.php';
    //���ء��������ʲ㡱�ļ���
    include_once '../DAL/Orders.dal.php';
    //���ء�������Ϣ�ࡱ���ļ���
    include_once '../../Models/InformationObject.class.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';
    //���ء����ﳵ�ࡱ���ļ���
    include_once '../../Models/TyolleyObject.class.php';
    //���ء������ࡱ���ļ���
    include_once '../../Models/OrdersObject.class.php';

    //���塰��ȡ�ջ���Ϣ��������
    function getReceiving($Information)
    {
        //������������Ϣ�����ݷ��ʲ㡣
        $Information_DAL = new InformationDAL();
        //��ȡ��ѯ�����
        $query = $Information_DAL->Query($Information);
        //Ϊ���ջ���Ϣ�����Ը�ֵ��
        $Information->receiving = $query['receiving'];
        //��ȡ�������ջ���Ϣ����
        $receiving_arr = explode('@', $Information->receiving);
        //Ϊ����Ϣ���������Ը�ֵ��
        $Information->receiving_count = count($receiving_arr);
        //�жϡ���Ϣ������
        if ($Information->receiving_count == 0)
        {
            return 'û���ռ���Ϣ��';    //���ؽ����
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

    //���塰��ȡ������Ϣ��������
    function getSettlement($Tyolley, $commodity_select_arr)
    {
        //��ȡ��������Ʒ��������
        $Tyolley->count = count($commodity_select_arr);
        //��������Ʒ�����ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //������������Ʒ����
        for ($i = 0; $i < $Tyolley->count; $i++)
        {
            //��ȡ����Ʒ��Ϣ���ĸ�����Ϣ��
            $commodity = explode('&', $commodity_select_arr[$i]);
            //��ȡ����Ʒ��š����顣
            $commodity_id[$i] = $commodity[0];
            //��ȡ���������������顣
            $commodity_num[$i] = $commodity[1];
            //��������Ʒ������
            $Commodity = new CommodityObject();
            //Ϊ����š����Ը�ֵ��
            $Commodity->id = $commodity[0];
            //��ȡ��ѯ�����
            $query = $Commodity_DAL->queryCommodity($Commodity);
            //��ȡ����Ʒ���ơ����顣
            $commodity_name[$i] = $query['name'];
            //��ȡ����Ʒ���ۡ����顣
            $commodity_price[$i] = '��'.$query['price'];
            //��ȡ����ƷͼƬ�����顣
            $commodity_image[$i] = '../../Files//'.$query['image'];
            //��ȡ����Ʒ�ܼۡ����顣
            $commodity_total[$i] = '��'.number_format($query['price'] * $commodity[1], 2);
        }
        //Ϊ����Ʒ��š����Ը�ֵ��
        $Tyolley->commodity_id = $commodity_id;
        //Ϊ���������������Ը�ֵ��
        $Tyolley->commodity_num = $commodity_num;
        //Ϊ����Ʒ���ơ����Ը�ֵ��
        $Tyolley->commodity_name = $commodity_name;
        //Ϊ����Ʒ���ۡ����Ը�ֵ��
        $Tyolley->commodity_price = $commodity_price;
        //Ϊ����ƷͼƬ�����Ը�ֵ��
        $Tyolley->commodity_image = $commodity_image;
        //Ϊ����Ʒ�ܼۡ����Ը�ֵ��
        $Tyolley->commodity_total = $commodity_total;
        return $Tyolley;    //���ء����ﳵ������
    }

    //���塰���ɶ�����������
    function createOrders($commodity_select_arr)
    {
        $Orders = new OrdersObject();    //����������������
        //Ϊ�������߱�š����Ը�ֵ��
        $Orders->consumers_id = $_COOKIE['consumers_id'];
        //Ϊ������ʱ�䡱���Ը�ֵ��
        $Orders->time = date('Y-m-d H:i:s');
        //Ϊ����Ʒ��Ϣ�����Ը�ֵ��
        $Orders->content = implode('@', $commodity_select_arr);
        //Ϊ���ܼۡ����Ը�ֵ��
        $Orders->total = ltrim($_POST['account'], '��');
        //Ϊ���ջ���Ϣ�����Ը�ֵ��
        $Orders->receiving = $_POST['receiving_name'].'&'.$_POST['receiving_contact'].'&'.$_POST['receiving_address'];
        //���������������ݷ��ʲ㡣
        $Orders_DAL = new OrdersDAL();
        //�ж��Ƿ���ӡ��ɹ���
        if ($Orders_DAL->Add($Orders) == 1)
        {
            //���á����¹��ﳵ��������
            alterTyolley($commodity_select_arr);
            //ɾ��Session�Ự��
            unset($_SESSION['commodity_select']);
            session_destroy();    //����Session�Ự��
            return '�ύ�ɹ���';    //���ؽ����
        }
        else 
        {
            return '�ύʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰���¹��ﳵ��������
    function alterTyolley($commodity_select_arr)
    {
        //��ȡ��������Ʒ��������
        $commodity_select_count = count($commodity_select_arr);
        //������������Ʒ����
        for ($i = 0; $i < $commodity_select_count; $i++)
        {
            //��ȡ��������Ʒ���ĸ�����Ϣ��
            $commodity_select = explode('&', $commodity_select_arr[$i]);
            //��ȡ��������Ʒ��š����顣
            $commodity_select_id[$i] = $commodity_select[0];
        }
        $Tyolley = new TyolleyObject();    //���������ﳵ������
        //Ϊ����š����Ը�ֵ��
        $Tyolley->id = $_COOKIE['consumers_id'];
        //���������ﳵ�����ݷ��ʲ㡣
        $Tyolley_DAL = new TyolleyDAL();
        //Ϊ����Ʒ��Ϣ�����Ը�ֵ��
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //��ȡ��������Ʒ��Ϣ����
        $commodity_arr = explode('@', $Tyolley->content);
        //Ϊ����Ʒ���������Ը�ֵ��
        $Tyolley->count = count($commodity_arr);
        //��������Ʒ��Ϣ����
        for ($j = 0; $j < $Tyolley->count; $j++)
        {
            //��ȡ����Ʒ��Ϣ���ĸ�����Ϣ��
            $commodity = explode('&', $commodity_arr[$j]);
            //��ȡ�����ύ��Ʒ��š���������
            $key = array_search($commodity[0], $commodity_select_id);
            //�жϡ��������Ƿ���ڡ�
            if (!is_int($key))
            {
                //��ȡ�µġ���Ʒ��Ϣ����
                $new_commodity_arr[$j] = $commodity_arr[$j];
            }
        }
        //�ж���Ʒ��Ϣ������
        if(count($new_commodity_arr) == 0)
        {
            $Tyolley->content = '';    //Ϊ����Ʒ���������Ը�ֵ��
        }
        else
        {
            //Ϊ����Ʒ���������Ը�ֵ��
            $Tyolley->content = implode('@', $new_commodity_arr);
        }
        //�ж��Ƿ��޸ġ��ɹ���
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            //���á�������Ʒ��������
            alterCommodity($commodity_select_arr);
        }
    }

    //���塰������Ʒ��������
    function alterCommodity($commodity_select_arr)
    {
        //��ȡ��������Ʒ��������
        $commodity_count = count($commodity_select_arr);
        //������������Ʒ����
        for ($i = 0; $i < $commodity_count; $i++)
        {
            //��ȡ��������Ʒ���ĸ�����Ϣ��
            $commodity_select = explode('&', $commodity_select_arr[$i]);
            //��������Ʒ������
            $Commodity = new CommodityObject();
            //Ϊ����š����Ը�ֵ��
            $Commodity->id = $commodity_select[0];
            //��������Ʒ�����ݷ��ʲ㡣
            $Commodity_DAL = new CommodityDAL();
            //��ȡ��ѯ�����
            $query = $Commodity_DAL->queryCommodity($Commodity);
            //Ϊ����桱���Ը�ֵ��
            $Commodity->stock = $query['stock'] - $commodity_select[1];
            //Ϊ�����������Ը�ֵ��
            $Commodity->sales = $query['sales'] + $commodity_select[1];
            //�޸���Ʒ��
            $Commodity_DAL->Alter($Commodity);
        }
    }

    session_start();    //����Session�Ự��
    //��ȡSession�Ự��
    $commodity_select_arr = $_SESSION['commodity_select'];

    //������������Ϣ������
    $Information = new InformationObject();
    //Ϊ��������Ϣ->��š���ֵ��
    $Information->id = $_COOKIE['consumers_id'];
    getReceiving($Information);    //���á���ȡ�ջ���Ϣ��������
    //�жϡ���Ϣ�������Ƿ�Ϊ�㡣
    if ($Information->receiving_count == 0)
    {
        //���ؽ����
        $result = '�����ռ��ˣ������ڸ�����Ϣ������ռ���Ϣ��';
    }

    $Tyolley = new TyolleyObject();    //���������ﳵ������
    //���á���ȡ������Ϣ��������
    getSettlement($Tyolley, $commodity_select_arr);

    //�ж��û��Ƿ������ǡ��ύ����ť��
    if ($_POST['submit'] == '�ύ')
    {
        //���á����ɶ�����������
        $result = createOrders($commodity_select_arr);
    }

    //�ж��û��Ƿ������ǡ�ȡ������ť��
    if ($_POST['submit'] == 'ȡ��')
    {
        //ɾ��Session�Ự��
        unset($_SESSION['commodity_select']);
        session_destroy();    //����Session�Ự��
        header('Location:Tyolley.php');    //ҳ����ת��
    }
?>