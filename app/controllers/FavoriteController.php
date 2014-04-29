<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 2:10 AM
 */

class FavoriteController extends BaseController {

    public function showFavorites() {
        $modelFavorites = Auth::user()->favorites;
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );

        $favorites = [];
        foreach ($modelFavorites as $modelFavorite) {
            $favorites[] = $yelpApi->find($modelFavorite->restaurant);
        }

        return View::make("favorites", [
            "favorites" => $favorites
        ]);
    }

    public function addFavorite($id) {

        Favorite::create([
            "user_id" => Auth::user()->id,
            "restaurant_id" => $id
        ]);

        return Redirect::to("restaurants/{$id}")
            ->with("message", "SUCESSFULLY_FAVORITED");
    }

    public function removeFavorite($id) {

        Favorite::where("restaurant_id", "=", $id)
            ->where("user_id", "=", Auth::user()->id)
            ->get()
            ->first()
            ->delete();

        return Redirect::to("restaurants/{$id}")
            ->with("message", "REMOVED_FAVORITE");
    }

} 