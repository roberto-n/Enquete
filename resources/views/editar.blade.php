@extends('layouts.basico')
@section('titulo', 'editar' )

@section('conteúdo')

<classe div="contêiner">

<form action ="{{ route('update',$Enquete[0]->id) }}" method="POST">
        @csrf
        <p>Titulo Atual:</p>
        @if($Enquete)
        <p>{{$Enquete[0]->titulo}}</p>
        @else
        @endif
        <label  for = "titulo" >Novo Titulo: </label>
        <input type="text" name = "titulo" > </input>
        @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <br> 
         <p>Descrição Atual</p>
         @if($Enquete)
         <p>{{$Enquete[0]->descricao}}</p> 
         @else
         @endif      
        <label  for = "descricao" >Nova Descrição:</label>
        <input  type = " text "  name = "descricao" ></input>
             
        @error('descricao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Data De Inicio Atual</p>
        @if($Enquete)
        <p>{{$Enquete[0]->data_de_inicio}}</p> 
        @else
        @endif 
        <label  for ="data_de_inicio">Nova Data De Inicio:</label >
        <input  type = " date "name = "data_de_inicio" ></input>
        @error('data_de_inicio')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>         
        <p>Data De Termino Atual</p>
        @if($Enquete)
        <p>{{$Enquete[0]->data_de_termino}}</p>
        @else
        @endif  
        <label  for = " data_de_termino " >Nova Data De Termino:</label>
        <input type=" date " name = "data_de_termino" ></input>
        @error('data_de_termino')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Opções  Atuais</p>
        @if($Opcoes)
        @foreach ($Opcoes as $Opcao)
        <p>{{$Opcao->opcao}}</p>
        <label  for = " opçãoeditada " >Opção editada:</label>
        <input  type = "text"  id='{{$Opcao->id}}' name ="opcaoeditada"></input>
        @endforeach
        @else
        @endif
        <p>digite as novas opçoes separadas por ,</p>
        <label  for = " opcao" >Opções:</label >
        <input  type = " text "  name = "opcao" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" value="Submit">Editar</button>
  </form>
</div>
@endsection