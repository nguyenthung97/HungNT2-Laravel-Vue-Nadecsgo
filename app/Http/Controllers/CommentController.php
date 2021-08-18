<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function addComment(Request $request){
        $cmt = new Comment;
        $cmt->vid_id = $request->video_id;
        $cmt->comment = $request->comment_message;
        $cmt->comment_sender_name = $request->comment_sender_name;
        $cmt->comment_sender_avatar = $request->comment_sender_avatar;
        $cmt->save();
        return back();
    }
}
