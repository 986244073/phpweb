<?php
    //���ء���Ʒ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء��������ʲ㡱�ļ���
    include_once '../DAL/Orders.dal.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';
    //���ء������ࡱ���ļ���
    include_once '../../Models/OrdersObject.class.php';

    //���塰��ȡ������������
    function showOrders($Orders)
    {
        //��������ȡ���������ݷ��ʲ㡣
        $Orders_DAL = new OrdersDAL();
        //��ȡ��ѯ�����
        $query = $Orders_DAL->Query($Orders);
        //Ϊ���������������Ը�ֵ��
        $Orders->count = count($query);
        //��������������
        for ($i = 0; $i < $Orders->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //��ȡ����š����顣
            //��ȡ������ʱ�䡱���顣
            $time[$i] = $query[$i]['time'];
            //��ȡ���ܼۡ����顣
            $total[$i] = '��'.$query[$i]['total'];
            //��ȡ�������ջ���Ϣ����
            $receiving_arr = explode('&', $query[$i]['receiving']);
            //��ȡ���ռ��ˡ����顣
            $receiving_name[$i] = $receiving_arr[0];
            //��ȡ���绰�����顣
            $receiving_contact[$i] = $receiving_arr[1];
            //��ȡ����ַ�����顣
            $receiving_address[$i] = $receiving_arr[2];
            //��ȡ��������Ʒ��Ϣ����
            $commodity_arr = explode('@', $query[$i]['content']);
            //��ȡ����Ʒ���������顣
            $commodity_count[$i] = count($commodity_arr);
            //��������Ʒ�����ݷ��ʲ㡣
            $Commodity_DAL = new CommodityDAL();
            //��������Ʒ��Ϣ����
            for ($j = 0; $j < $commodity_count[$i]; $j++)
            {
                //��ȡ����Ʒ��Ϣ���ĸ�����Ϣ��
                $commodity = explode('&', $commodity_arr[$j]);
                //��ȡ���������������顣
                $commodity_num[$i][$j] = $commodity[1];
                //��������Ʒ������
                $Commodity = new CommodityObject();
                //Ϊ����š����Ը�ֵ��
                $Commodity->id = $commodity[0];
                //��ȡ��ѯ�����
                $commodity_query = $Commodity_DAL->queryCommodity($Commodity);
                //��ȡ����Ʒ���ơ����顣
                $commodity_name[$i][$j] = $commodity_query['name'];
                //��ȡ����Ʒ���ۡ����顣
                $commodity_price[$i][$j] = '��'.$commodity_query['price'];
                //��ȡ����ƷͼƬ�����顣
                $commodity_image[$i][$j] = '../../Files//'.$commodity_query['image'];
                //��ȡ����Ʒ�ܼۡ����顣
                $commodity_total[$i][$j] = '��'.number_format($commodity_query['price'] * $commodity[1], 2);
            }
            //�жϡ�״̬����
            switch ($query[$i]['state'])
            {
                case 0:    //�����״̬��Ϊ��0����
                    //��ȡ��״̬�����顣
                    $state[$i] = '��֧��';
                    break;    //������
                case 1:    //�����״̬��Ϊ��1����
                    //��ȡ��״̬�����顣
                    $state[$i] = '��֧��';
                    break;    //������
                case 2:    //�����״̬��Ϊ��2����
                    //��ȡ��״̬�����顣
                    $state[$i] = '���ջ�';
                    break;    //������
                case 3:    //�����״̬��Ϊ��3����
                    //��ȡ��״̬�����顣
                    $state[$i] = '���ջ�';
                    break;    //������
            }
        }
        $Orders->id = $id;    //Ϊ����š����Ը�ֵ��
        $Orders->time = $time;    //Ϊ������ʱ�䡱���Ը�ֵ��
        $Orders->total = $total;    //Ϊ���ϼơ����Ը�ֵ��
        //Ϊ���ռ��ˡ����Ը�ֵ��
        $Orders->receiving_name = $receiving_name;
        //Ϊ���绰�����Ը�ֵ��
        $Orders->receiving_contact = $receiving_contact;
        //Ϊ����ַ�����Ը�ֵ��
        $Orders->receiving_address = $receiving_address;
        //Ϊ����Ʒ���������Ը�ֵ��
        $Orders->commodity_count = $commodity_count;
        //Ϊ����Ʒ���ơ����Ը�ֵ��
        $Orders->commodity_name = $commodity_name;
        //Ϊ����ƷͼƬ�����Ը�ֵ��
        $Orders->commodity_image = $commodity_image;
        //Ϊ����Ʒ���ۡ����Ը�ֵ��
        $Orders->commodity_price = $commodity_price;
        //Ϊ���������������Ը�ֵ��
        $Orders->commodity_num = $commodity_num;
        //Ϊ����Ʒ�ܼۡ����Ը�ֵ��
        $Orders->commodity_total = $commodity_total;
        $Orders->state = $state;    //Ϊ��״̬�����Ը�ֵ��
    }

    //���塰������������
    function deliverOrders($Orders)
    {
        //��������ȡ���������ݷ��ʲ㡣
        $Orders_DAL = new OrdersDAL();
        $Orders_DAL->Alter($Orders);    //���á��޸ġ�������
    }

    $Orders = new OrdersObject();    //����������������
    showOrders($Orders);    //���á���ȡ������������

    $index = $_POST['index'];    //��ȡ���ؼ��š���

    //�ж��û��Ƿ������ǡ���������ť��
    if ($_POST['submit'] == '����')
    {
        //Ϊ����š����Ը�ֵ��
        $Orders->id = $_POST['id'][$index];
        deliverOrders($Orders);    //���á�֧����������
        showOrders($Orders);    //���á���ȡ������������
    }
?>