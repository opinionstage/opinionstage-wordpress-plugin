<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc56aa3b3cf6963063444f270412e7442
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Opinionstage\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Opinionstage\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc56aa3b3cf6963063444f270412e7442::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc56aa3b3cf6963063444f270412e7442::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc56aa3b3cf6963063444f270412e7442::$classMap;

        }, null, ClassLoader::class);
    }
}
