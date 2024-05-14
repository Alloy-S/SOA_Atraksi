@extends('dashboard')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket Type</h1>
    </div>
    <div class="table-responsive small col-lg-6">
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-5" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/types/create" class="btn btn-primary">Create new type</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a href="/types/{{ $type->id }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-fill"></i></a>

                            <form action="/types/{{ $type->id }}" method="post" class="d-inline">
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
