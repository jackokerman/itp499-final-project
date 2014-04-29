<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/26/14
 * Time: 11:31 PM
 */

namespace ITP\Classes;


class YelpRestaurant {

    public $id;
    public $name;
    public $rating;
    public $rating_img_url;
    public $review_count;
    public $url;
    public $categories;
    public $location;
    public $description;
    public $critic_name;
    public $neighborhood;
    public $image_url;
    public $phone;

    public function __construct($api, $model) {

        $this->id = $model->id;
        $this->name = $model->restaurant_name;
        $this->rating = $api->rating;
        $this->rating_img_url = $api->rating_img_url;
        $this->review_count = $api->review_count;
        $this->url = $api->url;
        $this->categories = $api->categories;
        $this->location = $api->location;
        $this->description = $model->description;
        $this->critic_name = $model->critic->critic_name;
        $this->image_url = $model->image_url;
        $this->phone = isset($api->phone) ? $api->phone : null;
        $this->categories = $api->categories;

    }

    public function getNeighborhood() {
        if (isset($this->location->neighborhoods))
            return $this->location->neighborhoods[0];
        else
            return "Greater LA Area";
    }

    public function getCategoryString() {

        $categoryString = "";

        for ($i = 0; $i < count($this->categories); $i++) {
            $categoryString .= $this->categories[$i][0];
            if ($i != (count($this->categories) - 1)) {
                $categoryString .= ", ";
            }
        }

        return $categoryString;
    }

    public function getFormattedPhoneNumber() {
        if ($this->phone)
            return "(".substr($this->phone, 0, 3).") ".substr($this->phone, 3, 3)."-".substr($this->phone,6);
        else
            return "N/A";
    }

} 