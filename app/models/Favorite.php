<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 12:19 AM
 */

class Favorite extends Eloquent {

    protected $fillable = ["user_id", "restaurant_id"];

    public function restaurant() {
        return $this->belongsTo("Restaurant");
    }

} 