<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit34e3855fd0e82d754cc77a4ad0f96eef
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit34e3855fd0e82d754cc77a4ad0f96eef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit34e3855fd0e82d754cc77a4ad0f96eef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit34e3855fd0e82d754cc77a4ad0f96eef::$classMap;

        }, null, ClassLoader::class);
    }
}
