<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Session;

class Language extends Controller
{

    public function index($lang)
    {
        if($lang)
        {
            Session::put('locale', $lang);
            Session::flash('changedLang','1');
        }
        
        return redirect()->back();
    }

}