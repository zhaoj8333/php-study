<?php

//  Connections made with mysql_pconnect are different. This function establishes a persistent
// connection to the database to be reused by multiple PHP scripts. Using a persistent connection makes
// your scripts slightly faster, as PHP no longer has to reconnect each time, but speed comes at a price:
// if your Website runs on a shared server, persistent connections may monopolize that server, resulting
// in other sites being unable to connect at times. In such environments, it’s typical to either avoid
// mysql_pconnect, or configure MySQL so that connections are terminated the moment they stop
// doing anything, using a short connection timeout value.

require 'Model.php';

class DbTest
{
    public $query;

    function __construct()
    {
        $srvObj = new Model('db1');
        // var_dump($srvObj);die;
        // $this->query = $tableObj->mysqli;
        $id = $_POST['id'];
        // $id = mysql_real_escape_string($id);
// var_dump($_POST['id']);
// var_dump(stripslashes($_POST['id']));
// var_dump($id);die;
        $res = $srvObj
            ->table('tos_event_detail')
            ->where('id = ' . $id)
            ->field('')
            ->select();
var_dump($res);
        var_dump($srvObj->getLastQuery());
    }
}

$db = new DbTest();

// $conn = new MysqliQuery($mysql);
// var_dump($conn);
