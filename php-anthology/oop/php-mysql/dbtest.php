<?php

//  Connections made with mysql_pconnect are different. This function establishes a persistent
// connection to the database to be reused by multiple PHP scripts. Using a persistent connection makes
// your scripts slightly faster, as PHP no longer has to reconnect each time, but speed comes at a price:
// if your Website runs on a shared server, persistent connections may monopolize that server, resulting
// in other sites being unable to connect at times. In such environments, it’s typical to either avoid
// mysql_pconnect, or configure MySQL so that connections are terminated the moment they stop
// doing anything, using a short connection timeout value.

require 'TableQuery.php';

class DbTest
{
    public $query;

    function __construct()
    {
        $srvObj = new TableQuery('db1');
        // $this->query = $tableObj->mysqli;

        $res = $srvObj
            ->table('tos_event_detail')
            ->field(
                [
                    'id',
                    'eid',
                    'etype_id',
                    'etype',
                    'data',
                    'htype',
                    'uname'
                ]
            )
            ->orderBy('id')
            ->select();

        $result = $srvObj
            ->table('tos_event')
            ->field('*')
            ->orderBy('id')
            ->select();
// var_dump($result);die;
        var_dump($srvObj->getLastQuery());
    }
}

$db = new DbTest();

// $conn = new MysqliQuery($mysql);
// var_dump($conn);
