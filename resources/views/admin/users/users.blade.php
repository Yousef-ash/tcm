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

        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">الاسم</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col"></th>
                        <th scope="col">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="">
                            <td scope="row">
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ implode(', ', $user->roles->pluck('name')->toArray()) }}

                            </td>
                            <td>
                                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('هل تريد حذف هذه المستخدم')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
