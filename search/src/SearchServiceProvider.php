<?php

declare(strict_types=1);

namespace Juling\Search;

use Exception;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;
use Juling\Search\Engines\ElasticsearchEngine;
use Laravel\Scout\EngineManager;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->ensureElasticClientIsInstalled();

        resolve(EngineManager::class)->extend('elasticsearch', function () {
            return new ElasticsearchEngine(
                ClientBuilder::create()
                    ->setHosts(config('scout.elasticsearch.hosts'))
                    ->setBasicAuthentication(config('scout.elasticsearch.username'), config('scout.elasticsearch.password'))
                    ->build()
            );
        });
    }

    /**
     * Ensure the Elastic API client is installed.
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function ensureElasticClientIsInstalled()
    {
        if (class_exists(ClientBuilder::class)) {
            return;
        }

        throw new Exception('Please install the Elasticsearch PHP client: elasticsearch/elasticsearch.');
    }
}
