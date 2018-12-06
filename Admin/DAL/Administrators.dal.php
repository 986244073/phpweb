<?php
//	include_once 'PDO.db.php';    //加载“PDO数据操作类”类文件。
include_once '../PDO_DBObject.PHP';

//定义“管理员”数据访问层。
	class AdministratorsDAL
	{			
		//定义“登录”成员方法。
		public function Login($Administrators)
		{
			$sql = "select id from tb_administrators where username = '$Administrators->username' and password = '$Administrators->password'";    //查询SQL语句。
			$DBObject = new PDO_DB();    //声明“PDO数据库操作”对象。
			return $DBObject->getInfo($sql)[0]['id'];    //执行SQL语句。
		}
	}
?>