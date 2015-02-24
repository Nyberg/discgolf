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

        <br/>

        <a href="/about-pp" class="center-block btn btn-success btn-lg">Läs mer om Penguin Project!</a>

        <br/>

        @if(Auth::check())

        <div class="row mtbox">
            <div class="col-md-4 col-sm-4 box0">
              <a  href="/account/round/add">  <div class="box1">
                    <span class="li_user"></span>
                    <h4>Lägg till en runda</h4>
                </div>
                    <p>Testa att lägga upp en runda</p></a>
            </div>

            <div class="col-md-4 col-sm-4 box0">
               <a href="/forum/"> <div class="box1">
                    <span class="li_star"></span>
                    <h4>Forum</h4>
                </div>
                    <p>Skriv i forumet</p></a>
            </div>

               <div class="col-md-4 col-sm-4 box0">
                <a  href="/courses/"> <div class="box1">
                    <span class="li_cloud"></span>
                    <h4>Banor</h4>
                </div>
                    <p>Besök en bana</p></a>
            </div>
        </div><!-- /row mt -->

    @else
    @endif

         <h4>Tack för att du vill vara med och testa och förbättra Penguin Project!</h4>

        <p>Sidan är i ett väldit tidigt stadie, men det finns tillräckligt med funktionalitet för att personer kan använda sig av den.
        Under alfa-stadiet kommer väldigt många buggar och krockar uppstå så ni får inte gripas av panik om det flashar världens error för er.</p>

        <h4>Bugghantering</h4>
        <p>När ni stöter på en bugg, var vänlig att gå till forumets alfadel och leta reda på rätt område.
        Kolla noga innan ni postar något nytt, så att vi kan undvika dubletter. Forumet kommer vara uppbyggt med en kategori för varje specifikt område.</p>

        <h4>Förslag på funktionalitet</h4>
        <p>Om ni skulle komma på något som ni vill ha med på sidan (inom vissa rimliga ramar) så postar ni det i "Förslag" i alfaforumet. Förslaget kommer att läsas igenom och undersökas.
        Vill ni ha något tillägg eller påbyggnad, posta det i samma forum.</p>

        <h4>Design & Rättigheter</h4>
        <p>För tillfället så är det mesta öppet för en alfatestare. Det finns dock viss funktionalitet som fortfarande är låst (som jag inte anser behöver testas). Framförallt rör det sig om admindelen.
        I en användares dashboard kommer det finnas en del funktionalitet som inte är tillgänglig, men ni kan fortfarande se det.</p>
        <p>När det kommer till design så är det en väldigt öppen fråga. Det är inte min prio just nu. Framförallt dashboardgränssnittet är inte alls påbörjat rent designmässigt. Lämna dessa funderingar/klagomål utanför sidan.</p>
        <p>Har ni dock förslag på konkreta designförändringar på framsidan, lämna en kommentar i forumets del för design. Glöm inte använda sidan på er platta eller mobil.</p>

        <h4>Statistik</h4>
        <p>Statistiken är väldigt grundläggande. Har ni frågor kring hur det fungerar och vilken data som används, lämna en kommentar i alfadelens statistikdel. Förslag på statistik lämnas även där.</p>

        <h4>Klubbar</h4>
        <p>För tillfället så vet jag inte hur/eller om klubbar ska finnas med på sidan. Modulen finns där, men efter en dialog med Svenska Discgolfutskottet (DU) så ligger det på is ett tag.</p>

        <h4>Banor och rundor</h4>
        <p>Det ligger 2 banor uppe för tillfället. Det är den del som är närmast klar. Lägg upp era rundor så statistiken kan visa rättvisa siffror.</p>

        <h4>Korrenkturläsning och textförslag</h4>
        <p>Alla förslag på informativa texter mottages varmt. Även länkar är vamrt välkomna. Posta det i alfaforumets informationsdel. </p>

        <h4>App</h4>
        <p>Som ni kanske vet kommer det byggas en app under alfa & betatester. Kom gärna med förslag i alfaforumets del för appen. Försök hålla förslagen rimliga.</p>

        <h4>Avslutningsvis</h4>
        <p>Som alfatestare har ni ett ansvar. Testa så mycket ni kan, kom med ideer och förslag. Försök hålla en öppen & glad diskussion med varandra. Användare som missköter sig är välkomna tillbaka när sidan går live på riktigt.</p>

    </div>


    </div>

@stop


@section('scripts')

<script>



</script>
@stop