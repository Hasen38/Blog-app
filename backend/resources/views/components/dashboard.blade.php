<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="w-64 bg-blue-600 text-white p-6">
            <h2 class="text-2xl font-semibold mb-8">My Blog</h2>
            <nav>
                <ul>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-700">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-700">Users</a><li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-700">Profile</a></li>
                    <li><button class="block py-2 px-4 rounded-lg hover:bg-blue-700" form="{{route('logout')}}"method ="POST">Logout</button></li>
                </ul>
            </nav>
        </div>
         <main>

         {{$slot}}

        </main>


</body>
</html>
