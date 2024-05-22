<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-900">

    <div class="box relative w-96 h-96 bg-gray-800 rounded-lg overflow-hidden">
        <span class="borderLine"></span>
        <form action="{{ route('login.submit') }}" method="POST" class="absolute inset-4 bg-gray-900 px-10 py-12 rounded-md z-10 flex flex-col">
            <h2 class="text-white font-semibold text-center mb-8">Login</h2>
            <div class="inputBox relative mb-8">
                <input type="text" name="username" required="required" class="w-full py-4 px-2 bg-transparent outline-none border-none shadow-none text-gray-200">
                <span class="absolute left-0 top-6 px-2 text-gray-400 transition-all">Username</span>
                <i class="absolute left-0 bottom-0 w-full h-2 bg-white rounded-b-md transition-all"></i>
            </div>
            <div class="inputBox relative mb-8">
                <input type="password" name="password" required="required" class="w-full py-4 px-2 bg-transparent outline-none border-none shadow-none text-gray-200">
                <span class="absolute left-0 top-6 px-2 text-gray-400 transition-all">Password</span>
                <i class="absolute left-0 bottom-0 w-full h-2 bg-white rounded-b-md transition-all"></i>
                <div class="fa-solid fa-eye mata"></div>
            </div>
            <div class="links flex justify-between mb-8">
                <a href="{{'/forget'}}" class="text-gray-400 hover:text-white">Lupa Kata Sandi</a>
                <a href="{{'/regis'}}" class="text-gray-400 hover:text-white">Daftar</a>
            </div>
            <input type="submit" value="Login" class="py-3 px-6 bg-white cursor-pointer text-gray-900 font-semibold rounded-md hover:opacity-80">
        </form>
    </div>

    <script src="/js/login.js"></script>

</body>

</html>
