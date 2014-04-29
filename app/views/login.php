<!doctype html>
<html>
    <head>
        <title>Login</title>
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
                    <li><a href="/restaurants">Restaurants</a></li>
                    <li><a href="/favorites">Favorites</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (Auth::check()) : ?>
                        <li><a href="/users/logout">Logout</a></li>
                    <?php else : ?>
                        <li class="active"><a href="/users/login">Login</a></li>
                        <li><a href="/users/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Log In</h2>
                    <?php if (Session::has("message")) : ?>
                        <div class="alert alert-success">
                            <?php echo Session::get("message"); ?>
                        </div>
                    <?php elseif (Session::has("error")) : ?>
                        <div class="alert alert-danger">
                            <?php echo Session::get("error"); ?>
                        </div>
                    <?php endif ?>
                    <form method="post" action="/users/login">
                        <div class="form-group">
                            <input type="text" placeholder="Email Address"class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                        <span>New here? </span><a href="/users/register">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>