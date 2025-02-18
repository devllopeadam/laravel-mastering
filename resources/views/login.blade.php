<form method="POST" action="{{ route("login") }}">
    @csrf
    <label for="login">Login:</label>
    <input type="text"
        name="login"
        id="login"
        required><br /> <br />

    <label for="password">Password:</label>
    <input type="password"
        name="password"
        id="password"
        required><br /> <br />
    <button>Submit</button>
</form>
<a href="{{ route('register') }}">Don't have an account? Register here.</a>

@error("login")
    <p>{{ $message }}</p>
@enderror
@error("success")
    <p>{{ $message }}</p>
@enderror
