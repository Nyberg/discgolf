@extends('app')

@section('content')

    <p><i class="fa fa-tree green"></i> {{$round->course->name . ' - ' . $round->tee->color . ' tee ('.$round->tee->par.')'}}</p>
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

   {{Form::open(['method'=>'POST', 'route'=>['app-store-score', $round->id, $hole->id], 'class'=>'form-horizontal style-form', 'id'=>'score'])}}

      <div class="form-group">
          <div class="col-sm-12">
               {{Form::select('score-'.$hole->id.'', ['1'=>'1','2'=>'2', '3'=>'3','4'=>'4','5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9','10'=>'10', '11'=>'11', '12'=>'12', '13'=>'13','14'=>'14'],$hole->par,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
          </div>
      </div>

<div class="form-group">
    <div class="col-xs-12">
    {{Form::submit('Nästa hål', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 text-center">
    <table class="table table-hover text-center">
        <thead class="text-center">
            <td>Hål</td>
            <td>Johannes</td>
        </thead>
        <tbody>
        @foreach($round->score as $score)
        <tr>
            <td>{{$score->hole->number}}</td>
            <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>

@stop


@section('scripts')

    <script>

    $.validate({
      form : '#score'
    });

    </script>

@stop