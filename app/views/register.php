<!doctype html>
<html>
    <head>
        <title>Register</title>
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
                        <li><a href="/users/login">Login</a></li>
                        <li class="active"><a href="/users/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Register</h2>
                    <?php if (count($errors->all())) : ?>
                        <div class="alert alert-danger">
                            The following errors occurred:
                            <?php foreach ($errors->all() as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <form method="post" action="/users/create">
                        <div class="form-group">
                            <input type="text" placeholder="First Name" class="form-control" name="firstname">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Last Name" class="form-control" name="lastname">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email Address"class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                        <span>Already registered? </span><a href="/users/login">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>