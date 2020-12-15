<?php

namespace Pollyanna\Elasticsearch;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
/**
 * Class LaravelServiceProvider
 *
 * @package CrCms\ElasticSearch
 * @author simon
 */
class LaravelServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $packagePath = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR;

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->packagePath . 'config' => config_path(),
        ]);
    }

    /**
     * @return void
     */
    public function register()
    {
        //merge config
        $this->mergeConfig();

        $this->bindBuilder();
    }

    /**
     * @return void
     */
    protected function bindBuilder()
    {
        $this->app->bind(Builder::class, function ($app) {
            return new Builder(
                $this->app->make('config')->get('search'),
                new Grammar(),
                $this->clientBuilder()
            );
        });
    }

    /**
     * @return Client
     */
    protected function clientBuilder(): Client
    {
        $clientBuilder = ClientBuilder::create();

        $clientBuilder
            ->setConnectionPool($this->app->make('config')->get('search.connection_pool'))
            ->setSelector($this->app->make('config')->get('search.selector'))
            ->setHosts($this->app->make('config')->get('search.hosts'));
        if ($this->app->make('config')->get('search.open_log')) {
            $handler = new StreamHandler($this->app->make('config')->get('search.log_path'));
            $logObject = new Logger('log');
            $logObject->pushHandler($handler);
            $clientBuilder->setLogger(
                $logObject
            );
        }
        return $clientBuilder->build();
    }

    /**
     * @return void
     */
    protected function mergeConfig()
    {
        $configFile = $this->packagePath . 'config/search.php';
        if (file_exists($configFile)) {
            $this->mergeConfigFrom($configFile, 'search');
        }
    }
}
