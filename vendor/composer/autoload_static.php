<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit91d0087cbd19f86ca76bd1fff635f118
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'abcb\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'abcb\\' => 
        array (
            0 => __DIR__ . '/..' . '/abcb',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit91d0087cbd19f86ca76bd1fff635f118::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit91d0087cbd19f86ca76bd1fff635f118::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit91d0087cbd19f86ca76bd1fff635f118::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
