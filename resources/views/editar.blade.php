@section('titulo', 'editar' )

@section('conteúdo')

<classe div="contêiner">

<form action ="{{ route('') }}" method="POST">
        @csrf
        <p>Titulo Atual</p>
        <label  for = " titulo " >Titulo  </ label >
        <input type="text" name = " titulo  " > </input>
        @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <br> 
         <p>Descrição Atual</p>        
        <label  for = " descricao " >Descrição'</ label >
        <input  type = " text "  name = "descricao'" ></input>
             
        @error('descricao'')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Data De Inicio Atual</p>
        <label  for = " data_de_inicio" >Data De Inicio</label >
        <input  type = " date "  name = "data_de_inicio" ></input>
        @error('data_de_inicio')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>         
        <p>Data De Termino Atual</p>
        <label  for = " data_de_termino " >Data De Termino</label>
        <input type=" date " name = "data_de_termino" ></input>
        @error('data_de_termino')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>  
        <p>Opções  Atuais</p>
        <p>digite as opçoes separadas por ,</p>
        <label  for = " opcao" >Opções:</label >
        <input  type = " text "  name = "opcao" ></input>
        @error('opcao')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" value="Submit">Cadastrar</button>
  </form>
</div>
@endsection