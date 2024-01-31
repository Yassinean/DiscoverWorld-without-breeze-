<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @auth
        <p>Congrats you're logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <div style="border: 2px solid black;">
            <h2>REGISTER</h2>
            <form action="/register" method="post">
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <div style="border: 2px solid black;">
            <h2>LOGIN</h2>
            <form action="/login" method="post">
                @csrf
                <input type="text" name="loginname" placeholder="name">
                <input type="password" name="loginpassword" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    @endauth

</body>

</html>
