<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <h1>Hello User {{ auth()->user()->name }}</h1>
    @endauth

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary"> logout </button>
    </form>
</body>
</html>
