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
            <tr>
                <td>{{$acti->first_name}}</td>
                <td>{{$acti->email}}</td>
                <td>
                {{Form::open(['method'=>'POST', 'route'=>['alfa.send', $acti->id]])}}
                {{Form::submit('Skicka inbjudan', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      </div>

@stop