<?php

class PDO_DBObject    //PDO数据库操作类

{

    //定义“数据库类型”成员变量。

    private $dbms = 'mysql';

    //定义“服务器名称”成员变量。

    private $host = 'localhost';

    //定义“数据库名称”成员变量。

    private $dbname = 'db_users';

    //定义“数据库用户名”成员变量。

    private $username = 'root';

    //定义“数据库密码”成员变量。

    private $password ='123456';

    private $dsn;    //定义“数据源”成员变量。

    private $pdo;    //定义“PDO对象”成员变量。



    //定义构造函数。

    public function __construct()

    {

        //为成员变量“数据源”赋值。

        $this->dsn = "$this->dbms:host=$this->host;dbname=$this->dbna

me";

        //声明PDO对象。

        $this->pdo = newPDO($this->dsn, $this->username, $this->password);

        }



    //定义“增删改”成员方法。

    public function IDU($sql)

    {

        //尝试操作数据库。

        try

        {

            //执行SQL语句。

            $num =$this->pdo->exec($sql);

            return $num;    //返回被影响的行数。

        }

            //获取异常信息。

        catch (PDOException $e)

        {

            die($e->getMessage());    //返回错误信息。

        }

    }



    //定义“获取查询结果”成员方法。

    public function getInfo($sql)

    {

        //尝试操作数据库。

        try

        {

            //执行SQL语句。

            $result =$this->pdo->query($sql);

            //返回查询结果。

            return$result->fetchAll(PDO::FETCH_ASSOC);

        }

            //获取异常信息。

        catch (PDOException $e)

        {

            die($e->getMessage());    //返回错误信息。

        }

    }

}

?>