<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9f3a36c4a095e886b60b44723e3f3ae3
{
    public static $classMap = array (
        'PHPlot' => __DIR__ . '/..' . '/davefx/phplot/phplot/phplot.php',
        'PHPlot_truecolor' => __DIR__ . '/..' . '/davefx/phplot/phplot/phplot.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9f3a36c4a095e886b60b44723e3f3ae3::$classMap;

        }, null, ClassLoader::class);
    }
}
