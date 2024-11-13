<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="">
    <div class=" grid grid-cols-2 items-center gap-2 text-center ">
        {{-- @foreach ( $post as $post ) --}}
        <div class="border bg-slate-300 mb-4">
            {{-- {{-- <h1>Posted {{$post->created_at->diffForHumans()}}</h1> --}}

              <p>{{$post->user->username}}</p>
              <p>{{$post->title}}</p>
                <p>{{($post->body)}}</p>
                <div class="flex justify-around">
                <div class="mt-3 ml-0 bg-red-500 text-white rounded-md">
                    @can('destroy', $post)
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button>Delete</button>
                </form>
                    @endcan
            </div>
                <div>
                <div class="mt-3 ml-0 bg-indigo-500 text-white rounded-md">

                    <a href="{{route('posts.edit',$post)}}">Edit</a>
            </div>

            </div>
        </div>
        <div>
            </div>
</div>
</body>
</html>

