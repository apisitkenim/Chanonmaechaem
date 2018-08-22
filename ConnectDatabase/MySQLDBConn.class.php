<?php

include 'DBConnInterface.php';

class MySQLDBConn implements DBConnInterface{
    private $conn;
    private $affectRow;
    private $host,$username,$password,$dbName;
    private $lastInsertId;

    public function __construct($host,$username,$password,$db){
        try{
            $this->affectRow = 0;
            $this->host = $host;
            $this->username = $username;
            $this->dbName = $db;
            $this->password = $password;
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo 'ERROR :'.$e->getMessage();
        }
    }

    function getConnection()
    {
        return $this->conn;
    }

    function create($table, $datas)
    {
        if(!sizeof($datas)) return false;

        $this->openConnection();
        $columns = array();
        $columnsParm = array();
        //Column and Value insert

        foreach ($datas as $column => $value) {
            $columns[] = $column;
            $columnsParm[] = '"'.$value.'"';
        }

        $columns = implode(',',$columns);
        $columnsParm = implode(',',$columnsParm);

        $sql = 'INSERT INTO '.$table.'('.$columns.') VALUES ('.$columnsParm.')';

        $this->queryUTF8();
        return  $this->executeRow($sql,$datas);
    }

    function update($table, $datas,$wheres=array())
    {
        if(!sizeof($datas)) return false;

        $this->openConnection();
        $updateValues = array();
        //Column update
        foreach ($datas as $column => $value) {
            $updateValues[] = $column.' = :'.$column;
        }
        $updateValues = implode(',',$updateValues);
        $sql = 'UPDATE '.$table.' SET '.$updateValues.' WHERE 1=1 ';
//Where cause
        $tmpWheres = array();
        foreach ($wheres as $column => $value) {
            $sql .= ' AND '.$column.' = :WHERE_'.$column;
            $column = 'WHERE_'.$column;
            $clm[':'.$column] = $value;
            $tmpWheres = $clm;

        }
        $this->queryUTF8();
        return $this->executeRow($sql,array_merge($datas,$tmpWheres));
    }

    function delete($table, $where=array())
    {
        $this->openConnection();
        $sql = 'DELETE FROM '.$table.' WHERE 1 = 1 ';
        foreach ($where as $column => $value) {
            $sql .= ' AND '.$column.' = :'.$column;
        }
        return $this->executeRow($sql,$where);
    }

    function select($table, $wheres=array(),$single=false)
    {
        $this->openConnection();
        //Prepare statement
        $sql = 'SELECT * FROM '.$table.' WHERE 1 = 1 ';

        foreach ($wheres as $column => $value) {
            $sql .= ' AND '.$column.' = :'.$column;
        }

        $this->queryUTF8();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($wheres);

        if($single) $result = $stmt->fetch(PDO::FETCH_ASSOC);
        else $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function queryRaw($sql,$single=false)
    {
        $this->openConnection();
        $this->queryUTF8();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if($single) $result = $stmt->fetch(PDO::FETCH_ASSOC);
        else $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    private function queryUTF8(){
        $this->conn->query("SET NAMES UTF8");
        $this->conn->query("set character_set_results='utf8'");
        $this->conn->query("set character_set_client='utf8'");
        $this->conn->query("set character_set_connection='utf8'");
    }

    private function executeRow($sql,$params){
        $this->openConnection();
        try{
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            $this->lastInsertId = $this->conn->lastInsertId();
            $this->conn->commit();
            $this->affectRow = $stmt->rowCount();

        }catch (PDOException $e){
            echo 'ERROR :'.$e->getMessage();
            $this->conn->rollBack();
            return false;
        }
        return true;
    }

    function closeConnection()
    {
        if($this->conn !=null) {
            $this->conn = null;
        }
    }

    function openConnection()
    {
        if($this->conn == null) {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    //Called automatically when there are no further references to object
    function __destruct() {
        try {
            $this->conn = null; //Closes connection
        } catch (PDOException $e) {
            file_put_contents("log/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $e->getMessage().PHP_EOL, FILE_APPEND);
            die($e->getMessage());
        }
    }

    function getLastInsertId()
    {
        if($this->conn !=null) return $this->lastInsertId;
    }

    function getAffectRow()
    {
        return $this->affectRow;
    }
}
