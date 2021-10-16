
@extends('layouts.backend.frame')
@section('title', 'Set Role')

@section('css')
    <style type="text/css">
        .tab-pane{
            height:150px;
            overflow-y:scroll;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Set Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                        <li class="breadcrumb-item active">Set Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
​
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.set_role', $user->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        @component('components.card')
                            @slot('title')
                            @endslot
                            
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td>:</td>
                                            <td>
                                                @foreach ($roles as $row)
                                                <input type="radio" name="role" 
                                                    {{ $user->hasRole($row) ? 'checked':'' }}
                                                    value="{{ $row }}"> {{  $row }} <br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm float-right">
                                Set Role
                            </button>
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection