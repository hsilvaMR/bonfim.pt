<?php
namespace App\Http\Controllers\Bonfim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


class Localizacao extends Controller
{
    private $dados = [];

    public function index()
    {
        $this->dados['headTitulo'] = 'Bonfim';
        $this->dados['headDescricao'] = trans('metatags.d_home');
        $this->dados['headPagina'] = 'Bonfim';
        $this->dados['faceTipo'] = 'website';


        return view('site/pages/bonfimLocalizacao', $this->dados);
    }
}