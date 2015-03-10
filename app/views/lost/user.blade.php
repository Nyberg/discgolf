

@extends('db')

@section('content')

    <div class="showback">
 <h2 class="text-center page-header-custom">Lost and Found</h2>
 <p class="text-center"><a href="/account/lost/add">Lägg till disc</a></p>
  <div class="divider-header"></div>

  @if(count($losts) == 0)

  <p>Inga lost and found anmälda</p>

  @else

  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>
          <th class="hidden-phone">Date</th>
          <th>Disc</th>
          <th>Bana</th>
          <th>Status</th>
          <th>Markera som löst</th>
      </tr>
      </thead>
      <tbody>

      @foreach($losts as $lost)

      <tr>
          <td class="hidden-phone">{{$lost->date}}</td>
          <td>{{$lost->type}}</td>
          <td>{{$lost->course->name}}</td>
          <td>{{$lost->status}}</td>
          <td><a href="/account/lost-and-found/{{$lost->id}}/solved" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a></td>
      </tr>

      @endforeach

      </tbody>
  </table>

  @endif

   <h2 class="text-center page-header-custom">Lost and Found</h2>
    <div class="divider-header"></div>

    @if(count($solveds) == 0)

    <p>Inga lösta fall.</p>

    @else


    <table class="table table-striped table-advance table-hover">


        <thead>
        <tr>
            <th class="hidden-phone">Date</th>
            <th>Disc</th>
            <th>Bana</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach($solveds as $lost)

        <tr>
            <td class="hidden-phone">{{$lost->date}}</td>
            <td>{{$lost->type}}</td>
            <td>{{$lost->course->name}}</td>
            <td>{{$lost->status}}</td>
        </tr>

        @endforeach

        </tbody>
    </table>

    @endif

  </div>



@stop