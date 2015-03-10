@extends('master')

@section('content')

 <h2 class="text-center page-header-custom">Lost and Found</h2>

 @if(Auth::check())
 <p class="text-center"><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Hur funkar detta?</a> | <a href="/account/lost/add">Lägg till disc</a></p>
 @else
 @endif
 <div class="divider-header"></div>

 <div class="row">

 <div class="collapse col-md-10 col-md-offset-1" id="collapseExample">
   <div class="well mb text-center">
     <p>Lost & Found är ett verktyg som ska hjälpa discgolfare att återfå eller återge discar till dens rätta ägare.</p>
     <p>Klicka <a href="/account/lost/add">här</a> eller på länken ovan och anmäl disc som försvunnen eller upphittad.</p>
     <p>En disc återfås mot beskrivning, dvs <strong>namn</strong>, <strong>telefonnummer</strong> som står på discen och självklart <strong>färg</strong>. Andra unika signalament är också godkänt.</p>
     <p>En disc som inte kan beskrivas kan inte återfås, då den inte är tillräckligt märkt.</p>
     <p><strong>Var snälla och märk era discar korrekt för chansen att få den tillbaka!</strong></p>

     <p>Kontankt sker för tillfället via mail. Klicka på objekten nedan för att få reda på den informationen.</p>
   </div>
 </div>

 </div>

 <div class="row">
    <div class="col-md-10 col-md-offset-1">

    @foreach($losts as $lost)

    <div class="col-md-3 text-center lost-and-found" data-container="body" data-toggle="popover" data-placement="top" data-title="För mer info" data-content="Maila: {{$lost->user->email}}">

        <p>
        @if($lost->status == 'lost')
        <i class="fa fa-times fa-3x {{$lost->status}}"></i>
        @else
        <i class="fa fa-eye fa-3x {{$lost->status}}"></i>
        @endif</p>

         <h4>{{$lost->type}}</h4>
         <small>{{$lost->course->name}} |  {{$lost->date}}</small>

    </div>

    @endforeach

    </div>
 </div>

@stop


@section('scripts')

    <script>

    $(function () {
      $('[data-toggle="popover"]').popover()
    })

@stop
