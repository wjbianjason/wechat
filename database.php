<?php
header("Content-Type:text/html;charset=utf8");
class SaeMysql{
	private $host="localhost";
	private $name="root";
	private $pwd="624386547";
	private $db="zhaole";
	private $conn="";
	private $result="";
	private $msg="";
	private $fields;
	private $fieldnum=0;
	private $resultnum=0;
	private $resultarr="";
	private $fileArray=array();
	private $rowsArray=array();
	function __construct()
	{
		$this->conn=@mysql_connect($this->host,$this->name,$this->pwd);
		@mysql_select_db($this->db,$this->conn);
		mysql_query("set names utf8");
	}
	function runSql($sql)
	{
		mysql_query($sql);
	}
	function closeDb()
	{
		mysql_close($this->conn);
	}
	function getData($sql)
	{
		$result=mysql_query($sql);
		$i=0;
		while( $Array = mysql_fetch_array($result, MYSQL_ASSOC ) )
        {
            $data[$i++] = $Array;
        }
        mysql_free_result($result);
        if( count( $data ) > 0 )
            return $data;
        else
            return false; 
	}
}
?>