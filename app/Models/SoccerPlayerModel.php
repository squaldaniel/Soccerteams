<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoccerPlayerModel extends Model
{
    use HasFactory;
    public $table = 'soccerplayers';
    public $fillable = [
        'soccerplayer',
        'goalkeeper',
        'level',
        'photo',
        'sortition',
    ];
    public $softdeletes = false;
    protected $hidden = [
        'updated_at'
    ];
    /**
     * @param void
     * @return void
     * Description: função para selecionar aleatóriamente goleiros
     * obs: exceto "Jhon Wick"
     */
    public function updateGoalKeeper()
        {
            // Selecionamos todos os jogadores
            $allplayers = self::all();
            /**
             * tiramos a média pelo numeor de jogadores em cada time que é 6
             * caso seja numero fracionado arrendondamos para cima
             *  */
            $quantGoalKeepers = ceil((count($allplayers)/6));
            // selecionamos elatóriamente um id
            $randomId = rand(1, count($allplayers));
            $intquant = 1;
            // fazemos o laço atualizando aleatóriamente alguns jogadores como goleiros
            while ($intquant <= $quantGoalKeepers){
                $randomId = rand(1, count($allplayers));
                $player = self::where('goalkeeper', false)->where('id', $randomId)->get();
                /**
                 * é claro que se o jogador for 'Jhon Wick', não fazemos isso.
                 * O senhor Wick é só ATAQUE.
                 * */
                if($player[0]->soccerplayer != 'Jhon Wick'){
                    self::where('goalkeeper', false)->where('id', $randomId)
                        ->update(['goalkeeper'=> true]);
                    $intquant++;
                } else {
                    next($player);
                }
            }
        }
    public function selectteams()
        {

        }
}
