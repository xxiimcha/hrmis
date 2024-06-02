@if($errors->any())
    <div class="alert alert-dismissible alert-danger small my-3 small" role="alert" data-mdb-color="danger">
        @foreach($errors->all() as $error)
            {!! $error !!}<br>
        @endforeach

        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('message'))
    <div class="alert alert-dismissible alert-success small my-3" role="alert" data-mdb-color="success">
        {!! session('message') !!}

        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
