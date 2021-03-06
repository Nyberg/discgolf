@extends('db')


@section('content')

       <div class="showback">
       <div class="row">
       <div class="col-lg-12">

                       <h2 class="text-center page-header-custom">Dina Recensioner</h2>
                       <div class="divider-header"></div>

      @if(count($reviews) == 0)
        <p>Du har inte skrivit några recensioner..</p>
      @else
          @foreach($reviews as $rev)

              <br/>

                              <div class="col-lg-2">
                                  <span class="pull-left">

                                             {{Form::open(['method'=>'DELETE', 'route'=>['review.destroy', $rev->id]])}}
                                             {{Form::submit('Ta bort', ['class'=>'btn btn-sm btn-danger pull-right'])}}
                                             {{Form::close()}}

                                  </span>

                                  <a href="/account/review/{{$rev->id}}/edit/"><span class="btn btn-theme btn-sm pull-right"><i class="fa fa-pencil"></i></span></a>

                              </div>

               <div class="col-lg-10 well well-sm" data-toggle="collapse" href="#collapseExample{{$rev->id}}" aria-expanded="false" aria-controls="collapseExample">



                  <div class="col-lg-1">
                      <img src="{{Auth::user()->image}}" class="img-circle pull-left" width="60px">
                  </div>

                  <div class="col-lg-8">
                  <h4>{{$rev->head}} <small> skriven av <a href="/user/{{$rev->user_id}}/show">{{getUser($rev->user_id)}}</a> {{$rev->created_at->format('Y-m-d')}}</small>
                  </h4>
                      <small> Betyg: {{$rev->rating}}</small>

                      <div class="collapse" id="collapseExample{{$rev->id}}">
                          <p>{{$rev->body}}</p>
                      </div>
                  </div>
              </div>


           @endforeach

      @endif
        </div>
    </div>
</div>

@stop