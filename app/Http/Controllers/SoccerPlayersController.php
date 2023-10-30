<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoccerPlayerModel;
use App\Models\SoccerMatchesModel;
use Illuminate\Support\Facades\Storage;

class SoccerPlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            $players = SoccerPlayerModel::all();
            $matches = SoccerMatchesModel::where('realized', 0)->get()->toArray();
            return view('bootstrap.index')->with([
                    'players' => $players,
                    'matches' => $matches]);
        }

    /**
     * Show the form for creating a new resource.
     */
    public static function create()
        {
            return view('bootstrap.newplayer');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        (new Controller)->validate($request, [
            'floatname' => 'required',
            'levelinput' => 'required',
            'goalkeeperinput' => 'required',
            'inputphoto' => 'required',
        ]);
        //
        if ($request->hasFile('inputphoto')){
            /**
             * upload da foto
             */
            $filenameWithExt = $request->file('inputphoto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('inputphoto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            Storage::disk('public_uploads')->put($fileNameToStore, $request->file('inputphoto')->getContent());
            echo 'é file';
            exit;
            } else {
            return false;
        }
        return 'ok';
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public static function edit(int $id)
    {
        $player = SoccerPlayerModel::find($id);
        return view('bootstrap.editplayer')->with(['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update(int $id)
    {
        $request = app('request');
        if ($request->hasFile('inputphoto')){
            /**
             * upload da foto
             */
            $filenameWithExt = $request->file('inputphoto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('inputphoto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            Storage::disk('public_uploads')->put($fileNameToStore, $request->file('inputphoto')->getContent());
            } else {
            return false;
        }
        $photoname = $fileNameToStore;
        SoccerPlayerModel::where('id', $id)->update([
           'soccerplayer' => $request->input("floatname"),
            'level' => $request->input("levelinput"),
            'goalkeeper' => $request->input("goalkeeperinput"),
            'photo'=> '/img/'.$photoname
        ]);
        return redirect()->route('listall');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function listall()
        {
            $players = SoccerPlayerModel::all();
            return view('bootstrap.players')
            ->with(['players' => $players]);
        }
}
