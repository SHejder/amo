<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf8c70ddaa06686de007def43466fc853
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf8c70ddaa06686de007def43466fc853::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf8c70ddaa06686de007def43466fc853::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
