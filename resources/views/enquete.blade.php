@section('titulo', 'enquete' )

@section('conteúdo')

<classe div="contêiner">
        <p>Titulo </p>
        @if($Enquete)
        <p>{{$Enquete->titulo}}</p>
        @else
        @endif
        <br>
        <p>Descrição </p>
        @if($Enquete)
         <p>{{$Enquete->descricao}}</p> 
         @else
        @endif           
        <br>
        <p>Data De Inicio </p>
        @if($Enquete)
        <p>{{$Enquete->data_de_inicio}}</p> 
        @else
        @endif 
        <br>
        <p>Data De Termino </p>
        <br>
        @if($Enquete)
        <p>{{$Enquete->data_de_termino}}</p>
        @else
        @endif  
        <p>Opçoes</p>
        @if($Opcoes)
        <p>{{$Opcoes->opcao}}</p>
        @else
        @endif
        <p>Votos Atuais </p>
        <p>{{$Opcoes->votos}}</p>
        @if($Enquete->data_de_inicio < date('Y-m-d H:i:s'))
        <form action ="{{ route('') }}" method="POST">
        @csrf
        <p>Aguarde o inicio da enquete</p>
        <button type="submit" value="Submit">Votar</button>
        </form>
        @elseif($Enquete->data_de_termino > date('Y-m-d H:i:s'))
        <p>Descupe a enquete já se encerrou</p>
        <form action ="{{ route('') }}" method="POST">
        @csrf
        <button type="submit" value="Submit">Votar</button>
        </form>
        @else
        <form action ="{{ route('') }}" method="POST">
        @csrf
        <button type="submit" value="Submit">Votar</button>
        </form>
</div>
@endsection