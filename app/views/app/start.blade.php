@extends('master')

@section('content')

    <p><i class="fa fa-tree green"></i> {{$round->course->name . ' - ' . $round->tee->color . ' tee ('.$round->tee->par.')'}} <span class="pull-right">Hål {{$hole->number}}</span></p>
            <h2 class="text-center">{{calcScore($total, $par)}}</h2>
    <div class="row text-center">
                <div class="col-xs-4">
                    <h4 class="green">Hål {{$hole->number}}</h4>
                </div>
                <div class="col-xs-4">
                    <h4 class="green">{{convert($hole->length)}}</h4>
                </div>
                <div class="col-xs-4">
                    <h4 class="green">Par: {{$hole->par}}</h4>
                </div>
    </div>

   {{Form::open(['method'=>'POST', 'route'=>['app-store-score', $round->id, $hole->id], 'class'=>'form-horizontal style-form', 'id'=>'round_form'])}}

      <div class="form-group">
          <div class="col-sm-12">
              {{Form::number('score-'.$hole->id.'', null, ['class'=>'form-control', 'placeholder'=>'Resultat', 'data-validation'=>'number', 'data-validation-allowing'=>'range[1;100]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 1 och 100'])}}
        </div>
      </div>

    {{Form::submit('Nästa hål', ['class'=>'btn btn-primary pull-right'])}}
    {{Form::close()}}

@stop


@section('scripts')

<script>
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
</script>

@stop