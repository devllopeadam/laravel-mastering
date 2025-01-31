@if (isset($name))
<h1>This is the profile page for {{ $name }}</h1>
@else
<h1>This is the profile page for a user</h1>
@endif
