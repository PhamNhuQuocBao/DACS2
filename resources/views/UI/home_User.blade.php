<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/public/css/_homeUser.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .wrap-img img {
            width: 300px;
            height: 200px;
        }

        .slider {
            width: 1516px;
        }
    </style>
    <title>Document</title>
    @include('library.Home')
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
        <div class="slider ">
            <div class="center">
                @foreach($thumbnail as $item)
                <div class="row ">
                    <div class="wrap-item">
                        <div class="wrap-img">
                            <img src="{{url('/public/uploads/'. $item->thumbnail)}}" alt="">
                        </div>
                    </div>
                    <div class="caption">
                        <div class="div">{{$item->name}}</div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </main>
    @include('PublicViews.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
</body>

</html>