<?php

class SqlString
{
    /**
     * [backquoteSqlString 给sql 语句中的表名, 字段名等加上反引号, 防止传递sql关键字]
     *
     * @param  [string] $str [表名,字段名等字符]
     *
     * @return [string]      [被反引号括起来的字符串]
     */
    public static function backquoteSqlString($str)
    {
        $quoted = '';
        if (0 !== stripos($str, '`')) {
            $quoted = '`' . $str;
        }
        if (strlen($str) - 1 !== strripos($str, '`')) {
            $quoted = $quoted .= '`';
        }
        return $quoted;
    }

    /**
     * [parseAlias 解析sql 中 as 或 为空 的别名  ]
     *
     * @param  [string] $str [表名,字段名等字符]
     *
     * @return [string]
     */
    public static function parseAlias($str)
    {

    }
}