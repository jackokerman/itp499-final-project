<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 11:57 PM
 */

class YelpRestaurantTestCase extends TestCase {

    public function testGetCategoryString() {

        // Arrange
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );
        $restaurant = $yelpApi->find(Restaurant::find(1));

        $categories = [
            ["American (New)", null],
            ["Chinese", null]
        ];

        // Act
        $restaurant->categories = $categories;
        $categoryString = $restaurant->getCategoryString();

        // Assert
        $expected = "American (New), Chinese";

        $this->assertEquals($categoryString, $expected);
    }

    public function testNullPhoneNumber() {
        // Arrange
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );
        $restaurant = $yelpApi->find(Restaurant::find(1));

        // Act
        $restaurant->phone = null;
        $formattedPhone = $restaurant->getFormattedPhoneNumber();

        // Assert
        $expected = "N/A";

        $this->assertEquals($formattedPhone, $expected);
    }

    public function testFormatPhoneNumber() {
        // Arrange
        $yelpApi = new ITP\Utils\YelpCache(
            "5ZPD2Fo4nCAT6sXBgGDsgQ",
            "aJw64rHX05h62c-_6wZUtld4w1U",
            "dAWNt6WwMyNLd8ZL2dbl3TMsvx7Vn6HI",
            "XBFGphFBfZH5X8Y0tJRzDL9777M"
        );
        $restaurant = $yelpApi->find(Restaurant::find(1));

        // Act
        $restaurant->phone = "1234567890";
        $formattedPhone = $restaurant->getFormattedPhoneNumber();

        // Assert
        $expected = "(123) 456-7890";

        $this->assertEquals($formattedPhone, $expected);
    }

} 