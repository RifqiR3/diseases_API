<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Login</title>
</head>

<body>
    <div class="center">
        <div class="header">
            Login Form
        </div>
        <form method="POST" action="{{route('loginUser')}}">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <i class="far fa-envelope"></i>
            <input type="email" placeholder="Email" name="email">
            <i class="far fa-envelope"></i>
            <input name="password" id="pswrd" type="password" placeholder="Password">
            <i class="fas fa-lock" onclick="show()"></i>
            <input type="submit" value="Sign in">
        </form>
    </div>
    <script>
        function show() {
            var pswrd = document.getElementById('pswrd');
            var icon = document.querySelector('.fas');
            if (pswrd.type === "password") {
                pswrd.type = "text";
                pswrd.style.marginTop = "20px";
                icon.style.color = "#7f2092";
            } else {
                pswrd.type = "password";
                icon.style.color = "grey";
            }
        }
    </script>
</body>

</html>