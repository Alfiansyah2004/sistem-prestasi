<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Kebanyakan sistem templating memuat template dari disk. Di sini Anda
    | dapat menentukan array jalur yang harus diperiksa untuk view Anda.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan di mana semua template Blade yang dikompilasi akan
    | disimpan untuk aplikasi Anda. Biasanya, ini ada di dalam direktori storage.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        storage_path('framework/views')
    ),

];