@extends('master')

@section('content')

<div class="row">
  <div class="col-lg-12">
  {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => ''])}}
    <div class="input-group">
      <input type="text" class="form-control"  name="auto" id="auto" placeholder="Sök banor efter namn..">
            <span class="input-group-btn">
              {{Form::button('<i class="fa fa-search"></i>', ['type'=>'submit', 'class' => 'btn btn-default'])}}
            </span>
    </div><!-- /input-group -->
       {{Form::close()}}
  </div><!-- /.col-lg-6 -->
  </div>

<br/>

<div class="row">
    <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">

    <h4 class="tab-rub text-center page-header-custom">Välkommen till Penguin Projects Alfatest!</h4>

        <div class="divider-header"></div>



        <p class="text-center"><b>All data som läggs upp kan/kommer att försvinna under testperioden. Lägg inte upp data som ni inte vill bli av med!</b></p><hr>

    </div>
</div>

<div class="row">
    <div class="col-md-9">


      <div class="col-md-12 panel panel-sub">
            <!-- Default panel contents -->
            <div class="row panel-heading panel-subheading text-center">Nyheter</div>

            @foreach($news as $new)

            <div class="col-md-6">
                <h2 class="page-subheader-custom"> <a href="/news/{{$new->id}}/show" class="">{{$new->head}}</a></h2>
                <p>{{Str::limit(strip_tags($new->body), 220)}}</p>
                <br/>
                <p class="">{{$new->created_at->format('Y-m-d') . ' av '}}  <a href="/user/{{$new->user_id}}/show">{{$new->user->first_name . ' ' . $new->user->last_name}}</a></p>

            </div>

            @endforeach
        </div>

    </div>

    <div class="col-md-3">

          <div class="col-md-12 panel panel-sub">
                <!-- Default panel contents -->
                <div class="row panel-heading panel-subheading text-center">Rundor senaste två veckorna</div>

                <div class="col-md-12">
                    <div class="caption text-center">
                    <br/>
                        <h1 class="red">{{$num}}</h1>
                        <h4 class="">
                           Rundor
                        </h4>
                        <p>Spelade dom senaste två veckorna</p>
                   <br/>
                   </div>
                </div>

            </div>

                      <div class="col-md-12 panel panel-sub">
                            <!-- Default panel contents -->
                            <div class="row panel-heading panel-subheading text-center">Senaste medlemmen</div>

                            <div class="col-md-12">
                                <div class="caption text-center">
                                <br/>
                                    <img src="{{$latest->image}}" class="img-circle" width="50px"/>
                                    <h4 class="">
                                       <a href="/user/{{$latest->id}}/show">{{$latest->first_name . ' ' . $latest->last_name}}</a>
                                    </h4>

                               <br/>
                               </div>
                            </div>

                        </div>

    </div>

</div>

<div class="row">
    <div class="col-md-12">

        <div class="col-md-12 panel panel-sub">
                <!-- Default panel contents -->
            <div class="row panel-heading panel-subheading text-center">Senaste Rundorna</div>
            <br/>

            @foreach($rounds as $round)

            <a href="/round/{{$round->id}}/course/{{$round->course_id}}">
                <div class="col-sm-3 col-md-3">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <h1 class="red">{{calcScore($round->total, $round->tee->par)}}</h1>
                            <h4 class="">
                                {{$round->course->name . ' - ' . $round->tee->color}}
                            </h4>
                            <p>{{$round->created_at->format('Y-m-d') . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</p>
                       </div>
                      </div>
                </div>
            </a>

            @endforeach

        </div>

    </div>
</div>

@stop


@section('scripts')

<script>



</script>
@stop