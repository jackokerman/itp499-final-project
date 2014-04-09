<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/7/14
 * Time: 8:38 PM
 */

// Taken from github user maxcountryman

namespace ITP\API;

use ITP\Utils\OAuth\OAuthSignatureMethod_HMAC_SHA1;
use ITP\Utils\OAuth\OAuthToken;
use ITP\Utils\OAuth\OAuthConsumer;
use ITP\Utils\OAuth\OAuthRequest;

class YelpAPI {

    private $signature_method;
    private $token;
    private $consumer;

    // Yelp API base URL, version 2
    private $url_base = 'http://api.yelp.com/v2/';

    function __construct($key, $consumer_secret, $token, $token_secret) {
        // The API documentation indicates HMAC-SHA1
        $this->signature_method = new OAuthSignatureMethod_HMAC_SHA1();
        $this->token = new OAuthToken($token, $token_secret);
        $this->consumer = new OAuthConsumer($key, $consumer_secret);
    }

    // Private method for processing API requests. Returns JSON response.
    private function get_json($url, $method='GET') {

        // Instantiate our OAuthRequest via from_consumer_and_token
        $oauthrequest = OAuthRequest::from_consumer_and_token(
            $this->consumer,
            $this->token,
            $method,
            $url
        );

        // Using our instance, use the sign_request method to sign the query
        $oauthrequest->sign_request(
            $this->signature_method,
            $this->consumer,
            $this->token
        );

        // Produce a URL
        $url = $oauthrequest->to_url();

        // Set up curl and set curl options
        $url = curl_init($url);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_HEADER, 0);

        $data = curl_exec($url);
        curl_close($url);

        return json_decode($data);
    }

    // Public method for executing a business API query. Returns the decoded
    // JSON response.
    public function business_query($business_id=null) {
        if ($business_id == null) {
            throw new \Exception('business_id cannot be null');
        }

        // Build URL
        $url = $this->url_base . 'business/' . $business_id;

        return $this->get_json($url);
    }

    // Public method for executing a search API query. Returns the decode JSON
    // response.
    public function search_query($search_parameters=null) {
        if ($search_parameters == null) {
            throw new \Exception('search_parameters cannot be null');
        }

        // Build URL
        $url = $this->url_base . 'search?' . http_build_query($search_parameters);

        return $this->get_json($url);
    }

} 