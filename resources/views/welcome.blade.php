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
        <div style="border: 2px solid black;">
            <form action="/create-recit" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="title">
                <textarea name="description" placeholder="Content..."></textarea>
                <textarea name="conseil" placeholder="Conseil..."></textarea>
                <label for="">Destination</label>
                <select name="">
                    <option value="">Afrique</option>
                    <option value="">Amerique du nord</option>
                    <option value="">Amerique du sud</option>
                    <option value="">Asie</option>
                    <option value="">Australie</option>
                    <option value="">Europe</option>
                </select>
                <input type="file">
                <button>Créer Votre Aventure </button>
            </form>
        </div>
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
