<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbaa48c126d06c687c200b9f74be8ca7c
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kharanenka\\Helper\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kharanenka\\Helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/kharanenka/php-result-store/src/Kharanenka/Helper',
        ),
    );

    public static $prefixesPsr0 = array (
        'K' => 
        array (
            'Kharanenka\\Scope\\' => 
            array (
                0 => __DIR__ . '/..' . '/kharanenka/laravel-scope-active/src',
                1 => __DIR__ . '/..' . '/kharanenka/laravel-scope-category-belongs-to/src',
                2 => __DIR__ . '/..' . '/kharanenka/laravel-scope-code/src',
                3 => __DIR__ . '/..' . '/kharanenka/laravel-scope-date/src',
                4 => __DIR__ . '/..' . '/kharanenka/laravel-scope-external-id/src',
                5 => __DIR__ . '/..' . '/kharanenka/laravel-scope-hidden/src',
                6 => __DIR__ . '/..' . '/kharanenka/laravel-scope-moderation/src',
                7 => __DIR__ . '/..' . '/kharanenka/laravel-scope-name/src',
                8 => __DIR__ . '/..' . '/kharanenka/laravel-scope-slug/src',
                9 => __DIR__ . '/..' . '/kharanenka/laravel-scope-type/src',
                10 => __DIR__ . '/..' . '/kharanenka/laravel-scope-user-belongs-to/src',
            ),
            'Kharanenka\\Helper\\' => 
            array (
                0 => __DIR__ . '/..' . '/kharanenka/laravel-cache-helper/src',
                1 => __DIR__ . '/..' . '/kharanenka/oc-data-file-model/src',
                2 => __DIR__ . '/..' . '/kharanenka/oc-pagination/src',
                3 => __DIR__ . '/..' . '/kharanenka/php-pagination/src',
            ),
        ),
    );

    public static $classMap = array (
        'Kharanenka\\Helper\\CCache' => __DIR__ . '/..' . '/kharanenka/laravel-cache-helper/src/Kharanenka/Helper/CCache.php',
        'Kharanenka\\Helper\\DataFileModel' => __DIR__ . '/..' . '/kharanenka/oc-data-file-model/src/Kharanenka/Helper/DataFileModel.php',
        'Kharanenka\\Helper\\Pagination' => __DIR__ . '/..' . '/kharanenka/oc-pagination/src/Kharanenka/Helper/Pagination.php',
        'Kharanenka\\Helper\\PaginationHelper' => __DIR__ . '/..' . '/kharanenka/php-pagination/src/Kharanenka/Helper/PaginationHelper.php',
        'Kharanenka\\Scope\\ActiveField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-active/src/Kharanenka/Scope/ActiveField.php',
        'Kharanenka\\Scope\\CategoryBelongsTo' => __DIR__ . '/..' . '/kharanenka/laravel-scope-category-belongs-to/src/Kharanenka/Scope/CategoryBelongsTo.php',
        'Kharanenka\\Scope\\CodeField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-code/src/Kharanenka/Scope/CodeField.php',
        'Kharanenka\\Scope\\DateField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-date/src/Kharanenka/Scope/DateField.php',
        'Kharanenka\\Scope\\ExternalIDField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-external-id/src/Kharanenka/Scope/ExternalIDField.php',
        'Kharanenka\\Scope\\HiddenField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-hidden/src/Kharanenka/Scope/HiddenField.php',
        'Kharanenka\\Scope\\ModerationField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-moderation/src/Kharanenka/Scope/ModerationField.php',
        'Kharanenka\\Scope\\NameField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-name/src/Kharanenka/Scope/NameField.php',
        'Kharanenka\\Scope\\SlugField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-slug/src/Kharanenka/Scope/SlugField.php',
        'Kharanenka\\Scope\\TypeField' => __DIR__ . '/..' . '/kharanenka/laravel-scope-type/src/Kharanenka/Scope/TypeField.php',
        'Kharanenka\\Scope\\UserBelongsTo' => __DIR__ . '/..' . '/kharanenka/laravel-scope-user-belongs-to/src/Kharanenka/Scope/UserBelongsTo.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbaa48c126d06c687c200b9f74be8ca7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbaa48c126d06c687c200b9f74be8ca7c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbaa48c126d06c687c200b9f74be8ca7c::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbaa48c126d06c687c200b9f74be8ca7c::$classMap;

        }, null, ClassLoader::class);
    }
}
