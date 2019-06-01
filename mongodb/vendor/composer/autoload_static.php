<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a087c2476f3b828915ee2db39a23b30
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a087c2476f3b828915ee2db39a23b30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a087c2476f3b828915ee2db39a23b30::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}