<?php

interface DBConnInterface{
    function getConnection();
    function openConnection();
    function closeConnection();
    function create($table,$datas);
    function update($table,$datas,$wheres=array());
    function delete($table,$where=array());
    function select($table,$where=array(),$single=false);
    function queryRaw($sql,$single=false);
    function getLastInsertId();
    function getAffectRow();
}
