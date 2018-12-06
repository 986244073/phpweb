<?php
    //���ء���Ʒ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء����ﳵ���ʲ㡱�ļ���
    include_once '../DAL/Tyolley.dal.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';
    //���ء����ﳵ�ࡱ���ļ���
    include_once '../../Models/TyolleyObject.class.php';

    //���塰��ȡ���ﳵ��Ϣ��������
    function getTyolley($Tyolley)
    {
        //���������ﳵ�����ݷ��ʲ㡣
        $Tyolley_DAL = new TyolleyDAL();
        //Ϊ����Ʒ��Ϣ�����Ը�ֵ��
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //�жϡ���Ʒ��Ϣ���Ƿ�Ϊ�ա�
        if ($Tyolley->content != "")
        {
            //��ȡ��������Ʒ��Ϣ����
            $commodity_arr = explode('@', $Tyolley->content);
            //��ȡ����Ʒ��������
            $Tyolley->count = count($commodity_arr);
            //��������Ʒ�����ݷ��ʲ㡣
            $Commodity_DAL = new CommodityDAL();
            //��������Ʒ��Ϣ����
            for ($i = 0; $i < $Tyolley->count; $i++)
            {
                //��ȡ����Ʒ��Ϣ���ĸ�����Ϣ��
                $commodity = explode('&', $commodity_arr[$i]);
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
                //��ȡ����Ʒ��桱���顣
                $commodity_stock[$i] = $query['stock'];
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
            //Ϊ����Ʒ��桱���Ը�ֵ��
            $Tyolley->commodity_stock = $commodity_stock;
            //Ϊ����Ʒ�ܼۡ����Ը�ֵ��
            $Tyolley->commodity_total = $commodity_total;
            }
        return $Tyolley;    //���ء����ﳵ������
    }

    //���塰ɾ����Ʒ��������
    function deleteCommodity($Tyolley)
    {
        $index = $_POST['row_index'];    //��ȡ�����š�
        //��ȡ����Ʒ��š����顣
        $commodity_id = $Tyolley->commodity_id;
        //��ȡ���������������顣
        $commodity_num = $Tyolley->commodity_num;
        //ɾ��ָ��Ԫ�ء�
        array_splice($commodity_id, $index, 1);
        //ɾ��ָ��Ԫ�ء�
        array_splice($commodity_num, $index, 1);
        $count = count($commodity_id);    //��ȡ����Ʒ��������
        //��������Ʒ��Ϣ����
        for ($i = 0; $i < $count; $i++)
        {
            //�����ϳɡ���Ʒ��Ϣ����
            $commodity[$i] = $commodity_id[$i].'&'.$commodity_num[$i];
        }
        //�жϡ���Ʒ�������Ƿ�Ϊ�㡣
        if ($count == 0)
        {
            $Tyolley->content = "";    //����Ʒ��Ϣ��Ϊ�ա�
        }
        else
        {
            //�ϳɡ���Ʒ��Ϣ����
            $Tyolley->content = implode('@', $commodity);
        }
        //���������ﳵ�����ݷ��ʲ㡣
        $Tyolley_DAL = new TyolleyDAL();
        //�ж��Ƿ��޸ġ��ɹ���
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            return 'ɾ���ɹ���';    //���ؽ����
        }
        else
        {
            return 'ɾ��ʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰���㡱������
    function getSettlement()
    {
        //��ȡ��������Ʒ�����顣
        $commodity_select_arr = explode('@', $_POST['check_id']);
        session_start();    //����Session�Ự��
        //ע��Session�Ự��
        $_SESSION['commodity_select'] = $commodity_select_arr;
        header('Location:Settlement.php');    //ҳ����ת��
    }

    $Tyolley = new TyolleyObject();    //���������ﳵ������
    //Ϊ�����ﳵ->��š����Ը�ֵ��
    $Tyolley->id = $_COOKIE['consumers_id'];
    getTyolley($Tyolley);    //���á���ȡ���ﳵ��Ϣ��������
    //�жϡ���Ʒ�������Ƿ�Ϊ��
    if ($Tyolley->count == 0)
    {
        $result = '���ﳵ��û����Ʒ��';    //���ؽ����
    }

    //�ж��û��Ƿ������ǡ�ɾ������ť��
    if ($_POST['submit'] == 'ɾ��')
    {
        //���á�ɾ����Ʒ��������
        $result = deleteCommodity($Tyolley);
        getTyolley($Tyolley);    //���á���ȡ���ﳵ��Ϣ��������
        header('Location:Tyolley.php');    //ҳ��ˢ�¡�
    }

    //�ж��û��Ƿ������ǡ����㡱��ť��
    if ($_POST['submit'] == '����')
    {
        $result = getSettlement();    //���á����㡱������
    }
?>