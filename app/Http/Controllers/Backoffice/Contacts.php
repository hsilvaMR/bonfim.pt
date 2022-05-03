<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Cookie;

class Contacts extends Controller
{
  private $dados=[];
  
  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.contactsTitulo');
  	$this->dados['separador']="contacts";
    $this->dados['funcao']="";

    $this->dados['contacts']=\DB::table('bonfim_contactos')->get();
  	return view('backoffice/pages/contacts', $this->dados);
  }

  public function details($id){
    $this->dados['headTitulo']=trans('backoffice.contactsTitulo');
    $this->dados['separador']="contacts";
    $this->dados['funcao']="";

    $this->dados['contacts']=\DB::table('bonfim_contactos')->where('id',$id)->first();
    $this->dados['apartamento']=\DB::table('bonfim_lotes')->where('id',$this->dados['contacts']->id_lote)->first();
    return view('backoffice/pages/contacts-details', $this->dados);
  }
}