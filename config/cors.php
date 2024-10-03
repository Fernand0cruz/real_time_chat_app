<?php

return [

    /*
    |----------------------------------------------------------------------
    | Laravel CORS
    |----------------------------------------------------------------------
    |
    | Allowed origins for CORS requests.
    |
    */

    'paths' => ['api/*', 'broadcasting/auth'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], 

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, 

];
