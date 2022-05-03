<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Classes\uploadImage;
use Cookie;

class News extends Controller
{
  private $dados=[];

  /**************
  *  NOTICIAS   *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.newsTitulo');
  	$this->dados['separador']="news";
    $this->dados['funcao']="";

    $this->dados['news'] = \DB::table('bonfim_noticias')->get();

  	return view('backoffice/pages/news', $this->dados);
  }

  public function newNews(){
    $this->dados['headTitulo']=trans('backoffice.newsTitulo');
    $this->dados['separador']="news";
    $this->dados['funcao']="new";

    return view('backoffice/pages/news-new', $this->dados);
  }

  public function editNews($id){
    $this->dados['headTitulo']=trans('backoffice.newsTitulo');
    $this->dados['separador']="news";
    $this->dados['funcao']="new";

    $this->dados['news'] = \DB::table('bonfim_noticias')->where('id',$id)->first();

    return view('backoffice/pages/news-new', $this->dados);
  }

  public function formNew(Request $request){

    $id = trim($request->id_new);
    $titulo_pt = trim($request->titulo_pt) ? trim($request->titulo_pt) : '';
    $titulo_en = trim($request->titulo_en) ? trim($request->titulo_en) : '';
    $primeiro_texto_pt = trim($request->primeiro_texto_pt) ? trim($request->primeiro_texto_pt) : '';
    $primeiro_texto_en = trim($request->primeiro_texto_en) ? trim($request->primeiro_texto_en) : '';
    $segundo_texto_pt = trim($request->segundo_texto_pt) ? trim($request->segundo_texto_pt) : '';
    $segundo_texto_en = trim($request->segundo_texto_en) ? trim($request->segundo_texto_en) : '';
    $data_noticia_pt = trim($request->data_noticia_pt) ? trim($request->data_noticia_pt) : '';
    $data_noticia_en = trim($request->data_noticia_en) ? trim($request->data_noticia_en) : '';
    $online = trim($request->online) ? 1 : 0 ;
    $link_pt = trim($request->link_pt) ? trim($request->link_pt) : '';
    $link_en = trim($request->link_en) ? trim($request->link_en) : '';

    $ficheiro_antigo = $request->imagem;
    $ficheiro = $request->file('ficheiro');

    //$partes_texto = explode(".", $primeiro_texto);
    //$numero_palavras = str_word_count($partes_texto[0]) + str_word_count($partes_texto[1]);
    

    $arr = explode(' ',trim($primeiro_texto_pt));
    $palavra = '';
    if (str_word_count($primeiro_texto_pt) > 35) {
      for ($i=0; $i <=35 ; $i++) { 
        $palavra = $palavra.' '.$arr[$i];
      }
      $texto_slide = $palavra.' ...';
    }else{
      $texto_slide = $primeiro_texto_pt;
    }

    $arr_titulo = explode(' ',trim($titulo_pt));
    $palavra_titulo = '';

    if (str_word_count($titulo_pt) > 7) {
      for ($i=0; $i <=7 ; $i++) { 
        $palavra_titulo = $palavra_titulo.' '.$arr_titulo[$i];
      }

      $titulo_slide = $palavra_titulo.' ...';
    }else{
      $titulo_slide = $titulo_pt;
    }


    //INGLES

    $arr_EN = explode(' ',trim($primeiro_texto_en));
    $palavra_EN = '';
    if (str_word_count($primeiro_texto_en) > 35) {
      for ($i=0; $i <=35 ; $i++) { 
        $palavra_EN = $palavra_EN.' '.$arr_EN[$i];
      }
      $texto_slide_EN = $palavra_EN.' ...';
    }else{
      $texto_slide_EN = $primeiro_texto_en;
    }


    $arr_titulo_en = explode(' ',trim($titulo_en));
    $palavra_titulo_en = '';

    if (str_word_count($titulo_en) > 7) {
      for ($i=0; $i <=7 ; $i++) { 
        $palavra_titulo_en = $palavra_titulo_en.' '.$arr_titulo_en[$i];
      }

      $titulo_slide_en = $palavra_titulo_en.' ...';
    }else{
      $titulo_slide_en = $titulo_en;
    }



    /*$texto_slide = $primeiro_texto;
    if(( !empty($partes_texto[0]) && !empty($partes_texto[1]) ) && ($numero_palavras <= 65)){

      $texto_slide = $partes_texto[0].'. '.$partes_texto[1].'.';
    }
    else if ($partes_texto[0]) {

      $texto_slide = $partes_texto[0].'.';

    }*/
    
    
    if (empty($titulo_pt)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza o título em PT.'
        ];
      return json_encode($resposta,true);
    }

    if (empty($titulo_en)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza o título em EN.'
        ];
      return json_encode($resposta,true);
    }

    

    if (empty($primeiro_texto_pt)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza o primeiro texto em PT.'
        ];
      return json_encode($resposta,true);
    }

    if (empty($primeiro_texto_en)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza o primeiro texto em EN.'
        ];
      return json_encode($resposta,true);
    }


    if (empty($data_noticia_pt)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza a data da notícia em PT.'
        ];
      return json_encode($resposta,true);
    }

    if (empty($data_noticia_en)) { 
      $resposta = [
        'estado' => 'erro',
          'mensagem' => 'Introduza a data da notícia em EN.'
        ];
      return json_encode($resposta,true);
    }

    

    $content_primeiro = preg_replace('~\s*<br ?/?>\s*~',"<br>",$primeiro_texto_pt);
    $content_primeiro = nl2br($content_primeiro);

    $content_primeiro_en = preg_replace('~\s*<br ?/?>\s*~',"<br>",$primeiro_texto_en);
    $content_primeiro_en = nl2br($content_primeiro_en);

    $content_segundo = preg_replace('~\s*<br ?/?>\s*~',"<br>",$segundo_texto_pt);
    $content_segundo = nl2br($content_segundo);

    $content_segundo_en = preg_replace('~\s*<br ?/?>\s*~',"<br>",$segundo_texto_en);
    $content_segundo_en = nl2br($content_segundo_en);


    //Rasgao
    $id_rasgao = \DB::table('bonfim_noticias')->max('id');
    $query_rasgao = \DB::table('bonfim_noticias')->where('id',$id_rasgao)->first();
    

    
    if($id){
      
      \DB::table('bonfim_noticias')
        ->where('id',$id)
        ->update([
          'titulo_pt' => $titulo_pt,
          'titulo_en' => $titulo_en,
          'data_noticia_pt' => $data_noticia_pt,
          'data_noticia_en' => $data_noticia_en,
          'primeiro_texto_pt' => $primeiro_texto_pt,
          'primeiro_texto_en' => $primeiro_texto_en,
          'segundo_texto_pt' => $content_segundo,
          'segundo_texto_en' => $content_segundo_en,
          'link_pt' => $link_pt,
          'link_en' => $link_en,
          'online' => $online
        ]);

      \DB::table('bonfim_noticias_slide')
        ->where('id_noticia',$id)
        ->update([
          'titulo_pt' => $titulo_slide,
          'titulo_en' => $titulo_slide_en, 
          'texto_pt' => $texto_slide,
          'texto_en' => $texto_slide_EN
        ]);
      
        if(empty($ficheiro_antigo) || count($ficheiro)){

          $linha = \DB::table('bonfim_noticias')->where('id',$id)->first();
          if($linha->imagem){
              if(file_exists(base_path('public_html/img/bonfim/noticias/'.$linha->imagem))){ \File::delete('../public_html/img/bonfim/noticias/'.$linha->imagem); }
              \DB::table('bonfim_noticias')->where('id',$linha->id)->update(['imagem'=>'']);
          }
        }
    }else{

      $id=\DB::table('bonfim_noticias')
              ->insertGetId([
                'titulo_pt'=>$titulo_pt,
                'titulo_en' => $titulo_en,
                'data_noticia_pt'=>$data_noticia_pt,
                'data_noticia_en' => $data_noticia_en,
                'primeiro_texto_pt'=>$content_primeiro,
                'primeiro_texto_en' => $primeiro_texto_en,
                'segundo_texto_pt'=>$content_segundo,
                'segundo_texto_en' => $content_segundo_en,
                'link_pt' => $link_pt,
                'link_en' => $link_en,
                'data'=>\Carbon\Carbon::now()->timestamp,
                'online' => $online
              ]);

      \DB::table('bonfim_noticias_slide')
        ->insert([
          'id_noticia'=> $id,
          'titulo_pt' => $titulo_slide,
          'titulo_en' => $titulo_slide_en, 
          'texto_pt' => $texto_slide,
          'texto_en' => $texto_slide_EN
        ]);

    }

    $novoNome_=$ficheiro_antigo;
    if(count($ficheiro)){
      $pasta = base_path('public_html/img/bonfim/noticias/');
      $antigoNome='';
      
      $cache = str_random(3);
      $extensao = strtolower($ficheiro->getClientOriginalExtension());
      
      $novoNome = 'noticia'.$id.'-'.$cache.'.'.$extensao;
      $width = 1000; $height = 1000;

      $uploadImage = New uploadImage;
      $uploadImage->upload($ficheiro,$antigoNome,$novoNome,$pasta,$width,$height);
      \DB::table('bonfim_noticias')->where('id',$id)->update([ 'imagem'=>'/img/bonfim/noticias/'.$novoNome ]);
      $novoNome_='/img/bonfim/noticias/'.$novoNome;
    }

    $resposta = [
      'estado' => 'sucesso',
      'id' => $id,
      'imagem' => $novoNome_];
    return json_encode($resposta,true);

  }
}