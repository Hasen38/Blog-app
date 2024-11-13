<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="">
    <div class=" grid grid-cols-2 items-center gap-2 text-center ">
        @foreach ( $user as $post )
        <div class="border bg-slate-300 mb-4" text-center >
            <h1>Posted {{$post->created_at->diffForHumans()}}</h1>
              <p >{{$post->user->username}}</p>
              <p>{{$post->title}}</p>

                <p>{{$post->body}}</p>
            </div>
            @endforeach
        </div>
        <div>
                {{$user->links()}}
            </div>
</div>
</body>
</html>

