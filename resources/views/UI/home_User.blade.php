<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/public/css/_homeUser.css') }}">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="logo">
            <img src="{{ asset('/public/images/Thuvienvku.png') }}" alt="">
        </div>
        <div class="search">
            <form action="{{ route('user.books') }}" method="post">
                @csrf
                <input type="text" name="search">
                <button type="submit" hidden></button>
            </form>
        </div>
        <div class="list-genre">
            <ul>
                @foreach ($list as $item)
                    <li class="item">
                        <form action="{{ route('user.types') }}" method="post">
                            @csrf
                            <input type="text" name="type" id="" hidden value="{{ $item->id }}">
                            <button type="submit">{{ $item->nametype }}</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="slider"></div>
    </main>
</body>

</html>
