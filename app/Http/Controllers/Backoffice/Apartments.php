<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Classes\uploadImage;
use Cookie;

class Apartments extends Controller
{
	private $dados=[];

  	public function index(){
  		$this->dados['headTitulo']=trans('backoffice.apartmentsTitulo');
  		$this->dados['separador']="apartments";
    	$this->dados['funcao']="";

    
    	$this->dados['apartamentos'] = \DB::table('bonfim_lotes')->get();

  		return view('backoffice/pages/apartments', $this->dados);
  	}

  	public function newApart(){
  		$this->dados['headTitulo']=trans('backoffice.apartmentsTitulo');
  		$this->dados['separador']="apartments";
    	$this->dados['funcao']="new";

  		return view('backoffice/pages/apartments-new', $this->dados);
  	}

  	public function editApart($id){
  		$this->dados['headTitulo']=trans('backoffice.apartmentsTitulo');
  		$this->dados['separador']="apartments";
    	$this->dados['funcao']="edit";

    	$this->dados['apart'] = \DB::table('bonfim_lotes')->where('id',$id)->first();
    	$this->dados['imagens'] = \DB::table('bonfim_lotes_galeria')->where('id_lote',$id)->get();
    	

  		return view('backoffice/pages/apartments-new', $this->dados);
  	}

  	public function map($id_apartamento){
  		$this->dados['headTitulo']=trans('backoffice.finishMapTitulo');
  		$this->dados['separador']="apartments";
    	$this->dados['funcao']="";
    	$this->dados['id_apartamento'] = $id_apartamento;


    	$acabamentos = \DB::table('bonfim_lotes_acabamentos')->where('id_lote',$id_apartamento)->get();

    	$acabamentos_tipo = [];
    	foreach ($acabamentos as $value) {
    		$acab = \DB::table('bonfim_lotes_acabamentos_tipo')->where('id_acabamento',$value->id)->get();

    		$acaba_tip = [];
    		foreach ($acab as $val) {
    			$acaba_tip[] = [
    				'acabamento_pt' => $val->tipo_pt, 
    				'descricao_pt' => $val->descricao_pt,
    				'acabamento_en' => $val->tipo_en, 
    				'descricao_en' => $val->descricao_en
    			];
    		}
    		$acabamentos_tipo[] = [
    			'id_divisao' => $value->id,
    			'divisao_pt' => $value->divisao_pt,
    			'divisao_en' => $value->divisao_en,
    			'online' => $value->online,
    			'acabamentos' => $acaba_tip

    		];
    	}

    	$this->dados['acabamentos_tipo'] = $acabamentos_tipo;
    	
  		return view('backoffice/pages/apartments-map', $this->dados);
  	}

  	public function mapEdit($id){
  		$this->dados['headTitulo']=trans('backoffice.finishMapTitulo');
  		$this->dados['separador']="apartments";
    	$this->dados['funcao']="";

		$this->dados['id_aca']=$id;
    	$this->dados['acabamentos_tipo'] = \DB::table('bonfim_lotes_acabamentos_tipo')->where('id_acabamento',$id)->get();

    	$this->dados['acabamentos'] = \DB::table('bonfim_lotes_acabamentos')->where('id',$id)->first();
  		return view('backoffice/pages/apartments-map-edit', $this->dados);
  	}

