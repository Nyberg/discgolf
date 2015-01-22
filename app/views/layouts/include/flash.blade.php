
@if(Session::has('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
    <span class="sr-only">Close</span></button>
        <h6>{{ Session::get('success') }}</h6>
    </div>
@endif

@if(Session::has('danger'))
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
            <h6>{{ Session::get('danger') }}</h6>
        </div>
@endif

@if(Session::has('headsup'))
        <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
            <h6>{{ Session::get('headsup') }}</h6>
        </div>
@endif