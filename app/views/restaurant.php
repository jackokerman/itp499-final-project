<!doctype html>
<html>
    <head>
        <title><?php echo $restaurant->name; ?></title>
        <?php echo HTML::style("css/bootstrap.min.css") ;?>
        <?php echo HTML::style("css/bootstrap-theme.min.css") ;?>
        <style>

            .cover-photo {
                background-image: url(<?php echo ($restaurant->image_url); ?>);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                height: 350px;
            }

            .row.bottom-spacing {
                margin-bottom: 15px;
            }

        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <li><a href="/about" class="navbar-brand">99 Essentials</a></li>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="/restaurants">Restaurants</a></li>
                    <li><a href="/favorites">Favorites</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (Auth::check()) : ?>
                        <li><a href="/users/logout">Logout</a></li>
                    <?php else : ?>
                        <li><a href="/users/login">Login</a></li>
                        <li><a href="/users/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php if (Session::has('message') && Session::get("message") == "SUCESSFULLY_FAVORITED") : ?>
                <div class="alert alert-info">
                    <strong><?php echo $restaurant->name; ?></strong> was successfully <em>added</em> to your <a class="alert-link" href="/favorites">favorites</a>.
                </div>
            <?php elseif(Session::has('message') && Session::get("message") == "REMOVED_FAVORITE") : ?>
                <div class="alert alert-info">
                    <strong><?php echo $restaurant->name; ?></strong> was successfully <em>removed</em> to your <a class="alert-link" href="/favorites">favorites</a>.
                </div>
            <?php endif; ?>
            <h2><?php echo $restaurant->name; ?></h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 cover-photo"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="well">
                        <div class="row bottom-spacing">
                            <div class="col-md-12">
                                <img src="<?php echo $restaurant->rating_img_url; ?>">
                                <strong><?php echo $restaurant->review_count; ?> Reviews</strong>
                            </div>
                        </div>
                        <div class="row bottom-spacing">
                            <div class="col-md-12">
                                <span class="glyphicon glyphicon-list"></span> <strong><?php echo $restaurant->getCategoryString()  ; ?></strong>
                            </div>
                        </div>
                        <?php
                        for ($i = 0; $i < count($restaurant->location->display_address); $i++) {
                            $visibility = $i == 0 ? "visible" : "hidden";
                            $spacing = $i == count($restaurant->location->display_address) - 1 ? "bottom-spacing" : "";
                            echo    "<div class='row ". $spacing ."'>
                                        <div class='col-md-12'>
                                            <span class='glyphicon glyphicon-map-marker' style='visibility: ". $visibility . "'></span> <strong>". $restaurant->location->display_address[$i] . "</strong>
                                        </div>
                                    </div>";
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="glyphicon glyphicon-earphone"></span> <strong><?php echo $restaurant->getFormattedPhoneNumber(); ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom-spacing">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a href="<?php echo $restaurant->url; ?>" class="btn btn-default"><span class="glyphicon glyphicon-share"></span> Yelp Page</a>
                                <?php
                                    $favorites = [];
                                    if (Auth::check()) {
                                        foreach (Auth::user()->favorites as $favorite) {
                                            $favorites[] = $favorite->restaurant->id;
                                        }
                                    }
                                    if (in_array($restaurant->id, $favorites)) {
                                        echo "<a href='/favorites/remove/$restaurant->id' class='btn btn-default'>
                                                <span class='glyphicon glyphicon-remove'></span> Remove from Favorites</a>";
                                    }
                                    else {
                                        echo "<a href='/favorites/add/$restaurant->id' class='btn btn-default'>
                                                <span class='glyphicon glyphicon-heart'></span> Add to Favorites</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <p><?php echo $restaurant->description; ?></p>
                    <p><strong>-- <?php echo $restaurant->critic_name; ?></strong></p>
                </div>
            </div>

        </div>
    </body>
</html>