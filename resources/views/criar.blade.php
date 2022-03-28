@extends('layouts.basico')

@section('titulo', 'criar' )

@section('conteúdo')


<classe div="contêiner">

<form action ="{{ route('store') }}" method="POST">
        @csrf
        <label  for = "titulo" >Titulo</label>
        <input type="text" name = "titulo" > </input>
        @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <br>         
        <label  for = " descricao " >Descrição</label>
        <input  type = " text "  name = "descricao" ></input>
             
        @error('descricao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <label  for = " data_de_inicio" >Data De Inicio</label >
        <input  type ="datetime-local"  name = "data_de_inicio" ></input>
        @error('data_de_inicio')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>         
        <label  for = " data_de_termino " >Data De Termino</label>
        <input type="datetime-local" name = "data_de_termino" ></input>
        @error('data_de_termino')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>digite as opçoes separadas por ,</p>
        <label  for = " opcao" >Opção:</label >
        <input  type = " text "  name = "opcao" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label  for = " opcao2" >Opção:</label >
        <input  type = " text "  name = "opcao2" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label  for = " opcao3" >Opção:</label >
        <input  type = " text "  name = "opcao3" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

<script>
    let id=0
    function criaropcao(){
        event.preventDefault();
        const labelopcao = document.createElement("label");
        labelopcao.id =id ;
        id=id+1
        const texto = document.createTextNode('Opçao:');
        labelopcao.appendChild(texto);
        labelopcao.insertBefore(labelopcao, itens[0]);
        const body = document.body;
        body.appendChild(labelopcao);
        const opcao = document.createElement("input");
        opcao.id = id;
        id=id+1
        body.appendChild(opcao);
    }

    </script>
        <button onclick="criaropcao()">Mais opçoes</button>
        <button type="submit" value="Submit">Cadastrar</button>
  </form>
  
</div>
@endsection