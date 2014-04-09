<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/7/14
 * Time: 10:51 PM
 */

namespace ITP\Utils;


use Illuminate\Support\Facades\Cache;

class YelpCache {

    protected $yelpApi;

    public function __construct($key, $consumer_secret, $token, $token_secret) {
        $this->yelpApi = new \ITP\API\YelpAPI($key, $consumer_secret, $token, $token_secret);
    }

    public function business_query($business_id=null) {

        $json = Cache::get($business_id);

        if (!$json) {
            $json = $this->yelpApi->business_query($business_id);
            Cache::put($business_id, $json, 10);
        }

        return $json;
    }

}