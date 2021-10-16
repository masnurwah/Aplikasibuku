@extends('layouts.backend.frame')
@section('title', 'Buku')

@section('content')
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Buku</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Buku</li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @component('components.card')
                            @slot('title')
                            @canany(['all', 'create buku'])
                                <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm">Add New</a>
                            @endcanany
                            @endslot
                            
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Penulis</td>
                                            <td>Sampul Buku</td>
                                            <td>Judul Buku</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($buku as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->penulis->name }}</td>
                                            <td>
                                                @if(!is_null($row->image))
                                                    <img src="{{ url('upload/'.$row->image) }}" width="100">
                                                @endif
                                            </td>
                                            <td>{{ $row->judul_buku }}</td>
                                            <td>
                                                <form action="{{ route('buku.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @canany(['all', 'edit buku'])
                                                        <a href="{{ route('buku.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    @endcanany

                                                    @canany(['all', 'delete buku'])
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    @endcanany
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ url('assets/') }}/backend/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ url('assets/') }}/plugin/jquery-datatable/jquery.dataTables.min.js"></script>
    <script src="{{ url('assets/') }}/plugin/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ url('assets/') }}/plugin/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('assets/') }}/plugin/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                'columnDefs': [
                    {
                        'targets': [1, 3],
                        'orderable': false,
                        'searchable': true
                    }
                ]
            });
        });
    </script>
@endsection