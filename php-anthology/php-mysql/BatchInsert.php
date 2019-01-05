<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 17:07:54
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-23 14:10:22
 */

trait BatchInsert
{
    protected $beginExec  = 0.00;
    protected $endExec    = 0.00;
    protected $execResult = false;

    public function batchInsert(array $data = [], $tableName = '', $pk = 'id')
    {
        if (!$data || !$tableName) {
            return false;
        }
        $batchInsertSql = "INSERT INTO `{$tableName}` ";

        $columns = array_keys($data[0]);
        if (!in_array($pk, $columns)) {
            array_push($columns, $pk);
        }
        $batchInsertSql .= "(`" . implode('`, `', $columns) . "`) VALUES ";

        foreach ($data as $key => $keyVal) {
            $batchInsertSql .= "(";
            $tmp = "";
            foreach ($keyVal as $k => $v) {
                if ($v === null) {
                    $tmp .= "NULL, ";
                } else {
                    if (is_string($v)) {
                        $tmp .= "'" . addslashes($v) . "', ";
                    } else {
                        $tmp .= $v . ", ";
                    }
                }
            }
            $batchInsertSql .= substr($tmp, 0, strlen($tmp) - 2);
            $batchInsertSql .= "), ";
        }

        $batchInsertSql = substr($batchInsertSql, 0, strlen($batchInsertSql) - 2);
        if (self::DEBUG) {
            // echo $batchInsertSql, "\n";
        }
        $this->beginExec = microtime(true);
        $res = $this->exec($batchInsertSql);
        $this->endExec   = microtime(true);

        return [
            'sql' => $batchInsertSql,
            'res' => $res,
        ];
    }
}
