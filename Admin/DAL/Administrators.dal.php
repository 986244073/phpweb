<?php
//	include_once 'PDO.db.php';    //���ء�PDO���ݲ����ࡱ���ļ���
include_once '../PDO_DBObject.PHP';

//���塰����Ա�����ݷ��ʲ㡣
	class AdministratorsDAL
	{			
		//���塰��¼����Ա������
		public function Login($Administrators)
		{
			$sql = "select id from tb_administrators where username = '$Administrators->username' and password = '$Administrators->password'";    //��ѯSQL��䡣
			$DBObject = new PDO_DB();    //������PDO���ݿ����������
			return $DBObject->getInfo($sql)[0]['id'];    //ִ��SQL��䡣
		}
	}
?>