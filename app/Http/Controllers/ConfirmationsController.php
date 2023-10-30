<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoccerMatchesModel;
use App\Models\SoccerPlayerModel;
use App\Models\ConfirmationsModel;
use Illuminate\Validation\Rules\Exists;

use function PHPUnit\Framework\countOf;

class ConfirmationsController extends Controller
{
    public function show($id)
        {
            $confirmations =  SoccerMatchesModel::where('id', $id)
                ->with('confirmations')->get()->toArray()[0];
            $confimed =[];
            foreach ($confirmations['confirmations'] as $key => $player){
                array_push($confimed, $player['soccerplayer']);
            }
            $players = SoccerPlayerModel::whereNotIn('id', $confimed)
                ->get()->toArray();
            return view('bootstrap.confirmations')->with([
                        'confirmations'=> $confirmations,
                        'players'=> $players
                ]);
        }
    public static function create()
        {
            $request = app('request');
            (new Controller)->validate($request, [
                'playerpresence'=> 'required',
                'matches' => 'required'
            ]);
            foreach ($request->input('playerpresence') as $key => $player) {
                try {
                    ConfirmationsModel::create([
                        'matches' => $request->input('matches'),
                        'soccerplayer' => $player
                    ]);
                } catch (\Throwable $th) {
                    next($request);
                }

            }
            return redirect()->back();
        }
    public  function preTeams(Request $request)
        {
            $teamsormessage = $this->getTeams($request);
            if(is_array($teamsormessage)){
                return view('bootstrap.preteams')->with(['teams'=>$teamsormessage]);
            } else {
                return view('bootstrap.preteams')->with(['message'=>$teamsormessage]);
            }

        }
    public function createTeam(array $ArrayIds, int $quantplayers)
        {
            $jogadores = SoccerPlayerModel::select('id', 'level')->wherein('id', $ArrayIds)
                            ->orderBy('level', 'desc')->pluck('id')->toArray();
            $quant_times = (int) ceil(count($ArrayIds) / $quantplayers);
            $time_escolhido = [];
            array_push( $time_escolhido, reset($jogadores));
            return ['team'=>$time_escolhido, 'id'=> reset($jogadores)];
        }
    public function getLevelsTeams(array $teams)
        {
            $levelsOnly = [];
            foreach ($teams as $key => $team) {
                array_push($levelsOnly, $team['levelTeam']);
                }
            return $levelsOnly;
        }
    public function compLevels(array $teamsLevels, $numteams)
        {
            $totaltimes = array_sum($teamsLevels);
            $media = $totaltimes / $numteams;
            return ['media'=>ceil($media), 'teamslevels'=>$teamsLevels];
        }
    public function equilibrate(array $complevels)
        {
            $max = max($complevels['teamslevels']);
            $min = min($complevels['teamslevels']);
            if(($max - $min) > 5){
                return true;
            }else {
                return false;
            }
        }
    public function crearTimes(array $jogadores, int $numero_times)
        {
            usort($jogadores, function($a, $b) {
                return $a['level'] - $b['level'];
            });
            $times = array_fill(0, $numero_times, []);
            foreach ($jogadores as $jogador) {
                // Encontra o time com o menor total de nível de força
                $timeMenosForca = array_reduce($times, function($carry, $time) {
                    $somaForca = array_sum(array_column($time, 'level'));
                    return ($carry === null || $somaForca < $carry['somaForca']) ? ['time' => $time, 'somaForca' => $somaForca] : $carry;
                }, null);

                // Adiciona o jogador ao time encontrado
                $timeMenosForca['time'][] = $jogador;
            }
            return $times;
        }
    public function impedirGoleiros($arrTeam)
        {
            $goleiro = [];
            foreach ($arrTeam as $key => $team) {
                foreach($team as $k => $player){
                    if ($player["goalkeeper"] == 1){
                        array_push($goleiro, ['team'=> $key, $player]);
                        if(array_key_exists($key, $goleiro)){
                            //dd(['ja existe', $goleiro]);
                            return $this->getTeams();
                        }
                    }
                }
            }
            return ($te);
        }
    public function getTeams(Request $request)
        {
            $matche = (int) $request->input('matche');
            $players = $this->getForMatche($matche);
            $totalPlayers = count($players['confirmations']);
            $PlayersForTeam = (int) $request->input('numplayers');
            // verifica a quantidade minima de jogadores para a partida
            if (($PlayersForTeam*2) <= $totalPlayers){
                    /**
                     * caso tenha o minimo prossegue
                     * segue atualizando um numero de sorteio para cada jogador
                     **/
                    $playersList = [];
                    foreach ($players['confirmations'] as $key => $player){
                        array_push($playersList, $player['player']['id']);
                    }
                    // atuzaliza numero de sorteio
                    $this->sortitionNumer($playersList, $totalPlayers);
                    // seleciona jogadores e ordena pelo numero de sorteio
                    $playersSortition = SoccerPlayerModel::wherein('id', $playersList)
                            ->orderby('sortition', 'ASC')->get()->toArray();
                    //divide os times
                    $times = array_chunk($playersSortition, $PlayersForTeam);
                    $times = $this->impedirGoleiros($times);
                    dd($times);
                    return $times;
                } else {
                    // caso não tenha retorna mensagem
                    return 'sem o minimo possivel para jogar';
                };
        }
    public function getForMatche(int $matchId)
        {
            $arrPlayersConfirmed = SoccerMatchesModel::where('id', $matchId)->with('confirmations')
            ->get()->toArray()[0];
            return $arrPlayersConfirmed;
        }
        /**
         * @param void
         * @return void
         * Description: atuzaliza o numero de sorteio dos jogadores
         */
    public function sortitionNumer(array $arrPlayersIds, int $totalPlayers)
        {
            foreach($arrPlayersIds as $key => $playerId){
                $sortitionNumber = rand(1, ($totalPlayers*2) );
                SoccerPlayerModel::where('id', $playerId)
                    ->update([
                        'sortition'=> $sortitionNumber
                    ]);
            }
        }
    public static function listall()
    {
        return view('bootstrap.listmatches');
    }
}
