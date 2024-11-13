<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-indigo-500 flex justify-center items-center h-screen">
        <div>
            <div class="w-96 p-6 shodow-lg bg-white rounded-md mt-0">
                <h1 class="text-3xl font-semibold text-center">Register</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
            <label for="Username" class="block text-base mb-4">Username</label>
            <input type="text" name="username" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg " placeholder="Enter your Username.....">
        </div>
            <div class="mt-3">
            <label for="email" class="block text-base mb-4">Email</label>
            <input type="email" name="email" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg " placeholder="Enter your email.....">
        </div>
            <div class="mt-3">
            <label for="Password" class="block text-base mb-4">Password</label>
            <input type="password" name="password" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg" placeholder="Enter your password.....">
        </div>
            <div class="mt-3">
            <label for="Password_confirm" class="block text-base mb-4">Confirm</label>
            <input type="Password" name="password_confirmation" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg" placeholder="Enter your password.....">
        </div>
        <div class="mt-3 flex justify-between items-center">
            <div>
                <a href="{{route('login')}}" class="font-semibold text-indigo-700">Already have </a>
            </div>

        </div>
        <div class="mt-5">
            <button class="border-2 border-indigo-500 bg-indigo-600 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold ">Register</button>
        </form>
        </div>
        </div>
        </div>
    </div>
</body>
</html>


