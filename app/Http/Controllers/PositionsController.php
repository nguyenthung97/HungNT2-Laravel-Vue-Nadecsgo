<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Video;
use App\Models\BombDef;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function getPosByMapNameAndBombId($MapName, $BombID)
    {
        $map = Map::where('MapName', '=', $MapName)->get()->first();
        $svgs = $map->positions()
            ->select('positions.*', 'bombs_defs.BombName')
            ->join('bombs_defs', 'positions.bomb_id', 'bombs_defs.id')
            ->where('positions.bomb_id', $BombID)

            ->get();
        return response()->json($svgs);
    }

    public function submitNade(Request $request)
    {
        $pos = new Position;
        $pos->map_id = $request->mapselection;

        $mapName = Map::where('id', $pos->map_id)->value('MapName');

        $pos->PosName = $request->get('nade-end-input');
        $pos->bomb_id = $request->typeselection;

        $bombName = BombDef::where('id', $pos->bomb_id)->value('BombName');

        $pos->counter = 0;
        $pos->posTop = $request->TopPosSelection;
        $pos->posLeft = $request->LeftPosSelection;
        $pos->save();

        $vid = new Video;
        $vid->pos_id = $pos->id;
        $vid->VideoName = $request->get('thrown-from-input');
        $vid->ResultImagePath = $request->get('result-img');
        $vid->LineUpImagePath = $request->get('lineup-img');
        $vid->VideoPath = $request->videourlselection;
        $vid->views = 0;
        $vid->favorites = 0;
        $vid->fullDetailedVideoName = $mapName . " " . $bombName . " " . $pos->PosName . " " . "from" . " " . $vid->VideoName;
        $vid->slug = Str::of($vid->fullDetailedVideoName)->slug('-');
        $vid->steam_id = $request->user_steam_id;
        $vid->save();
        return back();
    }
}
