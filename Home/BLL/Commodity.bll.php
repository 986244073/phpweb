<?php
    //���ء���Ʒ���ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';

    //���塰��ʾ��Ʒ��������
    function showCommodity($Commodity)
    {
        //��������Ʒ�����ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //��ȡ��ѯ�����
        $query = $Commodity_DAL->Query();
        //���á���ȡ��Ʒ��������
        return getCommodity($Commodity, $query);
    }

    //���塰������Ʒ��������
    function searchCommodity($Commodity)
    {
        //��������Ʒ�����ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //��ȡ��ѯ�����
        $query = $Commodity_DAL->Search($Commodity);
        //���á���ȡ��Ʒ��������
        return getCommodity($Commodity, $query);
    }

    //���塰��ȡ��Ʒ��������
    function getCommodity($Commodity, $query)
    {
        //Ϊ����Ʒ���������Ը�ֵ��
        $Commodity->count = count($query);
        //��������Ʒ����
        for ($i = 0; $i < $Commodity->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //��ȡ����š����顣
            //��ȡ�����ơ����顣
            $name[$i] = $query[$i]['name'];
            //��ȡ���۸����顣
            $price[$i] = '��'.$query[$i]['price'];
            //��ȡ��ͼƬ�����顣
            $image[$i] = '../../Files//'.$query[$i]['image'];
        }
        $Commodity->id = $id;    //Ϊ����š����Ը�ֵ��
        $Commodity->name = $name;    //Ϊ�����ơ����Ը�ֵ��
        $Commodity->price = $price;    //Ϊ���۸����Ը�ֵ��
        $Commodity->image = $image;    //Ϊ��ͼƬ�����Ը�ֵ��
        return $Commodity;    //���ء�������Ϣ������
    }

    //��������Ʒ������
    $Commodity = new CommodityObject();
    showCommodity($Commodity);    //���á���ʾ��Ʒ��������

    //�ж��û��Ƿ������ǡ���������ť��
    if ($_POST['submit'] == '����')
    {
        //Ϊ�����ơ����Ը�ֵ��
        $Commodity->name = $_POST['search'];
        //���á�������Ʒ��������
        searchCommodity($Commodity);
    }

    //�жϡ���Ʒ�������Ƿ�Ϊ�㡣
    if ($Commodity->count == 0)
    {
        $result = 'û����Ʒ��';    //���ؽ����
    }
?>