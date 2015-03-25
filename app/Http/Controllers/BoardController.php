<?php namespace App\Http\Controllers;


use App\Waikoa\Model\MessageBoard\Comment;
use Request;
use Auth;

class BoardController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('comments.message_board', compact('comments'));
    }

    public function add()
    {
        $comment = new Comment;
        $comment->message = Request::get('comment');
        $comment->object_id = Request::get('object_id');
        $comment->user()->associate(Auth::user());
        $comment->save();
        $comment->created_at->setToStringFormat('m/d/Y g:i:s a');
        return response()->json($comment);
    }

}