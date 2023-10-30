<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SoccerMatchesModel;
use App\Models\SoccerPlayerModel;

class ConfirmationsModel extends Model
{
    use HasFactory;
    public $table =  'confirmations';
    protected $softdelets = false;
    protected $hidden = [
        'updated_at'
    ];
    public $fillable = [
        'matches',
        'soccerplayer'
    ];
    public function confirmations()
        {
           return $this->belongsTo(SoccerMatchesModel::class, 'id');
        }
    public function player()
        {
            return $this->belongsTo(SoccerPlayerModel::class, 'soccerplayer');
        }
}
