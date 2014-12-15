
@if(Session::has('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
    <span class="sr-only">Close</span></button>
        <h5>{{ Session::get('success') }}</h5>
    </div>
@endif

@if(Session::has('danger'))
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
            <h5>{{ Session::get('danger') }}</h5>
        </div>
@endif
