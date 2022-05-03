<?php
namespace App\Http\Controllers\Bonfim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Session;

class Noticia extends Controller
{
    private $dados = [];

    public function index($id)
    {
        $this->dados['headTitulo'] = 'Bonfim';
        $this->dados['headDescricao'] = trans('metatags.d_home');
        $this->dados['headPagina'] = 'Bonfim';
        $this->dados['faceTipo'] = 'website';
        $this->dados['lingua'] = Session::get('locale');

        $this->lang = Session::get('locale');

        $this->dados['noticia'] = \DB::table('bonfim_noticias')->select('*','data_noticia_'.$this->lang.' AS data_noticia','titulo_'.$this->lang.' AS titulo','primeiro_texto_'.$this->lang.' AS primeiro_texto','segundo_texto_'.$this->lang.' AS segundo_texto','link_'.$this->lang.' AS link')->where('id',$id)->first();

        $this->dados['noticia_slide'] = \DB::table('bonfim_noticias_slide')
                                            ->select('bonfim_noticias_slide.titulo_'.$this->lang.' AS titulo','bonfim_noticias_slide.texto_'.$this->lang.' AS texto','bonfim_noticias.data_noticia_'.$this->lang.' AS data_noticia','bonfim_noticias.id AS id_noticia')
                                            ->leftJoin('bonfim_noticias','bonfim_noticias_slide.id_noticia','bonfim_noticias.id')
                                            ->where('bonfim_noticias.online',1)
                                            ->where('bonfim_noticias_slide.id_noticia','<>',$id)
                                            ->orderBy('bonfim_noticias.data','DESC')
                                            ->get();

        return view('site/pages/bonfimNoticia', $this->dados);
    }
}