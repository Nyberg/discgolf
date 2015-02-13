@extends('master')

@section('content')

                  <h2 class="text-center page-header-custom">{{$news->head}}</h2>
                  <p class="text-center">{{$news->created_at . ' av '}}  <a href="/club/{{$news->club_id}}/show">{{$news->club->name}}</a> | {{$news->views}} visningar</p>

                  <div class="divider-header"></div>

                  <div class="row">

                    <div class="col-md-10 col-md-offset-1">

                         <p>{{$news->body}}</p>
                    <hr/>
                    </div>

                  </div>

                @if(Auth::check() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $news->club_id)

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                     <p class="pull-right">
                        {{Form::open(['method'=>'DELETE', 'route'=>['news.destroy', $news->id]])}}
                           {{Form::submit('Ta bort Nyhet', ['class'=>'btn btn-xs btn-danger pull-right'])}}
                           {{Form::close()}}

                    <a href="/admin/news/{{$news->id}}/edit" class="pull-right btn btn-xs btn-primary">Redigera Nyhet</a>

                    </p>

                    </div>
                </div>

                @else
                @endif

                <div class="row">
                    <br/>
                    <div class="col-md-10 col-md-offset-1">

                                          <div class="panel panel-default">
                                            <div class="panel-heading">Kommentarer ({{count($news->comments)}})
                                @if(Auth::user())
                                <button class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#comment">
                                 Kommentera
                                </button>
                                @else
                                @endif
                             </div>
                              </div>

                             @if(count($news->comments) == 0)

                             <p>Inga kommentarar. Bli den första att kommentera!</p>

                             @else

                                 @foreach($news->comments as $comment)
                                 @include('layouts/include/comment')
                                 @endforeach

                             @endif


                    </div>
                </div>


                    <div class="modal fade bs-example-modal-lg" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Lägg till Kommentar</h4>
                              </div>

                              <div class="modal-body">
                              {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                                {{Form::hidden('type_id', $news->id)}}
                                {{Form::hidden('model', 'news')}}

                               <div class="form-group">
                                     <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                                     <div class="col-sm-10">

                                         {{Form::text('body', '', ['class'=>'form-control'])}}
                                     </div>
                                 </div>

                              <div class="modal-footer">
                                  {{Form::submit('Spara Kommentar', ['class'=>'btn btn-primary'])}}
                                      {{Form::close()}}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                             </div>
                           </div>
                    </div>

                    </div>
                    </div><!-- --/Modal-panel ---->


@stop

