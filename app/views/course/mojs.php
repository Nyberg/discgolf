
<!-- Lägg till hål -->

<div class="col-sm-3">
    <a href="/admin/holes/{{$course->id}}/add"><span class="btn btn-primary">Lägg till hål</span></a>
</div>
</div>
<h4><i class="fa fa-angle-right"></i>  Redigera hål</h4><hr><table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Längd</th>
        <th>Par</th>

        <th>Redigera</th>
        <th>Ta bort</th>
    </tr>
    </thead>
    <tbody>
    @foreach($course->hole as $hole)
    <tr>
        <td>{{$hole->number}}</td>
        <td>{{$hole->length}}m</td>
        <td>{{$hole->par}}</td>

        <td><a href="/admin/holes/{{$hole->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
        <td>{{Form::open(['method'=>'DELETE', 'route'=>['hole.destroy', $hole->id]])}}
            {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
            {{Form::close()}}</td>
    </tr>
    @endforeach

    </tbody>
</table>
</div>

<!-- Lägg till hål -->
