<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="bg-indigo-500 flex justify-center items-center h-screen">
        <div>
            <div class="w-96 p-6 shodow-lg bg-white rounded-md mt-0">
                <h1 class="text-3xl font-semibold text-center">Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                    <label for="email" class="block text-base mb-4">Email</label>
                    <input type="text" name="email" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg " placeholder="Enter your email.....">
                  @error('email')
                      {{$message}}
                  @enderror
                </div>
                <div class="mt-3">
                    <label for="Password" class="block text-base mb-4">Password</label>
                    <input type="password" name="password" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg" placeholder="Enter your password.....">
                    @error('password')
                      {{$message}}
                  @enderror
        </div>
        <div class="mt-3 flex justify-between items-center">
            <div class="">
                <input type="checkbox" name="remember" id="remember">
                <label for="Remember">Remember Me?</label>
            </div>
            <div>
                <a href="f#" class="font-semibold text-indigo-700">Forget Password? </a>
            </div>

        </div>
        <div class="mt-5">
            <button type="submit" class="border-2 border-indigo-500 bg-indigo-600 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold ">Login</button>
        </div>
    </form>
    </div>
</div>

    </div>
</body>
</html>


