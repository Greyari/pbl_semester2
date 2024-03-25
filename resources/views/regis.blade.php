<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/user/style/css/masuk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="box1">
        <span class="borderLine1"></span>
        <form method="post" action="">
            <h2>Daftar</h2>
            <div class="inputBox">
                <input type="text" name="username" id="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="gmail" name="gmail" id="gmail" required="required">
                <span>Gmail</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="password" required="required">
                <span>Password</span>
                <i></i>
                <div class="fa-solid fa-eye mata"></div>
            </div>
            <div class="inputBox">
                <input type="password" name="password1" id="password1" required="required">
                <span>Konfirmasi Password</span>
                <i></i>
                <div class="fa-solid fa-eye mata1"></div>
            </div>
            <div class="links">
                <a href="{{'/forget'}}">Lupa Kata Sandi</a>
                <a href="{{'/login'}}">Login</a>
            </div>
            <input type="submit" value="daftar" name="daftar">
        </form>
    </div>

    <script src="/js/login.js"></script>

</body>

</html>