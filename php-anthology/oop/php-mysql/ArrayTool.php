<?php

class ArrayTool
{

    /**
     * [indexBy 重新索引数组]
     *
     * @param  [array]  $array [要重新索引的数组]
     * @param  [string] $index [索引的key]
     * @param  [bool]   $checkUnique [是否检查唯一性]
     *
     * @return [array]        [返回重新索引的数组]
     */
    public static function indexBy(&$array = [], $index = '', $checkUnique = true)
    {
        $return = [];

        // 数组 是否为空
        $array = array_values($array);
        if (empty($array)) {
            return null;
        }
        // 是否该索引合法
        if (!isset($array[0][$index])) {
            return null;
        }
        // 该索引所指向的值是否唯一
        if ($checkUnique && count(array_unique(array_column($array, $index))) !== count($array)) {
            ini_set('error_reporting', E_ALL);
            trigger_error('the value of specified index pointed to may not unique, this may lose some data !', E_USER_WARNING);
        }
        foreach ($array as $key => $elem) {
            $return[$elem[$index]] = $elem;
        }
        return $return;
    }
}