<?php

class PDO_DB    //PDO���ݿ������


{

    //���塰���ݿ����͡���Ա������

    private $dbms = 'mysql';

    //���塰���������ơ���Ա������

    private $host = 'localhost';

    //���塰���ݿ����ơ���Ա������

    private $dbname = 'db_dswz';

    //���塰���ݿ��û�������Ա������

    private $username = 'root';

    //���塰���ݿ����롱��Ա������

    private $password ='123456';

    private $dsn;    //���塰����Դ����Ա������

    private $pdo;    //���塰PDO���󡱳�Ա������



    //���幹�캯����

    public function __construct()

    {

        //Ϊ��Ա����������Դ����ֵ��

        $this->dsn = "$this->dbms:host=$this->host;dbname=$this->dbname";

        //����PDO����

        $this->pdo = new PDO($this->dsn, $this->username, $this->password);

        }



    //���塰��ɾ�ġ���Ա������

    public function IDU($sql)

    {

        //���Բ������ݿ⡣

        try

        {

            //ִ��SQL��䡣

            $num =$this->pdo->exec($sql);

            return $num;    //���ر�Ӱ���������

        }

            //��ȡ�쳣��Ϣ��

        catch (PDOException $e)

        {

            die($e->getMessage());    //���ش�����Ϣ��

        }

    }



    //���塰��ȡ��ѯ�������Ա������

    public function getInfo($sql)

    {

        //���Բ������ݿ⡣

        try

        {

            //ִ��SQL��䡣

            $result =$this->pdo->query($sql);

            //���ز�ѯ�����

            return$result->fetchAll(PDO::FETCH_ASSOC);

        }

            //��ȡ�쳣��Ϣ��

        catch (PDOException $e)

        {

            die($e->getMessage());    //���ش�����Ϣ��

        }

    }

}

?>