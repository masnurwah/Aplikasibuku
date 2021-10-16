@extends('layouts.backend.frame')
@section('title', 'Edit Buku')

​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Buku</a></li>
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
                                <h2>Edit Buku</h2>
                            @endslot
                            
                            <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                
                                <div class="form-group">
                                    <label for="">Penulis</label>
                                    <select name="penulis_id" class="form-control">
                                        <option value="">Pilih Penulis</option>
                                        @foreach($penulis as $p)
                                            <option value="{{ $p->id }}" @if($p->id == $buku->penulis_id) selected @endif>{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Sampul BUku</label>
                                    @if(is_null($buku->image))
                                        <input type="file" name="image" class="dropify-image">
                                    @else
                                        <input type="file" name="image" class="dropify-image" data-default-file="{{ url('/upload/'.$buku->image)}}">
                                    @endif
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $buku->judul_buku }}" required>
                                    <p class="text-danger">{{ $errors->first('judul_buku') }}</p>
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