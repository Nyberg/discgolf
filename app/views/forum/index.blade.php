@extends('master')

@section('content')

<div class="row">

</div>
<div class="row">
    <div class="col-md-10">

    <h4 class="tab-rub">Välkommen till Penguin Projects Forum!</h4>

    <div class="table-responsive">
        <table class="table panel panel-default">
        @foreach($groups as $group)
            <tbody class="panel-heading">
            <tr>
                <th><p class="panel-title">{{$group->title}}</p></th>
                <td><h6>Trådar</h6></td>
                <td><h6>Inlägg</h6></td>
            </tr>
            </tbody>
            <tbody class="panel-body">
                @foreach($group->categories as $category)
                <tr>
                    <td><strong><p class="cat-name"><a href="/forum/category/{{$category->id}}" >{{$category->title}}</a><br/><small>{{$category->subtitle}}</small></p></strong></td>
                    <td><p  class="cat-count">{{count($category->threads)}}</p> </td>
                    <td><p  class="cat-count">{{count($category->comments)}}</p></td>

                </tr>
                @endforeach
                </tbody>
            @endforeach

        @foreach($clubs as $club)
                <tbody class="panel-heading">
                <tr>
                    <th><p class="panel-title">{{$club->title}}</p></th>
                    <td><h6>Trådar</h6></td>
                    <td><h6>Inlägg</h6></td>
                </tr>
                </tbody>
                <tbody class="panel-body">
                    @foreach($club->categories as $clubcat)
                    <tr>
                        <td><strong><p class="cat-name"><a href="/forum/category/{{$clubcat->id}}" >{{$clubcat->title}}</a><br/><small>{{$clubcat->subtitle}}</small></p></strong></td>
                        <td><p  class="cat-count">{{count($clubcat->threads)}}</p> </td>
                        <td><p  class="cat-count">{{count($clubcat->comments)}}</p></td>

                    </tr>
                    @endforeach
                    </tbody>
                @endforeach



            <tr class="panel-footer">
                <td>
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                         <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#group_form">Lägg till Grupp</a>
                         <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#category_form">Lägg till Kategori</a>
                         <a id="" href="#" class="btn btn-danger btn-sm delete_group" data-toggle="modal" data-target="#group_delete">Hantera forum</a>
                    @endif
                    @if(Auth::check() && Auth::user()->hasRole('ClubOwner'))
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#club_group_form">Lägg till Kategori</a>
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
                        {{Form::text('title', null, ['class' => 'form-control'])}}
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
                            {{Form::open(['method' => 'post', 'route' => ['forum-store-club-group'], 'id' => 'target_form'])}}
                            <div class="form-group">
                            {{Form::label('title','Namn')}}
                            {{Form::text('title', '', ['class' => 'form-control'])}}
                            </div>


                            <div class="form-group">
                            {{Form::label('subtitle','Beskrivning')}}
                            {{Form::text('subtitle', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                            {{Form::label('id', 'I vilken grupp ska kategorin placeras?')}}
                             <select class="form-control" name="id">
                                @foreach($clubs as $club)
                                <option value="{{ $club->id}}">{{$club->title}}</option>
                                @endforeach
                             </select>

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
                            {{Form::text('title', null, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                            {{Form::label('subtitle','Beskrivning')}}
                            {{Form::text('subtitle', null, ['class' => 'form-control'])}}
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
                            <p>Är du säker på att du vill ta bort denna grupp? <br /> <small>Alla kategorier och trådar som tillhör gruppen kommer också försvinna!</small> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                            <a id="btn_delete_group"  class=" btn btn-primary">Ta bort</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@stop