<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-500 flex items-center justify-center">
    <div class="w-full max-w-md">
        {{-- LOGIN --}}
        <div id="loginForm" class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800">Halo Admin</h2>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                @if(session()->has('success'))
                    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-6" role="alert">
                        <p class="font-bold">Success</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        @foreach ($errors->all() as $error)
                            <span class="block sm:inline">{{ $error }}</span><br>
                        @endforeach
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="" required autofocus class="shadow-sm appearance-none border border-blue-700 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100 focus:shadow-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-700 text-sm font-semibold mb-2">Nomor HP</label>
                    <input id="no_hp" type="text" name="no_hp" value="" required class="shadow-sm appearance-none border border-blue-700 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100 focus:shadow-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent">
                    @error('no_hp')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    @if (Route::has('password.request'))
                        <a class="inline-block align-baseline font-semibold text-sm text-gray-500 hover:text-gray-800" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                        Login
                    </button>
                    <button type="button" id="showRegisterForm" class="hover:bg-shadow-lg text-blue-700 font-semibold py-2 px-4 rounded-lg ">
                        Regis
                    </button>
                </div>
            </form>
        </div>

        {{-- REGIS --}}
        <div id="registerForm" class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10 hidden">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800">Register</h2>
            <form method="POST" action="{{ route('admin.register.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="register_email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input id="register_email" type="email" name="email" required class="shadow-sm appearance-none border border-blue-700 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100 focus:shadow-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="register_no_hp" class="block text-gray-700 text-sm font-semibold mb-2">Nomor HP</label>
                    <input id="register_no_hp" type="text" name="no_hp" required class="shadow-sm appearance-none border border-blue-700 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100 focus:shadow-lg focus:ring-2 focus:ring-gray-400 focus:border-transparent">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                        Regis
                    </button>
                    <button type="button" id="showLoginForm" class="hover:bg-shadow-lg text-blue-700 font-semibold py-2 px-4 rounded-lg ">
                        Back
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('showRegisterForm').addEventListener('click', function() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
        });

        document.getElementById('showLoginForm').addEventListener('click', function() {
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('registerForm').classList.add('hidden');
        });
    </script>
</body>
</html>
