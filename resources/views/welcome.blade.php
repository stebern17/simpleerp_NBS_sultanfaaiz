<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <section class="flex flex-col items-center justify-center shadow-lg rounded-lg p-8 w-96 bg-white">
            <div class="text-center text-slate-800">
                <h2 class="font-bold text-2xl">Welcome to simple ERP</h2>
                <p>by Sultan Faaiz</p>
            </div>

            <div class="flex space-x-4 mt-2">
                <a href="{{ route('login') }}">
                    <button class="w-32 bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="w-32 bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                        Register
                    </button>
                </a>
            </div>

        </section>
    </div>
</body>

</html>