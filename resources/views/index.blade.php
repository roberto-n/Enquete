@extends('layouts.basico')
@section('titulo', 'enquete' )

@section('conteúdo')

<div class ="conteinerindex">
@if($Enquetes)
@foreach ($Enquetes as $Enquete)

<table class="tableindex">
  <tr>
    <th>{{$Enquete->titulo}}</th>
  </tr>
  
  <tr>
    <td>Data De Inicio:</td>
    
    <td>{{$Enquete->data_de_inicio}}</td>
  </tr>
  <tr>
    <td>Data De Termino:</td>
    <td>{{$Enquete->data_de_termino}}</td>
  </tr>
  <tr>
    <td>
  <form action ="{{ route('show',$Enquete->id ) }}" method="GET">
        @csrf
  <button type="submit" value="Submit">Visualizar</button>
  </form>
    </td>
  </tr>
</table>

@endforeach
@else
@endif

</div>
@endsection