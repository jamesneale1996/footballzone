
<form action="add/" method="post">
    <div class="form-group">
        <label>Forename</label>
        <input type="text" class="form-control" id="forename" placeholder="Forename" name="forename" required>
    </div>

    <div class="form-group">
        <label>Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" required>
    </div>

    <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>

    <label>Requested Permission</label>
    <div class="radio">
        <label><input type="radio" name="permission" value="1" required>View Only</label>
    </div>

    <div class="radio">
        <label><input type="radio" name="permission" value="2" required>Editor</label>
    </div>

    <div class="radio">
        <label><input type="radio" name="permission" value="3" required>Publisher</label>
    </div>

    <div class="radio">
        <label><input type="radio" name="permission" value="4" required>Admin</label>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>