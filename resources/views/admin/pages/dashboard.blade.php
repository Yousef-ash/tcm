@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif
        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert)

            })
        </script>
        {{-- @if ($page->parent_id == null) --}}
        @if (!empty($pid))
            <a href="{{ route('admin.create', ['pid' => $pid]) }}" class="btn btn-primary my-3">اضافة جديد</a>
        @else
            <a href="{{ route('admin.create') }}" class="btn btn-primary my-3">اضافة جديد</a>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">العنوان</th>
                        <th scope="col">الرابط</th>
                        <th scope="col">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr class="">
                            <td scope="row">
                                @if (!empty($pid))
                                <a href="{{ route('admin.edit', ['page' => $page->id, 'pid' => $pid]) }}">{{ $page->title }}</a>
                                @else
                                <a href="{{ route('admin.edit', ['page' => $page->id]) }}">{{ $page->title }}</a>
                                @endif
                            </td>
                            <td>{{ $page->url }}</td>
                            <td>
                                @if (count($page->children))
                                    <a href="{{ route('admin.index', ['pid' => $page->id]) }}"
                                        class="btn btn-success mb-1">عرض الابناء</a>
                                @endif
                                <form action="{{ route('admin.destroy', ['page' => $page->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('هل تريد حذف هذه الصفحة')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: 50%; margin: auto;">
                 {{$pages->links()}}
            </div>

        </div>

    </div>
@endsection
