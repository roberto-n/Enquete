<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Opcoes;
use \App\Http\Requests\CreateEnqueteRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Enquetes=Enquete::all();
        return view('index',compact('Enquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        return view('criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateEnqueteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEnqueteRequest $request)
    {
        
        $Enquete=Enquete::create($request->all());
       $Opcoes=[$request->input('opcao'),$request->input('opcao2'),$request->input('opcao3')];
     
       if($request->input('2') == True){
        $datas = request()->all();
        $datafiltrada = array_filter($datas,function($datas){
            return (is_numeric($datas)) ;

        }, ARRAY_FILTER_USE_KEY);
        $Opcoes=array_merge($Opcoes,$datafiltrada);
       }
       foreach ($Opcoes as $key => $valor){
        $opcao = new Opcoes;
        $opcao->opcao_id = $Enquete->id;
        $opcao->opcao = $valor;
        $opcao->save();
      }
      
       return view('criar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $Enquete=Enquete::where('id',$id)->get();
        $Opcoes=Opcoes::where('opcao_id',$id)->get();
        
        
        return view('enquete',compact('Enquete','Opcoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Enquete=Enquete::where('id',$id)->get();
        $Opcoes=Opcoes::where('opcao_id',$id)->get();
        return view('editar',compact('Enquete','Opcoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $Enquete=Enquete::find($id)->update($request->all());
        
        $OpcoesAntigas=Opcoes::where('opcao_id',$id)->get();
        foreach ($OpcoesAntigas as $opcoes){
            $ArrayOpcoesAntigasid[]=$opcoes->id;
            $ArrayOpcoesAntigas[]=$opcoes->opcao;
        }
       foreach ($ArrayOpcoesAntigasid as $value){
           $OpcoesEmEdicao[$value]=$request->input($value);
       }
       $OpcoesEditadas=array_diff($OpcoesEmEdicao,$ArrayOpcoesAntigas,);
       foreach ($OpcoesAntigas as $opcoes){
           if(isset($OpcoesEditadas[$opcoes->id]) ){
            $opcoes->update([
                "opcao" =>$OpcoesEditadas[$opcoes->id],
            ]);
        }
    }
      $OpcoesNovas=explode(",", $request->input('opcao'));
       foreach ($OpcoesNovas as $key => $valor){
        $opcao = new Opcoes;
        $opcao->opcao_id =$id;
        $opcao->opcao = $valor;
        $opcao->save();
   }
        return ['msg'=>'Enquete editada com sucesso'];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Enquete=Enquete::where('id',$id)->first();
        $Enquete->delete();
        return ['msg'=>'Enquete deletada com sucesso'];
    }
    
    /**
     * Update the Voto  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function voto(Request $request,)
    { 
        
        $valor=$request->input('custId');
        $Opcoes=Opcoes::find($valor);
        $Opcoes->votos=+1;
        $Opcoes->save();
        return ['msg'=>'Enquete votada com sucesso'];

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getvoto($id)
    {
        $Opcoes=Opcoes::where('opcao_id',$id)->get();
        return $Opcoes;
    }
}