<?php

class BaseQuery
{

    public $mysqli;

    protected $conn;

    private $_lastSql;

    /**
     * [__construct 构造函数, 实例化数据库连接]
     *
     * @param [void] $dbKey [void]
     */
    public function __construct($dbKey)
    {
        include 'MySqliConnector.php';

        $mysqliObj = MySqliConnector::getInstance($dbKey);

        $this->mysqli = $mysqliObj->mysqli;
        $this->conn   = $mysqliObj->mysqliConn;
    }

    /**
     * [query 执行一次查询]
     *
     * @param [string] $sql [查询sql]
     *
     * @return [array] [结果集]
     */
    public function query($sql)
    {
        $resultSets = [];

        $result = $this->mysqli->query($sql);

        $this->_lastSql = $sql;

        if ($result->num_rows == 0) {
            return $resultSets;
        }
        while ($assoc = $result->fetch_assoc()) {
            $resultSets[] = $assoc;
        }
        return $resultSets;
    }

    /**
     * [exec 执行一次]
     *
     * @param [string] $sql [sql]
     *
     * @return [array] [结果集]
     */
    public function exec($sql)
    {
        $resultSets = [];

        return $this->mysqli->query($sql);
    }

    /**
     * [getLastQuery 获取上一次sql执行信息, 作为调试用]
     *
     * @return [array] [上一次sql执行信息]
     */
    public function getLastQuery()
    {
        $lastQuery = [];

        $lastQuery['error'] = [
            'errno'      => $this->mysqli->errno,
            'error'      => $this->mysqli->error,
            'error_list' => $this->mysqli->error_list,
        ];

        $lastQuery['warning'] = [
            'count' => $this->mysqli->warning_count,
            'msg'   => $this->mysqli->get_warnings()
        ];
        $lastQuery['field_count']   = $this->mysqli->field_count;
        $lastQuery['affected_rows'] = $this->mysqli->affected_rows;
        $lastQuery['sql_executed']  = $this->_lastSql; // 尽量还原原生执行的sql,不做任何格式化处理
        $lastQuery['extra_info']    = $this->mysqli->info;
        $lastQuery['insert_id']     = $this->mysqli->insert_id;

        return $lastQuery;
    }

}