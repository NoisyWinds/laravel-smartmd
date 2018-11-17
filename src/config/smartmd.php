<?php
return [
    "image" => [
        /*
         * like filesystem, Where do you like to place pictures?
         */
        "root" => storage_path('app/public'),
        /*
         * return public image path
         */
        "url" => env('APP_URL').'/storage',
    ],
];