@extends('dashboard')
@section('container')
    <div class="mt-4">
        <a class="btn btn-danger" href="/atraksi">Back</a>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $atraksi->title }} Paket</h1>
    </div>
    <a href="/atraksi/{{ $atraksi->slug }}/paket/create" class="btn btn-primary">Create new Paket</a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paket as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type->name }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <a href="/atraksi/{{ $atraksi->slug }}/paket/{{ $item->id }}/edit" class="badge bg-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form action="/atraksi/{{ $atraksi->slug }}/paket/{{ $item->id }}" method="post"
                            class="d-inline">
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
@endsection
