<?php

namespace Amelia\DynamoDb;

use Aws\DynamoDb\DynamoDbClient as Client;
use Aws\DynamoDb\SessionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class DynamoDbServiceProvider extends ServiceProvider
{
    /**
     * Boot this service provider.
     *
     * @return void
     */
    public function boot()
    {
        // extend session to use dynamodb as a session store
        Session::extend('dynamodb', function (Application $app) {
            $config = $app['config']['dynamodb'];

            $options = [
                'credentials' => [
                    'key' => $config['key'],
                    'secret' => $config['secret'],
                ],
                'region' => $config['region'],
                'version' => 'latest',
            ];

            if ($endpoint = $config['endpoint']) {
                $options['endpoint'] = $endpoint;
            }

            $client = new Client($options);

            return SessionHandler::fromClient($client, [
                'hash_key' => $config['hash_key'],
                'table_name' => $app['config']['session.table'],
                'session_lifetime' => (int) (60 * $app['config']['session.lifetime']),
            ]);
        });
    }

    /**
     * Register this service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/dynamodb.php', 'dynamodb');
    }
}
