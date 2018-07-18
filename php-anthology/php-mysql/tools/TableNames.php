<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 13:52:01
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 17:00:28
 */

require '../BaseQuery.php';
require '../../../php-cli/cli-color.php';

class TableNames extends BaseQuery
{
    private $interactive = true;

    private $startTime;
    private $endTime;

    public $oldTables = [];
    public $newTables = [];

    public function __construct($interactive = true)
    {
        $this->interactive = $interactive;
        parent::__construct('db1');
    }

    public function showTables()
    {
        $sql = "SHOW TABLES";

        $tables = $this->query($sql);
        $dbName = $this->conn->getCurrConnection()['dbname'];
        foreach ($tables as $key => $table) {
            $this->oldTables[$key] = $table['Tables_in_' . $dbName];
        }
    }

    public function getRenamedTableNames(array $olds, $new)
    {
        foreach ($this->oldTables as $key => $oldTable) {
            $newTable = str_replace($olds, $new, $oldTable);
            if ($oldTable != $newTable) {
                $this->newTables[$oldTable] = [
                    'old' => $oldTable,
                    'new' => str_replace($olds, $new, $oldTable)
                ];
            }
        }
    }

    public function alterTablesPrefix(array $oldPrefixes, $newPrefix)
    {
        if (empty($this->oldTables)) {
            $this->showTables();
        }
        $this->getRenamedTableNames($oldPrefixes, $newPrefix);

        $sql = "";
        foreach ($this->newTables as $key => $newTable) {
            $sql = "ALTER TABLE `{$newTable['old']}` RENAME TO `{$newTable['new']}`;";

            if ($this->interactive) {
                $prompt = $newTable['old'] . ' --> ' . $newTable['new'];
                echo $prompt;
                $this->startTime = microtime(true);
            }

            $result = $this->exec($sql);
            if ($this->interactive) {
                $this->endTime = microtime(true);
            }

            if ($result) {
                $resStr = "    " . CliColor::getDebugLevelString('info', ' success!');
            } else {
                $resStr = "    " . CliColor::getDebugLevelString('error', 'failed!');
            }
            if ($this->interactive) {
                $resStr .= "    Time:" . (sprintf("%.2f", $this->endTime - $this->startTime)) . " ";
            }
            $resStr .= "\n";

            echo $resStr;
        }
    }
}

// $tableNames = new TableNames();
// $tableNames->alterTablesPrefix(['g7tv_'], 'car');