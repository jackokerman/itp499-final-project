<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $yelpApi = new ITP\Utils\YelpCache(
        "5ZPD2Fo4nCAT6sXBgGDsgQ",
        "aJw64rHX05h62c-_6wZUtld4w1U",
        "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
        "XBFGphFBfZH5X8Y0tJRzDL9777M"
    );

    dd($yelpApi->business_query('bäco-mercat-los-angeles-2'));
});

Route::get("/restaurants", function() {

    $restauants = Restaurant::all();

    dd($restauants);

});