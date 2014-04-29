<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 2:28 AM
 */

class HomeController extends BaseController {

    public function showAbout() {
        return View::make("about");
    }

} 