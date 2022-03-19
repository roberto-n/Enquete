@section('titulo', 'editar' )

@section('conteúdo')

<classe div="contêiner">

<form action ="{{ route('update') }}" method="POST">
        @csrf
        <p>Titulo Atual:</p>
        @if($Enquete)
        <p>{{$Enquete->titulo}}</p>
        @else
        @endif
        <label  for = " titulo " >Titulo  </ label >
        <input type="text" name = " titulo  " > </input>
        @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <br> 
         <p>Descrição Atual</p>
         @if($Enquete)
         <p>{{$Enquete->descricao}}</p> 
         @else
        @endif      
        <label  for = " descricao " >Descrição'</ label >
        <input  type = " text "  name = "descricao'" ></input>
             
        @error('descricao'')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Data De Inicio Atual</p>
        @if($Enquete)
        <p>{{$Enquete->data_de_inicio}}</p> 
        @else
        @endif 
        <label  for = " data_de_inicio" >Data De Inicio</label >
        <input  type = " date "  name = "data_de_inicio" ></input>
        @error('data_de_inicio')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>         
        <p>Data De Termino Atual</p>
        @if($Enquete)
        <p>{{$Enquete->data_de_termino}}</p>
        @else
        @endif  
        <label  for = " data_de_termino " >Data De Termino</label>
        <input type=" date " name = "data_de_termino" ></input>
        @error('data_de_termino')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Opções  Atuais</p>
        @if($Opcoes)
        <p>{{$Opcoes->opcao}}</p>
        @else
        @endif
        <p>digite as opçoes separadas por ,</p>
        <label  for = " opcao" >Opções:</label >
        <input  type = " text "  name = "opcao" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" value="Submit">Editar</button>
  </form>
</div>
@endsection