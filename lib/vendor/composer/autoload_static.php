<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite276bce8bdca2e1559a8e725a585f5ad
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite276bce8bdca2e1559a8e725a585f5ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite276bce8bdca2e1559a8e725a585f5ad::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
