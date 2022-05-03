<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Classes\uploadImage;
use Cookie;

class Website extends Controller
{
  private $dados=[];
  
  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.websiteTitulo');
  	$this->dados['separador']="info";
    $this->dados['funcao']="";

    $this->dados['projeto']=\DB::table('bonfim_projeto')->get();
  	return view('backoffice/pages/website-info', $this->dados);
  }

  public function addImgProjeto(){
    $this->dados['headTitulo']=trans('backoffice.websiteTitulo');
    $this->dados['separador']="info";
    $this->dados['funcao']="new";

    return view('backoffice/pages/website-new-info', $this->dados);
  }

  public function editImgProjeto($id){
    $this->dados['headTitulo']=trans('backoffice.websiteTitulo');
    $this->dados['separador']="info";
    $this->dados['funcao']="edit";

    $this->dados['projeto']=\DB::table('bonfim_projeto')->where('id',$id)->first();
    return view('backoffice/pages/website-new-info', $this->dados);
  }

  public function barraP(){
    $this->dados['headTitulo']=trans('backoffice.websiteTitulo');
    $this->dados['separador']="timeline";
    $this->dados['funcao']="";


    $barra=\DB::table('barra_progressao')->first();

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $data_inicio = strftime('%B, %Y', $barra->data_inicio);
    $data_fim = strftime('%B, %Y', $barra->data_fim);

    $startDate = strtotime(date('Y/m/d/',$barra->data_inicio));
    $endDate   = strtotime(date('Y/m/d/',$barra->data_fim));

    $currentDate = $endDate;

    $array = [];
    while ($currentDate >= $startDate) {
      $array[] = ['data' => $currentDate];
        
        $currentDate = strtotime( date('Y/m/28/',$currentDate).' -1 month');
    }

    sort($array);

    $this->dados['barra_fase']=\DB::table('barra_progressao_fase')->get();
    $this->dados['data_inicio'] = $data_inicio;
    $this->dados['data_fim'] = $data_fim;
    $this->dados['array'] = $array;
    $this->dados['barra'] = $barra;
    return view('backoffice/pages/website-timeline', $this->dados);
  }


  public function galeriaHome(){
    $this->dados['headTitulo']='Galeria Home';
    $this->dados['separador']="galeria_home";
    $this->dados['funcao']="edit";

    $this->dados['galeria']=\DB::table('bonfim_home_galeria')->get();
    return view('backoffice/pages/website-home-galeria', $this->dados);
  }

  public function galeriaHomeNew(){
    $this->dados['headTitulo']='Galeria Home';
    $this->dados['separador']="galeria_home";
    $this->dados['funcao']="new";

    return view('backoffice/pages/website-home-galeria-new', $this->dados);
  }

  public function saveGaleriaHome(Request $request){

    //return $request->file('imagem');


    $galeria = $request->file('imagem');
    $online = trim($request->online) ? trim($request->online) : 0;

    
   
    $resposta_galeria = [];
    if ($galeria) {
      foreach ($galeria as $file) {
        $imagem_fullscreen='';
        $imagem_xs='';

        if(count($file)){
          $pasta = base_path('public_html/img/bonfim/');
          $antigoNome='';
          
          $cache = str_random(3);
          $extensao = strtolower($file->getClientOriginalExtension());
          
          $imagem_xs = 'galeria_home_xs_'.$cache.'.'.$extensao;
          $width = 1000; $height = 554;

          $uploadImage = New uploadImage;
          $uploadImage->upload($file,$antigoNome,$imagem_xs,$pasta,$width,$height);
    
        }


        if(count($file)){

          
          $antigoNome='';
          $cache = str_random(3);
          $extensao = strtolower($file->getClientOriginalExtension());
          $getName =$file->getPathName();

          $imagem_fullscreen = 'galeria_home_fullscreean_'.$cache.'.'.$extensao;


          $pasta = base_path('public_html/img/bonfim/');
   

          move_uploaded_file($getName, $pasta.$imagem_fullscreen); 

          




        }


        


        $resposta_galeria[] = [
          'imagem_fullscreen' => '/img/bonfim/'.$imagem_fullscreen,
          'imagem_xs' => '/img/bonfim/'.$imagem_xs
        ];
      }
    }

    
   
   if ($resposta_galeria) {
      foreach ($resposta_galeria as $value) {
          if ($value) {
            \DB::table('bonfim_home_galeria')->insert([
                'imagem_fullscreen' => $value['imagem_fullscreen'],
                'imagem' => $value['imagem_xs'],
                'online' => $online
            ]);
          }
      }
    }



    $resposta = [
      'estado' => 'sucesso'
    ];
    return json_encode($resposta,true);

  }

  public function barraEdit(Request $request){

    $barra=\DB::table('barra_progressao')->first();

    $fase_new_pt = trim($request->fase_pt) ? trim($request->fase_pt) : '';
    $fase_new_en = trim($request->fase_en) ? trim($request->fase_en) : '';
    $estado_new_pt = trim($request->estado_pt) ? trim($request->estado_pt) : '';
    $estado_new_en = trim($request->estado_en) ? trim($request->estado_en) : '';

    $data_inicio_new = $request->data_inicio_new ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->data_inicio_new)->timestamp : $barra->data_inicio;
    $data_conclusao_new = $request->data_conclusao_new ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->data_conclusao_new)->timestamp : $barra->data_fim;

    $barra_fase=\DB::table('barra_progressao_fase')->get();

    foreach ($barra_fase as $value) {
      $nome_fase_pt = 'pt_fase_'.$value->id;
      $nome_fase_en = 'en_fase_'.$value->id;
      $nome_data = 'data_inicio_'.$value->id;
      $nome_data_conclusao = 'data_conclusao_'.$value->id;
      $nome_estado_pt = 'pt_estado_'.$value->id;
      $nome_estado_en = 'en_estado_'.$value->id;
      

      $fase_pt = trim($request->$nome_fase_pt) ? trim($request->$nome_fase_pt) : '';
      $fase_en = trim($request->$nome_fase_en) ? trim($request->$nome_fase_en) : '';
      $data_inicio = $request->$nome_data ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->$nome_data)->timestamp : \Carbon\Carbon::now()->timestamp;
      $data_conclusao = $request->$nome_data_conclusao ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->$nome_data_conclusao)->timestamp : \Carbon\Carbon::now()->timestamp;
      $estado_pt = trim($request->$nome_estado_pt) ? trim($request->$nome_estado_pt) : '';
      $estado_en = trim($request->$nome_estado_en) ? trim($request->$nome_estado_en) : '';

     
      \DB::table('barra_progressao_fase')
          ->where('id',$value->id)
          ->update([
            'fase_pt' => $fase_pt, 
            'fase_en' => $fase_en, 
            'estado_pt' => $estado_pt,
            'estado_en' => $estado_en,
            'data_inicio' => $data_inicio,
            'data_fim' => $data_conclusao,
            'percentagem' => 0
          ]); 

        
    }

    if (($fase_new_pt != '') && ($fase_new_en != '')) {

      $id = \DB::table('barra_progressao_fase')
        ->insertGetId([
          'fase_pt' => $fase_new_pt,
          'fase_en' => $fase_new_en,
        ]);

      \DB::table('barra_progressao_fase')
          ->where('id',$id)
          ->update([
            'estado_pt' => $estado_new_pt,
            'estado_en' => $estado_new_en,
            'data_inicio' => $data_inicio_new,
            'data_fim' => $data_conclusao_new
          ]);
    }

    $data_inicio_obra = $request->data_inicio_obra ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->data_inicio_obra)->timestamp : \Carbon\Carbon::now()->timestamp;
    $data_conclusao_obra = $request->data_conclusao_obra ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->data_conclusao_obra)->timestamp : \Carbon\Carbon::now()->timestamp;
    
    \DB::table('barra_progressao')->update(['data_inicio' => $data_inicio_obra,'data_fim' => $data_conclusao_obra ]);

    $resposta = ['estado' => 'sucesso'];
    return json_encode($resposta,true);
  }

  public function addImgForm(Request $request){
    $id = trim($request->id_img);
    $descricao_pt = trim($request->descricao_pt);
    $descricao_en = trim($request->descricao_en);

    $online = trim($request->online) ? 1 : 0 ;

    $ficheiro_antigo = $request->imagem_antiga;
    $ficheiro = $request->file('ficheiro');

    $ficheiro_antigo_en = $request->imagem_antiga_en;
    $ficheiro_en = $request->file('ficheiro_en');

    if($id){
      \DB::table('bonfim_projeto')
        ->where('id',$id)
        ->update([
          'descricao_pt'=>$descricao_pt,
          'descricao_en'=>$descricao_en,
          'online' => $online
        ]);
      
      if(empty($ficheiro_antigo) || count($ficheiro)){

        $linha = \DB::table('bonfim_projeto')->where('id',$id)->first();
        if($linha->imagem_pt){
            if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem_pt))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem_pt); }
            \DB::table('bonfim_projeto')->where('id',$linha->id)->update(['imagem_pt'=>'']);
        }
      }

      if(empty($ficheiro_antigo_en) || count($ficheiro_en)){

        $linha = \DB::table('bonfim_projeto')->where('id',$id)->first();
        if($linha->imagem_en){
            if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem_en))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem_en); }
            \DB::table('bonfim_projeto')->where('id',$linha->id)->update(['imagem_en'=>'']);
        }
      }

    }else{
      $id=\DB::table('bonfim_projeto')
              ->insertGetId([
                'descricao_pt'=>$descricao_pt,
                'descricao_en'=>$descricao_en,
                'online' => $online
              ]);
    }


    $novoNome_=$ficheiro_antigo;
    if(count($ficheiro)){
      $pasta = base_path('public_html/img/bonfim/');
      $getName =$ficheiro->getPathName();
      $antigoNome='';
      
      $cache = str_random(3);
      $extensao = strtolower($ficheiro->getClientOriginalExtension());
      
      $novoNome = 'planta'.$id.'-'.$cache.'.'.$extensao;
      //$width = 300; $height = 300;

       move_uploaded_file($getName, $pasta.$novoNome); 
      //$uploadImage = New uploadImage;
      //$uploadImage->upload($ficheiro,$antigoNome,$novoNome,$pasta,$width,$height);
      \DB::table('bonfim_projeto')->where('id',$id)->update([ 'imagem_pt'=>'/img/bonfim/'.$novoNome ]);
      $novoNome_='/img/bonfim/'.$novoNome;



          

    }


    $novoNome_en=$ficheiro_antigo_en;
    if(count($ficheiro_en)){
      $pasta = base_path('public_html/img/bonfim/');
      $getName =$ficheiro_en->getPathName();
      $antigoNome='';
      
      $cache = str_random(3);
      $extensao = strtolower($ficheiro_en->getClientOriginalExtension());
      
      $novoNome_en = 'planta_en'.$id.'-'.$cache.'.'.$extensao;

      move_uploaded_file($getName, $pasta.$novoNome_en); 

      //$width = 300; $height = 300;

      //$uploadImage = New uploadImage;
      //$uploadImage->upload($ficheiro_en,$antigoNome,$novoNome_en,$pasta,$width,$height);
      \DB::table('bonfim_projeto')->where('id',$id)->update([ 'imagem_en'=>'/img/bonfim/'.$novoNome_en ]);
      $novoNome_en='/img/bonfim/'.$novoNome_en;
    }


    $resposta = [
      'estado' => 'sucesso',
      'id' => $id,
      'imagem' => $novoNome_,
      'imagem_en' => $novoNome_en
    ];
    return json_encode($resposta,true);
  }
}