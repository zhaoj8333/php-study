<?php

require 'Query.php';
require 'ArrayTool.php';

class ServerQuery extends Query
{

    /**
     * [getServerVariables 获取服务器变量]
     *
     * @param string $variable 变量名
     *
     * @return [array] [服务器变量]
     */
    public function getServerVariables($variable = '')
    {
        $sql = "SHOW VARIABLES";

        if (!empty($variable)) {
            $sql .= " WHERE `Variable_name` LIKE '%{$variable}%' ";
        }
        $vars = $this->query($sql);

        return ArrayTool::indexBy($vars, 'Variable_name');
    }

    /**
     * [getServerStatus 查看服务器状态信息]
     *
     * @param  string $variable [要过滤的信息]
     *
     * @return [array]           [状态信息]
     */
    public function getServerStatus($variable = '')
    {
        $sql = "SHOW GLOBAL STATUS";

        if (!empty($variable)) {
            $sql .= " WHERE `Variable_name` LIKE '%{$variable}%'";
        }
        $status = $this->query($sql);

        return ArrayTool::indexBy($status, 'Variable_name');
    }

    /**
     * [getCharset 返回当前激活的字符集]
     *
     * @return object
     */
    public function getCharset()
    {
        return $this->mysqli->get_charset();
    }

    /**
     * [getClientInfo 返回当前 mysql连接的客户端信息]
     *
     * @return [array] [客户端信息]
     */
    public function getClientInfo()
    {
        $clientInfo = [
            'client_info'    => $this->mysqli->client_info,
            'number_version' => $this->mysqli->get_client_version(),
            'stats'          => ''
        ];
        if (false !== stripos($clientInfo['client_info'], 'mysqlnd')) {
            $clientInfo['stats'] = $this->mysqli->get_connection_stats();
        }

        return $clientInfo;
    }

    /**
     * [getServerInfo 获取服务器信息]
     *
     * @return [array] [服务器信息]
     */
    public function getServerInfo()
    {
        $serverInfo = [
            'host_info'        => $this->mysqli->host_info,
            'server_info'      => 'MySQL - ' . $this->mysqli->server_info,
            'number_version'   => $this->mysqli->server_version,
            'protocol_version' => $this->mysqli->protocol_version
        ];

        return $serverInfo;
    }

    /**
     * [isMysqlServerWorking 通过ping了解程序与mysql是否互通]
     *
     * @return boolean
     */
    public function isMysqlServerWorking()
    {
        return $this->mysqli->ping();
    }

    /**
     * [getMysqlThread 获取mysql线程信息]
     *
     * @return [array] [线程信息]
     */
    public function getMysqlThread()
    {
        $thread = [];

        $thread['safe'] = $this->mysqli->thread_safe();
        $thread['id']   = $this->mysqli->thread_id;

        return $thread;
    }

    /**
     * [killMysqlThread 杀死一个mysql线程]
     *
     * @return boolean
     */
    public function killMysqlThread()
    {
        return $this->mysqli->kill($this->mysqlThread());
    }


}