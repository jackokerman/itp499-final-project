<!doctype html>
<html>
    <head>
        <title>Restaurants</title>
        <?php echo HTML::style("css/bootstrap.min.css") ;?>
        <?php echo HTML::style("css/bootstrap-theme.min.css") ;?>
    </head>
    <body>
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <li><a href="/about" class="navbar-brand">99 Essentials</a></li>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/restaurants">Restaurants</a></li>
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
            <h2>Restaurants</h2>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Neighborhood</th>
                                <th>Yelp Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($restaurants as $restaurant) : ?>
                                <tr>
                                    <td><a href="restaurants/<?php echo $restaurant->id; ?>"><?php echo $restaurant->name; ?></a></td>
                                    <td><?php echo $restaurant->getCategoryString(); ?></td>
                                    <td><?php echo $restaurant->getNeighborhood(); ?></td>
                                    <td>
                                        <img src="<?php echo $restaurant->rating_img_url; ?>">
                                        (<?php echo $restaurant->review_count; ?> Reviews)
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>