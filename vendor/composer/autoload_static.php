<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5eb56a42ef33b338c9bcf4dc5b96b78e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5eb56a42ef33b338c9bcf4dc5b96b78e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5eb56a42ef33b338c9bcf4dc5b96b78e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5eb56a42ef33b338c9bcf4dc5b96b78e::$classMap;

        }, null, ClassLoader::class);
    }
}
