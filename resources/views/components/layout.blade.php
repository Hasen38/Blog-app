
    <!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-indigo-700 flex justify-between p-10 m-5 mx-auto items-center ">

  <a href="{{route('home')}}">Home</a>
  @guest
  <div class="space-x-8">
  <a href="{{route('register')}}" class="text-semibold text-xl text-white   hover:bg-white rounded-md hover:text-blue-700 p-3">Register</a>
  <a href="{{route('login')}}"class="text-semibold text-white text-xl hover:bg-white rounded-md hover:text-blue-700 p-3">Login</a>
  @endguest
  @auth
  <form action="/logout" method="POST">
    @csrf
  <button class="border-2 bg-indigo-500 text-white rounded-md hover:bg-transparent hover:text-white">Logout</button>
</form>
  <div>
    <p>{{auth()->user()->username}}</p>
  </div>
  <div>
    <a href="{{route('dashboard')}}">Dashboard</a>
  </div>
  @endauth
</div>
</div>
<main >
    @auth
        Logged in
    @endauth
    @guest
        You're Logged out!
    @endguest

{{ $slot }}
</main>
</body>
</html>
