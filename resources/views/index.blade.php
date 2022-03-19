@extends('layouts.basico')
@section('titulo', 'enquete' )

@section('conteúdo')

<classe div="contêiner">
@if($Enquetes)
@foreach ($Enquetes as $Enquete)

<table>
  <tr>
    <th>Titulo</th>
    <th>{{$Enquete->titulo}}</th>
  </tr>
  <tr>
    <td>Data De Inicio</td>
    <td>{{$Enquete->data_de_inicio}}</td>
  </tr>
  <tr>
    <td>Data De Termino</td>
    <td>{{$Enquete->data_de_termino}}</td>
  </tr>
  <tr>
    <th>Visualizar</th>
    <th>
  <form action ="{{ route('show',$Enquete->id ) }}" method="GET">
        @csrf
  <button type="submit" value="Submit">Visualizar</button>
  </form>
    </th>
  </tr>
</table>
@endforeach
@else
@endif

</div>
@endsection