  	public function formMapEdit(Request $request){
  		$id_acabamento = trim($request->id_acabamento);
  		$divisao_pt = trim($request->divisao_pt) ? trim($request->divisao_pt) : '';
  		$divisao_en = trim($request->divisao_en) ? trim($request->divisao_en) : '';

  		$acabamento_new_pt = trim($request->acabamento_pt) ? trim($request->acabamento_pt) : '';
  		$descricao_new_pt = trim($request->descricao_pt) ? trim($request->descricao_pt) : '';

  		$acabamento_new_en = trim($request->acabamento_en) ? trim($request->acabamento_en) : '';
  		$descricao_new_en = trim($request->descricao_en) ? trim($request->descricao_en) : '';
  		
  		\DB::table('bonfim_lotes_acabamentos')->where('id',$id_acabamento)
            ->update([
                'divisao_pt' => $divisao_pt,
                'divisao_en' => $divisao_en
            ]);

	    $tipos_acabamento = \DB::table('bonfim_lotes_acabamentos_tipo')->where('id_acabamento',$id_acabamento)->get();

	    if (isset($tipos_acabamento)) {
		
  			foreach ($tipos_acabamento as $value) {

  				$nome_acabamento_pt = 'pt_acabamento_'.$value->id;
  				$nome_descricao_pt = 'pt_descricao_'.$value->id;

  				$nome_acabamento_en = 'en_acabamento_'.$value->id;
  				$nome_descricao_en = 'en_descricao_'.$value->id;

  				$acabamento_pt = trim($request->$nome_acabamento_pt) ? trim($request->$nome_acabamento_pt): '';
	  			$descricao_pt = trim($request->$nome_descricao_pt) ? trim($request->$nome_descricao_pt): '';

	  			$acabamento_en = trim($request->$nome_acabamento_en) ? trim($request->$nome_acabamento_en) : '';
	  			$descricao_en = trim($request->$nome_descricao_en) ? trim($request->$nome_descricao_en) : '';

	  			\DB::table('bonfim_lotes_acabamentos_tipo')->where('id',$value->id)
		            ->update([
	                  'tipo_pt'=>$acabamento_pt,
	                  'tipo_en'=>$acabamento_en,
	                  'descricao_pt'=>$descricao_pt,
	                  'descricao_en'=>$descricao_en
		            ]);
  			}
  		}



  		$id_tipo = 0;
	    if (($acabamento_new_pt != '') && ($descricao_new_pt !='')) {

	    	$id_tipo = \DB::table('bonfim_lotes_acabamentos_tipo')
	            ->insertGetId([
	                  'id_acabamento'=>$id_acabamento,
	                  'tipo_pt'=>$acabamento_new_pt,
	                  'tipo_en'=>$acabamento_new_en,
	                  'descricao_pt'=>$descricao_new_pt,
	                  'descricao_en'=>$descricao_new_en
	            ]);
	    }

	    $resposta = [
  			'id_tipo' => $id_tipo,
  			'tipo' => $acabamento_new_pt,
  			'descricao' => $descricao_new_pt,
  			'tipo_en' => $acabamento_new_en,
  			'descricao_en' => $descricao_new_en,
			'estado' => 'sucesso'
      	];
    	return json_encode($resposta,true);

  	}

  	public function formMap(Request $request){
  		$id_apartamento = trim($request->id_apartamento);
  		$id_divisao = trim($request->id_divisao);
  		$divisao = trim($request->divisao);
  		$divisao_update = trim($request->divisao_update);
  		$acabamento = trim($request->acabamento) ? trim($request->acabamento) : '';
  		$descricao = trim($request->descricao) ? trim($request->descricao) : '';
  		

  		if (empty($divisao) && empty($divisao_update)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza a divisão.'
	      	];
	    	return json_encode($resposta,true);
	    }


  		if ($id_divisao) {
  			\DB::table('bonfim_lotes_acabamentos')->where('id',$id_divisao)
	            ->update([
	                  'divisao'=>$divisao_update,
	            ]);

	        $divisao = $divisao_update;

  		}else{
  			$id_divisao = \DB::table('bonfim_lotes_acabamentos')
	            ->insertGetId([
	                  'id_lote'=>$id_apartamento,
	                  'divisao'=>$divisao,
	                  'data'=>\Carbon\Carbon::now()->timestamp
	            ]);
  		}

  		$tipos_acabamento = \DB::table('bonfim_lotes_acabamentos_tipo')->where('id_acabamento',$id_divisao)->get();
		if (isset($tipos_acabamento)) {
		
  			foreach ($tipos_acabamento as $value) {

  			
  				$nome_acabamento = 'acabamento_'.$value->id;
  				$nome_descricao = 'descricao_'.$value->id;

  				$acabamento_t = $request->$nome_acabamento;
	  			$descricao_t = $request->$nome_descricao;

	  			\DB::table('bonfim_lotes_acabamentos_tipo')->where('id',$value->id)
		            ->update([
		                  'tipo'=>$acabamento_t,
		                  'descricao'=>$descricao_t
		            ]);
  			}
  		}
  		
