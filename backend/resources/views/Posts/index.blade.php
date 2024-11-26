<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog - Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="bg-blue-600 text-white py-6">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-semibold">My Blog</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-blue-300">Home</a></li>
                    <li><a href="#" class="hover:text-blue-300">About</a></li>
                    <li><a href="#" class="hover:text-blue-300">Contact</a></li>
                    <li><a href="{{route('login')}}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100">Sign in</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10">

        <!-- Featured Post Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-center mb-8">Featured Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Post 1 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Featured Post 1" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">How to Build a Blog with Tailwind CSS</a></h3>
                        <p class="text-gray-700 mb-4">Learn how to build a simple blog application with Tailwind CSS and HTML. This guide covers everything from layout to styling.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>

                <!-- Post 2 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Featured Post 2" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">The Basics of Flexbox in CSS</a></h3>
                        <p class="text-gray-700 mb-4">Flexbox is a powerful tool for creating responsive and flexible layouts. In this post, we’ll walk through the basics of Flexbox.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>

                <!-- Post 3 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Featured Post 3" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">Understanding CSS Grid Layout</a></h3>
                        <p class="text-gray-700 mb-4">CSS Grid offers a powerful approach to layout creation. In this article, we will dive deep into CSS Grid and how to use it effectively.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>
            </div>
        </section>

        <!-- Recent Posts Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-semibold text-center mb-8">Recent Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Recent Post 1 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Recent Post 1" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">Understanding JavaScript Promises</a></h3>
                        <p class="text-gray-700 mb-4">JavaScript promises are a powerful way to handle asynchronous operations. Learn how to use promises in your code.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>

                <!-- Recent Post 2 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Recent Post 2" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">A Guide to Responsive Design</a></h3>
                        <p class="text-gray-700 mb-4">Responsive design is crucial for modern websites. In this post, we’ll discuss the fundamentals of responsive design and how to implement it.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>

                <!-- Recent Post 3 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Recent Post 3" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-blue-600 hover:text-blue-500 mb-4"><a href="#">Tips for Writing Clean Code</a></h3>
                        <p class="text-gray-700 mb-4">Writing clean and maintainable code is essential for long-term project success. Here are some tips and techniques for writing clean code.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-400">Read More</a>
                    </div>
                </article>
            </div>
        </section>

        <!-- About the Blog Section -->
        <section class="bg-gray-200 py-16 px-6 mb-16 rounded-lg">
            <h2 class="text-3xl font-semibold text-center mb-8">About This Blog</h2>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto text-center">
                Welcome to My Blog! Here, I share tutorials, tips, and insights about web development, programming, and tech trends. Whether you're a beginner or an experienced developer, I hope you find something useful and inspiring here. Stay tuned for more updates!
            </p>
        </section>

    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <p>&copy; 2024 My Blog. All Rights Reserved.</p>
    </footer>

</body>
</html>
