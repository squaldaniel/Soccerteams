<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ConfirmationsModel;

class SoccerMatchesModel extends Model
{
    use HasFactory;
    public $table = 'soccermatches';
    protected $hidden = [
        'updated_at'
    ];
    public $fillable = [
        'daymatches'
    ];
    public $softdelets = false;
    public function confirmations()
        {
            return $this->hasMany(ConfirmationsModel::class, 'matches')->with('player');
        }
}
