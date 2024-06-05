@extends('dashboard')
@section('container')
    <div class="mt-4">
        <a class="btn btn-danger" href="/atraksi">Back</a>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Atraksi</h1>
    </div>
    <form action="/atraksi" method="post" class="col-lg-8 mb-5">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                required autofocus value="{{ old('title') }}">

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                required autofocus value="{{ old('slug') }}">

            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 text-editor">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            @error('deskripsi')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="info_penting" class="form-label">Info Penting</label>
            @error('info_penting')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="info_penting" type="hidden" name="info_penting" id="info_penting" value="{{ old('info_penting') }}">
            <trix-editor input="info_penting"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="highlight" class="form-label">Highlight</label>
            @error('highlight')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <input id="highlight" type="hidden" name="highlight" id="highlight" value="{{ old('highlight') }}">
            <trix-editor input="highlight"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            @error('provinsi')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <select class="form-select" aria-label="Default select example" name="provinsi" id="provinsi">
                {{-- <option value="" selected>Pilih Provinsi</option> --}}
                {{-- @foreach ($provinsi->provinsi as $item)

                    <option value="{{ $item->province_id }}">{{ $item->province }}</option>
                @endforeach --}}
            </select>
        </div>
        <input type="text" id="provinsi_name" name="provinsi_name" hidden>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            @error('kota')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <select class="form-select kota" aria-label="Default select example" name="kota" id="kota">
            </select>
        </div>
        <input type="text" id="kota_name" name="kota_name" hidden>

        <div class="mb-3">
            <label for="gps_location" class="form-label">GPS Location</label>
            <input type="text" class="form-control @error('gps_location') is-invalid @enderror" id="gps_location"
                name="gps_location" required autofocus value="{{ old('gps_location') }}">

            @error('gps_location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {

            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
            $('#provinsi').attr('disabled', true);
            $('#kota').attr('disabled', true);

            $.ajax({
                url: '/provinsi',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#provinsi').empty();
                    $('#provinsi').append('<option value="">Pilih Provinsi</option>');
                    $.each(data.provinsi, function(key, value) {
                        $('#provinsi').append('<option value="' + value.province_id + '">' +
                            value.province + '</option>');
                    });
                    $('#provinsi').attr('disabled', false);
                }
            });


            title.addEventListener('change', function() {
                fetch('/atraksi/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });
            $('#provinsi').select2();
            $('#kota').select2();

            $('#provinsi').change(function() {
                var provinsiId = $(this).val();
                $("#provinsi_name").val($(this).find("option:selected").text());
                console.log(provinsiId);
                $.ajax({
                    url: '/cities/' + provinsiId,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#kota').empty();
                        $('#kota').append('<option value="">Pilih Kota</option>');
                        $.each(data.cities, function(key, value) {
                            $('#kota').append('<option value="' + value.city_id + '">' +
                                value.type + ' ' + value.city_name + '</option>');
                        });
                        $('#kota').attr('disabled', false);
                    }
                });
            });

            $('#kota').change(function() {
                $("#kota_name").val($(this).find("option:selected").text());
            })
        });
    </script>
@endsection
