<form method="POST" action="{{ route("register")}}">
    @csrf
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" required><br /> <br />

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br /> <br />
    <label for="profile">Profile</label>
    <select name="profile" id="profile">
        <option value="client">Client</option>
        <option value="admin">Admin</option>
        <option value="superAdmin">Super Admin</option>
    </select>
    <button>Submit</button>
</form>
<a href="{{ route('login') }}">youhave an account? Login here.</a>
