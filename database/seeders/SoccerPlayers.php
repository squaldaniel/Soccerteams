<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SoccerPlayerModel;

class SoccerPlayers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoccerPlayerModel::create([
            "soccerplayer" => "Daniel San",
            "goalkeeper" => false,
            "level" => 3,
            "photo" => "/img/dansan.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Calvin",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/calvin.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Ken Masters",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/kenmasters.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Rocky Balboa",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/balboa.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Kyo Kusanagi",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/kyo.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Dhalsin",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/Dhalsin.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Felix the Cat",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/felix.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "He-man",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/heman.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Iory Yagami",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/iory.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Jaspion o fantático",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/jaspion.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Jhon Wick",
            "goalkeeper" => false,
            "level" => 5,
            "photo" => "/img/jhonwick.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Mario",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/mario.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Michael Corleone",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/mcorleone.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Mister Magoo",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/mrmagoo.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Terry Bogard",
            "goalkeeper" => false,
            "level" => 5,
            "photo" => "/img/terry.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Ryu",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/ryu.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Pateta",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/pateta.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Toha Yamagi",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/tohayamaji.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Shinji Ikari",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/shinjiikari.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Pernalonga",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/pernalonga.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Ted Mosby",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/tedmosby.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Joe Higashi",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/joehigashi.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Popeye the Sailor",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/popeye.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Balrog",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/balrog.jpg"
        ]);
        SoccerPlayerModel::create([
            "soccerplayer" => "Yusuke Hurameshi",
            "goalkeeper" => false,
            "level" => rand(1, 5),
            "photo" => "/img/yusuke.jpg"
        ]);
        // selecional os goleiros
        (new SoccerPlayerModel)->updateGoalKeeper();
    }
}
