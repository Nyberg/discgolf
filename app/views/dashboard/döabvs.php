<div class="row mtbox">
    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
        <a  href="/account/round/add">  <div class="box1">
                <span class="li_like"></span>
                <h4>Rundor</h4>
            </div>
            <p>Lägg till runda!</p></a>
    </div>
    <div class="col-md-2 col-sm-2 box0">
        <a  href="/club/{{$club->id}}/show"> <div class="box1">
                <span class="li_star"></span>
                <h4>{{$club->name}}</h4>
            </div>
            <p>Besök {{$club->name}}!</p></a>
    </div>
    <div class="col-md-2 col-sm-2 box0">
        <a  href="/account/sponsor/add"> <div class="box1">
                <span class="li_banknote"></span>
                <h4>Sponsorer</h4>
            </div>
            <p>Hantera dina sponsorer</p></a>
    </div>
    <div class="col-md-2 col-sm-2 box0">
        <div class="box1">
            <span class="li_params"></span>
            <h4>Statistik</h4>
        </div>
        <p>Kolla på din statistik!</p>
    </div>

    <div class="col-md-2 col-sm-2 box0">
        <a href="/account/edit/{{Auth::User()->id}}/user">  <div class="box1">
                <span class="li_settings"></span>
                <h4>Settings</h4>
            </div>
            <p>Reidgera din profil/dina inställningar</p></a>
    </div>

</div>


<div class="row mtbox">

    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
        <a  href="/account/review/add">  <div class="box1">
                <span class="li_pen"></span>
                <h4>Recensioner</h4>
            </div>
            <p>Skriv en recension!</p>
        </a>
    </div>

</div>

<div class="row mtbox">

    @if(Auth::user()->hasRole('ClubOwner'))

    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
        <a  href="/admin/club/{{$user->club_id}}/edit">  <div class="box1">
                <span class="li_star"></span>
                <h4>Klubb</h4>
            </div>
            <p>Redigera din klubb</p></a>
    </div>

    <div class="col-md-2 col-sm-2 box0">
        <a  href="/admin/club/{{$user->club_id}}/edit">  <div class="box1">
                <span class="li_cloud"></span>
                <h4>Banor</h4>
            </div>
            <p>Redigera din klubbs banor</p></a>
    </div>
    <div class="col-md-2 col-sm-2 box0">
        <a  href="/admin/club/{{$user->club_id}}/edit">  <div class="box1">
                <span class="li_user"></span>
                <h4>Medlemmar</h4>
            </div>
            <p>Redigera din klubbs medlemmar</p></a>
    </div>
    <div class="col-md-2 col-sm-2 box0">
        <a  href="/account/sponsor/add"> <div class="box1">
                <span class="li_banknote"></span>
                <h4>Sponsorer</h4>
            </div>
            <p>Hantera din klubbs sponsorer</p></a>
    </div>
    @else
    @endif

</div><!-- /row mt -->


<div class="row mt">
</div><!-- /row -->


<div class="row">

</div><!-- /row -->

<div class="row mt">

</div><!-- /row -->