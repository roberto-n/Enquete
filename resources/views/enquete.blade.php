
@extends('layouts.basico')
@section('titulo', 'enquete' )

@section('conteúdo')

<classe div="contêiner">

        <p>Titulo </p>
        @if($Enquete)
        <p>{{$Enquete[0]->titulo}}</p>
        @else
        @endif
        <br>
        <p>Descrição </p>
        @if($Enquete)
         <p>{{$Enquete[0]->descricao}}</p> 
        @else
        @endif           
        <br>
        <p>Data De Inicio </p>
        @if($Enquete)
        <p>{{date( 'd/m/Y h:i:s' , strtotime($Enquete[0]->data_de_inicio))}}</p> 
        @else
        @endif 
        <br>
        <p>Data De Termino </p>
        <br>
        @if($Enquete)
        <p>{{date( 'd/m/Y h:i:s' , strtotime($Enquete[0]->data_de_termino))}}</p>
        @else
        @endif  
        <p>Opçoes</p>
        @if($Opcoes)
        @foreach ($Opcoes as $Opcao)
        <p>{{$Opcao->opcao}}</p>
        <p>Votos Atuais :{{$Opcao->votos}}</p>
        @endforeach
        @else
        @endif
        
        <div>
        @if($Enquete[0]->data_de_inicio > date('Y-m-d H:i:s'))
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        <p>Aguarde o inicio da enquete</p>
        <button type="submit" disabled value="Submit">Votar</button>
        </form>
        @elseif($Enquete[0]->data_de_termino < date('Y-m-d H:i:s'))
        <p>Descupe a enquete já se encerrou</p>
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        <button type="submit" value="Submit">Votar</button>
        </form>
        @else
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        @foreach ($Opcoes as $Opcao)
        <p>{{$Opcao->opcao}}</p>
        <p>{{$Opcao->id}}</p>
        <input type="hidden" id="{{$Opcao->id}}" name="custId" value="{{$Opcao->id}}">
        <button type="submit" id='{{$Opcao->id}}' value="Submit">Votar</button>
        @endforeach
        </form>
        @endif
        </div>
</div>
@endsection