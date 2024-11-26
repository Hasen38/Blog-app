<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
            <h1 class="text-3xl font-semibold">My Blog</h1>

            <!-- Navigation for Authenticated User -->
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{route('home')}}" class="hover:text-blue-300">Home</a></li>
                    <li><a href="#" class="hover:text-blue-300">About</a></li>
                    <li><a href="#" class="hover:text-blue-300">Contact</a></li>
                    <li><span class="text-white">Welcome{{auth()->user()->username}}</span></li>
                    <li><a href="#" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-10 px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">

            <h2 class="text-3xl font-semibold text-center mb-6">Create a New Post</h2>

            <!-- Form to Create Post -->
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <!-- Post Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" required class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your post title">
                </div>

                <!-- Post Content -->
                <div class="mb-6">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="body" required rows="6" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Write your post content here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button  class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Publish Post
                    </button>
                </div>
            </form>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p>&copy; 2024 My Blog. All Rights Reserved.</p>
    </footer>

</body>
</html>
