<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Video;
use App\Models\BombDef;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;


class MapsController extends Controller
{
    public function index($mapName){
        $map = Map::where('MapName','=',$mapName)->get()->first();
        
        return response()->json($map);

    }

}

