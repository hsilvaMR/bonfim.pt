<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Cookie;

class Datasheet extends Controller
{
  private $dados=[];
  
  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.datasheetTitulo');
  	$this->dados['separador']="ficha_tecnica";
    $this->dados['funcao']="";

    $this->dados['projeto']=\DB::table('projeto')->where('nome','bonfim')->first();
  	return view('backoffice/pages/datasheet', $this->dados);
  }

  public function form(Request $request){
    $id = trim($request->id_projeto);
    $ficha_tecnica_pt = trim($request->ficha_tecnica_pt);
    $ficha_tecnica_en = trim($request->ficha_tecnica_en);

    if($id){
      \DB::table('projeto')->where('id',$id)
          ->update([
            'ficha_tecnica_pt' => $ficha_tecnica_pt,
            'ficha_tecnica_en' => $ficha_tecnica_en,
            'data' => \Carbon\Carbon::now()->timestamp
          ]);
    }

    $resposta = [
      'estado' => 'sucesso',
      'id' => $id
    ];
    return json_encode($resposta,true);
  }
}