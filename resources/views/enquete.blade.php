@section('titulo', 'enquete' )

@section('conteúdo')

<classe div="contêiner">
        <p>Titulo </p>
        <br>
        <p>Descrição </p>        
        <br>
        <p>Data De Inicio </p>
        <br>
        <p>Data De Termino </p>
        <br>
        <p>Opçoes</p>
        <p>Votos Atuais </p>
        <form action ="{{ route('') }}" method="POST">
        @csrf
        <button type="submit" value="Submit">Votar</button>
        </form>
</div>
@endsection