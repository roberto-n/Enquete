
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
        @if($Enquete)
        <p>{{date( 'd/m/Y h:i:s' , strtotime($Enquete[0]->data_de_termino))}}</p>
        @else
        @endif  
        <div>

        <script type="text/javascript">
        let dataatual=[]
     function voto(){
     
    fetch('http://127.0.0.1:8000/getvoto/{{$Enquete[0]->id}}')
      .then(function(response){
              return response.json();
      })
      .then(function(data){
        dataatual.push(data)
        data.forEach(function(data){
        const paragrafo = document.createElement("p");
        paragrafo.id = data.id;
        const texto = document.createTextNode('Opção '+data.opcao +' Votos '+data.votos);
        paragrafo.appendChild(texto);
        const body = document.body;
        body.appendChild(paragrafo);
        
        })
        
        ;})
}
        voto();
     function Votorealtime(dataatual){
        fetch('http://127.0.0.1:8000/getvoto/{{$Enquete[0]->id}}')
      .then(function(response){
              return response.json();
      }).then(function(data){
        let datanova=[data]
        if(JSON.stringify(datanova)!==JSON.stringify(dataatual)){
        data.forEach(function(data){
        paragrafo = document.getElementById(data.id);
        paragrafo.textContent='Opção'+data.opcao +' Votos '+data.votos+'test'
        })}
        else{
        return
        }

})
setTimeout(() => { Votorealtime(dataatual) }, 100000);
     }
     Votorealtime(dataatual);
    </script>
        <div>
        @if($Enquete[0]->data_de_inicio > date('Y-m-d H:i:s'))
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        <p>Aguarde o inicio da enquete</p>
        <button type="submit" value="Submit" disabled>Votar</button>
        </form>
        @elseif($Enquete[0]->data_de_termino < date('Y-m-d H:i:s'))
        <p>Descupe a enquete já se encerrou</p>
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        <button type="submit"  value="Submit" disabled>Votar</button>
        </form>
        @else
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        @foreach ($Opcoes as $Opcao)
        <input type="hidden" id="b" name="custId" value="{{$Opcao->id}}">
        <button type="submit" id="b" value="Submit">Votar</button>
        @endforeach
        </form>
        @endif
        </div>
</div>
@endsection