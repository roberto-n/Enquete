@section('titulo', 'enquete' )

@section('conteúdo')

<classe div="contêiner">
@if($Enquete)
@foreach ($Enquete as $Enquete)

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
</table>
@endforeach
@else
@endif
</div>
@endsection