@extends('master')

@section('content')

<div class="row">
<div class="col-md-10">
<ol class="breadcrumb">
    <li><a href="/forum">Forum</a></li>
    <li class="active">{{$category->title}}</li>
</ol>
</div>

</div>
<div class="row">
    <div class="col-md-10">
    <div class="table-responsive">
        <table class="table panel panel-default">
        <tbody class="panel-heading">
        <tr>
            <th><h5>{{$category->title}}</h5></th>
            <th><h6>Skapad av</h6></th>
            <th><h6>Inlägg</h6></th>
            <th><h6>Senaste inlägg</h6></th>
            <th><h6>Visningar</h6></th>
        </tr>
        </tbody>
        <tbody class="panel-body">
        @if(count($threads) > 0)
            @foreach($threads as $thread)
                    <tr>
                    <td><p><a href="/forum/thread/{{$thread->id}}">{{$thread->title}}</a></p>
                    </td>
                    <td><small><span class="">{{$thread->author->first_name . ' ' . $thread->author->last_name}}</span></small></td>
                    <td><small>{{count($thread->comments)}}</small></td>
                    <td>
                        @if(count($thread->comments) > 0)
                            @foreach($thread->comments as $comment)
                                @if($comment->updated_at == $thread->updated_at)
                                    <small>{{$thread->author->first_name . ' ' . $thread->author->last_name . ' - ' . $thread->updated_at}}</small>
                                @endif
                            @endforeach
                        @else
                            <small>Inga inlägg än..</small>
                        @endif
                    </td>
                    <td>{{$thread->views}}</td>
                    </tr>
            @endforeach
        @else
        <tr>
        <td>
        <p>Det finns inga trådar ännu. Var den första att skapa en!</p>
        </td>
        </tr>
            @endif
        <tr class="panel-footer">
            <td>
                @if(Auth::check())
                  <a href="/forum/new/thread/{{$category->id}}" class="btn btn-primary btn-sm">Skapa tråd</a>
                @endif
                @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $category->club_id)
                    <a id="{{$category->id}}" href="#" class="btn btn-danger btn-sm delete_category" data-toggle="modal" data-target="#category_delete">Ta bort Kategori</a>
                    <a id="{{$category->id}}" href="#" class="btn btn-danger btn-sm delete_category" data-toggle="modal" data-target="#category_update">Redigera Kategori {{$category->title}}</a>
                @endif
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    </table>
    </div>
    </div>
</div>

    @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('ClubOwner'))
        <div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Ta bort Kategori</h4>
                    </div>
                    <div class="modal-body">
                        <p>Är du säker på att du vill ta bort denna kategori? <br /> <small>Alla trådar och kommentarer som tillhör kommer också försvinna!</small> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                        <a id="btn_delete_category" class="btn btn-primary">Ta bort</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
        @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $category->club_id)
            <div class="modal fade" id="category_update" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Redigera Kategori</h4>
                        </div>
                        <div class="modal-body">
                            {{Form::model($category,['method' => 'POST', 'route' => ['categoryUpdate', $category->id], 'id'=>'edit_category'])}}
                           <div class="form-group">
                           {{Form::label('title','Namn')}}
                           {{Form::text('title', null, ['class' => 'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                           </div>
                           <div class="form-group">
                           {{Form::label('subtitle','Beskrivning')}}
                           {{Form::text('subtitle', null, ['class' => 'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                           </div>

                       </div>
                        <div class="modal-footer">
                        {{Form::submit('Uppdatera', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                            <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>

                        </div>
                    </div>
                </div>
            </div>
        @endif
@stop

@section('scripts')
<script>

$.validate({
  form : '#edit_category'
});

</script>
@stop