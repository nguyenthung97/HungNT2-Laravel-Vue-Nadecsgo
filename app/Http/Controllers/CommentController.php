<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function addComment(Request $request){
        $cmt = new Comment;
        $cmt->vid_id = $request->fields["videoId"];
        $cmt->comment = $request->fields["message"];
        $cmt->comment_sender_name = $request->fields["authUserName"];
        $cmt->comment_sender_avatar = $request->fields["authUserAvatar"];
        $cmt->save();
        return back();
    }
}
