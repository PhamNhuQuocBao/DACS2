<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Sách tồn kho</title>
    @include('library.Books')
    @include('library.Home')
</head>

<body class="u-body u-xl-mode" data-lang="en">
    {{-- navbar --}}
    @include('PublicViews.navbar')
    {{-- content --}}
    <div class="wrapper">
        <div class="content">
            <table class="table table-bordered   wrapper-table">
                <thead class="table-dark">
                    <tr>
                        <th>Mã Sách</th>
                        <th>Tên Sách</th>
                        <th>Tổng số sách</th>
                        <th>Sách trong kho</th>
                        <th>Sách cho mượn</th>
                    </tr>
                </thead>
                @foreach ($results as $result)
                    <tr class="tr_info">
                        <td class="td_info">{{ $result->id }}</td>
                        <td class="td_info">{{ $result->name }}</td>
                        <td class="td_info">{{ $result->total }}</td>
                        <td class="td_info">{{ $result->store }}</td>
                        <td class="td_info">{{ $result->lend }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
