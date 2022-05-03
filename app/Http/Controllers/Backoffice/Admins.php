<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Classes\uploadImage;
use Mail;
use Cookie;
class Admins extends Controller
{
  private $dados=[];
  
  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.adminsTitulo');
  	$this->dados['separador']="admins";
    $this->dados['funcao']="";

    $queryUsers = \DB::table('admin')
                   ->orderBy('id','DESC')
                   ->get();
    $users =[];
    foreach ($queryUsers as $valor) {

      $avatar = '<img src="'.asset('backoffice/img/admin/default.svg').'" class="table-img-circle">';
      if($valor->avatar && file_exists(base_path('public_html/backoffice/img/admin/'.$valor->avatar))){
        $avatar = '<img src="'.asset('backoffice/img/admin/'.$valor->avatar).'" class="table-img-circle">';
      }
      // tag tag-cinza/verde/ouro/turquesa/azul/roxo/rosa/vermelho/laranja/amarelo
      switch ($valor->tipo){
        case "manager": $tipo = '<span class="tag tag-ouro">'.trans('backoffice.Administrator').'</span>'; break;
        case "suporte": $tipo = '<span class="tag tag-azul">'.trans('backoffice.Support').'</span>'; break;
        case "comercial": $tipo = '<span class="tag tag-verde">'.trans('backoffice.Commercial').'</span>'; break;
        default: $tipo = '<span class="tag tag-cinza">'.$valor->tipo.'</span>';
      }
      // tag tag-cinza/verde/ouro/turquesa/azul/roxo/rosa/vermelho/laranja/amarelo
      switch ($valor->estado){
        case "ativo": $estado = '<span class="tag tag-azul">'.trans('backoffice.Active').'</span>'; break;
        case "pendente": $estado = '<span class="tag tag-amarelo">'.trans('backoffice.Pending').'</span>'; break;
        case "bloqueado": $estado = '<span class="tag tag-vermelho">'.trans('backoffice.Blocked').'</span>'; break;
        case "eliminado": $estado = '<span class="tag tag-cinza">'.trans('backoffice.Blocked').'</span>'; break;
        default: $estado = '<span class="tag tag-roxo">'.$valor->estado.'</span>';
      }

      $users[] = [
        'id' => $valor->id,
        'nome' => $valor->nome,
        'email' => $valor->email,
        'avatar' => $avatar,
        'ultimo' => $valor->ultimo_acesso ? date('Y-m-d H:i:s',$valor->ultimo_acesso) : '',
        'tipo' => $tipo,
        'estado' => $estado
      ];
    }
    $this->dados['users'] = $users;
  	return view('backoffice/pages/admins', $this->dados);
  }

  public function adminApagar(Request $request)
  {
    $id=trim($request->id);
    $linha = \DB::table('admin')
                ->where('id',$id)
                ->first();
    if(isset($linha->id) && $linha->id!=1)
    {
      if($linha->avatar && file_exists(base_path('public_html/backoffice/img/admin/'.$linha->avatar))){
        \File::delete('../public_html/backoffice/img/admin/'.$linha->avatar);
      }
      \DB::table('admin')->where('id',$linha->id)->delete();
      return 'sucesso';
    }
    return 'erro';
  }

  public function adminNew(){
    $this->dados['headTitulo']=trans('backoffice.adminsTitulo');
    $this->dados['separador']="admins";
    $this->dados['funcao']="new";

    return view('backoffice/pages/admin-new', $this->dados);
  }

  public function adminEdit($id){
    $this->dados['headTitulo']=trans('backoffice.adminsTitulo');
    $this->dados['separador']="admins";
    $this->dados['funcao']="edit";
    $this->dados['user'] = \DB::table('admin')->where('id',$id)->first();
    
    return view('backoffice/pages/admin-new', $this->dados);
  }


  public function adminForm(Request $request)
  {

    
    $id=trim($request->id);
    $nome=trim($request->nome);
    $email=filter_var(strtolower(trim($request->email)), FILTER_VALIDATE_EMAIL);
    $estado = (isset($request->estado)) ? 'bloqueado' : 'ativo';

    $img_antiga=trim($request->img_antiga);
    $ficheiro=$request->file('ficheiro');

    if(empty($email)){
      $resposta = [
        'estado' => 'erro',
        'mensagem' => trans('backoffice.invalidEmail'),
        'id' => '',
        'imagem' => '' ];
      return json_encode($resposta,true);
    }

    $linhaEmail = \DB::table('admin')->where('email',$email)->first();
    if(isset($linhaEmail) && $linhaEmail->id!=$id){
      $resposta = [
        'estado' => 'erro',
        'mensagem' => trans('backoffice.emailAlready'),
        'id' => '',
        'imagem' => '' ];
      return json_encode($resposta,true);
    }

    if($id){
      \DB::table('admin')
        ->where('id',$id)
        ->update(['nome'=>$nome,
                  'email'=>$email,
                  'estado'=>$estado ]);
      
      if(empty($img_antiga) || count($ficheiro)){
        $linha = \DB::table('admin')->where('id',$id)->first();
        if($linha->avatar){
          if(file_exists(base_path('public_html/backoffice/img/admin/'.$linha->avatar))){ \File::delete('../public_html/backoffice/img/admin/'.$linha->avatar); }
          \DB::table('admin')->where('id',$linha->id)->update(['avatar'=>'']);
        }
      }
    }else{
      $id=\DB::table('admin')
              ->insertGetId(['token'=>str_random(5).strtotime(\Carbon\Carbon::now()),
                             'nome'=>$nome,
                             'email'=>$email,
                             'estado'=>'pendente',
                             'data_registo'=>\Carbon\Carbon::now()->timestamp ]);

      $token = str_random(12);
      \DB::table('admin_pass')->insert(['email'=>$email,
                                       'token' => $token,
                                       'data'=>strtotime(date('Y-m-d H:i:s'))
      ]);
      
    
      $dados = [ 'nome'=>$nome, 'token'=>$token ];


      Mail::send('backoffice.emails.pages.new-admin',$dados, function($message) use ($request){
            
        $message->to($request->email, $request->nome)->subject('Bem-vindo');
        $message->from(config('mailAcconts.geral')['mail'],config('mailAcconts.geral')['nome']);
         
      });

    }

    $novoNome=$img_antiga;
    if(count($ficheiro)){
      $pasta = base_path('public_html/backoffice/img/admin/');
      $antigoNome='';
      
      $cache = str_random(3);
      $extensao = strtolower($ficheiro->getClientOriginalExtension());
      
      $novoNome = 'admin'.$id.'-'.$cache.'.'.$extensao;
      $width = 300; $height = 300;

      $uploadImage = New uploadImage;
      $uploadImage->upload($ficheiro,$antigoNome,$novoNome,$pasta,$width,$height);
      \DB::table('admin')->where('id',$id)->update([ 'avatar'=>$novoNome ]);
    }

    $id_user=json_decode(Cookie::get('admin_cookie'))->id;
    if($id_user==$id){
      $userDados=['id'=> $id_user,
                  'nome'=> $nome,
                  'tipo' => 'manager',
                  'token'=> json_decode(Cookie::get('admin_cookie'))->token,
                  'avatar'=> $novoNome
      ];
      $userDados=json_encode($userDados);
      Cookie::queue(Cookie::make('admin_cookie', $userDados, 43200));
    }

   
  

    $resposta = [
      'estado' => 'sucesso',
      'mensagem' => '',
      'id' => $id,
      'imagem' => $novoNome ];
    return json_encode($resposta,true);
  }



}