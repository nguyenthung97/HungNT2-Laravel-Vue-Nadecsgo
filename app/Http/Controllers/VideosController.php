<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VideosController extends Controller
{
    public function getVideosByPosID($posID){
        $videos = Video::where('pos_id',$posID)
                ->select('videos.*','positions.*','bombs_defs.*')
                ->join('positions','positions.id','videos.pos_id')
                ->join('bombs_defs','positions.bomb_id','bombs_defs.id')
                ->get();
        return response()->json($videos);
    }

    public function showVideoDetailPage($slug){
        $video = Video::where('slug',$slug)
        ->join('users', 'videos.steam_id','users.steam_id')
        ->get()->first();
        
        return View::make('video-detail-page')->with(compact('video'));
        // return response()->json($video);
    }

    public function getVideoDetail($videoID){
        $videoz = Video::where('videos.id',$videoID)
            ->get();
        return response()->json($videoz);
    }

    public function getCommentDetailByVideoID($videoID){
        $videozz = Video::where('videos.id',$videoID)
            ->join('comments','comments.vid_id','videos.id')
            ->get();
        return response()->json($videozz);
    }

    public function getVideosBySteamIDAndMapID($steamID,$mapID){
        $videoSM = Video::where('steam_id',$steamID)
                ->join('positions','videos.pos_id','positions.id')
                ->where('positions.map_id',$mapID)
                ->join('maps','positions.map_id','maps.id')
                ->join('bombs_defs','positions.bomb_id','bombs_defs.id')
                ->get();
        return response()->json($videoSM);
    }
}
