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

// UserController
Route::get("/users/register", "UserController@showRegistration");
Route::post("/users/create", "UserController@createUser");
Route::get("/users/login", "UserController@showLogin");
Route::post("/users/login", "UserController@login");
Route::get("/users/logout", "UserController@logout");

// FavoriteController
Route::get("/favorites", [
    "before" => "auth",
    "uses" => "FavoriteController@showFavorites"
]);
Route::get("/favorites/add/{id}", [
    "before" => "auth",
    "uses" => "FavoriteController@addFavorite"
]);
Route::get("/favorites/remove/{id}", [
    "before" => "auth",
    "uses" => "FavoriteController@removeFavorite"
]);

// RestaurantController
Route::get("/restaurants", "RestaurantController@showRestaurants");
Route::get("/restaurants/{id}", "RestaurantController@showRestaurant");

// HomeController
Route::get("/about", "HomeController@showAbout");
Route::get("/", "HomeController@showAbout");