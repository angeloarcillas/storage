<?php
return [

    // [ CUSTOM CONFIG ]
    // !note: use php artisan config:cache for optimization
    //      -rerun command for changes
    'apiKey' => [
        'key' => env('PUBLIC_KEY'), 
        'secret' => env('PRIVATE_KEY'),
    ],
];
?>