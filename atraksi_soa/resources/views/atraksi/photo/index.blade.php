@extends('dashboard')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Atraksi</h1>
    </div>
    <div>
        <form action="/atraksi/{{ $atraksi->slug }}/upload" method="post" class="col-lg-8 mb-5" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                {{-- {{ ddd($errors->all()) }} --}}
                @foreach ($errors->all() as $error)
                    <div class="invalid-feedback">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="mb-3">
                <label for="images" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" id="images" name="images[]" required multiple>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>

        </form>
    </div>
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
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->placeholder }}</td>
                    <td><img class="img-preview img-fluid" src="{{ url($item->image) }}" style="max-width: 300px"></td>
                    <td>
                        <form action="/atraksi/{{ $atraksi->slug }}/image/{{ $item->id }}" method="post" class="d-inline">
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
