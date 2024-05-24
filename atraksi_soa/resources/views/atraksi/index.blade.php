@extends('dashboard')
@section('container')
    <div class="mt-4">
        <a class="btn btn-danger" href="/">Back</a>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atraksi</h1>
    </div>
    <div class="table-responsive small col-lg-10">
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
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Action</th>
                    <th scope="col">Publish</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atraksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @if ($item->is_active)
                                True
                            @else
                                False
                            @endif
                        </td>
                        <td>
                            <a href="/atraksi/{{ $item->slug }}/upload" class="btn btn-primary">Upload Image</a>
                        </td>
                        <td>
                            <a href="/atraksi/{{ $item->slug }}/paket" class="btn btn-primary">Add Paket</a>
                        </td>
                        <td>
                            {{-- <a href="/atraksi/{{ $item->slug }}" class="badge bg-primary"><i class="bi bi-eye"></i></a> --}}
                            <a href="/atraksi/{{ $item->slug }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-fill"></i></a>

                            <form action="/atraksi/{{ $item->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button href="" class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?');"><i class="bi bi-trash"></i></button>
                            </form>

                        </td>

                        <td>
                            <form action="/atraksi/publish" method="post">
                                @csrf

                                <input type="text" name="slug" value="{{ $item->slug }}" hidden>
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </form>
                            {{-- <a href="#" class="btn btn-primary">Publish</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
