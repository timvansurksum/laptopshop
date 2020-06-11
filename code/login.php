<!-- a form to update your password -->
<div class="text">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <form action="./index.php?content=login_script" method="post">
                    <div class="form-group">
                        <label for="password">username</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="usernamehelp">
                    </div>
                    <div class="form-group">
                        <label for="password-check">password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordhelp">
                    </div>
                    <input type="submit" class="btn btn-danger" value="Login">
                    <h5 id="username" class="form-text text-muted">login</h5>
                </form>
            </div>
            <div class="col-12 col-sm-6">
                <img class="form-img" src="" alt="">
            </div>
        </div>
    </div>
</div>