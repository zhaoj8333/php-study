<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 17:07:54
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-19 18:33:43
 */

trait BatchInsert
{
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
                    $tmp .= 'NULL, ';
                } else {
                    if (is_string($v)) {
                        $tmp .= "'" . $v . "', ";
                    } else {
                        $tmp .= $v . ", ";
                    }
                }
            }
            $batchInsertSql .= substr($tmp, 0, strlen($tmp) - 2);
            $batchInsertSql .= "), ";
        }

        $batchInsertSql = substr($batchInsertSql, 0, strlen($batchInsertSql) - 2);

        var_dump($batchInsertSql)   ;
    }


}
