<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <label>Requested Permission</label>
    <div class="checkbox">
        <label><input type="checkbox" value="">View Only</label>
    </div>

    <div class="checkbox">
        <label><input type="checkbox" value="">Editor</label>
    </div>

    <div class="checkbox disabled">
        <label><input type="checkbox" value="" disabled>Publisher</label>
    </div>

    <div class="checkbox disabled">
        <label><input type="checkbox" value="" disabled>Admin</label>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>