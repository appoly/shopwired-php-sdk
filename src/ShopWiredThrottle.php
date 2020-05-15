<?php

namespace Appoly\ShopWiredPHPSDK;

use Redis;

class ShopWiredThrottle
{
    const BUCKET_SIZE = 40;
    const DRAIN_PER_SECOND = 2;

    private static $enabled = true;

    public static function throttle()
    {
        self::addEvent();
        while (self::isBucketFull()) {
            //dump("HIT DELAY");
            usleep(1000000 / self::DRAIN_PER_SECOND);
        }
    }

    public static function isBucketFull()
    {
        self::leakEvents();

        $recentEvents = self::getRecentEvents();
        //dump("Bucket count " . count($recentEvents));

        if (count($recentEvents) >= self::BUCKET_SIZE) {
            return true;
        }

        return false;
    }

    public static function addEvent()
    {
        $recentEvents = self::getRecentEvents();
        $recentEvents[] = microtime(true);
        self::cacheSet('shopwired_events', json_encode($recentEvents));
    }

    public static function leakEvents()
    {
        $lastLeaked = (float) self::cacheGet('shopwired_last_leaked');
        if ($lastLeaked && $lastLeaked >= (microtime(true) - 1)) {
            return;
        }

        $lastLeakedSecondsAgo = (int) floor(microtime(true) - $lastLeaked);

        if($lastLeakedSecondsAgo > self::BUCKET_SIZE) {
            self::cacheSet('shopwired_events', json_encode([]));
            self::cacheSet('shopwired_last_leaked', microtime(true));

            return;
        }

        foreach (range(1, $lastLeakedSecondsAgo) as $leakEachSecond) {
            //dump("Leaking " . $lastLeakedSecondsAgo);
            $recentEvents = self::getRecentEvents();

            $alteredEvents = array_slice($recentEvents, self::DRAIN_PER_SECOND);
            self::cacheSet('shopwired_events', json_encode($alteredEvents));
            self::cacheSet('shopwired_last_leaked', microtime(true));
        }
    }

    public static function getRecentEvents()
    {
        $recentEvents = json_decode(self::cacheGet('shopwired_events'));
        $recentEvents = $recentEvents ? $recentEvents : [];

        return $recentEvents;
    }

    public static function cacheGet($key)
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        return $redis->get($key);
    }

    public static function cacheSet($key, $value)
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        $redis->set($key, $value);
    }

    public static function redisConnect()
    {
        try {
            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);
        } catch (\Exception $e) {
            throw new \Exception('ShopWired: Error connecting to redis for request throttling. Please add ShopWiredThrottle::disable();', 500);
        }
    }

    public static function disable()
    {
        self::$enabled = false;
    }

    public static function enable()
    {
        self::$enabled = true;
    }
}
