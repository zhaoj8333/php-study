<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-08-05 21:59:12
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-08-05 22:46:17
 */

require '/home/zhaojun/www/php-study/data-faker/faker.basic.php';




// var_dump($redis);
//

$data = get_data();

// $first = $redis->get('aa');

// if ($redis->exists('stuffs')) {
//     $redis->delete('stuffs');
// }

// $stuffs = $redis->hmset('stuffs', $data);

// var_dump($data);

function set_data()
{
    $redis = new Redis();
    $redis->connect('172.17.0.2', 6379, 2);
    foreach ($data as $key => $val) {
        // foreach ($val as $k => $v) {
            $redisKey = 'stuffs-' . $key;
            $redis->hmset($redisKey, $val);
            // $redis->delete($redisKey);
        // }
    }

}


function get_rdata($key)
{
    $redis = new Redis();
    $redis->connect('172.17.0.2', 6379, 2);
    $arr = [
        'id',
        'company',
        'name',
        'phone',
        'email',
        'title',
    ];
    // return $redis->hMGet('stuffs-' . $key, $arr);
    return $redis->hGetAll('stuffs-' . $key);
}

for ($i = 0; $i < 5; $i++) {
    var_dump(get_rdata($i));
}