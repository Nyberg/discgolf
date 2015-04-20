@extends('master')

@section('content')

         <h2 class="text-center page-header-custom">Discgolfbanor</h2>
         <p class="text-center"><a href="#" data-toggle="modal" data-target="#bankarta">Saknar du en bana? Klicka här!</a></p>
         <div class="divider-header"></div>

         <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                <h5>Sortera efter kategori
                   <i class="fa fa-info-circle" data-container="body" data-toggle="tooltip" data-placement="right" data-title="För tillfället kan du bara sortera efter en kategori, dvs att du inte kan kedjesortera."></i>

                </h5>
                </div>
            </div>
         </div>

<div class="row">

    <div class="col-md-12">

    <div class="col-md-4 mb">
            <select name="" class="form-control form-1" id="form-control">
                <option class="filter" data-filter=".category-none">Välj Land</option>
                @foreach($countries as $country)
                <option class="filter" data-filter=".category-{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control form-2" id="form-control-1">
                <option class="filter" data-filter=".category-none">Välj Landskap</option>
                @foreach($states as $state)
                    @if($state->state == 'Västra Götaland')
                    <option class="filter" data-filter=".category-västragötaland">{{$state->state}}</option>
                    @else
                    <option class="filter" data-filter=".category-{{$state->state}}">{{$state->state}}</option>
                    @endif
                @endforeach
                </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control form-3" id="form-control-2">
                <option class="filter" data-filter=".category-none">Välj Stad</option>
                @foreach($cities as $city)
                <option class="filter" data-filter=".category-{{$city->city}}">{{$city->city}}</option>
                @endforeach
            </select>
    </div>

    </div>

        <div class="col-md-12" id="Container">

        @foreach($courses as $course)
        @if($course->state->state == 'Västra Götaland')
        <div class="col-sm-4 text-center thread mix category-none category-{{$course->country->country}} category-västragötaland category-{{$course->city->city}}" data-myorder="2">
        @else
        <div class="col-sm-4 text-center thread mix category-none category-{{$course->country->country}} category-{{$course->state->state}} category-{{$course->city->city}}" data-myorder="2">
        @endif
        @foreach($course->photos as $photo)
           <a href="/course/{{$course->id}}/show"><img src="{{$photo->url}}" class="img-responsive thumbnail center-block" width="100%;" height="60px;"/></a>
        @endforeach
           <p><a href="/course/{{$course->id}}/show">{{$course->name .', ' . $course->city->city}}</a></p>
           <small>Klubb: {{$course->club->name}}</small>
        </div>
        @endforeach
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="bankarta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Anmäla Bana</h4>
      </div>
      <div class="modal-body">
        <p>Om du saknar en bana som du spelar ofta på så vill vi såklart fixa det! Maila följande information till <a href="mailto:johannes.nyb@gmail.com?Subject=Ansluta bana" target="_top">johannes.nyb@gmail.com</a> så löser vi det så fort vi kan!
        </p>
        <br/>
        <p>Namn på banan</p>
        <p>Ansvarig klubb</p>
        <p>Länk till bankarta</p>
        <p>Adress till banan</p>
        <p>En headerbild (om möjligt)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Got it!</button>
      </div>
    </div>
  </div>
</div>


@stop


      @section('scripts')
      <script>
      $(function(){

        $('#Container').mixItUp();

      });

      $('.form-1').on('change', function() {
          $('.form-1 option:selected').trigger('click');
      });

      $('.form-2').on('change', function() {
          $('.form-2 option:selected').trigger('click');
      });

      $('.form-3').on('change', function() {
          $('.form-3 option:selected').trigger('click');
      });

      </script>

      <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
      @stop
