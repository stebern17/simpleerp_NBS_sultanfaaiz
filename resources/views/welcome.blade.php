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
                <p class="font-semibold">by Sultan Faaiz</p>
            </div>

            <div class="grid grid-cols-2 items-center justify-center mt-4">
                <a href="{{ route('login')}}">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2 hover:bg-blue-600">
                        Login
                    </button>
                </a>
                <a href="{{ route('register')}}">
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Register
                    </button>

                </a>

            </div>
        </section>
    </div>
</body>

</html>