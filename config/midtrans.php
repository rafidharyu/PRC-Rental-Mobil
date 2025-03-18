<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-8M62s_djZCefKfYZbUkt5g2H'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-TB2uYUUC0nGfSp0y'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is_3ds' => env('MIDTRANS_IS_3DS', true),
];
