@extends('db')


@section('content')


    <div class="showback">

                 <h2 class="text-center page-header-custom">Dina kommentarer</h2>
                 <div class="divider-header"></div>

      @if(count($comments) == 0)

      <p>Du har inte skrivit några kommentarer..</p>

      @else

      <table class="table table-hover">
          <thead>
          <tr>

           <th>Datum</th>
           <th>Var</th>
           <th>Kommentar</th>
            <th>Redigera</th>
            <th>Ta bort</th>

          </tr>

          </thead>
          <tbody>
          @foreach($comments as $comment)
           <tr>
            <td>{{$comment->created_at}}</td>
            <td><a href="/{{strtolower($comment->commentable_type)}}/{{$comment->commentable_id}}/show">Länk</a></td>
            <td>{{$comment->body}}</td>

           <td><a data-toggle="modal" data-target="#comment{{$comment->id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>

            <td>

             {{Form::open(['method'=>'DELETE', 'route'=>['comment.destroy', $comment->id]])}}
             {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}

            </td>
           </tr>
           @endforeach
          </tbody>
      </table>

      @foreach($comments as $comment)


              <div class="modal fade" id="comment{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title" id="myModalLabel">Redigera Kommentar</h4>
                        </div>

                        <div class="modal-body">
                        {{Form::model($comment, ['method'=>'PATCH', 'route'=> ['comment.update', $comment->id], 'id'=>'comment'])}}

                         <div class="form-group">
                               <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                               <div class="col-sm-10">

                                   {{Form::text('body', $comment->body, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                               </div>
                           </div>

                        <div class="modal-footer">
                            {{Form::submit('Spara Kommentar', ['class'=>'btn btn-primary'])}}
                                {{Form::close()}}
                          <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

                       </div>
                     </div>
              </div>



    </div></div><!-- --/content-panel ---->

      @endforeach

    @endif

      </div>

@stop


@section('scripts')

    <script>

    $.validate({
      form : '#comment'
    });

    </script>

@stop