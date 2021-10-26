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
        $pos->map_id = $request->fields["mapSelected"]["value"];

        $mapName = Map::where('id', $pos->map_id)->value('MapName');

        $pos->PosName = $request->fields["thrownEndPosition"];
        $pos->bomb_id = $request->fields["mapSelected"]["value"];

        $bombName = BombDef::where('id', $pos->bomb_id)->value('BombName');

        $pos->counter = 0;
        $pos->posTop = $request->fields["pointCoordY"];
        $pos->posLeft = $request->fields["pointCoordX"];
        $pos->save();

        $vid = new Video;
        $vid->pos_id = $pos->id;
        $vid->VideoName = $request->fields["thrownFromPosition"];
        $vid->ResultImagePath = $request->fields["resultImageToSave"];
        $vid->LineUpImagePath = $request->fields["lineupImageToSave"];
        $vid->VideoPath = $request->fields["videoSelected"];
        $vid->views = 0;
        $vid->favorites = 0;
        $vid->fullDetailedVideoName = $mapName . " " . $bombName . " " . $pos->PosName . " " . "from" . " " . $vid->VideoName;
        $vid->slug = Str::of($vid->fullDetailedVideoName)->slug('-');
        $vid->steam_id = $request->fields["authUserSteamId"];
        $vid->save();
        return back();
    }
}
