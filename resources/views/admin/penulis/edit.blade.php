@extends('layouts.backend.frame')
@section('title', 'Edit Penulis')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/parsleyjs/css/parsley.css">
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/dropify/css/dropify.min.css">
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Penulis</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('penulis.index') }}">Penulis</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                                <h2>Edit Penulis</h2>
                            @endslot
                            
                            <form action="{{ route('penulis.update', $penulis->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $penulis->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-send"></i> Update
                                    </button>
                                </div>
                            </form>
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ url('assets') }}/plugin/parsleyjs/js/parsley.min.js"></script> <!-- Validator -->
    <script src="{{ url('assets') }}/plugin/dropify/js/dropify.min.js"></script>  <!-- Dropify image -->
    <script>
        $(function () {
            // initialize after multiselect
            $('#basic-form').parsley();

            // droptify Banner image
            $('.dropify-image').dropify();
        });
    </script>
@endsection