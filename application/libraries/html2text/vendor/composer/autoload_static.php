<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaaf8e1c3c4440fb26b5ebeb15df3e2e4
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Html2Text\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Html2Text\\' => 
        array (
            0 => __DIR__ . '/..' . '/html2text/html2text/src',
            1 => __DIR__ . '/..' . '/html2text/html2text/test',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaaf8e1c3c4440fb26b5ebeb15df3e2e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaaf8e1c3c4440fb26b5ebeb15df3e2e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaaf8e1c3c4440fb26b5ebeb15df3e2e4::$classMap;

        }, null, ClassLoader::class);
    }
}
