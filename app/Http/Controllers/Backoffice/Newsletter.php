<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Cookie;

class Newsletter extends Controller
{
  private $dados=[];
  
  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
  	$this->dados['separador']="newsletter";
    $this->dados['funcao']="";

    $this->dados['newsletter']=\DB::table('bonfim_newsletter')->get();
  	return view('backoffice/pages/newsletter', $this->dados);
  }

  public function newContactNewsletter(){
    $this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
    $this->dados['separador']="newsletter";
    $this->dados['funcao']="";

    return view('backoffice/pages/newsletter-new-contact', $this->dados);
  }

  public function sendNewsletter(){
    $this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
    $this->dados['separador']="newsletter_emails";
    $this->dados['funcao']="new";

    return view('backoffice/pages/newsletter-send', $this->dados);
  }

  public function editNewsletter($id){
    $this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
    $this->dados['separador']="newsletter_emails";
    $this->dados['funcao']="edit";

    $news = \DB::table('bonfim_newsletter_conteudo')->where('id',$id)->first();
    $this->dados['news_id'] = \DB::table('bonfim_newsletter_identificacao')->where('id',$news->id_news)->first();
    $this->dados['news_file'] = \DB::table('bonfim_newsletter_conteudo_file')->where('id_conteudo',$news->id)->get();
    $this->dados['news'] = $news;

    return view('backoffice/pages/newsletter-send', $this->dados);
  }

  public function viewNewsletter($id,$lang){

    $this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
    $this->dados['separador']="newsletter_emails";
    $this->dados['funcao']="";

    $this->dados['nome'] = \DB::table('bonfim_newsletter_identificacao')->where('id',$id)->first();
    $news = \DB::table('bonfim_newsletter_conteudo')->where('id_news',$id)->where('lingua',$lang)->first();
    $this->dados['news_file'] = \DB::table('bonfim_newsletter_conteudo_file')->where('id_conteudo',$news->id)->get();
    $this->dados['news'] = $news;
    $this->dados['lang'] = $lang;

    return view('backoffice/pages/newsletter-view', $this->dados);
  }

  public function emailsNewsletter(){
    $this->dados['headTitulo']=trans('backoffice.newslleterTitulo');
    $this->dados['separador']="newsletter_emails";
    $this->dados['funcao']="";

    $this->dados['news'] = \DB::table('bonfim_newsletter_identificacao')->get();

    return view('backoffice/pages/newsletter-emails', $this->dados);
  }

  public function newContactForm(Request $request){
    $id = trim($request->id);
    $email = trim($request->email);

    if ($id) {
      \DB::table('bonfim_newsletter')
            ->where('id',$id)
            ->update([
              'email'=>$email
            ]);

    }else{
      $id=\DB::table('bonfim_newsletter')
            ->insertGetId([
              'email'=>$email,
              'data'=>\Carbon\Carbon::now()->timestamp
            ]);
    }

    $resposta = [
      'estado' => 'sucesso',
      'id' => $id
    ];
    return json_encode($resposta,true);

  }

  public function deleteNewsletter(Request $request){
    $id = trim($request->id);

    $file = \DB::table('bonfim_newsletter_conteudo_file')->where('id_conteudo',$id)->get();

    foreach ($file as $value) {
      if(file_exists(base_path('public_html'.$value->ficheiro))){ \File::delete('../public_html'.$value->ficheiro); }
          \DB::table('bonfim_newsletter_conteudo_file')->where('id',$value->id)->update(['ficheiro'=>'']);
    }

    \DB::table('bonfim_newsletter_conteudo')->where('id',$id)->delete();  
    return 'sucesso'; 
  }

  public function sendEmailNewsletter(Request $request){

    $id = trim($request->id);

    $id_identificacao = \DB::table('bonfim_newsletter_identificacao')->where('id',$id)->first();

    $news_pt = \DB::table('bonfim_newsletter_conteudo')->where('id_news',$id)->where('lingua','pt')->first();
    $file_pt = \DB::table('bonfim_newsletter_conteudo_file')->where('id_conteudo',$news_pt->id)->get();
    $users_pt = \DB::table('bonfim_newsletter')->where('lingua','pt')->where('online',1)->get();

    $news_en = \DB::table('bonfim_newsletter_conteudo')->where('id_news',$id)->where('lingua','en')->first();
    $file_en = \DB::table('bonfim_newsletter_conteudo_file')->where('id_conteudo',$news_en->id)->get();
    $users_en = \DB::table('bonfim_newsletter')->where('lingua','en')->where('online',1)->get();

    

    $dados = ['mensagem' => $news_pt->corpo];
    foreach ($users_pt as $value) {
      \Mail::send('backoffice.emails.pages.newsletter',['dados' => $dados], function($message) use ($value,$news_pt,$file_pt){
            
        $message->to($value->email,'')->subject($news_pt->assunto);
        foreach ($file_pt as $val) {
          $file_new='https://www.255dobonfim.pt'.$val->ficheiro;
          $message->attach($file_new);
        }
        
        $message->from(config('mailAcconts.geral')['mail'],config('mailAcconts.geral')['nome']);
         
      });
    }

    $dados_en = ['mensagem' => $news_en->corpo];
    foreach ($users_en as $value) {
      \Mail::send('backoffice.emails.pages.newsletter_en',['dados' => $dados_en], function($message) use ($value,$news_en,$file_en){
            
        $message->to($value->email,'')->subject($news_en->assunto);
        foreach ($file_en as $val) {
          $file_new='https://www.255dobonfim.pt'.$val->ficheiro;
          $message->attach($file_new);
        }
        
        $message->from(config('mailAcconts.geral')['mail'],config('mailAcconts.geral')['nome']);
         
      });
    }

    return 'sucesso';
  }
  

  public function createNewsletter(Request $request){
    $nome = trim($request->nome);

    $assunto_pt = trim($request->assunto_pt) ? trim($request->assunto_pt) : '';
    $assunto_en = trim($request->assunto_en) ? trim($request->assunto_en) : '';

    $mensagem_pt = trim($request->mensagem_pt) ? trim($request->mensagem_pt) : '';
    $mensagem_en = trim($request->mensagem_en) ? trim($request->mensagem_en) : '';
    
    $ficheiro_pt = $request->file('ficheiro_pt');
    $ficheiro_en = $request->file('ficheiro_en');


    $id = trim($request->id_news);
    $lingua = trim($request->lingua);
    $id_identificacao = trim($request->id_identificacao);


 
    

    if ($id) {

      \DB::table('bonfim_newsletter_identificacao')
          ->where('id',$id_identificacao)
          ->update([
            'identificacao' => $nome,
            'data' => \Carbon\Carbon::now()->timestamp
          ]);

      if($lingua == 'pt'){
        \DB::table('bonfim_newsletter_conteudo')
            ->where('id',$id)
            ->update([
              'assunto' => $assunto_pt,
              'corpo' => $mensagem_pt,
              'data' => \Carbon\Carbon::now()->timestamp
            ]);
        $id_newsletter_pt = $id;
      }else{


        \DB::table('bonfim_newsletter_conteudo')
            ->where('id',$id)
            ->update([
              'assunto' => $assunto_en,
              'corpo' => $mensagem_en,
              'data' => \Carbon\Carbon::now()->timestamp
            ]);
        $id_newsletter_en = $id;


      }

      $id_news = $id_identificacao;

      
    }else{
      $lingua ='pt';
      if (empty($assunto_pt)) {

        $resposta = [
          'estado' => 'erro',
          'mensagem' => 'Campo assunto em PT por preencher.'
        ];
        return json_encode($resposta,true);
      }

      if (empty($mensagem_pt)) {

        $resposta = [
          'estado' => 'erro',
          'mensagem' => 'Campo mensagem em PT por preencher.'
        ];
        return json_encode($resposta,true);
      }

      if (empty($assunto_en)) {

        $resposta = [
          'estado' => 'erro',
          'mensagem' => 'Campo assunto em EN por preencher.'
        ];
        return json_encode($resposta,true);
      }

      if (empty($mensagem_en)) {

        $resposta = [
          'estado' => 'erro',
          'mensagem' => 'Campo mensagem em EN por preencher.'
        ];
        return json_encode($resposta,true);
      }

      $id_news = \DB::table('bonfim_newsletter_identificacao')
                    ->insertGetId([
                      'identificacao' => $nome,
                      'data' => \Carbon\Carbon::now()->timestamp
                    ]);


      $id_newsletter_pt = \DB::table('bonfim_newsletter_conteudo')
                              ->insertGetId([
                                'id_news' => $id_news,
                                'lingua' => 'pt',
                                'assunto' => $assunto_pt,
                                'corpo' => $mensagem_pt,
                                'data' => \Carbon\Carbon::now()->timestamp
                              ]);

      $id_newsletter_en = \DB::table('bonfim_newsletter_conteudo')
                              ->insertGetId([
                                'id_news' => $id_news,
                                'lingua' => 'en',
                                'assunto' => $assunto_en,
                                'corpo' => $mensagem_en,
                                'data' => \Carbon\Carbon::now()->timestamp
                              ]);
    }
  
    if ($ficheiro_pt) {
      foreach ($ficheiro_pt as $value) {

        $cache = str_random(3);
        $destinationPath = base_path('public_html/backoffice/files/newsletter/');
        $extension = strtolower($value->getClientOriginalExtension());
        $getName = $value->getPathName();
      
        $novo_doc = 'newsletter_pt'.$id_newsletter_pt.'_'.$cache.'.'.$extension;
        $url = '/backoffice/files/newsletter/'.$novo_doc;

        move_uploaded_file($getName, $destinationPath.$novo_doc);

        \DB::table('bonfim_newsletter_conteudo_file')
            ->insert([
              'id_conteudo'=>$id_newsletter_pt,
              'ficheiro'=>$url
            ]);
      }
    }

    if ($ficheiro_en) {
      foreach ($ficheiro_en as $value) {

        $cache = str_random(3);
        $destinationPath = base_path('public_html/backoffice/files/newsletter/');
        $extension = strtolower($value->getClientOriginalExtension());
        $getName = $value->getPathName();
      
        $novo_doc = 'newsletter_en'.$id_newsletter_en.'_'.$cache.'.'.$extension;
        $url = '/backoffice/files/newsletter/'.$novo_doc;

        move_uploaded_file($getName, $destinationPath.$novo_doc);

        \DB::table('bonfim_newsletter_conteudo_file')
            ->insert([
              'id_conteudo'=>$id_newsletter_en,
              'ficheiro'=>$url
            ]);
      }
    }
    

    $resposta = [
      'estado' => 'sucesso',
      'id' => $id_news,
      'lingua' => $lingua
    ];
    return json_encode($resposta,true);

  }
}