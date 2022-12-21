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
            <table class="table table-bordered   wrapper-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Mã sách</th>
                        <th>Mã độc giả</th>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Đã trả</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach ($result as $reborrow)
                    <tr class="tr_info">
                        <td class="td_info">{{ $reborrow->id }}</td>
                        <td class="td_info">{{ $reborrow->idBook }}</td>
                        <td class="td_info">{{ $reborrow->idReader }}</td>
                        <td class="td_info">{{ $reborrow->dateBorrow }}</td>
                        <td class="td_info">{{ $reborrow->deadline }}</td>
                        <td class="td_info">
                            @if ($reborrow->returned == 0)
                                <div class="returned">chưa</div>
                            @else
                                <div class="returned bg-success">rồi</div>
                            @endif
                        </td>
                        <td class="td_info">{{ $reborrow->note }}</td>
                        <td class="td-control">
                            <div class="child-box" style="">
                                <form action="{{ route('managementReborrow.returned', $reborrow->id) }}"
                                    class="form-action" method="POST">
                                    @csrf
                                    <label for="returned{{ $reborrow->id }}" class="view"><i
                                            class="fa-solid fa-check-to-slot"></i></label>
                                    <input type="submit" id="returned{{ $reborrow->id }}">
                                </form>
                                <form action="{{ route('managementReborrow.edit', $reborrow->id) }}"
                                    class="form-action">
                                    <label for="update{{ $reborrow->id }}" class="update"><i
                                            class="fa-solid fa-pen-to-square"></i></label>
                                    <input type="submit" value="Update" id="update{{ $reborrow->id }}" class="update">
                                </form>
                                <form action="{{ route('managementReborrow.delete', $reborrow->id) }}}" method="post"
                                    class="form-action">
                                    @csrf
                                    @method('delete')
                                    <label for="delete{{ $reborrow->id }}" class="delete"><i
                                            class="fa-solid fa-trash"></i></label>
                                    <input type="submit" value="Delete" id="delete{{ $reborrow->id }}" class="delete"
                                        style="display: none">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $result->links() }}
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
    {{-- <script src="/public/js/-active.js"></script> --}}
    <script>
        var x = document.querySelector("#returned");

        x.addEventListener("click", function() {
            if (x.value == 0) {
                x.value = 1;
            } else {
                x.value = 0;
            }
        });
    </script>
</body>

</html>
