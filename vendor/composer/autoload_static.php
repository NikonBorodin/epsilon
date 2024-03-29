<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc348ea544a4905d103343911ebf98532
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Acme\\HelloWorld' => __DIR__ . '/../..' . '/src/HelloWorld.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc348ea544a4905d103343911ebf98532::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc348ea544a4905d103343911ebf98532::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc348ea544a4905d103343911ebf98532::$classMap;

        }, null, ClassLoader::class);
    }
}
