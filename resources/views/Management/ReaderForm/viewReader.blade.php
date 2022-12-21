<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>HOME</title>
    @include('library.Books')
    @include('library.Home')
    <style>
        .content {
            margin-left: 250px;
        }

        table {
            width: 800px
        }

        td {
            padding: 20px;
            border-bottom: 3px solid rgba(0, 0, 0, 0.501)
        }
    </style>
</head>

<body class="u-body u-xl-mode" data-lang="en">
    {{-- navbar --}}
    @include('PublicViews.navbar')


    <div class="wrapper">
        <div class="content">
            <table>
                <tr>
                    <td>Mã độc giả:</td>
                    <td>{{ $results[0]->id }}</td>
                </tr>
                <tr>
                    <td>Họ và tên:</td>
                    <td>{{ $results[0]->nameReader }}</td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>{{ $results[0]->address }}</td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td>{{ $results[0]->phonenumber }}</td>
                </tr>
                <tr>
                    <td>Mã thẻ:</td>
                    <td>
                        <ul>
                            @foreach ($results as $item)
                                <li>{{ $item->card }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Sách đang mượn:</td>
                    <td>
                        <ul>
                            @foreach ($results as $item)
                                @if ($item->returned == 0)
                                    <li>{{ $item->name }} ({{ $item->card }})</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Sách mượn đã trả:</td>
                    <td>
                        <ul>
                            @foreach ($results as $item)
                                @if ($item->returned == 1)
                                    <li>{{ $item->name }} ({{ $item->card }})</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
