<?php
namespace App\Http\Controllers\Bonfim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Session;
class Home extends Controller
{
    private $dados = [];

    public function index()
    {
        $this->dados['headTitulo'] = 'Bonfim';
        $this->dados['headDescricao'] = trans('metatags.d_home');
        $this->dados['headPagina'] = 'Bonfim';
        $this->dados['faceTipo'] = 'website';
        $this->dados['lingua'] = Session::get('locale');

        $this->lang = Session::get('locale');


        $this->dados['apartamentos'] = \DB::table('bonfim_lotes')->select('*','imagem_home_'.$this->lang.' AS imagem_home')->where('online',1)->get();
        $this->dados['galeria_home'] = \DB::table('bonfim_home_galeria')->get();

        //Rasgao A|B|C
        $noticias_all = \DB::table('bonfim_noticias')->where('online',1)->get();
        $noticias_max =\DB::table('bonfim_noticias')->orderBy('id', 'DESC')->first();

 

        foreach ($noticias_all as $value) {
            $noticia_antes = \DB::table('bonfim_noticias')->where('id','<',$value->id)->where('online',1)->orderBy('id','DESC')->first();

            $noticia_atual = \DB::table('bonfim_noticias')->where('id',$value->id)->first();
     
            if (isset($noticia_antes->id)) {

                if ($noticia_antes->imagem_rasgao == 'C') {
                    $imagem_rasgao = 'B';
                }else if($noticia_antes->imagem_rasgao == 'B'){
                    $imagem_rasgao = 'A';
                }
                else if($noticia_antes->imagem_rasgao == 'A'){
                    $imagem_rasgao = 'C';
                }
                if ($value->id == $noticias_max->id && $noticia_atual->imagem_rasgao == 'C') {
                    $imagem_rasgao = 'A';
                }
                \DB::table('bonfim_noticias')->where('id',$value->id)->update(['imagem_rasgao' => $imagem_rasgao]);
            }else{
                \DB::table('bonfim_noticias')->where('id',$value->id)->update(['imagem_rasgao' => 'C']);
            }
            
        }

        $noticias = \DB::table('bonfim_noticias')->select('*','titulo_'.$this->lang.' AS titulo','data_noticia_'.$this->lang.' AS data_noticia')->where('online',1)->orderBy('data','DESC')->get();

        $array_noticia = [];
        foreach ($noticias as $value) {

            $img = '/img/bonfim/slide/rasgo_papel_C.png';
            if ($value->imagem_rasgao == 'A') {
                $img = '/img/bonfim/slide/rasgo_papel_A.png';
            }elseif($value->imagem_rasgao == 'B'){
                $img = '/img/bonfim/slide/rasgo_papel_B.png';
            }

            $array_noticia[] = [
                'id' => $value->id,
                'titulo' => $value->titulo,
                'data_noticia' => $value->data_noticia,
                'rasgao' =>$img
            ];
        }

        $this->dados['noticias'] = $array_noticia;

        $this->dados['projetos'] = \DB::table('bonfim_projeto')->select('*','imagem_'.$this->lang.' AS imagem','imagem_sem_resolucao_'.$this->lang.' AS imagem_sem_resolucao','descricao_'.$this->lang.' AS descricao')->where('online',1)->orderBy('ordem','ASC')->get();

        $this->dados['projeto_ficha'] = \DB::table('projeto')->select('*','ficha_tecnica_'.$this->lang.' AS ficha_tecnica')->where('nome','bonfim')->first();


        //TimeLine
        $barra=\DB::table('barra_progressao')->first();

        if($this->lang == 'pt'){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
        }        


        $data_inicio = strftime('%h %g', $barra->data_inicio);
        $data_fim = strftime('%h %g', $barra->data_fim);

        /*$startDate = strtotime(date('Y/m/d/',$barra->data_inicio));
        $endDate   = strtotime(date('Y/m/d/',$barra->data_fim));

        $currentDate = $endDate;

        $array = [];
        while ($currentDate >= $startDate) {
          $array[] = ['data' => $currentDate];
            
            $currentDate = strtotime( date('Y/m/28/',$currentDate).' -1 month');
        }

        sort($array);*/


        //Timeline - divisão das fases
        $fases=\DB::table('barra_progressao_fase')->select('*','fase_'.$this->lang.' AS fase','estado_'.$this->lang.' AS estado')->get();

        $primeira_fase=\DB::table('barra_progressao_fase')->select('*','fase_'.$this->lang.' AS fase','estado_'.$this->lang.' AS estado')->first();

        $mes_incio_obra = date('m',$barra->data_inicio);
        $mes_incio_primeira = date('m',$primeira_fase->data_inicio);

        $calc_incio = ($mes_incio_primeira - $mes_incio_obra) * 47;

        $dia_hoje = \Carbon\Carbon::now()->timestamp;
        $width_verde_inicio = '100';
        if (($dia_hoje > $barra->data_inicio) && ($dia_hoje <= $primeira_fase->data_inicio)) {
            $dia = date('d',$dia_hoje);
            $dia_inicio = date('d',$barra->data_inicio);

            if ($dia == $dia_inicio) {
                $width_verde_inicio = '0';
            }
            elseif ($dia <= 3) {
                $width_verde_inicio = '10';
            }elseif(($dia > 3) && ($dia <= 7)){
                $width_verde_inicio = '20';
            }
            elseif(($dia > 7) && ($dia <= 10)){
                $width_verde_inicio = '30';
            }
            elseif(($dia > 10) && ($dia <= 14)){
                $width_verde_inicio = '40';
            }
            elseif ($dia == 15) {
                $width_verde_inicio = '50';
            }
            elseif(($dia > 15) && ($dia <= 18)){
                $width_verde_inicio = '60';
            }
            elseif(($dia > 18) && ($dia <= 23)){
                $width_verde_inicio = '70';
            }
            elseif(($dia > 23) && ($dia <= 26)){
                $width_verde_inicio = '80';
            }
            elseif(($dia > 26) && ($dia <= 29)){
                $width_verde_inicio = '90';
            }
            elseif(($dia > 29) && ($dia <= 31)){
                $width_verde_inicio = '100';
            }
        }

        if ($width_verde_inicio == 100) {
            $color_texto_inicio = '#36B289';
        }else{
            $color_texto_inicio = '#192533';
        }
        

        $array_fases = [];
        $cont_percentagem = 0;
        foreach ($fases as $key => $value) {
            $mes_incio = date('m',$value->data_inicio);
            $mes_fim = date('m',$value->data_fim);

            if ($mes_fim >= $mes_incio) {
                $calc = $mes_fim - $mes_incio;
            }else{
                $calc = $mes_incio - $mes_fim;
            }
            

            if ($calc == 0) {
                $calc = 1;
            }

            $width = $calc*47;

            $data_inicio_fase = strftime('%h %g', $value->data_inicio);

            $width_verde = '100';
            if (($dia_hoje >= $value->data_inicio) && ($dia_hoje < $value->data_fim)) {
                $dia = date('d',$dia_hoje);
                $dia_inicio = date('d',$value->data_inicio);


                if ($dia == $dia_inicio) {
                    $width_verde = '0';
                }
                elseif ($dia <= 3) {
                    $width_verde = '10';
                }elseif(($dia > 3) && ($dia <= 7)){
                    $width_verde = '20';
                }
                elseif(($dia > 7) && ($dia <= 10)){
                    $width_verde = '30';
                }
                elseif(($dia > 10) && ($dia <= 14)){
                    $width_verde = '40';
                }
                elseif ($dia == 15) {
                    $width_verde = '50';
                }
                elseif(($dia > 15) && ($dia <= 18)){
                    $width_verde = '60';
                }
                elseif(($dia > 18) && ($dia <= 23)){
                    $width_verde = '70';
                }
                elseif(($dia > 23) && ($dia <= 26)){
                    $width_verde = '80';
                }
                elseif(($dia > 26) && ($dia <= 29)){
                    $width_verde = '90';
                }
                elseif(($dia > 29) && ($dia <= 31)){
                    $width_verde = '100';
                }
            }elseif($dia_hoje < $value->data_inicio){
                $width_verde = '0';
            }

            if($width_verde > 0){
                $color_texto = '#36B289';
                $img_visto = '/img/bonfim/timeline/visto_verde.svg';
            }else{
                $color_texto = '#192533';
                $img_visto = '/img/bonfim/timeline/visto_cinza.svg';
            }

            $array_fases [] = [
                'id' => $value->id,
                'fase' => $value->fase, 
                'estado' => $value->estado, 
                'largura_barra' => $width,
                'data_inicio' => $data_inicio_fase,
                'barra_verde' => $width_verde,
                'img_visto' => $img_visto,
                'color_texto' => $color_texto
            ];


            //PERCENTAGEM FINAL
            
            if ($dia_hoje >= $value->data_inicio) {
                $cont_percentagem ++;
            }  
      
        }

        $n_total_fases=\DB::table('barra_progressao_fase')->count();
       
        $percentagem_final = (100 * $cont_percentagem)/$n_total_fases;


        $obra_inicio = $barra->data_inicio;
        $obra_fim = $barra->data_fim;

        $datediff = $obra_fim - $obra_inicio;
        $total_dias = round($datediff / (60 * 60 * 24));

        $total_dias_percentagem = (100/$total_dias);


        $date_momento = $dia_hoje - $obra_inicio;
        $total_dias_momento = round($date_momento / (60 * 60 * 24));

        $percentagem_momento = round($total_dias_momento * $total_dias_percentagem);

       
        
        $this->dados['array_fases'] = $array_fases;
        $this->dados['data_inicio'] = $data_inicio;
        $this->dados['data_fim'] = $data_fim;
        $this->dados['calc_incio'] = $calc_incio;
        $this->dados['width_verde_inicio'] = $width_verde_inicio;
        $this->dados['color_texto_inicio'] = $color_texto_inicio;
        $this->dados['percentagem'] = $percentagem_momento;
        

        return view('site/pages/bonfimInfo', $this->dados);
    }

