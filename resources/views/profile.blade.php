<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
    </head>

    <body>
        <div class="container">
            <h1>Profile Page</h1>
            <div class="profile-info">
                <p><strong>Name:</strong> {{ $user->login }}</p>
                <p><strong>Profile:</strong> {{ $user->profile }}</p>
            </div>
            <a href=" {{ route('logout')}} ">Logout</a>
        </div>
    </body>

</html>
