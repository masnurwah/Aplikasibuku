@if ($errors->any())
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <i class="fa fa-times-circle"></i>{{ $error }}<br>
            @endforeach
        </div>
    </div>
@endif