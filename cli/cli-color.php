<?php

/**
 * @Author: zhaojun_cd
 * @Date:   2018-07-18 14:41:47
 * @Last Modified by:   zhaojun_cd
 * @Last Modified time: 2018-07-18 16:09:34
 */


class CliColor
{

    const UNUSUSAL_STR_BEGIN = "\033";
    const UNUSUSAL_STR_END = "m";
    const UNUSUSAL_STR_STOP = "\033[0m";

    public static $backgroundColors = [
        'black'     => "40",
        'red'       => "41",
        'green'     => "42",
        'yellow'    => "43",
        'blue'      => "44",
        'purple'    => "45",
        'deepgreen' => "46",
        'white'     => "47",
    ];

    public static $foreGroundColors = [
        'black'     => "30",
        'red'       => "31",
        'green'     => "32",
        'yello'     => "33",
        'blue'      => "34",
        'purple'    => "35",
        'deepgreen' => "36",
        'white'     => "37",
    ];

    public static $levels = [
        'emergency',
        'alert',
        'critical',
        'error',
        'warning',
        'notice',
        'info',
        'debug',
    ];

    public static function getColoredString($foregroundColor, $backgroundColor, $text)
    {
        $coloredString = self::UNUSUSAL_STR_BEGIN . "[";

        if (isset(self::$foreGroundColors[$foregroundColor])) {
            $coloredString .= self::$foreGroundColors[$foregroundColor] . ";";
        }
        if (isset(self::$backgroundColors[$backgroundColor])) {
            $coloredString .= self::$backgroundColors[$backgroundColor];
        }
        $coloredString .= self::UNUSUSAL_STR_END . $text . self::UNUSUSAL_STR_STOP;

        return $coloredString;
    }

    public static function getDebugLevelString($level, $text)
    {
        if (!in_array($level, self::$levels)) {
            throw new \Exception('level not invalid');
        }
        $coloredLevelString = self::UNUSUSAL_STR_BEGIN . "[";
        switch ($level) {
            case 'emergency':
                $coloredLevelString .= self::$foreGroundColors['red'] . ";"
                    . self::$backgroundColors['yellow'];
                break;
            case 'alert':
                $coloredLevelString .= self::$foreGroundColors['red'] . ";"
                    . self::$backgroundColors['black'];
                break;
            case 'critical':
                $coloredLevelString .= self::$foreGroundColors['purple'] . ";"
                    . self::$backgroundColors['yellow'];
                break;
            case 'error':
                $coloredLevelString .= self::$foreGroundColors['red'] . ";"
                    . self::$backgroundColors['white'];
                break;
            case 'warning':
                $coloredLevelString .= self::$foreGroundColors['yellow'] . ";"
                    . self::$backgroundColors['red'];
                break;
            case 'notice':
                $coloredLevelString .= self::$foreGroundColors['blue'] . ";"
                    . self::$backgroundColors['white'];
                break;
            case 'info':
                $coloredLevelString .= self::$foreGroundColors['green'] . ";"
                    . self::$backgroundColors['white'];
                break;
            case 'debug':
                $coloredLevelString .= self::$foreGroundColors['black'] . ";"
                    . self::$backgroundColors['white'];
                break;
        }
        $coloredLevelString .= self::UNUSUSAL_STR_END . $text . self::UNUSUSAL_STR_STOP;

        return $coloredLevelString;
    }
}

$cliColor = new CliColor();
echo CliColor::getDebugLevelString('error', 'jinggao warning');
