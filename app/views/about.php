<!doctype html>
<html>
    <head>
        <title>About</title>
        <?php echo HTML::style("css/bootstrap.min.css") ;?>
        <?php echo HTML::style("css/bootstrap-theme.min.css") ;?>
    </head>
    <body>
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <li><a href="/about" class="navbar-brand active">99 Essentials</a></li>
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
            <h2>About</h2>
            <p><em>99 Essentials</em> is a mashup of LA Weekly Magazine's <a href="http://features.laweekly.com/99_essential_restaurants_2014/">99 Essential Restaurants</a> 2014 and Yelp. The 99 essential restaurants feature is done by LA Weekly every year, and I generally find it to be an outstanding resource for finding new places to eat. The picks are typically spot on, and they review all types of restaurants from all over Los Angeles County. I am, however, an avid Yelp user I typically supplement LA weekly's recommendations  with tips and reviews from other Yelp users. <em>99 Essentials</em> streamlines this process by including Yelp info on each restaurant page, and linking directly to the restaurant's Yelp page to read reviews. Additionally, <em></em> allows the user to maintain of list of favorites. Simply add or remove the restaurant right from the restaurant page, and then they can be viewed in the favorites tab.</p>
        </div>
    </body>
</html>