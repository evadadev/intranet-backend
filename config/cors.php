<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:5173',          // frontend local
        'https://mi-dominio-frontend.com' // frontend producción
    ],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['Authorization'],
    'max_age' => 0,
    'supports_credentials' => true,  // true si quieres enviar cookies, false si solo Bearer token
];
