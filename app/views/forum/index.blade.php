@extends('master')

@section('content')

<div class="row">

</div>
<div class="row">
    <div class="col-md-12">

                    <h2 class="text-center page-header-custom">Forum</h2>
                    <div class="divider-header"></div>
    </div>
    <div class="col-md-12">
    <div class="table-responsive">
        <table class="table panel panel-default theme-color">
        @foreach($groups as $group)
            <tbody class="panel-heading">
            <tr>
                <th><h5 class="panel-title">{{$group->title}}</h5></th>
                <td><h6>Trådar</h6></td>
                <td><h6>Inlägg</h6></td>

            </tr>
            </tbody>
            <tbody class="panel-body">
                @foreach($group->categories as $category)
                <tr>
                    <td><p class="cat-name"><a href="/forum/category/{{$category->id}}" >{{$category->title}}</a><br/><small>{{$category->subtitle}}</small></p></td>
                    <td><p  class="cat-count">{{count($category->threads)}}</p> </td>
                    <td><p  class="cat-count">{{count($category->comments)}}</p></td>
                </tr>
                @endforeach
                </tbody>
            @endforeach

        @if(Auth::check())

        @foreach($clubs as $club)
                <tbody class="panel-heading theme-color">
                <tr>
                    <th><h5 class="panel-title">{{$club->title}}<small> {{$club->desc}}</small></h5></th>
                    <td><h6>Trådar</h6></td>
                    <td><h6>Inlägg</h6></td>
                </tr>
                </tbody>
                <tbody class="panel-body">
                    @foreach($club->categories as $clubcat)
                    <tr>
                        <td><p class="cat-name"><a href="/forum/category/{{$clubcat->id}}" >{{$clubcat->title}}</a><br/><small>{{$clubcat->subtitle}}</small></p></td>
                        <td><p  class="cat-count">{{count($clubcat->threads)}}</p> </td>
                        <td><p  class="cat-count">{{count($clubcat->comments)}}</p></td>
                    </tr>
                    @endforeach
                    </tbody>
                @endforeach
        @endif


            <tr class="panel-footer">
                <td>
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                         <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#group_form">Lägg till Grupp</a>
                         <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#category_form">Lägg till Kategori</a>
                         <a id="" href="#" class="btn btn-danger btn-sm delete_group" data-toggle="modal" data-target="#group_delete">Hantera forum</a>
                    @endif
                    @if(Auth::check() && Auth::user()->hasRole('ClubOwner'))
                        <a class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#club_group_form">Lägg till Kategori i {{Auth::user()->club->name}}</a>
                    @endif
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
</div>

    @if(Auth::check() && Auth::user()->hasRole('Admin'))
        <div class="modal fade" id="group_form" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Lägg till Grupp</h4>
                    </div>
                    <div class="modal-body">
                        {{Form::open(['method' => 'post', 'route' => ['forum-store-group'], 'id' => 'target_form'])}}
                        <div class="form-group">
                        {{Form::label('title','Namn')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'data-validation'=>'required','data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}
                        </div>
                     {{Form::close()}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class=" btn btn-primary" data-dismiss="modal" id="form_submit">Spara</button>
                       <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
        @if(Auth::check() && Auth::user()->hasRole('ClubOwner'))
            <div class="modal fade" id="club_group_form" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Lägg till Grupp</h4>
                        </div>
                        <div class="modal-body">
                            {{Form::open(['method' => 'post', 'route' => ['forum-store-club-group'], 'id' => 'club_target_form'])}}
                            <div class="form-group">
                            {{Form::label('title','Namn')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'data-validation'=>'length', 'data-validation'=>'required','data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}
                            </div>


                            <div class="form-group">
                            {{Form::label('subtitle','Beskrivning')}}
                            {{Form::text('subtitle', '', ['class' => 'form-control', 'data-validation'=>'required','data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}
                            </div>
                            <div class="form-group">
                            {{Form::label('id', 'I vilken grupp ska kategorin placeras?')}}
                             <select class="form-control" name="id">
                                @foreach($clubs as $club)
                                <option value="{{ $club->id}}">{{$club->title}}</option>
                                @endforeach
                             </select>
                             {{Form::close()}}
                            </div>
                        <div class="modal-footer">

                           <button type="button" class=" btn btn-primary" data-dismiss="modal" id="club_form_submit">Spara</button>
                           <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
    @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="modal fade" id="category_form" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Lägg till en Kategori</h4>
                        </div>
                        <div class="modal-body">
                            {{Form::open(['method' => 'post', 'route' => ['forum-store-category'], 'id' => 'target_category_form'])}}
                            <div class="form-group">
                            {{Form::label('title','Namn')}}
                            {{Form::text('title', null, ['class' => 'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}
                            </div>
                            <div class="form-group">
                            {{Form::label('subtitle','Beskrivning')}}
                            {{Form::text('subtitle', '', ['class' => 'form-control','data-validation'=>'required', 'data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}
                            </div>
                            <div class="form-group">
                            {{Form::label('id', 'I vilken grupp ska kategorin placeras?')}}
                             <select class="form-control" name="id">
                                @foreach($groups as $group)
                                <option value="{{ $group->id}}">{{$group->title}}</option>
                                @endforeach
                             </select>

                            </div>

                        </div>
                        <div class="modal-footer">
                            {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                            <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="modal fade" id="group_delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Ta bort Grupp</h4>
                        </div>
                        <div class="modal-body">

                                {{Form::open(['method' => 'post', 'route' => ['forum-delete-group']])}}
                                <div class="form-group">
                                     <select class="form-control" name="id">
                                       @foreach($groups as $group)
                                       <option value="{{ $group->id}}">{{$group->title}}</option>
                                       @endforeach
                                    </select>
                                </div>

                           <small>Alla kategorier och trådar som tillhör gruppen kommer också försvinna!</small>
                        </div>
                        <div class="modal-footer">
                         {{Form::submit('Ta bort', ['class' => 'btn btn-primary btn-primary'])}}
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
  form : '#club_group_form #group_form #club_group_form'
});

</script>
@stop