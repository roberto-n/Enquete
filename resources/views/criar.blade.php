@extends('layouts.basico')

@section('titulo', 'criar' )

@section('conteúdo')



<div class="conteiner">

<form action ="{{ route('store') }}" method="POST" id="form1">
        @csrf
        <label for = "titulo" >Digite o Titulo de sua enquete :</label>
        <input type="text" name = "titulo" > </input>
        @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         
         <br>    
                     
        <label  for = " descricao " >Digite a Descrição da enquete:</label>
        <input  type = " text "  name = "descricao" ></input>
             
        @error('descricao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <label  for = " data_de_inicio" >Digite a Data De Inicio da enquete:</label >
        <input  type ="datetime-local"  name = "data_de_inicio" ></input>
        @error('data_de_inicio')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>         
        <label  for = " data_de_termino " >Digite a Data De Termino da enquete:</label>
        <input type="datetime-local" name = "data_de_termino" ></input>
        @error('data_de_termino')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Digite as opçoes que deseja na enquete</p>
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
        <input  type = " text "  name = "opcao3" id="utimoobrigatorio"></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

<script>
    let id=1
    function criaropcao(){
       
        const labelopcao = document.createElement("label");
        labelopcao.id =id ;
        id=id+1
        labelopcao.for=id;
        
        const texto = document.createTextNode('Opçao:');
        labelopcao.appendChild(texto);
        const form = document.getElementById("form1");
        const utimoobrigatorio = document.getElementById("envia");
        form.insertBefore(labelopcao, utimoobrigatorio);
        const opcao = document.createElement("input");
        opcao.id = id;
        opcao.type="text";
        opcao.name=id
        id=id+1
        
        form.insertBefore(opcao, utimoobrigatorio);
       
    }

    </script>
        <button type="button" onclick="criaropcao()">Mais opçoes</button>
        <button id="envia" type="submit" value="Submit">Cadastrar</button>
  </form>
  
</div>
@endsection