<?php

return [
    'key' => env('DYNAMODB_KEY'),
    'secret' => env('DYNAMODB_SECRET'),
    'region' => env('DYNAMODB_REGION', 'us-east-1'),
    'hash' => env('DYNAMODB_HASH_KEY', 'id'),
    'endpoint' => env('DYNAMODB_ENDPOINT'),
];
