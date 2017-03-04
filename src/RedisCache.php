<?php

namespace Pongtan\SimpleCache;

use Predis\Client;
use Psr\SimpleCache\CacheInterface;

class RedisCache implements CacheInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * RedisCache constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function get($key, $default = null)
    {
        return $this->client->get($key);
    }


    public function set($key, $value, $ttl = null)
    {
        if (!$ttl) {
            return $this->client->set($key, $value);
        }
        return $this->client->setex($key, $ttl, $value);
    }

    public function delete($key)
    {
        return $this->client->del($key);
    }


    public function clear()
    {
        return $this->client->flushall();
    }


    public function getMultiple($keys)
    {
    }


    public function setMultiple($items, $ttl = null)
    {
    }


    public function deleteMultiple($keys)
    {
    }


    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        if ($this->client->exists($key)) {
            return true;
        }
        return false;
    }
}