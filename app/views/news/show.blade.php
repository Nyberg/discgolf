@extends('master')

@section('content')

            <div class="row">
                <div class="col-sm-12">
                  <h2 class="text-center page-header-custom">{{$news->head}}</h2>
                  <p class="text-center">{{$news->created_at . ' av '}}  <a href="/user/{{$news->user_id}}/show">{{$news->user->first_name . ' ' . $news->user->last_name}}</a> | {{$news->views}} visningar</p>

                  <div class="divider-header"></div>
                  </div>
            </div>
                  <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        <img src="{{$news->image}}" width="100%"/>
                             <p>{{$news->body}}</p>

                        @if(Auth::check() && Auth::user()->hasRole('Admin'))
                        <br/>
                            {{Form::open(['method'=>'DELETE', 'route'=>['news.destroy', $news->id]])}}
                            {{Form::submit('Ta bort Nyhet', ['class'=>'btn btn-sm btn-danger pull-left'])}}
                            {{Form::close()}}

                            <a href="/admin/news/{{$news->id}}/edit" class="pull-left btn btn-sm btn-primary margin-left">Redigera Nyhet</a>

                        @else
                        @endif

                        </div>
                    </div>

    <div id="demo">
        <div class="row-fluid">
          <div class="col-md-12">
          <hr class="divider"/>
          <h2 class="text-center page-header-custom">Fler nyheter</h2>
          <div class="divider-header"></div>

            <div id="owl-demo" class="owl-carousel">
                @foreach($alls as $new)
                <div class="item">
                    <a href="/news/{{$new->id}}/show">
                    <img class="lazyOwl" data-src="{{$new->image}}" alt="{{$new->head}}">
                    <h2 class="page-subheader-custom">{{$new->head}}</h2>
                    </a>
                    <p><i class="fa fa-calendar"></i> {{$new->created_at->format('Y-m-d')}}  <span class="pull-right"><i class="fa fa-comments-o"></i> {{count($new->comments)}} kommentarer</span></p>
                </div>
                @endforeach

            </div>

          </div>
      </div>
  </div>

    <div class="row">

                    <div class="col-md-12">
                    <hr class="divider"/>

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

                             <p>Inga kommentarer. Bli den första att kommentera!</p>

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

@section('scripts')



    {{HTML::script('admin_js/owl/application.js')}}
    {{HTML::script('admin_js/owl/owl.carousel.js')}}
    {{HTML::script('admin_js/owl/bootstrap-collapse.js')}}
    {{HTML::script('admin_js/owl/bootstrap-tab.js')}}
    {{HTML::script('admin_js/owl/bootstrap-transition.js')}}
    {{HTML::script('admin_js/owl/bootstrap-transition.js')}}

<script>

        $(document).ready(function() {

            $("#owl-demo").owlCarousel({
                items : 4,
                lazyLoad : true,
                navigation : true
            });
        });

</script>

@stop