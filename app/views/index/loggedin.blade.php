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
    <div class="col-lg-12">
     <div class="col-lg-9"></div>

      <div class="col-lg-3">
        <div class="dol-lg-12">
            <div class="col-lg-12">
                <div class="thumbnail">
                 <img src="/img/dg/lost.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">Play along!</h4>
                    <p class="text-center">Ska du besöka en ny bana och vill ha sällskap? Eller vill du bara träffa nytt folk på din lokala bana. Här kan du fixa det!</p>
                    <a href="#"><span class="btn btn-theme btn-block">Find players!</span></a>
                  </div>
                </div>
            </div>

       <div class="col-lg-12">
                <div class="thumbnail">
                  <img src="/img/dg/lost.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">Lost & Found</h4>
                    <p class="text-center">Har du tappat bort en disk? Eller har du kanske hittat en vilsen disc? Klicka nedan för att avgöra discens öde!</p>
                    <a href="/lost-and-found"><span class="btn btn-theme btn-block">Get to it!</span></a>
                  </div>
                </div>
       </div>

            <div class="col-lg-12">

                <div class="thumbnail">
                    <img src="/img/dg/lost.png" alt="">
                    <div class="caption">
                    <h4 class="text-center">Utvecklingsblogg</h4>
                    <p class="text-center">Ska du besöka en ny bana och vill ha sällskap? Eller vill du bara träffa nytt folk på din lokala bana. Här kan du fixa det!</p>
                    <a href="#"><span class="btn btn-theme btn-block">Find players!</span></a>
                    </div>
                </div>

            </div>
</div>

      </div>
    </div>

    <div class="row"><div class="col-lg-12">

           <div class="col-lg-4">

                            <div class="thumbnail">

                            <h4 class="text-center">Senaste rundor</h4>

                              <table class="table table-hover">
                                  <thead>
                                  <tr>
                                    <th>Användare</th>

                                    <th>Bana</th>
                                    <th>Resultat</th>

                                  </tr>

                                  </thead>
                                  <tbody>
                                  @foreach($rounds as $round)
                                   <tr>

                                    <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
                                    <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                                    <td>{{calcScore($round->total, $round->course['par'])}}</td>
                                   </tr>
                                   @endforeach
                                  </tbody>
                              </table>
                             <a href="#"><span class="btn btn-theme btn-block">Se alla rundor</span></a>
                            </div>

                 </div>

           <div class="col-lg-4">

                    <div class="thumbnail">

                    <h4 class="text-center">Mest spelade banor</h4>

                      <table class="table table-hover">
                          <thead>
                          <tr>
                            <th>Användare</th>

                            <th>Bana</th>
                            <th>Resultat</th>

                          </tr>

                          </thead>
                          <tbody>
                          @foreach($rounds as $round)
                           <tr>

                            <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
                            <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                            <td>{{calcScore($round->total, $round->course['par'])}}</td>
                           </tr>
                           @endforeach
                          </tbody>
                      </table>
                     <a href="#"><span class="btn btn-theme btn-block">Se alla banor</span></a>
                    </div>

            </div>

        <div class="col-lg-4">

                         <div class="thumbnail">

                         <h4 class="text-center">Banrecensioner</h4>

                           <table class="table table-hover">
                               <thead>
                               <tr>
                                 <th>Användare</th>

                                 <th>Bana</th>
                                 <th>Betyg</th>

                               </tr>

                               </thead>
                               <tbody>
                               @foreach($reviews as $rev)
                                <tr>

                                 <td><a href="/user/{{$rev->user_id}}/show">{{getUser($rev->user_id)}}</a></td>
                                 <td><a href="/course/{{$rev->course_id}}/show">{{$rev->course['name']}}</a></td>
                                 <td>{{$rev->rating}}/10</td>
                                </tr>
                                @endforeach
                               </tbody>
                           </table>
                          <a href="#"><span class="btn btn-theme btn-block">Se alla recensioner</span></a>
                         </div>

              </div>

    </div></div>

@stop