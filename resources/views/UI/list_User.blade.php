<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/public/css/_homeUser.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/_list_User.css') }}">
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
                @foreach ($results as $item)
                    <li class="item">
                        <a href="{{ route('user.detail', $item->id) }}">
                            <div class="item-book">
                                <div class="img">
                                    <div class="block">
                                        <img src="{{ asset('/public/uploads/' . $item->thumbnail) }}" alt="">
                                    </div>
                                    <div class="">
                                        <p class="caption">
                                            {{ $item->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{ $results->links() }}
    </main>
</body>

</html>
