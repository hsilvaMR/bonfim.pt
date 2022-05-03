<?php
namespace App\Http\Controllers\Bonfim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Session;

class Apartamento extends Controller
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

        $this->dados['apartamento'] = \DB::table('bonfim_lotes')->where('id',$id)->first();
        $this->dados['apartamento_galeria'] = \DB::table('bonfim_lotes_galeria')
											        ->where('id_lote',$id)
											        ->where('online',1)
											        ->orderBy('ordem','ASC')
											        ->get();

		$acabamentos = \DB::table('bonfim_lotes_acabamentos')->select('*','divisao_'.$this->lang.' AS divisao')->where('id_lote',$id)->where('online',1)->get();

		$array_acabamento = [];
		foreach ($acabamentos as $value) {
			$acabamentos_tipo = \DB::table('bonfim_lotes_acabamentos_tipo')->select('*','tipo_'.$this->lang.' AS tipo','descricao_'.$this->lang.' AS descricao')->where('id_acabamento',$value->id)->get();

			foreach ($acabamentos_tipo as $val) {
				$array_acabamento[] = [
					'id_acabamento' => $val->id_acabamento,
					'tipo' => $val->tipo,
					'descricao' => $val->descricao
				];
			}
		}

		$apartamento_next = \DB::table('bonfim_lotes')->where('id','>',$id)->where('online',1)->first();
		$apartamento_prev = \DB::table('bonfim_lotes')->where('id','<',$id)->orderBy('id', 'DESC')->where('online',1)->first();


		if (isset($apartamento_next->id)) {
			$apartamento_next = $apartamento_next->id;
		}else{
			$apartamento_next = \DB::table('bonfim_lotes')->orderBy('id', 'ASC')->where('online',1)->first();
			$apartamento_next = $apartamento_next->id;
		}

		if (isset($apartamento_prev->id)) {
			$apartamento_prev = $apartamento_prev->id;
		}else{
			$apartamento_prev = \DB::table('bonfim_lotes')->orderBy('id', 'DESC')->where('online',1)->first();
			$apartamento_prev = $apartamento_prev->id;
		}

		

		$this->dados['apartamento_next'] = $apartamento_next;
		$this->dados['apartamento_prev'] = $apartamento_prev;
		$this->dados['acabamentos'] = $acabamentos;
		$this->dados['array_acabamento'] = $array_acabamento;
        return view('site/pages/bonfimApartamento', $this->dados);
    }
}