<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Opcoes;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $Enquete=Enquete::create($request->all());
       $Opcoes=explode(",", $request->input('opcao'));
       foreach ($Opcoes as $key => $valor) {
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
        return view('edit',compact('Enquete','Opcoes'));
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
        $Enquete=Enquete::where('id',$id)->get();
        $Enquete->update($request->all());
        $Opcoes=Opcoes::where('opcao_id',$id)->get();
        $Opcoes->matriculas()->sync($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matriculas=Enquete::where('id',$id)->first();
        $matriculas->Opcoes()->detach();
        $matriculas->delete();
        return ['msg'=>'Enquete deletada com sucesso'];
    }
    
}
