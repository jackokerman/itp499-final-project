<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 2:23 AM
 */

class RestaurantController extends BaseController {

    public function showRestaurants() {

        $modelRestaurants = Restaurant::all();
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );

        $restaurants = [];
        foreach ($modelRestaurants as $modelRestaurant) {
            $restaurants[] = $yelpApi->find($modelRestaurant);
        }

        return View::make("restaurants", [
            "restaurants" => $restaurants
        ]);
    }

    public function showRestaurant($id) {
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );

        $model = Restaurant::find($id);
        $restaurant = $yelpApi->find($model);

        return View::make("restaurant", [
            "restaurant" => $restaurant
        ]);
    }

} 