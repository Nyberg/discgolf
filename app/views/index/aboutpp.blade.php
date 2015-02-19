@extends('master')

@section('content')

<div class="row">

    <div class="col-md-12">
        <h2 class="text-center page-header-custom">Om Penguin Project</h2>
        <div class="divider-header"></div>
    </div>

    <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">

    <p>Penguin Project är ett hobbyprojekt av mig, Johannes Nyberg, som startades i slutet på Oktober 2014. Från en början var det bara tänkt som ett projekt där jag och mina kompisar skulle kunna lägga upp rundor.</p>
    <p>Men ju längre tiden gick desto mer inspirerad blev jag. I samma veva så började jag med ett nytt PHP-ramverk, Laravel, som öppnade upp en helt ny värld inom programmering.</p>
    <p>Nu gick det från en enkel applikation till målet att skapa en portal för discgolfare. Nu, idag, sitter jag med en sida som börjar likna något väldigt bra.</p>

    <br/>
    <p>Min grundide med projektet är att skapa en discgolfsida för discgolfare av discgolfare med målet att fler ska börja tävla. Allt innehåll ska produceras av användare och klubbar. Målet är också att alla banor runtomkring i Sverige ska utvecklas med bankartor, fullständiga ob-regler och statistik.</p>
    <br/>
    <p>Ett annat stort mål är att bygga en app som ska vara direkt kopplad till denna sida. Rundor och resultat ska vara enkelt att se och utvärdera.</p>
    <p>En annan ide som jag har i bakhuvudet är att bygga ett API som kan användas för att hämta data från denna sidan och publiceras på en annan, tex tävlingsresultat på en klubbsida.</p>
    <br/>
    <p>Projektet är icke vinstdrivande, utöver de kostnader som det kostar att driva sidan. Alla sammarbeten är aktuella, allt från skribenter till designers.</p>





    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">

        <h2 class="text-center page-header-custom">Lite av det som finns:</h2>
                <div class="divider-header"></div>

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-area-chart fa-4x red"></i>
                            <h4 class="">
                                Statistik
                            </h4>
                            <p>Statestik över rundor, banor och hål. Även översiktlig statistik.</p>
                       </div>
                      </div>
                </div>

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-rss fa-4x red"></i>
                            <h4 class="">
                                Forum
                            </h4>
                            <p>Öppet forum för alla. Klubbforum för klubbmedlemmar.</p>
                       </div>
                      </div>
                </div>

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-tree fa-4x red"></i>
                            <h4 class="">
                                Banor
                            </h4>
                            <p>Detaljerad information om alla banor i Sverige, deras olika tees och hål.</p>
                       </div>
                      </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-trophy fa-4x red"></i>
                            <h4 class="">
                                Rundor
                            </h4>
                            <p>Lägg upp dina rundor, se resultat mot allas snitt och jämför med andra.</p>
                       </div>
                      </div>
                </div>

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-users fa-4x red"></i>
                            <h4 class="">
                                Klubbar
                            </h4>
                            <p>Besök olika klubbar egna sidor för att få mer information om deras verksamhet.</p>
                       </div>
                      </div>
                </div>

                <div class="col-sm-4 col-md-4">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-money fa-4x red"></i>
                            <h4 class="">
                                Sponsorer
                            </h4>
                            <p>Är du en licensierad spelare? Visa upp din sponsorer på din profil och rundor.</p>
                       </div>
                      </div>
                </div>

       </div>
    </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">

                    <h2 class="text-center page-header-custom">To come:</h2>
                            <div class="divider-header"></div>

                    <div class="col-sm-4 col-md-4">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <i class="fa fa-tablet fa-4x red"></i>
                                <h4 class="">
                                    App
                                </h4>
                                <p>Penguin Project utvecklar en gratis-app som är direkt kopplat till sidan.</p>
                           </div>
                          </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <i class="fa fa-code fa-4x red"></i>
                                <h4 class="">
                                    Api
                                </h4>
                                <p>Ett API kommer att utvecklas så information kan hämtas till externa sidor.</p>
                           </div>
                          </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <i class="fa fa-bullseye fa-4x red"></i>
                                <h4 class="">
                                    Discdatabas
                                </h4>
                                <p>En discdatabas ska byggas. Få ut all statistik om en disc via sidan!</p>
                           </div>
                          </div>
                    </div>

           </div>
        </div>

</div>


@stop