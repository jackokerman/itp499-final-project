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

        $business_id = urlencode($business_id);

        $json = Cache::get($business_id);

        if (!$json) {
            $json = $this->yelpApi->business_query($business_id);
            Cache::put($business_id, $json, 30);
        }

        return $json;
    }

    public function find($modelRestaurant) {

        $restaurant = Cache::get($modelRestaurant->id);

        if (!$restaurant) {

            $apiRestaurant = $this->business_query($modelRestaurant->yelp_id);
            $restaurant = new \ITP\Classes\YelpRestaurant($apiRestaurant, $modelRestaurant);
            Cache::put($modelRestaurant->id, $restaurant, 30);
        }

        return $restaurant;
    }

}