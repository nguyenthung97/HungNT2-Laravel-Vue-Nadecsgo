<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    public function index($steamID){
        $user = User::where('users.steam_id',$steamID)
                ->get()
                ->first();
        // return view('user-detail-page',compact('user','maps'));
        return response()->json($user);
        
    }
}
