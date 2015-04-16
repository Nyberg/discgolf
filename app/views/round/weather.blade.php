@extends('master')
@section('content')

    <div class="row">
        <br/>
        <div class="col-md-12 text-center">
        <img src="{{$weather->image}}" alt=""/>
              <h1 class="text-center">Rundor med väder: {{$weather->name}}</h1>
                <br/>
        </div>
    </div>
    
    <div class="row">
        <hr class="divider"/>
        <div class="col-sm-12">
            @foreach($weathers as $we)
            <a href="/rounds/weather/{{$we->id}}/show">
            <div class="col-sm-2 text-center">
                <img src="{{$we->image}}" alt="" width="80px"/>
            </div>
            </a>
            @endforeach
        </div>

    </div>
<hr class="divider row"/>

             <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <h5>Sortera efter kategori
                       <i class="fa fa-info-circle" data-container="body" data-toggle="tooltip" data-placement="right" data-title="För tillfället kan du bara sortera efter en kategori, dvs att du inte kan kedjesortera. Du kan även klicka på vädersymbolerna ovanför för att byta väder."></i>

                    </h5>
                    </div>
                </div>
             </div>

    <div class="row">
        <div class="col-md-12">
        <div class="col-md-4 mb">

                <select name="" class="form-control form-1" id="form-control">
                    <option class="filter" data-filter=".category-none">Välj förhållanden</option>
                    @foreach($winds as $w)
                    <option class="filter" data-filter=".category-{{$w->id}}">{{$w->name}}</option>
                    @endforeach
                </select>
        </div>

        @if(Auth::check())
        <div class="col-md-4 mb">
                <select name="" class="form-control form-2" id="form-control">
                    <option class="filter" data-filter=".category-none">Välj spelare</option>
                    <option class="filter" data-filter=".category-user-{{Auth::id()}}">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</option>

                    @foreach(Auth::user()->friends as $f)
                    <option class="filter" data-filter=".category-user-{{$f->user->id}}">{{$f->user->first_name . ' ' . $f->user->last_name}}</option>
                    @endforeach
                </select>
        </div>
        @else
        @endif

                <div class="col-md-4 mb">
                        <select name="" class="form-control form-3" id="form-control">
                            <option class="filter" data-filter=".category-none">Välj Bana</option>
                            @foreach($courses as $c)
                            <option class="filter" data-filter=".category-course-{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                </div>

        </div>
    </div>


        <div class="row">
            <div class="col-sm-12" id="Container">
                @foreach($rounds as $round)
                <a href="/round/{{$round->id}}/course/{{$round->course_id}}">
                    <div class="col-sm-3 col-md-3 thread mix category-{{$round->wind_id}} category-none category-user-{{$round->user_id}} category-course-{{$round->course_id}}" data-myorder="2">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <h1 class="green">{{calcScore($round->total, $round->tee->par)}}</h1>
                                <h4 class="">
                                    {{$round->course->name . ' - ' . $round->tee->color}}
                                </h4>
                                <p><img src="/img/weather/flag.png" alt="" width="16px"/> {{$round->wind->name}}</p>
                                <p>{{$round->date . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</p>
                           </div>
                          </div>
                    </div>
                </a>

                @endforeach

            </div>

        </div>

<div class="row">
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