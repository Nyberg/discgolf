@extends('master')

@section('content')

    <h2 class="text-center page-header-custom">Bra jobbat!</h2>
    <p class="text-center">Ditt resultat blev:</p>

<div class="row">
    <div class="col-xs-12">
          <div class="thumbnail">
            <div class="caption text-center">
                <h1 class="green">{{calcScore($round->total, $round->tee->par)}}</h1>
                <h4 class="">
                    {{$round->course->name . ' - ' . $round->tee->color}}
                </h4>
                <p>{{$round->created_at->format('Y-m-d') . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</p>
           </div>
          </div>
    </div>
</div>

<hr class="row divider"/>
            <h2 class="text-center page-header-custom">Välj väder & skriv en kommentar!</h2>
          <div class="form-horizontal style-form">


           {{Form::model($round, ['method'=>'POST', 'route'=> ['app-store', $round->id]])}}

                   <div class="form-group">
                       <label class="col-sm-1 col-sm-1 control-label">Väder</label>
                        <div class="col-sm-5">
                           <select name="weather" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                             @foreach($weathers as $w)
                             <option id="{{$w->id}}" value="{{$w->id}}">{{$w->name}}</option>
                             @endforeach
                           </select>
                        </div>
                        <label class="col-sm-1 col-sm-1 control-label">Vind</label>
                         <div class="col-sm-5">
                           <select name="wind" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                               @foreach($winds as $w)
                               <option id="{{$w->id}}" value="{{$w->id}}">{{$w->name}}</option>
                               @endforeach
                           </select>
                        </div>
                   </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kommentar</label><br/>
                  <div class="col-sm-12">
                   {{Form::textarea('comment', '', ['class'=>'form-control'])}}
                  </div>
              </div>

           {{Form::submit('Spara runda', ['class'=>'btn btn-primary'])}}
           {{Form::close()}}
       </div>

@stop


@section('scripts')

<script>
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
</script>

@stop