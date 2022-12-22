<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/public/css/_details_User.css') }}">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="wrapper">
            <div class="books">
                <div class="header">
                    <div class="left">
                        <img src="{{ asset('/public/uploads/' . $results->thumbnail) }}" alt="">
                    </div>
                    <div class="right">
                        <div class="">
                            <h4>{{ $results->name }}</h4>
                        </div>
                        <div class="">Tác giả: {{ $results->author }}</div>
                        @if ($amount->store == null)
                            <div class="">Số lượng: {{ $amount->total }}</div>
                        @else
                            <div class="">Số lượng: {{ $amount->store }}</div>
                        @endif
                        <div class="">Thể loại: {{ $results->type }}</div>
                    </div>
                </div>
                <div class="footer">
                    <h2>Mô tả</h2>
                    <div>{{ $results->note }}</div>
                </div>
            </div>
            <div class="genres">
                <h2>Những thể loại sách khác</h2>
                <ul>
                    @foreach ($lists as $item)
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
        </div>
    </main>
</body>

</html>
