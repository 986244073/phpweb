<?php
    //���ء���Ʒ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء����ﳵ���ʲ㡱�ļ���
    include_once '../DAL/Tyolley.dal.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';
    //���ء����ﳵ�ࡱ���ļ���
    include_once '../../Models/TyolleyObject.class.php';

    //���塰��ȡ��Ʒ��Ϣ��������
    function getCommodity($Commodity)
    {
        //��������Ʒ�����ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //��ȡ��ѯ�����
        $query = $Commodity_DAL->queryCommodity($Commodity);
        //Ϊ�����ơ����Ը�ֵ��
        $Commodity->name = $query['name'];
        //Ϊ���۸����Ը�ֵ��
        $Commodity->price = $query['price'];
        //Ϊ��ͼƬ�����Ը�ֵ��
        $Commodity->image = '../../Files//'.$query['image'];
        //Ϊ����桱���Ը�ֵ��
        $Commodity->stock = $query['stock'];
        //Ϊ�����������Ը�ֵ��
        $Commodity->sales = $query['sales'];
        //Ϊ�����顱���Ը�ֵ��
        $Commodity->details = $query['details'];
        return $Commodity;    //���ء�������Ϣ������
    }

    //���塰���빺�ﳵ��������
    function alterTyolley($Commodity)
    {
        $Tyolley = new TyolleyObject();    //���������ﳵ������
        //Ϊ����š����Ը�ֵ��
        $Tyolley->id = $_COOKIE['consumers_id'];
        //Ϊ����Ʒ��š����Ը�ֵ��
        $Tyolley->commodity_id = $Commodity->id;
        //Ϊ���������������Ը�ֵ��
        $Tyolley->commodity_num = $_POST['number'];
        //���������ﳵ�����ݷ��ʲ㡣
        $Tyolley_DAL = new TyolleyDAL();
        //Ϊ����Ʒ��Ϣ�����Ը�ֵ��
        $Tyolley->content = $Tyolley_DAL->Query($Tyolley);
        //�жϡ���Ʒ��Ϣ���Ƿ�Ϊ�ա�
        if ($Tyolley->content == "")
        {
            //Ϊ����Ʒ��Ϣ�����Ը�ֵ��
            $Tyolley->content = $Tyolley->commodity_id.'&'.$Tyolley->commodity_num;
        }
        else
        {
            //���á�����ظ����򡱺�����
            $Tyolley->content = checkRepeat($Tyolley);
        }
        //�ж��Ƿ񡰼��빺�ﳵ���ɹ���
        if ($Tyolley_DAL->Alter($Tyolley) == 1)
        {
            return '���빺�ﳵ�ɹ���';    //���ؽ����
        }
        else
        {
            return '���빺�ﳵʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰����ظ����򡱺�����
    function checkRepeat($Tyolley)
    {
        //��ȡ��������Ʒ��Ϣ����
        $commodity_arr = explode('@', $Tyolley->content);
        $count = count($commodity_arr);    //��ȡ����Ʒ��������
        //��������Ʒ��Ϣ����
        for ($i = 0; $i < $count; $i++)
        {
            //��ȡ���ջ���Ϣ���ĸ�����Ϣ��
            $commodity = explode('&', $commodity_arr[$i]);
            //��ȡ����Ʒ��š����顣
            $commodity_id[$i] = $commodity[0];
            //��ȡ���������������顣
            $commodity_num[$i] = $commodity[1];
        }
        //��ȡ�ظ��ġ���Ʒ��š���
        $key = array_search($Tyolley->commodity_id, $commodity_id);
        //�ж��Ƿ��ظ�����
        if (is_numeric($key))
        {
            //���¼��㡰������������
            $commodity_num[$key] += $Tyolley->commodity_num;
        }
        else
        {
            //�����µġ���Ʒ��š���
            $commodity_id[$count] = $Tyolley->commodity_id;
            //�����µġ�������������
            $commodity_num[$count] = $Tyolley->commodity_num;
        }
        //��ȡ����Ʒ��������
        $new_count = count($commodity_id);
        //��������Ʒ��Ϣ����
        for ($k = 0; $k < $new_count; $k++)
        {
            //���ɡ���Ʒ��Ϣ����
            $new_commodity_arr[$k] = $commodity_id[$k].'&'.$commodity_num[$k];
        }
        //���ء���Ʒ��Ϣ����
        return implode('@', $new_commodity_arr);
    }

    //��������Ʒ������
    $Commodity = new CommodityObject();
    $Commodity->id = $_GET['id'];    //Ϊ����š����Ը�ֵ��
    //���á���ȡ��Ʒ��Ϣ��������
    getCommodity($Commodity);

    //�ж��û��Ƿ������ǡ����빺�ﳵ����ť��
    if ($_POST['submit'] == '���빺�ﳵ')
    {
        //���á����빺�ﳵ��������
        $result = alterTyolley($Commodity);
    }
?>