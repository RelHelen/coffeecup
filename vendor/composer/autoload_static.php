<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65d69dd69c0ae9ec6ee7781aa7aae5ae
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'fw\\' => 3,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'fw\\' => 
        array (
            0 => __DIR__ . '/..' . '/fw/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit65d69dd69c0ae9ec6ee7781aa7aae5ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit65d69dd69c0ae9ec6ee7781aa7aae5ae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit65d69dd69c0ae9ec6ee7781aa7aae5ae::$classMap;

        }, null, ClassLoader::class);
    }
}
