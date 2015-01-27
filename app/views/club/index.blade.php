@extends('master')

@section('content')

         <h4 class="mb"><i class="fa fa-angle-right"></i> Klubbar</h4>
                 <div class="row">
              <img class="" src="/img/header-page.jpg" width="100%" height="60%"/>
               </div>

         <table class="table table-hover">
         <thead>
         <th>Namn</th>
         <th>Location</th>
         <th>Banor</th>
         <th>Medlemmar</th>
          <th>Hemsida</th>
         </thead>
         <tbody>
                @foreach($clubs as $club)

                <tr>
                <td><a href="/club/{{$club->id}}/show">{{$club->name}}</a></td>
                <td>{{$club->city . ', '. $club->state . ', ' . $club->country}}</td>
                <td>{{count($club->tee)}}</td>
                <td>{{count($club->user)}}</td>
                <td><a href="{{$club->website}}" target="_blank">{{$club->website}}</a></td>
                </tr>

                @endforeach
                      </tbody>
                                              </table>



@stop