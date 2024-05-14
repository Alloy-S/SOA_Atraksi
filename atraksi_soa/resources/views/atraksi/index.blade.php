@extends('dashboard')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atraksi</h1>
    </div>
    <div class="table-responsive small col-lg-6">
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-5" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/atraksi/create" class="btn btn-primary">Create new Atraksi</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atraksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="/types/{{ $item->slug }}" class="badge bg-primary"><i class="bi bi-eye"></i></a>
                            <a href="/types/{{ $item->slug }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-fill"></i></a>

                            <form action="/atraksi/{{ $item->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button href="" class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?');"><i class="bi bi-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
