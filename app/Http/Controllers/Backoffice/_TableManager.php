<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Cookie;

class _TableManager extends Controller
{
  /*private $dados=[];
  private $lang;
  public function __construct()
  {
    //$this->lang=Session::get('locale');
    $this->middleware(function ($request, $next) {
          $this->lang = Cookie::get('admin_cookie')['lingua'];
          return $next($request);
      });
  }*/
  
  public function updateOnOff(Request $request)
  {
    $tabela=trim($request->tabela);
    $referencia= trim($request->referencia) ? trim($request->referencia) : 'id';
    $id=trim($request->id);
    $campo= trim($request->campo) ? trim($request->campo) : 'online';
    
    $query = \DB::table($tabela)->select($campo)->where($referencia,$id)->first();
    if(!empty($query)){
      $aux = ($query->$campo) ? 0 : 1 ;
      \DB::table($tabela)->where($referencia,$id)->update([$campo=>$aux]);
      
      return 'sucesso';
    }
    return 'erro';
  }

  public function deleteLine(Request $request)
  {
    $tabela=trim($request->tabela);
    $referencia= trim($request->referencia) ? trim($request->referencia) : 'id';
    $id=trim($request->id);

    if ( $tabela == 'bonfim_projeto') {
      $linha = \DB::table('bonfim_projeto')->where('id',$id)->first();
      if($linha->imagem){
          if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem); }
          \DB::table('bonfim_projeto')->where('id',$linha->id)->update(['imagem'=>'']);
      }
    }

    if ($tabela == 'bonfim_home_galeria') {
      $linha = \DB::table('bonfim_home_galeria')->where('id',$id)->first();
      if($linha->imagem){
          if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem); }
          \DB::table('bonfim_home_galeria')->where('id',$linha->id)->update(['imagem'=>'']);
      }
    }

    if ( $tabela == 'bonfim_noticias') {
      $linha = \DB::table('bonfim_noticias')->where('id',$id)->first();
      if($linha->imagem){
          if(file_exists(base_path('public_html/img/bonfim/noticias/'.$linha->imagem))){ \File::delete('../public_html/img/bonfim/noticias/'.$linha->imagem); }
          \DB::table('bonfim_noticias')->where('id',$linha->id)->update(['imagem'=>'']);
      }
    }

    if ( $tabela == 'bonfim_newsletter_conteudo_file') {
      $linha = \DB::table('bonfim_newsletter_conteudo_file')->where('id',$id)->first();
      if($linha->ficheiro){
          if(file_exists(base_path('public_html'.$linha->ficheiro))){ \File::delete('../public_html'.$linha->ficheiro); }
          \DB::table('bonfim_newsletter_conteudo_file')->where('id',$linha->id)->update(['ficheiro'=>'']);
      }
    }

   

    
    
    if(\DB::table($tabela)->where($referencia,$id)->delete()){   
      return 'sucesso'; 
    }
    return 'erro';
  }

  public function replaceDelete(Request $request)
  {
    $tabela_sub=trim($request->tabela_sub);
    $tabela_del=trim($request->tabela_del);
    $campo_sub=trim($request->campo_sub);
    $campo_del=trim($request->campo_del);
    $id_antigo=trim($request->id_antigo);
    $id_novo=trim($request->id_novo);

    \DB::table($tabela_sub)->where($campo_sub,$id_antigo)->update([$campo_sub=>$id_novo ]);
    
    if(\DB::table($tabela_del)->where($campo_del,$id_antigo)->delete()){ return 'sucesso'; }
    return 'erro';
  }


  public function orderTable(Request $request)
  {
    $tabela = trim($request->tabela);
    $referencia = trim($request->referencia) ? trim($request->referencia) : 'id';
    $campo = trim($request->campo) ? trim($request->campo) : 'ordem';
    $array = $request->linha;
    $arrayOrder = trim($request->ordem);


    $todos = 0;
    if($arrayOrder){
      $ordem = explode(",", $arrayOrder);
      $num_ordem = count($ordem);
      $num_query = \DB::table($tabela)->count();
      if($num_ordem == $num_query){ $todos = 1; }
    }

    if($arrayOrder && !$todos){
      
      $i = 0;
      foreach ($array as $value){
        \DB::table($tabela)->where($referencia,$value)->update([$campo=>$ordem[$i]]); 
        $i++; 
      }
    }else{
      
      $count = 1;
      foreach ($array as $value){
        
        \DB::table($tabela)->where($referencia,$value)->update([$campo=>$count]); 
        $count ++; 
      }
      
    }

    return 'sucesso';
  }  
  /*
  function deleteLine(){
    var id = $('#id_modal').val();
    $.ajax({
      type: "POST",
      url: '{{ route('deleteLineTM') }}',
      data: { tabela:'blog', id:'id' },
      headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
    })
    .done(function(resposta) {
      if(resposta=='sucesso'){
        $('#linha_'+id).slideUp();
      }
    });
  }
  */

}