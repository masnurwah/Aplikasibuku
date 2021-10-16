@extends('layouts.backend.frame')
@section('title', 'Dashboar')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <link rel="stylesheet" href="{{ url('assets/') }}/plugin/morrisjs/morris.css" />
@endsection
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2>Admin Penulis</h2>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-12 text-right">
            <ul class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ url('assets/backend') }}/js/pages/file/filemanager.js"></script>
@endsection