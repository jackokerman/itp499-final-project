<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/26/14
 * Time: 3:02 PM
 */

class Restaurant extends Eloquent {

    public function critic() {
        return $this->belongsTo("Critic");
    }
} 