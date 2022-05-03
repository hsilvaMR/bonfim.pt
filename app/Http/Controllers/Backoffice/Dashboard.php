<?php namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Cookie;

class Dashboard extends Controller
{
  private $dados=[];
  /*private $lang;
  public function __construct()
  {
    //$this->lang=Session::get('locale');
    $this->middleware(function ($request, $next) {
          $this->lang = Cookie::get('admin_cookie')['lingua'];
          return $next($request);
      });
  }*/

  /**************
  *  DASHBOARD  *
  **************/	
  public function index(){
  	$this->dados['headTitulo']=trans('backoffice.dashboardTitulo');
  	$this->dados['separador']="dashboard";
    $this->dados['funcao']="";

    //$lang = Cookie::get('admin_cookie')['lingua'];
    //$lang = json_decode(Cookie::get('admin_cookie'))->lingua;
  	// \DB::select(\DB::raw("     "))
    //$id_admin = json_decode(Cookie::get('admin_cookie'))->id;

    $this->dados['num1'] = \DB::table('admin')->select('id')->count();
    $this->dados['num2'] = \DB::table('bonfim_lotes')->select('id')->count();
    $this->dados['num3'] = \DB::table('bonfim_contactos')->select('id')->count();
    $this->dados['num4'] = \DB::table('bonfim_newsletter')->select('id')->count();


    $this->dados['lista1'] = \DB::table('admin')
                                ->select('nome','email')
                                ->orderBy('id','DESC')
                                ->limit(10)
                                ->get();

    $this->dados['lista2'] = \DB::table('bonfim_newsletter')
                                ->select('email','data')
                                ->orderBy('id','DESC')
                                ->limit(10)
                                ->get();

  	return view('backoffice/pages/dashboard', $this->dados);
  }
}