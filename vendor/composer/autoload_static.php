<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2547da6879bfab8c8f23bf1666176ea5
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kevin\\Architecture\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kevin\\Architecture\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2547da6879bfab8c8f23bf1666176ea5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2547da6879bfab8c8f23bf1666176ea5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2547da6879bfab8c8f23bf1666176ea5::$classMap;

        }, null, ClassLoader::class);
    }
}
