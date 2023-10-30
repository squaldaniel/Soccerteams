<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoccerMatchesModel;

class SoccerMatchesController extends Controller
{
    /**
     * @param void
     * @return view
     * Description: Exibe o formulário de criação de partidas
     */
    public static function create()
        {
            return view('bootstrap.newmatche');
        }
    /**
     * @param void (Request)
     * @return void
     */
    public static function store()
        {
            // captura o objeto request
            $request = app('request');
            // valida o input
            (new controller)->validate($request, [
                'floatingdate' => 'required'
                ]);
            // marca o dia da partida
            SoccerMatchesModel::create([
                'daymatches'=> $request->input('floatingdate')
            ]);
            return redirect('/');
        }
    public static function listall()
        {
            $matches = SoccerMatchesModel::where('realized', 0)->get()->toArray();
            return view('bootstrap.listmatches')->with(['matches' => $matches]);
        }
}
