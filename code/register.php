<!-- form to register on the website -->
<div class="container">
    <form action="./index.php?content=email_script" method="post">
        <div class="col-6">
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">voornaam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">tussenvoegsel</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="infix">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">achternaam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">gebruikersnaam</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="username" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>