<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <div class="box">
        <span class="borderLine"></span>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf 
            <h2>Login</h2>
            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
                <div class="fa-solid fa-eye mata"></div>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

    <script src="/js/login.js"></script>

</body>

</html>