  		$id_tipo = 0;
	    if (($acabamento != '') && ($descricao !='')) {

	    	$id_tipo = \DB::table('bonfim_lotes_acabamentos_tipo')
	            ->insertGetId([
	                  'id_acabamento'=>$id_divisao,
	                  'tipo'=>$acabamento,
	                  'descricao'=>$descricao
	            ]);
	    }

	 	
  		$resposta = [
  			'id_divisao' => $id_divisao,
  			'divisao' => $divisao,
  			'id_tipo' => $id_tipo,
  			'tipo' => $acabamento,
  			'descricao' => $descricao,
			'estado' => 'sucesso'
      	];
    	return json_encode($resposta,true);
  	}

  	public function formApart(Request $request){
  		$id = trim($request->id_apartamento);
  		$fracao = trim($request->fracao);
  		$piso = trim($request->piso);
  		$valor = trim($request->valor);
  		$area_bruta = trim($request->area_bruta);
  		$area_util = trim($request->area_util);
  		$varandas = trim($request->varandas);
  		$descricao = trim($request->descricao);
  		$wc = trim($request->wc);
  		$roupeiros = trim($request->roupeiros);
  		$arrumos = trim($request->arrumos);
  		$disponibilidade = trim($request->disponibilidade);

  		$ficheiro_antigo = $request->img_selecao_arquivo;
  		$ficheiro = $request->file('ficheiro');
  		$ficheiro_slide_antigo = $request->img_selecao_arquivo_slide;
  		$ficheiro_slide = $request->file('ficheiro_slide');

  		$ficheiro_slide_antigo_en = $request->img_selecao_arquivo_slide_en;
  		$ficheiro_slide_en = $request->file('ficheiro_slide_en');

  		$online = trim($request->online) ? 1 : 0 ;

  		$galeria = $request->file('resposta');
  		$ordem = \DB::table('bonfim_lotes_galeria')->max('ordem') + 1;

  		if (empty($fracao)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza a fração.'
	      	];
	    	return json_encode($resposta,true);
	    }

	    if (empty($piso)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza o piso.'
	      	];
	    	return json_encode($resposta,true);
	    }


	    if (empty($area_bruta)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza a área bruta.'
	      	];
	    	return json_encode($resposta,true);
	    }

	    if (empty($area_util)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza a área útil.'
	      	];
	    	return json_encode($resposta,true);
	    }

	    if (empty($varandas)) { 
  			$resposta = [
  				'estado' => 'erro',
	      		'mensagem' => 'Introduza o número de varandas.'
	      	];
	    	return json_encode($resposta,true);
	    }

	    


  		if($id){
	      \DB::table('bonfim_lotes')
	        ->where('id',$id)
	        ->update([
	        	'fracao'=>$fracao,
                  'descricao'=>$descricao,
                  'area_util'=>$area_util,
                  'varandas'=>$varandas,
                  'roupeiros' => $roupeiros,
                  'area_bruta'=>$area_bruta,
                  'piso'=>$piso,
                  'wc' => $wc,
                  'arrumos' => $arrumos,
                  'valor' => $valor,
                  'disponibilidade' => $disponibilidade,
                  'online' => $online
            ]);
	      
	      	if(empty($ficheiro_antigo) || count($ficheiro)){

	        	$linha = \DB::table('bonfim_lotes')->where('id',$id)->first();
	        	if($linha->imagem_planta){
	          		if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem_planta))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem_planta); }
	          		\DB::table('bonfim_lotes')->where('id',$linha->id)->update(['imagem_planta'=>'']);
	        	}
	      	}

	      	if(empty($ficheiro_slide_antigo) || count($ficheiro_slide)){
	      		
	        	$linha = \DB::table('bonfim_lotes')->where('id',$id)->first();
	        	if($linha->imagem_home_pt){
	          		if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem_home_pt))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem_home_pt); }
	          		\DB::table('bonfim_lotes')->where('id',$linha->id)->update(['imagem_home_pt'=>'']);
	        	}
	      	}

	      	if(empty($ficheiro_slide_antigo_en) || count($ficheiro_slide_en)){
	      		
	        	$linha = \DB::table('bonfim_lotes')->where('id',$id)->first();
	        	if($linha->imagem_home_en){
	          		if(file_exists(base_path('public_html/img/bonfim/'.$linha->imagem_home_en))){ \File::delete('../public_html/img/bonfim/'.$linha->imagem_home_en); }
	          		\DB::table('bonfim_lotes')->where('id',$linha->id)->update(['imagem_home_en'=>'']);
	        	}
	      	}

	    }else{
      		$id=\DB::table('bonfim_lotes')
                    ->insertGetId([
                          'fracao'=>$fracao,
		                  'descricao'=>$descricao,
		                  'area_util'=>$area_util,
		                  'varandas'=>$varandas,
		                  'roupeiros' => $roupeiros,
		                  'area_bruta'=>$area_bruta,
		                  'piso'=>$piso,
		                  'wc' => $wc,
                  		  'arrumos' => $arrumos,
		                  'valor' => $valor,
		                  'disponibilidade' => $disponibilidade,
		                  'data'=>\Carbon\Carbon::now()->timestamp,
		                  'online' => $online
                    ]);
    	}


  		$novoNome=$ficheiro_antigo;
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
	      \DB::table('bonfim_lotes')->where('id',$id)->update([ 'imagem_planta'=>'/img/bonfim/'.$novoNome ]);
	    }


	    $novoNome_slide=$ficheiro_slide_antigo;
	    if(count($ficheiro_slide)){
	      $pasta = base_path('public_html/img/bonfim/');
	      $getName =$ficheiro_slide->getPathName();
	      $antigoNome_slide='';
	      
	      $cache = str_random(3);
	      $extensao = strtolower($ficheiro_slide->getClientOriginalExtension());
	      
	      $novoNome_slide = 'planta_slide'.$id.'-'.$cache.'.'.$extensao;
	      //$width = 300; $height = 300;

	      move_uploaded_file($getName, $pasta.$novoNome_slide); 
	      //$uploadImage = New uploadImage;
	      //$uploadImage->upload($ficheiro_slide,$antigoNome_slide,$novoNome_slide,$pasta,$width,$height);
	      \DB::table('bonfim_lotes')->where('id',$id)->update([ 'imagem_home_pt'=>'/img/bonfim/'.$novoNome_slide ]);
	    }


	    $novoNome_slide_en=$ficheiro_slide_antigo_en;
	    if(count($ficheiro_slide_en)){
	      $pasta = base_path('public_html/img/bonfim/');
	      $getName =$ficheiro_slide_en->getPathName();
	      $antigoNome_slide='';
	      
	      $cache = str_random(3);
	      $extensao = strtolower($ficheiro_slide_en->getClientOriginalExtension());
	      
	      $novoNome_slide_en = 'planta_slide_en'.$id.'-'.$cache.'.'.$extensao;
	      //$width = 300; $height = 300;

	      move_uploaded_file($getName, $pasta.$novoNome_slide_en); 
	      //$uploadImage = New uploadImage;
	      //$uploadImage->upload($ficheiro_slide,$antigoNome_slide,$novoNome_slide,$pasta,$width,$height);
	      \DB::table('bonfim_lotes')->where('id',$id)->update([ 'imagem_home_en'=>'/img/bonfim/'.$novoNome_slide_en ]);
	    }


	    $resposta_galeria = [];
	    if ($galeria) {
	        foreach ($galeria as $file) {
	          	$novoNome_galeria='';
	          	if(count($file)){
	            	$antigoNome='';
	            	$cache = str_random(3);
	            	$extensao = strtolower($file->getClientOriginalExtension());
	            	$getName =$file->getPathName();

	            	$novoNome_galeria = 'galeria_'.$id.'_'.$cache.'.'.$extensao;


	            	$pasta = base_path('public_html/img/bonfim/');
	            	//$width = 300; $height = 300;

	            	move_uploaded_file($getName, $pasta.$novoNome_galeria); 

	            	//$uploadImage = New uploadImage;
	            	//$uploadImage->upload($file,$antigoNome,$novoNome_galeria,$pasta,$width,$height);
	          	}
	          	$resposta_galeria[] = '/img/bonfim/'.$novoNome_galeria;
	        }
	    }
	    if ($resposta_galeria) {
	        foreach ($resposta_galeria as $value) {
	          	if ($value) {
	            	\DB::table('bonfim_lotes_galeria')->insert([
	              		'id_lote' => $id,
	              		'img' => $value,
	              		'ordem' => $ordem
	            	]);
	          	}
	        }
	    }

	    $resposta = [
	      'estado' => 'sucesso',
	      'id' => $id,
	      'imagem' => $novoNome,
	      'imagem_slide' => $novoNome_slide,
	      'imagem_slide_en' => $novoNome_slide_en ];
	    return json_encode($resposta,true);
  	}
}