<?php
    //���ء���Ʒ�������ݷ��ʲ㡱�ļ���
    include_once '../DAL/Commodity.dal.php';
    //���ء���Ʒ�ࡱ���ļ���
    include_once '../../Models/CommodityObject.class.php';

    //���塰��ȡ��Ʒ��Ϣ��������
    function getCommodity($Commodity)
    {
        //��������Ʒ�������ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //��ȡ��ѯ�����
        $query = $Commodity_DAL->Query();
        //Ϊ����Ʒ���������Ը�ֵ��
        $Commodity->count = count($query);
        //��������Ʒ����
        for ($i = 0; $i < $Commodity->count; $i++)
        {
            $id[$i] = $query[$i]['id'];    //��ȡ����š����顣
            //��ȡ�����ơ����顣
            $name[$i] = $query[$i]['name'];
            //��ȡ���۸����顣
            $price[$i] = $query[$i]['price'];
            //��ȡ��ͼƬ�����顣
            $image[$i] = '../../Files//'.$query[$i]['image'];
            //��ȡ����桱���顣
            $stock[$i] = $query[$i]['stock'];
            //��ȡ�����������顣
            $sales[$i] = $query[$i]['sales'];
            //��ȡ�����顱���顣
            $details[$i] = $query[$i]['details'];
        }
        $Commodity->id = $id;    //Ϊ����š����Ը�ֵ��
        $Commodity->name = $name;    //Ϊ�����ơ����Ը�ֵ��
        $Commodity->price = $price;    //Ϊ���۸����Ը�ֵ��
        $Commodity->image = $image;    //Ϊ��ͼƬ�����Ը�ֵ��
        $Commodity->stock = $stock;    //Ϊ����桱���Ը�ֵ��
        $Commodity->sales = $sales;    //Ϊ�����������Ը�ֵ��
        $Commodity->details = $details;    //Ϊ�����顱���Ը�ֵ��
        return $Commodity;    //���ء���Ʒ������
    }

    //���塰�޸���Ʒ��Ϣ��������
    function alterCommodity()
    {
        //��������Ʒ������
        $Commodity = new CommodityObject();
        //��������Ʒ�������ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        $row_index = $_POST['row_index'];    //��ȡ���кš���
        //Ϊ����š����Ը�ֵ��
        $Commodity->id = $_POST['id'][$row_index];
        //Ϊ�����ơ����Ը�ֵ��
        $Commodity->name = $_POST['name'][$row_index];
        //Ϊ���۸����Ը�ֵ��
        $Commodity->price = $_POST['price'][$row_index];
        //Ϊ����桱���Ը�ֵ��
        $Commodity->stock = $_POST['stock'][$row_index];
        //Ϊ�����顱���Ը�ֵ��
        $Commodity->details = $_POST['details'][$row_index];
        //�ж��Ƿ��ϴ��ļ���
        if (!empty($_FILES['upload']['name'][$row_index]))
        {
            //��ȡ��ʱ�ļ�����·����
            $filename = $_FILES['upload']['tmp_name'][$row_index];
            //Ϊ��ͼƬ�����Ը�ֵ��
            $Commodity->image = $_FILES['upload']['name'][$row_index];
            //�ж��ļ��Ƿ��ϴ��ɹ���
            if (move_uploaded_file($filename, '../../Files//'.$Commodity->image))
            {
                //�ж��Ƿ��޸ġ��ɹ���
                if ($Commodity_DAL->Alter1($Commodity) == 1)
                {
                    return '�޸ĳɹ���';    //���ؽ����
                }
                else
                {
                    return '�޸�ʧ�ܣ�';    //���ؽ����
                }
            }
            else
            {
                return '�ļ��ϴ�ʧ�ܣ�';    //���ؽ����
            }
        }
        else
        {
            //�ж��Ƿ��޸ġ��ɹ���
            if ($Commodity_DAL->Alter2($Commodity) == 1)
            {
                return '�޸ĳɹ���';    //���ؽ����
            }
            else
            {
                return '�޸�ʧ�ܣ�';    //���ؽ����
            }
        }
    }

    //���塰ɾ����Ʒ��������
    function deleteCommodity()
    {
        //��������Ʒ������
        $Commodity = new CommodityObject();
        $row_index = $_POST['row_index'];    //��ȡ���кš���
        //Ϊ����š����Ը�ֵ��
        $Commodity->id = $_POST['id'][$row_index];
        //��������Ʒ�������ݷ��ʲ㡣
        $Commodity_DAL = new CommodityDAL();
        //�ж��Ƿ�ɾ�����ɹ���
        if ($Commodity_DAL->Delete($Commodity) == 1)
        {
            return 'ɾ���ɹ���';    //���ؽ����
        }
        else
        {
            return 'ɾ��ʧ�ܣ�';    //���ؽ����
        }
    }

    //���塰�����Ʒ��������
    function addCommodity()
    {
        //��������Ʒ������
        $Commodity = new CommodityObject();
        //Ϊ����š����Ը�ֵ��
        $Commodity->id = $_POST['add_id'];
        //Ϊ�����ơ����Ը�ֵ��
        $Commodity->name = $_POST['add_name'];
        //Ϊ���۸����Ը�ֵ��
        $Commodity->price = $_POST['add_price'];
        //Ϊ����桱���Ը�ֵ��
        $Commodity->stock = $_POST['add_stock'];
        //Ϊ�����顱���Ը�ֵ��
        $Commodity->details = $_POST['add_details'];
        //��ȡ��ʱ�ļ�����·����
        $filename = $_FILES['add_upload']['tmp_name'];
        //Ϊ��ͼƬ�����Ը�ֵ��
        $Commodity->image = $_FILES['add_upload']['name'];
        //�ж��ļ��Ƿ��ϴ��ɹ���
        if (move_uploaded_file($filename, '../../Files//'.$Commodity->image))
        {
            //��������Ʒ�������ݷ��ʲ㡣
            $Commodity_DAL = new CommodityDAL();
            //�ж��Ƿ���ӡ��ɹ���
            if ($Commodity_DAL->Add($Commodity) == 1)
            {
                return '��ӳɹ���';    //���ؽ����
            }
            else
            {
                return '���ʧ�ܣ�';    //���ؽ����
            }
        }
        else
        {
            return '�ļ��ϴ�ʧ�ܣ�';    //���ؽ����
        }
    }

    //��������Ʒ������
    $Commodity = new CommodityObject();
    //���á���ȡ��Ʒ��Ϣ��������
    getCommodity($Commodity);
    //�жϡ���Ʒ�������Ƿ�Ϊ�㡣
    if ($Commodity->count == 0)
    {
        $result = '������Ʒ��';    //���ؽ����
    }

    //�ж��û��Ƿ������ǡ��޸ġ���ť��
    if ($_POST['submit'] == '�޸�')
    {
        //���á��޸���Ʒ��Ϣ��������
        $result = alterCommodity();
        //���á���ȡ��Ʒ��Ϣ��������
        getCommodity($Commodity);
    }

    //�ж��û��Ƿ������ǡ�ɾ������ť��
    if ($_POST['submit'] == 'ɾ��')
    {
        $result = deleteCommodity();    //���á�ɾ����Ʒ��������
        //���á���ȡ��Ʒ��Ϣ��������
        getCommodity($Commodity);
        header('Location:Commodity.php');    //ҳ��ˢ�¡�
    }

    //�ж��û��Ƿ������ǡ���ӡ���ť��
    if ($_POST['submit'] == '���')
    {
        $result = addCommodity();    //���á������Ʒ��������
        //���á���ȡ��Ʒ��Ϣ��������
        getCommodity($Commodity);
    }
?>