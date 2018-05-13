<?php

require 'Query.php';
require 'ArrayTool.php';
require 'SqlString.php';


class TableQuery extends Query
{

    public $table;

    public $fields = "*";
    public $orderBy;
    public $order;
    public $limit = "1, 10";

    public $query;

    public function getTables($tableName)
    {
        $sql = "SHOW TABLE STATUS";
        if (!empty($tableName)) {
            $sql .= " WHERE `Name` LIKE '%{$tableName}%'";
        }
        return ArrayTool::indexBy($this->query($sql), 'Name');
    }

    public function getTableDetail($tableName = '')
    {
        $table = [];
        if (empty($tableName)) {
            return $table;
        }
        // 表详细信息
        $table['status'] = $this->query("SHOW TABLE STATUS WHERE Name = '{$tableName}'");
        // 表列信息
        $table['columns'] = ArrayTool::indexBy($this->query("SHOW FULL COLUMNS FROM {$tableName}"), 'Field');
        // 表索引
        $table['index'] = $this->query("SHOW INDEX FROM {$tableName}");
        // 表创建语句
        $create = $this->query("SHOW CREATE TABLE {$tableName}");
        $table['create'] = &$create['0']['Create Table'];

        return $table;
    }

    /**
     * [getSchema description]
     *
     * 通过访问information_schema数据库获得show table status的相关信息
     *
     * 获得按数据量排序的信息：
     *
     *   SELECT table_name,ENGINE,VERSION,ROW_FORMAT,table_rows,AVG_ROW_LENGTH,
     *   Data_length,Max_data_length,Index_length,Data_free,AUTO_INCREMENT,
     *   Create_time,Update_time,Check_time,table_collation,CHECKSUM,
     *   Create_options,table_comment FROM information_schema.TABLES
     *   WHERE table_schema = DATABASE()
     *   ORDER BY table_rows DESC
     *   也可以指定数据库：
     *
     *   SELECT table_name,Engine,Version,Row_format,table_rows,Avg_row_length,
     *   Data_length,Max_data_length,Index_length,Data_free,Auto_increment,
     *   Create_time,Update_time,Check_time,table_collation,Checksum,
     *   Create_options,table_comment FROM information_schema.tables
     *   WHERE table_schema = 'yourdb';
     *   还可以方便的查询到那些表的引擎不是InnoDB，如下sql语句：
     *
     *   SELECT table_name,Engine,Version,Row_format,table_rows,Avg_row_length,
     *   Data_length,Max_data_length,Index_length,Data_free,Auto_increment,
     *   Create_time,Update_time,Check_time,table_collation,Checksum,
     *   Create_options,table_comment FROM information_schema.tables
     *   WHERE table_schema = 'yourdb' and Engine != 'InnoDB'
     *
     * @param  [string] $dbName [数据库名称]
     *
     * @return [array]
     */
    public function getSchema($dbName)
    {
        $schema = $this->query(
            "
            SELECT
                *
            FROM
                information_schema.tables
            WHERE
                table_schema = '{$dbName}'
            "
        );
    }

    public function table($tableName)
    {
        $this->table = SqlString::backquoteSqlString($tableName);

        return $this;
    }

    public function field($fields)
    {
        if (empty($fields)) {
            return $this;
        }

        $fieldsStr = "";
        if (is_array($fields)) {
            foreach ($fields as $key => $field) {
                $fieldsStr .= SqlString::backquoteSqlString($field) . ", ";
            }
            $this->fields = substr($fieldsStr, 0, strlen($fieldsStr) - 2);
        } elseif (is_string($fields)) {
            $fieldsArr = explode($fields, ',');
            var_dump($fieldsArr);
        }
die;
        return $this;
    }

    public function select()
    {
        $sql = "
            SELECT
                {$this->fields}
            FROM {$this->table}
            ORDER BY {$this->orderBy} {$this->order}
            LIMIT {$this->limit}
        ";
        return $this->query($sql);
    }

    public function orderBy($orderBy, $order = "DESC")
    {
        $this->orderBy = SqlString::backquoteSqlString($orderBy);
        $this->order   = $order;

        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
    }




}

