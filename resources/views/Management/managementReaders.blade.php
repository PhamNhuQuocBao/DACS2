<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{ $title }}</title>
    @include('library.Books')
    @include('library.Home')
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Management Readers">
    <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    {{-- navbar --}}
    @include('PublicViews.navbar')


    <div class="wrapper">
        <div class="content">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-bordered   wrapper-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach ($result as $reader)
                    <tr class="tr_info">
                        <td class="td_info">{{ $reader->id }}</td>
                        <td class="td_info">{{ $reader->nameReader }}</td>
                        <td class="td_info">{{ $reader->address }}</td>
                        <td class="td_info">{{ $reader->phonenumber }}</td>
                        <td class="td-control">
                            <div class="child-box" style="">
                                <form action="{{ route('managementReaders.show', $reader->id) }}" class="form-action"
                                    method="GET">
                                    <label for="view{{ $reader->id }}" class="view"><i
                                            class="fa-regular fa-eye"></i></label>
                                    <input type="submit" name="view" id="view{{ $reader->id }}" class="view">
                                </form>
                                <form action="{{ route('managementReaders.edit', $reader->id) }}" class="form-action">
                                    <label for="update{{ $reader->id }}" class="update"><i
                                            class="fa-solid fa-pen-to-square"></i></label>
                                    <input type="submit" value="Update" id="update{{ $reader->id }}" class="update">
                                </form>
                                <form action="{{ route('managementReaders.delete', $reader->id) }}}" method="post"
                                    class="form-action">
                                    @csrf
                                    @method('delete')
                                    <label for="delete{{ $reader->id }}" class="delete"><i
                                            class="fa-solid fa-trash"></i></label>
                                    <input type="submit" value="Delete" id="delete{{ $reader->id }}" class="delete"
                                        style="display: none">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $result->links() }}

        <div class="view">

        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