    public function formContactos(Request $request)
    {
        $nome = trim($request->nome);
        $email = trim(strtolower($request->email));
        $telefone = trim($request->telefone);
        $mensagem = trim($request->mensagem);
        $id_lote = trim($request->id_lote);



        if(empty($nome)){ return trans('site.NomeVazio');}



        $accents = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç",' ', '');

        if (ctype_alpha(str_replace($accents, '', $nome)) === false) { return trans('site.nomeValue'); }

        if(empty($email)){return trans('site.EmailVazio');}
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ return trans('site.emailValue'); }

        if(empty($telefone)){return trans('site.TelefoneVazio');}
        if (!ctype_digit($telefone)){ return trans('site.contactValue');}

        if(empty($mensagem) && ($id_lote == '')){return trans('site.MsgVazio');}
        elseif($id_lote != ''){
            if(empty($mensagem)){
                $mensagem = 'Boa tarde, gostaria de saber mais informações sobre este apartamento.';
            } 
        }

        $id = \DB::table('bonfim_contactos')
                    ->insertGetId([
                        'nome' => $nome,
                        'email'=> $email,
                        'telefone'=>$telefone,
                        'mensagem'=>$mensagem,
                        'data'=>\Carbon\Carbon::now()->timestamp
                    ]);
          
