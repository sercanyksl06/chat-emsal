<?php
return [
    'reverb' => [
        'app_id' => env('LIVEWIRE_REVERB_APP_ID', 'my-app-id'),  // Buradaki 'my-app-id' id’sini değiştirin.
        'key' => env('LIVEWIRE_REVERB_KEY', 'my-secret-key'),
        'url' => env('LIVEWIRE_REVERB_URL', 'ws://localhost:8080'),
    ],
    'apps' => [
        [
            'app_id' => 'my-app-id',
            'allowed_origins' => ['laravel.com'],
        ],
    ],
];