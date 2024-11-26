<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div class="w-96 p-6 shodow-lg bg-slate-300 rounded-md mt-3" >
        <form action="{{route('posts.update',$post)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-3">
                <label for="title" class="block text-base mb-4">Post Title</label>
                <input type="title" name="title" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg" placeholder="Enter your Title....." value="{{$post->title}}">
        </div>
        <div class="mt-4">
            <div class="mt-3">
                <label for="Password" class="block text-base mb-4">Post Body</label>
            <textarea name="body"  rows="10" name="body" class=" border text-base w-full focus:outline-none px-2 py-1 focus:ring-0 focus:border-gray-600 shadow-lg" placeholder="Enter your pharagraph....."value="{{$post->body}}"></textarea>
        </div>
        <div class="mt-5">
            <button type="submit" class="border-2 border-indigo-500 bg-indigo-600 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold ">Update</button>
    </form>

    </div>
</body>
</html>
