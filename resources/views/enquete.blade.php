
@extends('layouts.basico')
@section('titulo', 'enquete' )

@section('conteúdo')

<div class="conteinerenquete">
<div class="titulo">
        
        @if($Enquete)
        <h1>{{$Enquete[0]->titulo}}</h1>
        @else
        @endif
        <br>
</div>
<div class="descricao">
        <p>Descrição: </p>
        @if($Enquete)
         <h2>{{$Enquete[0]->descricao}}</h2> 
        @else
        @endif           
        <br>
</div>

<div class="voto">
 @if($Enquete[0]->data_de_inicio > date('Y-m-d H:i:s'))
        <form action ="{{ route('voto') }}" method="POST">
        @csrf
        <p>Aguarde o inicio da enquete</p>
        <button type="submit" value="Submit" disabled>Votar</button>
        </form>
        @elseif($Enquete[0]->data_de_termino < date('Y-m-d H:i:s'))
        <p>Descupe a enquete já se encerrou</p>
        <form  action ="{{ route('voto') }}" method="POST">
        @csrf
        <button type="submit"  value="Submit" disabled>Votar</button>
        </form>
       
        @else
        
        <form action ="{{ route('voto') }}" method="POST" id="a">
        @csrf
        @foreach ($Opcoes as $Opcao)
        <input type="hidden" id="{{$Opcao->id}}" name="custId" value="{{$Opcao->id}}">
        <button type="submit" id="{{$Opcao->id}}" value="Submit">Votar</button>
        <br>
        @endforeach
        </form>
        @endif

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
        const input =document.getElementById(data.id);
        const form = document.getElementById("a");
        form.insertBefore(paragrafo, input);

       
        
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
       
        
        </div>
        <div class="datadeinicio">
        <p>Enquete disponivel entre : </p>
        @if($Enquete)
        <p>{{date( 'd/m/Y h:i:s' , strtotime($Enquete[0]->data_de_inicio))}} e {{date( 'd/m/Y h:i:s' , strtotime($Enquete[0]->data_de_termino))}} </p>
        @else
        @endif
</div>
</div>
@endsection