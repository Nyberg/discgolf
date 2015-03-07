@extends('db')

@section('content')

    <div class="showback">

     <h4 class="mb"><i class="fa fa-angle-right"></i> Anmälningar Alfa</h4>

         <table class="table table-hover">
             <thead>
                 <th>Namn</th>
                 <th>Email</th>
                  <th>Skicka inbjudan</th>
             </thead>
         <tbody>
            @foreach($activations as $acti)
            @if($acti->activated == 0)
            <tr>
                <td>{{$acti->first_name}}</td>
                <td>{{$acti->email}}</td>
                <td>
                {{Form::open(['method'=>'POST', 'route'=>['alfa.send', $acti->id]])}}
                {{Form::submit('Skicka inbjudan', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
                </td>
            </tr>
            @else
            @endif
            @endforeach
          </tbody>
      </table>


           <h4 class="mb"><i class="fa fa-angle-right"></i> Skickade inbjudningar</h4>

               <table class="table table-hover">
                   <thead>
                       <th>Namn</th>
                       <th>Email</th>
                        <th>Skickad</th>
                   </thead>
               <tbody>
                  @foreach($activations as $acti)
                  @if($acti->activated == 1)
                  <tr>
                      <td>{{$acti->first_name}}</td>
                      <td>{{$acti->email}}</td>
                      <td>{{$acti->updated_at}}</td>
                  </tr>
                  @else
                  @endif
                  @endforeach
                </tbody>
            </table>

      </div>

@stop