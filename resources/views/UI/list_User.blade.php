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
            <form action="{{ route('user.show') }}">
                <input type="text" name="search">
                <button type="submit" hidden></button>
            </form>
        </div>
        <div class="list-genre">
            <ul>
                @foreach ($list as $item)
                    <li class="item">
                        <a href="http://">
                            <div class="item-book">
                                <div class="img">
                                    <img src="{{ asset('/public/uploads/' . $item->thumbnail) }}" alt="">
                                </div>
                                <div class="info">
                                    <p>Tên sách: {{$item->name}}</p>
                                    <p>Tác giả: {{$item->author}}</p>
                                    <p>Số lượng: {{}}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
</body>

</html>
