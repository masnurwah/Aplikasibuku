@extends('layouts.backend.frame')
@section('title', 'Add New Penulis')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/parsleyjs/css/parsley.css">
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/dropify/css/dropify.min.css">
@endsection
​
@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Penulis</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Penulis</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @component('components.card')
                            @slot('title')
                                Add New Penulis
                            @endslot
                            <!-- Alert -->
                            @include('layouts.backend.alert')
                            <!-- End Alert -->
                            <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="">Penulis</label>
                                    <select name="penulis_id" class="form-control">
                                        <option value="">Pilih Penulis</option>
                                        @foreach($penulis as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Sampul Buku</label>
                                    <input type="file" name="image" class="dropify-map">
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control {{ $errors->has('judul_buku') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('judul_buku') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-send"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
    <script src="{{ url('assets') }}/plugin/parsleyjs/js/parsley.min.js"></script> <!-- Validator -->
    <script src="{{ url('assets') }}/plugin/dropify/js/dropify.min.js"></script>  <!-- Dropify image -->
    <script>
        $(function () {
            // initialize after multiselect
            $('#basic-form').parsley();

            // droptify Banner image
            $('.dropify-map').dropify();
        });
    </script>
@endsection