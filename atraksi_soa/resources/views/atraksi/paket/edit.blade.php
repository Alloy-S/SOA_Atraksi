@extends('dashboard')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Paket</h1>
    </div>
    <form action="/atraksi/{{ $atraksi->slug }}/paket/{{ $paket->id }}" method="post" class="col-lg-8 mb-5">
        @method('put')
        @csrf

        <input type="text" name="atraksi_id" value="{{ $atraksi->id }}" hidden>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                required autofocus value="{{ old('title', $paket->title) }}">

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                required autofocus value="{{ old('slug') }}">

            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="type" class="form-label">Ticket Type</label>
            @error('type_id')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <select class="form-select type" aria-label="Default select example" name="type_id" id="type">
                @foreach ($type as $item)
                    @if ($item->id == $paket->type_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3 text-editor">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            @error('deskripsi')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" id="deskripsi"
                value="{{ old('deskripsi', $paket->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            @error('fasilitas')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="fasilitas" type="hidden" name="fasilitas" id="fasilitas"
                value="{{ old('fasilitas', $paket->fasilitas) }}">
            <trix-editor input="fasilitas"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="cara_penukaran" class="form-label">Cara Penukaran</label>
            @error('cara_penukaran')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="cara_penukaran" type="hidden" name="cara_penukaran" id="cara_penukaran"
                value="{{ old('cara_penukaran', $paket->cara_penukaran) }}">
            <trix-editor input="cara_penukaran"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="syarat_dan_ketentuan" class="form-label">Syarat dan ketentuan</label>
            @error('syarat_dan_ketentuan')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="syarat_dan_ketentuan" type="hidden" name="syarat_dan_ketentuan" id="syarat_dan_ketentuan"
                value="{{ old('syarat_dan_ketentuan', $paket->syarat_dan_ketentuan) }}">
            <trix-editor input="syarat_dan_ketentuan"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                required autofocus value="{{ old('harga', $paket->harga) }}">

            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_discount" class="form-label">Discount</label>
            <input type="number" class="form-control @error('harga_discount') is-invalid @enderror" id="harga_discount"
                name="harga_discount" required autofocus value="{{ old('harga_discount', $paket->harga_discount) }}">

            @error('harga_discount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="masa_berlaku" class="form-label">Masa Berlaku</label>
            <input type="number" class="form-control @error('masa_berlaku') is-invalid @enderror" id="masa_berlaku"
                name="masa_berlaku" required autofocus value="{{ old('masa_berlaku', $paket->masa_berlaku) }}">

            @error('masa_berlaku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="is_refundable" class="form-label">Refundable</label>
            @error('is_refundable')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <select class="form-select is_refundable" aria-label="Default select example" name="is_refundable"
                id="is_refundable">

                @if ($paket->is_refundable)
                    <option value="0">Tidak</option>
                    <option value="1" selected>Ya</option>
                @else
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>
                @endif



            </select>
        </div>



        <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {

            // const title = document.querySelector('#title');
            // const slug = document.querySelector('#slug');


            // title.addEventListener('change', function() {
            //     fetch('/atraksi/checkSlug?title=' + title.value)
            //         .then(response => response.json())
            //         .then(data => slug.value = data.slug)
            // });
            $('#type').select2();
        });
    </script>
@endsection
