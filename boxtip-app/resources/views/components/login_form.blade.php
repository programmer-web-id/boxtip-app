<form method="post">
    @csrf
    <div class="mb-3">
        <label for="usernameInput" class="form-label">Username</label>
        <input type="text" class="form-control rounded-0 py-2" id="usernameInput" name="usernameInput">
    </div>
    <div class="mb-3">
        <label for="usernameInput" class="form-label">Password</label>
        <input type="password" class="form-control rounded-0 py-2" id="usernameInput" name="usernameInput">
    </div>
    <footer class="mt-5">
        <div class="row">
            <div class="col-6">
                <a class="btn btn-secondary w-100 rounded-0 py-2" href="#">Register Customer</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary w-100 rounded-0 py-2">Sign In</button>
            </div>
        </div>
    </footer>
</form>
