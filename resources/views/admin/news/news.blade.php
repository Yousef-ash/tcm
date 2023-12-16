@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session('status')}}
          </div>
        @endif
        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function (alert) {
              new bootstrap.Alert(alert)
            })
          </script>

        <a href="{{ route('news.create') }}" class="btn btn-primary my-3">اضافة جديد</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">العنوان</th>
                        <th scope="col">الكاتب</th>
                        <th scope="col">تاريخ النشر</th>
                        <th scope="col">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="">
                            <td scope="row">
                                <a href="{{ route('news.edit', ['news' => $post->id]) }}">{{ $post->title }}</a>
                            </td>

                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{route('news.destroy', ['news' => $post->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل تريد حذف هذه الصفحة')" >حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