        if ($id_lote != '') {
            \DB::table('bonfim_contactos')->where('id',$id)->update(['id_lote' => $id_lote]);

            $apartamento = \DB::table('bonfim_lotes')->where('id',$id_lote)->first();

            $dados = [
                'id_lote' => $apartamento->fracao,
                'nome' => $nome,
                'email' => $email,
                'telefone'=> $telefone,
                'mensagem' => $mensagem
            ];

        }else{
            $dados = [
                'nome' => $nome,
                'email' => $email,
                'telefone'=> $telefone,
                'mensagem' => $mensagem
            ];

        }

        

        $resposta = [
           'estado' => 'sucesso',
           'mensagem' => trans('site.ObgContacto')
        ];

        \Mail::send('site.emails.pages.mail',['dados' =>$dados], function($message){

            $message->to('cvieira@mredis.com','Bonfim')->subject('Contacto Bonfim');
            $message->from(config('mailAcconts.geral')['mail'],config('mailAcconts.geral')['nome']);
           
        });
      
        return json_encode($resposta,true); 
    }

    public function formNewslleter(Request $request){
        $email = trim(strtolower($request->email));

        if(empty($email)){return trans('site.EmailVazio');}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ return trans('site.emailValue'); }

        $email_inscrito = \DB::table('bonfim_newsletter')->where('email',$email)->first();

        if(isset($email_inscrito->id)){return trans('site.ExistEmail');}

        $token = str_random(12);
        \DB::table('bonfim_newsletter')
            ->insert([
                'token' => $token,
                'email'=> $email,
                'lingua' => Session::get('locale'),
                'data'=>\Carbon\Carbon::now()->timestamp
            ]);

        //SEND EMAIL
        $dados = [
            'token' => $token
        ];
        \Mail::send('site.emails.pages.newsletter',['dados' =>$dados], function($message) use ($request){

            $message->to($request->email,'')->subject('Bem-Vindo(a)!');
            $message->from(config('mailAcconts.geral')['mail'],config('mailAcconts.geral')['nome']);
           
        });

        $resposta = [
           'estado' => 'sucesso',
           'mensagem' => trans('site.ObgNews')
        ];
        return json_encode($resposta,true); 
    }


    public function cancelarNewsletter($token,$lang){
        $this->dados['headTitulo'] = 'Bonfim';
        $this->dados['headDescricao'] = 'Bonfim';
        $this->dados['headPagina'] = 'Home';
        $this->dados['faceTipo'] = 'website';
        $this->dados['lingua'] = $lang;


        if ($token != '') {

            \DB::table('bonfim_newsletter')->where('token',$token)->delete();

            return view('site/pages/cancelarNewsletter', $this->dados);
        }
    }


    public function avisoLegal(){
        $this->dados['headTitulo'] = 'Bonfim';
        $this->dados['headDescricao'] = 'Bonfim';
        $this->dados['headPagina'] = 'Home';
        $this->dados['faceTipo'] = 'website';


        return view('site/pages/avisoLegal', $this->dados);
    }
    
}