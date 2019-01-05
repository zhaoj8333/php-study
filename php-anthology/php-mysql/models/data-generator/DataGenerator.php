<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-22 13:24:38
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-23 14:06:20
 */

require '/home/zhaojun/www/php-study/php-anthology/php-mysql/BaseQuery.php';
require '/home/zhaojun/www/php-study/vendor/fzaninotto/faker/src/autoload.php';
require '/home/zhaojun/www/php-study/php-anthology/php-mysql/BatchInsert.php';

class DataGenerator extends BaseQuery
{
    use BatchInsert;

    const TOTAL_GENEREATE = 2000000;
    const MAX_DATA_EACH_GENERATE = 100;
    const PK_AUTO_INCREMENT = true;
    const DEBUG = true;

    protected $faker;
    protected $tableName;

    protected $total = 0;
    protected $pk;
    protected $offset = 0;
    protected $data = [];

    protected $fields = [];

    public function initialize()
    {
        $this->faker = Faker\Factory::create();
    }

    protected function saveData()
    {
        $res = $this->batchInsert(
            $this->data,
            $this->tableName,
            $this->pk
        );

        $res['last'] = $this->getLastQuery()['insert_id'];

        return $res;
    }
}
