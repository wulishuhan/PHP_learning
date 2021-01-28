<?php
/*
 * 适配器模式，就是设计好接口，具体的实现由各个外部各自实现
 * */
interface IDatabase{
    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}
class mysql implements IDatabase{
    protected $conn;
    function connect($host, $user, $passwd, $dbname)
    {
       $conn=mysql_connect($host,$user,$passwd);
       mysql_select_db($dbname,$conn);
       $this->conn=$conn;
    }

    function query($sql)
    {
        $res=mysql_query($sql,$this->conn);
        return $res;
    }

    function close()
    {
        mysql_close($this->conn);
    }
}
class MySQLi implements IDatabase{
    protected $conn;

    function connect($host, $user, $passwd, $dbname)
    {
        $conn=mysqli_connect($host,$user,$passwd,$passwd);
        $this->conn=$conn;
    }

    function query($sql)
    {
       return mysqli_query($this->conn,$sql);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}
class pdo implements IDatabase{
    protected $conn;
    function connect($host, $user, $passwd, $dbname)
    {
        $conn=new PDO("mysql:host=$host;dname=$dbname",$user,$passwd);
        return $conn;
    }

    function query($sql)
    {
        return $this->conn->query($sql);
    }

    function close()
    {
        unset($this->conn);
    }
}